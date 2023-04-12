/** @type {import('tailwindcss').Config} */
const colors = require("tailwindcss/colors");
const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  content: [
    "./**/*.{php,html}", 
    "./node_modules/flowbite/**/*.js"    
  ],
  theme: {
    extend: {
      lineClamp: {
        1 : '1',
        2 : '2',
        3 : '3',
        4 : '4',
        5 : '5',
        6 : '6',
        7: '7',

      },
      zIndex: {
        "-1": "-1",
        1: "1",
        2: "2",
      },
    },
    colors: {
      "astro-blue": "#56AEFF",
      "button-blue" : "#405cf5",
      "astro-black": "#1C2120",
      "text-color": "#203454",
      "astro-yellow": "#F7FF58",
      "alice-blue": "#F0F8FF",
      "sub-text": "#4B4B4B",
      "nav-text" : "#484b4e",
      "nav-ico" : "#203454",
      "background" : "#1C2120",
      success: "#90EE90",
      error: "#EC3F3F",
      "background-grey": "#e9edf2",
      transparent: colors.transparent,
      black: colors.black,
      white: colors.white,
      gray: colors.gray,
      red: colors.red,
      orange: colors.orange,
      amber: colors.amber,
      yellow: colors.yellow,
      green: colors.green,
      lime: colors.lime,
      emerald: colors.emerald,
      teal: colors.teal,
      cyan: colors.cyan,
      blue: colors.blue,
      violet: colors.violet,
      purple: colors.purple,
      pink: colors.pink,
      rose: colors.rose,
      slate: colors.slate,
    },
    fontFamily: {
      "shadows-light" : ["Shadows Into Light", "cursive"],
      baloo: ["Baloo-2", "cursive"],
      roboto: ["Roboto", "cursive"],
      poppins: ["Poppins", "sans-serif"],
    },
  
  },
  plugins: [
    require("tailwindcss"),
    require("tailwind-scrollbar")({ nocompatible: true }),
    require('flowbite/plugin'),
    
  ],
  corePlugins: {
    
  },
};
