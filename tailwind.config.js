module.exports = {
  theme: {
    extend: {}
  },
  variants: {
      backgroundColor: ['dark', 'dark-hover', 'dark-group-hover'],
      textColor: ['dark', 'dark-hover', 'dark-group-hover'],
      borderColor: ['dark', 'dark-hover', 'dark-group-hover']
  },
  plugins: [
      require('tailwindcss-dark-mode')()
  ],
};
