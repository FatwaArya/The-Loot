const color = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  content: ["./public/css/**/*.{php,js}",
    "./partials/**/*.{php,js}",
    "./src/admin/**/*.{php,js}",
    "./index.php",
    "./login.php",
    "./register.php",
    "./node_modules/@themesberg/flowbite/**/*.js"],
  theme: {
    colors: {
      'primary': '#471212',
      'secondary': '#F5F0DB',
      gray: color.neutral,
      gray: {
        900: '#202225',
        800: '#2f3136',
        700: '#36393f',
        600: '#4f545c',
        400: '#d4d7dc',
        300: '#e3e5e8',
        200: '#ebedef',
        100: '#f2f3f5',
      },
    },
    fontFamily: {
      lora: "'Lora',serif",
      lux: "'Luxurious Roman' , cursive",
      roboto: "'Roboto', sans-serif",
      mont: "'Montserrat', sans-serif",
      'silk': "'Silk',serif",
      'OpenSauce': "'OpenSauce',sans-serif"


    },
    extend: {


    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@themesberg/flowbite/plugin')
  ],
}
