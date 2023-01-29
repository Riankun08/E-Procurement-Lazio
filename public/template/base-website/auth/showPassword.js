const togglePassword = document.querySelector('#show-hide-password');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

const togglePasswordConfrim = document.querySelector('#show-hide-password-confirm');
  const passwordConfrim = document.querySelector('#id_password_confirm');

  togglePasswordConfrim.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = passwordConfrim.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordConfrim.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});