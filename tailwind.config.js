/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",

  ],
  theme: {
    extend: {
      screens: {
        'xs': '500px',
        '2md': '859px',
    },
    },
  },
  plugins: [],
}

