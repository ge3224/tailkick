/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ["./tailkick/**/*.{html,js,php}"],
  safelist: wpSafeList(),
  important: true, // https://tailwindcss.com/docs/configuration#important
  theme: {
    screens: {
      "xs": "347px", // custom breakpoint for narrow phones and other small screens
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
    },
    extend: {
      backgroundImage: {
        "hero-home" : "url('./assets/images/tailkick-hero-home-wide.jpg')"
      }
    }
  },
  plugins: [],
}

function wpSafeList() {
  return [
    "blocks-gallery-item__caption",
    "wp-block-column"
  ]
}
