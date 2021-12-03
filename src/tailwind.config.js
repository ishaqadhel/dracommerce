const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                cerise: {
                    50: "#fad1dd",
                    100: "#f5a3ba",
                    200: "#f07598",
                    300: "#ee5d86",
                    400: "#ec4675",
                    500: "#ea3266",
                    600: "#e71853",
                    700: "#d0164a",
                    800: "#b91342",
                    900: "#a2113a",
                },
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
