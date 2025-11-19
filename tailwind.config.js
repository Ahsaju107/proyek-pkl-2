/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{html,php}",
    "./**/*.php",
    "./pages/*.{html,php}",
    "./components/*.{html,php}",
  ],
  theme: {
    extend: {
      fontFamily: {
        'primary': ['Poppins', 'sans-serif'],
        'secondary': ['Inter', 'sans-serif'],
      },
      colors: {
        'primary': '#9333ea',
      }
    },
  },
  plugins: [],
}

