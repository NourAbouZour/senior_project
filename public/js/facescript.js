// public/js/facescript.js

const video = document.getElementById('video');
let loggedIn = false;
let sessionLogged = false;

// 1) create a single options object with smaller input and threshold
const detectorOptions = new faceapi.TinyFaceDetectorOptions({
  inputSize: 224,          // was 416
  scoreThreshold: 0.5      // new: skip low-confidence faces
});

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

  // 2) only load 5 images per label instead of 10
  const labeledDescriptors = await loadLabeledImages(10);
  if (labeledDescriptors.length === 0) {
    document.getElementById('status').textContent = '❌ No training images loaded!';
    return;
  }

  const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors, 0.5);

  setInterval(async () => {
    const detections = await faceapi
      .detectAllFaces(video, detectorOptions)       // use our smaller, thresholded options
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

// modified to accept a maxImages parameter
async function loadLabeledImages(maxImages = 10) {
  const res = await fetch('/api/labels');
  if (!res.ok) throw new Error('Could not fetch label list');
  const labels = await res.json();
  console.log('🔖 Found labels:', labels);

  const outputs = [];
  for (const label of labels) {
    const descriptors = [];

    for (let i = 1; i <= maxImages; i++) {   // was <= 10
      for (const ext of ['jpg','jpeg','png']) {
        const url = `/labeled_images/${label}/${i}.${ext}`;
        try {
          const img = await faceapi.fetchImage(url);
          const det = await faceapi
            .detectSingleFace(img, detectorOptions)  // use smaller options here too
            .withFaceLandmarks()
            .withFaceDescriptor();
          if (det && det.descriptor) {
            descriptors.push(det.descriptor);
            console.log(`✅ [${label}] loaded descriptor from ${i}.${ext}`);
            break;
          }
        } catch {}
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
