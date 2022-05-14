module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./src/**/*.{html,js}', './node_modules/tw-elements/dist/js/**/*.js"
    ],
    darkMode: 'class',
    theme: {
        extend: {
            width: {
                '96': '24rem',
            }
        },
        spinner: (theme) => ({
            default: {
                color: '#312e81', // color you want to make the spinner
                size: '1em', // size of the spinner (used for both width and height)
                border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
                speed: '500ms', // the speed at which the spinner should rotate
            },
        }),
    },
    plugins: [
        require('tailwindcss-spinner')({className: 'spinner', themeKey: 'spinner'}),
        require('tw-elements/dist/plugin')
    ],
}
