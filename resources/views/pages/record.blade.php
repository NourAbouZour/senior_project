<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF‑8">
  <meta name="viewport" content="width=device‑width,initial‑scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Record &amp; Label Frames</title>
  <style>
    /* your existing styles… */
    video#preview { width:100%; max-width:320px; border:1px solid #ccc; }
    #thumbnails img { width:80px; height:60px; object-fit:cover; border:1px solid #aaa; }
    #controls button { margin:0.5rem; padding:0.5rem 1rem; }
    #status { margin-top:0.5rem; color:#555; }
  </style>
</head>
<body>
  <h1>📸 Capture 20 Frames</h1>
  <video id="preview" autoplay muted playsinline></video>
  <div id="thumbnails"></div>

  <div id="controls">
    <button id="record-btn">Start Recording</button>
    <button id="back-btn"   style="display:none;">Back</button>
    <button id="upload-btn" style="display:none;">Done</button>
  </div>
  <p id="status"></p>

  <script>
  document.addEventListener('DOMContentLoaded', () => {
    const video     = document.getElementById('preview');
    const recordBtn = document.getElementById('record-btn');
    const backBtn   = document.getElementById('back-btn');
    const uploadBtn = document.getElementById('upload-btn');
    const status    = document.getElementById('status');
    const thumbs    = document.getElementById('thumbnails');
    const token     = document.querySelector('meta[name="csrf-token"]').content;

    // pull the three fields off the URL
    const params = new URLSearchParams(window.location.search);
    const username = params.get('username') || '';
    const email    = params.get('email')    || '';
    const country  = params.get('country')  || '';

    let stream, intervalId, frames = [];

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

      status.textContent = '⏺ Capturing 20 frames…';
      frames = []; thumbs.innerHTML = '';
      backBtn.style.display = uploadBtn.style.display = 'none';

      const total=20, intervalMs=4000/total;
      let count=0;
      intervalId = setInterval(() => {
        const canvas = document.createElement('canvas');
        canvas.width = video.videoWidth;
        canvas.height= video.videoHeight;
        canvas.getContext('2d').drawImage(video,0,0);
        const dataUrl = canvas.toDataURL('image/png');
        frames.push(dataUrl);
        const img = document.createElement('img'); img.src = dataUrl;
        thumbs.appendChild(img);

        if (++count>=total) {
          clearInterval(intervalId);
          status.textContent = '✅ Captured all frames!';
          backBtn.style.display = uploadBtn.style.display = 'inline-block';
          stopStream();
        }
      }, intervalMs);
    });

    backBtn.addEventListener('click', () => {
      stopStream();
      status.textContent = ' Returning to signup in 5s…';
      setTimeout(() => {
        const qs = new URLSearchParams({
          username, email, country
        }).toString();
        window.location.href = "{{ route('login') }}?" + qs;
      }, 5000);
    });

    uploadBtn.addEventListener('click', async () => {
      status.textContent = 'Uploading…';
      try {
        const res = await fetch("{{ route('frames.upload') }}", {
          method:'POST',
          headers:{ 'Content-Type':'application/json','X-CSRF-TOKEN':token },
          body: JSON.stringify({ folderName: username, images: frames })
        });
        if (!res.ok) throw new Error(await res.text());

        status.textContent = ' Upload complete! Redirecting in 5 s…';
        setTimeout(() => {
          const qs = new URLSearchParams({
            username, email, country, faceDone:'1'
          }).toString();
          window.location.href = "{{ route('login') }}?" + qs;
        }, 5000);
      } catch(err) {
        status.textContent = 'Upload failed: ' + err.message;
      }
    });

    function stopStream(){
      if (stream) stream.getTracks().forEach(t=>t.stop());
    }
  });
  </script>
</body>
</html>
