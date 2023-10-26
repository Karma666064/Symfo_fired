/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./templates/*.html.twig"
  ],
  theme: {
    extend: {},
  },
  daisyui: {
    themes: [
      "light",
      {
        mytheme: {
          "primary": "#d90429",
          "secondary": "#8d99ae",
          "accent": "#ef233c",
          "neutral": "#251D2C",
          "base-100": "#302B42",
          "info": "#0284c7",
          "success": "#16a34a",
          "warning": "#f59e0b",
          "error": "#b91c1c"
          // color text : #edf2f4
        },
      }
    ]
  },
  plugins: [require("daisyui")],
}

