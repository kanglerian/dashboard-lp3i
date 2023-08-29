/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        lp3i: {
          '100': '#006CB2',
          '200': '#005F9C',
          '300': '#00568D',
          '400': '#004D7E',
          '500': '#00426D',
          '600': '#00395E',
          '700': '#003354',
          '800': '#002A45',
          '900': '#001E32',
        },
        merah: {
          '100': '#FF7A84',
          '200': '#F15C67',
          '300': '#E35762',
        },
        hijau: {
          '100': '#00AEB6',
          '200': '#009FA6',
        },
      },
    },
  },
  plugins: [],
}

