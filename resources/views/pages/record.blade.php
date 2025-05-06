<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Record &amp; Label Frames</title>
  <style>
    video#preview { width:100%; max-width:320px; border:1px solid #ccc; }
    #thumbnails img { width:80px; height:60px; object-fit:cover; border:1px solid #aaa; margin:2px; }
    #controls button { margin:0.5rem; padding:0.5rem 1rem; }
    #status { margin-top:0.5rem; color:#555; }
  </style>
</head>
<body>
  <h1>📸 Capture 10 Frames</h1>

  <video id="preview" autoplay muted playsinline></video>
  <div id="thumbnails"></div>
  <div id="controls">
    <button id="record-btn">Start Recording</button>
    <button id="back-btn"   style="display:none;">Back</button>
    <button id="upload-btn" style="display:none;">Done</button>
  </div>
  <p id="status"></p>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Record page loaded');

    const video     = document.getElementById('preview');
    const recordBtn = document.getElementById('record-btn');
    const backBtn   = document.getElementById('back-btn');
    const uploadBtn = document.getElementById('upload-btn');
    const status    = document.getElementById('status');
    const thumbs    = document.getElementById('thumbnails');
    const token     = document.querySelector('meta[name="csrf-token"]').content;

    const params = new URLSearchParams(window.location.search);

    // ←—— Here’s the change: prefer URL params, then sessionStorage
    const username = params.get('username')
                      || sessionStorage.getItem('su-username')
                      || 'unknown_user';
    const email   = params.get('email')
                      || sessionStorage.getItem('su-email')
                      || '';
    const country = params.get('country')
                      || sessionStorage.getItem('su-country')
                      || '';

    let stream, intervalId, frames = [];
    const TARGET_W = 320;

    // 1) START RECORDING
    recordBtn.addEventListener('click', async () => {
      recordBtn.disabled = true;
      status.textContent = 'Starting camera…';
      try {
        stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;
        await video.play();
      } catch (err) {
        status.textContent = 'Camera error: ' + err.message;
        recordBtn.disabled = false;
        return;
      }

      status.textContent = '⏺ Capturing 10 frames…';
      frames = [];
      thumbs.innerHTML = '';
      backBtn.style.display = uploadBtn.style.display = 'none';

      let count = 0, total = 10, intervalMs = 4000 / total;
      intervalId = setInterval(() => {
        const canvas = document.createElement('canvas');
        const ratio  = video.videoHeight / video.videoWidth;
        canvas.width  = TARGET_W;
        canvas.height = Math.round(TARGET_W * ratio);
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

        const dataUrl = canvas.toDataURL('image/jpeg', 0.7);
        frames.push(dataUrl);

        const img = document.createElement('img');
        img.src = dataUrl;
        thumbs.appendChild(img);

        if (++count >= total) {
          clearInterval(intervalId);
          status.textContent = 'Captured all frames!';
          backBtn.style.display = uploadBtn.style.display = 'inline-block';
          stream.getTracks().forEach(t => t.stop());
        }
      }, intervalMs);
    });

    // 2) BACK
    backBtn.addEventListener('click', () => {
      if (stream) stream.getTracks().forEach(t => t.stop());
      status.textContent = 'Returning to signup in 5s…';
      setTimeout(() => {
        window.location.href = "{{ route('login') }}?" +
          new URLSearchParams({ username, email, country }).toString();
      }, 5000);
    });

    // 3) UPLOAD
    uploadBtn.addEventListener('click', async () => {
      status.textContent = 'Uploading…';

      try {
        const res = await fetch("{{ route('frames.upload') }}", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept':       'application/json',
            'X-CSRF-TOKEN': token
          },
          body: JSON.stringify({ folderName: username, images: frames })
        });

        const ct = res.headers.get('content-type') || '';
        if (!ct.includes('application/json')) {
          const html = await res.text();
          throw new Error('Server returned non-JSON response');
        }

        const data = await res.json();
        if (!res.ok) throw new Error(data.message || 'Upload error');

        status.textContent = 'Upload complete! Redirecting in 5s…';
        setTimeout(() => {
          window.location.href = "{{ route('login') }}?" +
            new URLSearchParams({ username, email, country, faceDone:'1' }).toString();
        }, 5000);

      } catch (err) {
        console.error('❌ Upload failed:', err);
        status.textContent = 'Upload failed: ' + err.message;
      }
    });

  });  // end DOMContentLoaded
  </script>
</body>
</html>
