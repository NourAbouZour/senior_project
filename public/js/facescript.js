// public/js/facescript.js

const video = document.getElementById('video');
const loginLog = [];

let loggedIn = false;
let sessionLogged = false;

// load models from public/models/...
Promise.all([
  faceapi.nets.tinyFaceDetector.loadFromUri('/models/tiny_face_detector'),
  faceapi.nets.faceLandmark68Net.loadFromUri('/models/face_landmark_68'),
  faceapi.nets.faceRecognitionNet.loadFromUri('/models/face_recognition')
])
  .then(startVideo)
  .catch(err => {
    console.error('❌ Model loading error:', err);
    document.getElementById('status').textContent = '❌ Failed to load models.';
  });

function startVideo() {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
      video.srcObject = stream;
      document.getElementById('status').textContent = '📷 Camera started. Scanning...';
    })
    .catch(err => {
      console.error('❌ Webcam error:', err);
      document.getElementById('status').textContent = '❌ Unable to access camera.';
    });
}

video.addEventListener('play', async () => {
  await new Promise(r => {
    if (video.readyState >= 2) return r();
    video.onloadeddata = () => r();
  });

  const canvas = faceapi.createCanvasFromMedia(video);
  document.querySelector('.video-wrapper').appendChild(canvas);
  faceapi.matchDimensions(canvas, { width: video.videoWidth, height: video.videoHeight });

  const labeledDescriptors = await loadLabeledImages();
  const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors, 0.5);

  setInterval(async () => {
    const detections = await faceapi
      .detectAllFaces(video, new faceapi.TinyFaceDetectorOptions({ inputSize: 416 }))
      .withFaceLandmarks()
      .withFaceDescriptors();

    const results = faceapi.resizeResults(detections, { width: video.videoWidth, height: video.videoHeight });
    const ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    results.forEach(detection => {
      const match = faceMatcher.findBestMatch(detection.descriptor);
      const conf  = Math.round((1 - match.distance) * 100);
      new faceapi.draw.DrawBox(detection.detection.box, {
        label: match.label !== 'unknown' ? `${match.label} (${conf}%)` : 'Unknown',
        boxColor: match.label !== 'unknown' ? 'green' : 'red',
        lineWidth: 2
      }).draw(canvas);

      if (match.label !== 'unknown' && !loggedIn && !sessionLogged) {
        sessionLogged = loggedIn = true;
        const now = new Date().toLocaleString();
        document.getElementById('status').textContent = `✅ Logged in as ${match.label} at ${now}`;
        document.getElementById('log').innerHTML = `
          🕒 ${now}<br>
          🙎 ${match.label}<br>
          🎯 Confidence: ${conf}%<hr>
        `;
        setTimeout(() => window.location.href = '/functions', 2000);
      }
    });

    console.table(loginLog);
  }, 500);
});

async function loadLabeledImages() {
  // 1) fetch dynamic labels
  const res = await fetch('/api/labels');
  if (!res.ok) throw new Error('Could not fetch label list');
  const labels = await res.json();
  console.log('🔖 Found labels:', labels);

  // 2) for each label, try both jpg & png
  return Promise.all(labels.map(async label => {
    const descriptors = [];
    for (let i = 1; i <= 10; i++) {
      for (const ext of ['jpg','png']) {
        try {
          const img = await faceapi.fetchImage(`/labeled_images/${label}/${i}.${ext}`);
          const det = await faceapi
            .detectSingleFace(img, new faceapi.TinyFaceDetectorOptions({ inputSize: 416 }))
            .withFaceLandmarks()
            .withFaceDescriptor();
          if (!det) throw new Error('no face detected');
          descriptors.push(det.descriptor);
          break;        // once one format works, skip other ext
        } catch {
          // ignore and try next extension
        }
      }
    }
    console.log(`👤 ${label}: loaded ${descriptors.length} descriptors`);
    return new faceapi.LabeledFaceDescriptors(label, descriptors);
  }));
}
