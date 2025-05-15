<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Certifications</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f4f4f4;
      color: #333;
    }
    header {
      background-color: #2980b9;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    .certifications {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      padding: 20px;
    }
    .cert-card {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      max-width: 240px;
      padding: 20px;
      text-align: center;
    }
    .cert-card img {
      max-width: 100%;
      height: auto;
      border-radius: 4px;
      margin-bottom: 15px;
    }
    .cert-card h2 {
      font-size: 1.2rem;
      margin: 10px 0;
    }
    .cert-card p {
      font-size: 0.95rem;
      line-height: 1.4;
    }
    .back-button {
      text-align: center;
      margin: 30px 0;
    }
    .back-button a {
      display: inline-block;
      padding: 10px 20px;
      background: #2980b9;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background 0.3s ease;
    }
    .back-button a:hover {
      background: #2980b9;
    }
  </style>
</head>
<body>
  <header>
    <h1>Our Certifications</h1>
  </header>
  <div class="certifications">
    <div class="cert-card">
      <img src="{{ asset('images/GSDC.png') }}" alt="CISO Certification">
      <h2>Certified Information Security Officer</h2>
      <p>This GSDC certification signifies that the holder has passed the CISO examination in accordance with the 2017-01 qualification scheme, demonstrating a professional level of expertise in information security practices.</p>
    </div>
    <div class="cert-card">
      <img src="{{ asset('images/ccee.png') }}" alt="Energy Efficiency Certification">
      <h2>Energy Efficiency Certification</h2>
      <p>Authorized by UL, this Energy Verified certificate confirms that the NEEC Audio Barcelona Audio/Video products meet all ENERGY STAR program requirements for version 3.0, ensuring top-tier energy efficiency.</p>
    </div>
    <div class="cert-card">
      <img src="{{ asset('images/BIM.png') }}" alt="BIM Education Program">
      <h2>BIM Education Program</h2>
      <p>Issued by AGC, this certification recognizes completion of the 3rd Edition BIM Education Program, covering fundamentals, technology, project execution, implementation, and ROI—boosting professional modeling skills.</p>
    </div>
    <div class="cert-card">
      <img src="{{ asset('images/CEDIA.png') }}" alt="CEDIA EST2 Professional">
      <h2>Certified CEDIA EST2 Professional</h2>
      <p>Awarded by the Custom Electronic Design and Installation Association, this credential certifies mastery of electronic systems technology (EST2). Valid through August 2029 in Lebanon.</p>
    </div>
  </div>
  <div class="back-button">
    <a href="aboutus">&larr; Know More About us</a>
  </div>
</body>
</html>