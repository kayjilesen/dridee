module.exports = {
  darkMode: 'class',
  content: [
    "./templates/**/*.php",
    "./*.php"
  ],
  theme: {
    fontFamily: {
      'sans' : ["Comfortaa", "ui-sans-serif", "system-ui", "-apple-system", "BlinkMacSystemFont", "Segoe UI", "Roboto", "Helvetica Neue", "Arial", "Noto Sans", "sans-serif", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji" ],
      'serif' : ['Petersburg', "ui-serif", "Georgia", "Cambria", "Times New Roman", "Times", "serif"]
    },
    extend: {
      colors: {
        'orange' : '#f6a526',
        'light-orange' : '#FEF8EF',
        'dark-gray' : '#1D1D1A'
      }
    },
  },
  plugins: [],
}
