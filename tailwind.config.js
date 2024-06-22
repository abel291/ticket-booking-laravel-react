import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require("tailwindcss/colors");
/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '4rem',
                xl: '8rem',

            },
        },
        colors: {
            ...colors,
            primary: colors.red
            // primary: {
            // 	"50": "#e6e9ee",
            // 	"100": "#cdd2dd",
            // 	"200": "#9aa6bb",
            // 	"300": "#687999",
            // 	"400": "#354d77",
            // 	"500": "#032055",
            // 	"600": "#021a44",
            // 	"700": "#021333",
            // 	"800": "#010d22",
            // 	"900": "#010611"
            // }
        },
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        //require("@tailwindcss/line-clamp"),
    ],
};

