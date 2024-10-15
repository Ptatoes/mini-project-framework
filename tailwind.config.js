/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
export default {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
     "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
       fontFamily: {
      sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
      'body': [
        'Inter', 
        'ui-sans-serif', 
        'system-ui', 
        '-apple-system', 
        'system-ui', 
        'Segoe UI', 
        'Roboto', 
        'Helvetica Neue', 
        'Arial', 
        'Noto Sans', 
        'sans-serif', 
        'Apple Color Emoji', 
        'Segoe UI Emoji', 
        'Segoe UI Symbol', 
        'Noto Color Emoji'
      ],

    },
    colors: {
      primary: {"50":"#fafaf9","100":"#f5f5f4","200":"#e7e5e4","300":"#d6d3d1","400":"#a8a29e","500":"#78716c","600":"#57534e","700":"#44403c","800":"#292524","900":"#1c1917","950":"#0c0a09"}
    },
  },
  },
  plugins: [require("flowbite/plugin")],
}