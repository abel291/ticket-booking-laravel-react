const defaultTheme = require("tailwindcss/defaultTheme");
const defaultColors = require("tailwindcss/colors");
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
    ],

    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                lg: "4rem",
                xl: "5rem",
                "2xl": "6.5rem",
            },
        },

        colors: {
            ...defaultColors,
            "dark-blue": {
                500: "#032055",
                //600: '#01173f',
                700: "#0a1e5e",
                //800: '#032055',
                900: "#001232",
            },
        },
        extend: {
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
