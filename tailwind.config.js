const theme = require('./theme.json');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './src/css/*.css',
        './src/js/*.js',
        './src/js/components/*.js',
        './safelist.txt'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '.5rem',
                md: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            colors: theme.settings.color.palette.reduce((acc, colorObj) => {
                acc[colorObj.slug] = colorObj.color;
                return acc;
            }, {}),
            fontSize: theme.settings.typography.fontSizes.reduce((acc, sizeObj) => {
                acc[sizeObj.slug] = sizeObj.size;
                return acc;
            }, {}),
            fontFamily: {
                'body': 'Outfit, sans-serif'

            },
            animation: {
                progress: 'progressBar 4s forwards 1'
            },
            keyframes: {
                progressBar: {
                    '0%': { width: '0%' },
                    '100%': { width: '100%' }
                }
            }
        },
        screens: {
            'sm': '320px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1240px',
        }
    },
    plugins: [
        require('tailwindcss-animated')
    ]
};
