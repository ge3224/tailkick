/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ["./tailkick/**/*.{html,js,php}"],
  safelist: [],
  theme: {
    extend: {
      backgroundImage: {
        "hero-home" : "url('../images/tailkick-hero-home-wide.jpg')"
      }
    }
  },
  plugins: [],
}
