/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ["./tailkick/**/*.{html,js,php}"],
  safelist: [],
  theme: {
    screens: {
      "xs": "347px", // narrow phones and other small screens
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
    },
    extend: {
      backgroundImage: {
        "hero-home" : "url('../images/tailkick-hero-home-wide.jpg')"
      }
    }
  },
  plugins: [],
}
