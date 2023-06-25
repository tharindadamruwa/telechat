// Get the necessary elements
const passwordInput = document.querySelector('.field.pw input');
const toggleButton = document.querySelector('.field.pw i');

// Add event listener to toggle button
toggleButton.addEventListener('click', () => {
  // Toggle the input type between 'password' and 'text'
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    toggleButton.classList.remove('fa-eye');
    toggleButton.classList.add('fa-eye-slash');
    toggleButton.style.color = "#111";
  } else {
    passwordInput.type = 'password';
    toggleButton.classList.remove('fa-eye-slash');
    toggleButton.classList.add('fa-eye');
    toggleButton.style.color = "#ccc";

  }
});
