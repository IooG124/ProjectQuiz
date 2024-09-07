/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './public/js/script.js',
  ],
  
  theme: {
    extend: {
      fontFamily: {
        'Urbanist': ['Urbanist', 'sans-serif']
      },
      colors: {
        primary : '#ffffff',
        secondary : '#10AEFF',
        body : '#F3F4F6',
        
      },
    },
  },
  plugins: [],
}

