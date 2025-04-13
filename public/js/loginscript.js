document.addEventListener('DOMContentLoaded', function(){
    const loginToggle = document.getElementById('login-toggle');
    const signupToggle = document.getElementById('signup-toggle');
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
  
    // Toggle to show login form
    loginToggle.addEventListener('click', function(){
      loginToggle.classList.add('active');
      signupToggle.classList.remove('active');
      loginForm.classList.add('active');
      signupForm.classList.remove('active');
    });
  
    // Toggle to show signup form
    signupToggle.addEventListener('click', function(){
      signupToggle.classList.add('active');
      loginToggle.classList.remove('active');
      signupForm.classList.add('active');
      loginForm.classList.remove('active');
    });
  });
  