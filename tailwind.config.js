/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        container: {
            center: true,
        },
        extend: {
            backgroundColor: {
                primary: "#F4F4F4",
                secondary: "#C9C9C9",
                main: "#922E2C",
            },
        },
    },
    plugins: [require("preline/plugin")],
};
