/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html","./pood.html", "./detail.html","./kott.html", "./kruus.html",
    "./src/**/*.{js,ts,jsx,tsx}"
  ],
  theme: {
    extend: {},
  },
  plugins: [require('daisyui')],
};