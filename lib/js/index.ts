import { Navbar } from "./Navbar";

function ready() {
  Navbar()
}

if (document.readyState == 'loading') {
  document.addEventListener('DOMContentLoaded', ready)
} else {
  ready();
}
