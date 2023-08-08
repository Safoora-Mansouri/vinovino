/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        'dark-red': '#251322',
        'red': '#9B0738',
        'pale-pink': '#FB7F6',
        'gold': '#927A50',
        'gray': '#c4c0bc',
      },
      maxWidth:{
        '100': '100px',
        '150': '150px',
        '200': '200px',
      },
      fontFamily: {
        'roboto': ['Roboto', 'sans-serif'],
        'montserrat': ['Montserrat', 'sans-serif']
      },
      margin: {
        '05': '5px', // Add your custom margin value here
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
  ],
}


