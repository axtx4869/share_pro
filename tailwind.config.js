module.exports = {
    purge: ["./resources/views/layouts/app.blade.php"],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {}
    },
    variants: {
        width: ['responsive', 'hover', 'focus'],
        borderWidth: ['responsive', 'hover'],},
    plugins: []
};
