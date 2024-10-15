import { settings } from './theme.json';

/** @type {import('tailwindcss').Config} */
export const content = [
    './*.php',
    './**/*.php',
    './src/css/*.css',
    './src/js/*.js',
    './safelist.txt'
];

export const theme = {
    container: {
        padding: {
            DEFAULT: '1rem',
            sm: '.5rem',
            md: '2rem',
            lg: '0rem'
        },
    },
    extend: {
        colors: settings.color.palette.reduce((acc, colorObj) => {
            acc[colorObj.slug] = colorObj.color;
            return acc;
        }, {}),
        fontSize: settings.typography.fontSizes.reduce((acc, sizeObj) => {
            acc[sizeObj.slug] = sizeObj.size;
            return acc;
        }, {}),
        fontFamily: {
            'body': 'Outfit, sans-serif',
        }
    },
    screens: {
        'sm': '320px',
        'md': '768px',
        'lg': '1024px',
        'xl': '1240px'
    }
};
