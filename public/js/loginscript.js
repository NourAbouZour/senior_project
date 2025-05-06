const loginBtn  = document.getElementById('login-toggle');
const signupBtn = document.getElementById('signup-toggle');
const loginW    = document.getElementById('login-widget');
const signupW   = document.getElementById('signup-widget');

loginBtn.addEventListener('click', () => {
  loginBtn.classList.add('active');
  signupBtn.classList.remove('active');
  loginW.classList.add('active');
  signupW.classList.remove('active');
});

signupBtn.addEventListener('click', () => {
  signupBtn.classList.add('active');
  loginBtn.classList.remove('active');
  signupW.classList.add('active');
  loginW.classList.remove('active');
});
// ⋯ your existing toggle code here ⋯

// --- Preserve signup inputs across navigations ---
document.addEventListener('DOMContentLoaded', () => {
  // list out the IDs you gave above
  const signupFieldIds = [
    'su-username',
    'su-email',
    'su-country',
    'su-password',
    'su-password_confirmation'
  ];

  signupFieldIds.forEach(id => {
    const el = document.getElementById(id);
    if (!el) return;

    // 1) on load, if we've saved something before, re-populate
    const prev = sessionStorage.getItem(id);
    if (prev !== null) {
      el.value = prev;
    }

    // 2) on every change, save to sessionStorage
    el.addEventListener('input', () => {
      sessionStorage.setItem(id, el.value);
    });
  });

  // 3) once they finally submit the signup form, clear those saved entries
  const signupForm = document.getElementById('signup-form');
  signupForm.addEventListener('submit', () => {
    signupFieldIds.forEach(id => sessionStorage.removeItem(id));
  });
});
