/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./**/*.{php,js}"],
    theme: {
        extend: {
            backgroundImage: {
                'radial-pattern': "radial-gradient(#b6b2b2 1px, transparent 1px), radial-gradient(#b6b2b2 1px, transparent 1px)",
            },
            backgroundSize: {
                'size-50': '50px 50px',
            }
        }
    },
    plugins: [require('@tailwindcss/forms')],
}

