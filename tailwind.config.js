module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        main: {
          '100': '#f1f5f9',
          '200': '#d5f5f6',
          '300': '#7edce2',
          '400': '#0',
          '500': '#0',
          '600': '#0',
          '700': '#036672',
          '800': '#05505c',
          '900': '#0'
        },
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
