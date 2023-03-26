/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./php/*.php"],
  theme: {
    container: {
      screens: {
        sm: '540px',
        md: '768px',
        lg: '1309px',
        xl: '1440px',
      }
    },
    extend: {},
  },
  plugins: [],
}
