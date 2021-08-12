module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      width: {       
        '96':'24rem'
      }

    },
  },
  variants: {
    transitionProperty: ['responsive', 'motion-safe', 'motion-reduce'],
    extend: {
      maxHeight: ['focus'],
    },
  },
  plugins: [
    require('tailwind-scrollbar')
  ],
}
