/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class', // enables class-based dark mode
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};