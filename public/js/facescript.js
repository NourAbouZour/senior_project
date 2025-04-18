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
  console.log('▶ startVideo() invoked');
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
      console.log('✅ got camera stream');
      video.srcObject = stream;
      document.getElementById('status').textContent = '📷 Camera started. Scanning...';
    })
    .catch(err => {
      console.error('❌ Webcam error:', err);
      document.getElementById('status').textContent = '❌ Unable to access camera.';
    });
}

video.addEventListener('play', async () => {
  // wait until video has loaded enough data
  await new Promise(resolve => {
    if (video.readyState >= 2) return resolve();
    video.onloadeddata = () => resolve();
  });

  // overlay canvas
  const canvas = faceapi.createCanvasFromMedia(video);
  canvas.id = 'overlay';
  document.querySelector('.video-wrapper').appendChild(canvas);

  const displaySize = { width: video.videoWidth, height: video.videoHeight };
  faceapi.matchDimensions(canvas, displaySize);

  // prepare recognizer
  const labeledDescriptors = await loadLabeledImages();
  const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors, 0.5);

  // run detection every 500ms
  setInterval(async () => {
    const detections = await faceapi
      .detectAllFaces(video, new faceapi.TinyFaceDetectorOptions({ inputSize: 416 }))
      .withFaceLandmarks()
      .withFaceDescriptors();

    const results = faceapi.resizeResults(detections, displaySize);
    const ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    results.forEach(detection => {
      const match = faceMatcher.findBestMatch(detection.descriptor);
      const distance = match.distance;
      const confidence = Math.max(0, Math.round((1 - distance) * 100));
      const isMatch = match.label !== 'unknown' && distance < 0.5;

      // draw box + label
      new faceapi.draw.DrawBox(detection.detection.box, {
        label: isMatch
          ? `${match.label} (${confidence}%)`
          : 'Unknown',
        boxColor: isMatch ? 'green' : 'red',
        lineWidth: 2
      }).draw(canvas);

      // on first match, log once
      if (isMatch && !loggedIn && !sessionLogged) {
        const loginTime = new Date().toLocaleString();
        loginLog.push({ time: loginTime, name: match.label, confidence: `${confidence}%` });

        sessionLogged = true;
        loggedIn = true;
        document.getElementById('status').textContent =
          `✅ Logged in as ${match.label} at ${loginTime}`;
        document.getElementById('log').innerHTML = `
          🕒 ${loginTime}<br>
          🙎 ${match.label}<br>
          🎯 Confidence: ${confidence}%<hr>
        `;

        // redirect after 2s
        setTimeout(() => {
          window.location.href = '/functions';
        }, 2000);
        
        // setTimeout(() => {
        //   window.location.href = `/${match.label.toLowerCase()}_dashboard`;
        // }, 2000);
      }
    });

    console.clear();
    console.table(loginLog);
  }, 500);
});

async function loadLabeledImages() {
  const labels = ['Joeanna', 'Nour'];
  return Promise.all(labels.map(async label => {
    const descriptors = [];
    for (let i = 1; i <= 10; i++) {
      try {
        const img = await faceapi.fetchImage(`/labeled_images/${label}/${i}.jpg`);
        const detection = await faceapi
          .detectSingleFace(img, new faceapi.TinyFaceDetectorOptions({ inputSize: 416 }))
          .withFaceLandmarks()
          .withFaceDescriptor();
        if (!detection) throw new Error('no face detected');
        descriptors.push(detection.descriptor);
      } catch (e) {
        console.warn(`[${label}] skipping image ${i}: ${e.message}`);
      }
    }
    return new faceapi.LabeledFaceDescriptors(label, descriptors);
  }));
}
