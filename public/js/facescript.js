// public/js/facescript.js

const video = document.getElementById('video');
let loggedIn = false;
let sessionLogged = false;

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
  if (labeledDescriptors.length === 0) {
    document.getElementById('status').textContent = '❌ No training images loaded!';
    return;
  }

  const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors, 0.5);

  setInterval(async () => {
    const detections = await faceapi
      .detectAllFaces(video, new faceapi.TinyFaceDetectorOptions({ inputSize: 416 }))
      .withFaceLandmarks()
      .withFaceDescriptors();

    const resized = faceapi.resizeResults(detections, {
      width: video.videoWidth,
      height: video.videoHeight
    });

    const ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for (const det of resized) {
      const match = faceMatcher.findBestMatch(det.descriptor);
      const conf  = Math.round((1 - match.distance) * 100);

      new faceapi.draw.DrawBox(det.detection.box, {
        label: match.label !== 'unknown' ? `${match.label} (${conf}%)` : 'Unknown',
        boxColor: match.label !== 'unknown' ? 'green' : 'red',
        lineWidth: 2
      }).draw(canvas);

      if (match.label !== 'unknown' && !loggedIn && !sessionLogged) {
        loggedIn = sessionLogged = true;
        const now = new Date().toLocaleString();
        document.getElementById('status').textContent =
          `✅ Logged in as ${match.label} at ${now}`;
        document.getElementById('log').innerHTML = `
          🕒 ${now}<br>
          🙎 ${match.label}<br>
          🎯 Confidence: ${conf}%<hr>
        `;
        setTimeout(() => window.location.href = '/functions', 2000);
      }
    }
  }, 500);
});

async function loadLabeledImages() {
  const res = await fetch('/api/labels');
  if (!res.ok) throw new Error('Could not fetch label list');
  const labels = await res.json();
  console.log('🔖 Found labels:', labels);

  const outputs = [];
  for (const label of labels) {
    const descriptors = [];

    for (let i = 1; i <= 10; i++) {
      // try each extension
      for (const ext of ['jpg','jpeg','png']) {
        const url = `/labeled_images/${label}/${i}.${ext}`;
        try {
          const img = await faceapi.fetchImage(url);
          const det = await faceapi
            .detectSingleFace(img, new faceapi.TinyFaceDetectorOptions({ inputSize: 416 }))
            .withFaceLandmarks()
            .withFaceDescriptor();
          if (det && det.descriptor) {
            descriptors.push(det.descriptor);
            console.log(`✅ [${label}] loaded descriptor from ${i}.${ext}`);
            break;  // got one, move on to next i
          }
        } catch {
          // failed to load or no face, try next extension
        }
      }
    }

    console.log(`👤 ${label}: ${descriptors.length} descriptors`);
    if (descriptors.length > 0) {
      outputs.push(new faceapi.LabeledFaceDescriptors(label, descriptors));
    } else {
      console.warn(`⚠️ No valid images found for "${label}", skipping.`);
    }
  }

  return outputs;
}
