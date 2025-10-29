/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{html,php}",
    "./pages/*.{html,php}",
    "./views/*.{html,php}",
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

