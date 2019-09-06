const { colors } = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            colors: {
                'primary': colors.blue,
                'secondary': colors.red
            }
        },
        fontFamily: {
            'sans': '"Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"'
        }
    },
    variants: {
        backgroundColor: ['hover', 'focus', 'dark', 'dark-hover', 'dark-group-hover'],
        textColor: ['hover', 'focus', 'dark', 'dark-hover', 'dark-group-hover'],
        borderColor: ['hover', 'focus', 'dark', 'dark-hover', 'dark-group-hover'],
        boxShadow: ['hover', 'focus', 'dark', 'dark-hover', 'dark-group-hover'],
        fontWeight: ['hover', 'focus', 'dark', 'dark-hover', 'dark-group-hover'],
    },
    plugins: [
        require('tailwindcss-dark-mode')()
    ],
};
