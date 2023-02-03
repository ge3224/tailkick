(()=>{"use strict";function t(t){return"object"==typeof t&&void 0!==t.bubbles&&void 0!==t.cancelable&&void 0!==t.composed&&void 0!==t.currentTarget&&void 0!==t.defaultPrevented&&void 0!==t.eventPhase&&void 0!==t.isTrusted&&void 0!==t.target&&void 0!==t.timeStamp&&void 0!==t.type}function n(t){return"object"==typeof t&&void 0!==t.assignedSlot&&void 0!==t.attributes&&void 0!==t.childElementCount&&void 0!==t.children&&void 0!==t.classList&&void 0!==t.className&&void 0!==t.clientHeight&&void 0!==t.clientLeft&&void 0!==t.clientTop&&void 0!==t.clientWidth&&void 0!==t.firstElementChild&&void 0!==t.id&&void 0!==t.innerHTML&&void 0!==t.lastElementChild&&void 0!==t.localName&&void 0!==t.namespaceURI&&void 0!==t.nextElementSibling&&void 0!==t.outerHTML&&void 0!==t.part&&void 0!==t.prefix&&void 0!==t.previousElementSibling&&void 0!==t.scrollHeight&&void 0!==t.scrollLeft&&void 0!==t.scrollTop&&void 0!==t.scrollWidth&&void 0!==t.shadowRoot&&void 0!==t.slot&&void 0!==t.tagName}const e=["bg-gray-50/0","shadow","shadow-zinc-900/0","transition","ease-in-out","delay-200","duration-500"],o=["bg-gray-50/95","shadow","shadow-zinc-900/20"],i=["outline","outline-offset-1","outline-2","outline-black"],r=["hidden"],l="data-ui='nav-parent'",d="data-ui='nav-dropdown'",a="data-ui='nav-child'";function s(n){if(!t(n))throw`Type Error: Argument is not an Event: ${n}`;f()||y()?b():p()}function c(n){if(!t)throw`Type Error: Argument is not an Event: ${n}`;n.stopPropagation()}function u(t){const e="aria-expanded",o=t.currentTarget,l=o.getAttribute(e);if(null==l||void 0===l)throw`Missing attribute: ${o.tagName} has no '${e}' attribute.`;const d=o.querySelector("[data-ui='arrow-up']");if(null==d||void 0===d)throw`Missing element: ${o.tagName} has no child containing the data-ui='arrow-up' dataset.`;const a=o.querySelector("[data-ui='arrow-down']");if(null==a||void 0===a)throw`Missing element: ${o.tagName} has no child containing the data-ui='arrow-down' dataset.`;"false"===l?(o.setAttribute(e,"true"),E(d),w(a)):(o.setAttribute(e,"false"),E(a),w(d));const s=o.parentElement;v(s)?function(t){if(!n(t))throw`Type Error: Argument is not an Element: "${t}"`;const e=m(t);if(!e)return;if(!v(t))return;for(let t=0;t<r.length;t++)e.classList.add(r[t]);const o=h(t);if(o)for(let t=0;t<i.length;t++)o.classList.remove(i[t])}(s):function(t){if(!n(t))throw`Type Error: Argument is not an Element: "${t}"`;const e=m(t);if(!e)return;if(v(t))return;for(let t=0;t<r.length;t++)e.classList.remove(r[t]);const o=h(t);if(o)for(let t=0;t<i.length;t++)o.classList.add(i[t])}(s)}function f(){return function(){const t=document.getElementById("nav-checkbox");if(null==t||void 0===t)throw'Error: An element with and ID of "nav-checkbox" could not be found';return t}().checked}function v(t){if(!n(t))throw`Type Error: Argument is not an Element: "${t}"`;const e=m(t);return!!e&&function(t){if(!n(t))throw`Type Error: Argument is not an Element: "${t}"`;return!t.classList.contains("hidden")}(e)}function h(t){if(!n(t))throw`Type Error: Argument is not an Element: "${t}"`;const e=t.querySelector(`[${d}]`);return null==e||void 0===e?(console.error(`Error: A child elements could not be found for with the following dataset: ${d}`),null):e}function m(t){if(!n(t))throw`Type Error: Argument is not an Element: "${t}"`;const e=t.querySelector(":scope ul");return null==e||void 0===e?(console.error(`Error: A child menu could not be found for ${t.tagName}`),null):e}function g(){const t=document.getElementById("nav-primary");if(null==t||void 0===t)throw'Error: An element with an ID of "nav-primary" could not be found';return t}function E(t){if(!n(t))throw`Type Error: Argument is not an Element: "${parent}"`;t.classList.add("hidden")}function w(t){if(!n(t))throw`Type Error: Argument is not an Element: "${parent}"`;t.classList.remove("hidden")}function p(){if(function(){let t=!1,n=0;const o=g();for(let t=0;t<e.length;t++)o.classList.contains(e[t])&&n++;return n===e.length&&(t=!0),t}())return;const t=g();for(let n=0;n<o.length;n++)t.classList.remove(o[n]);for(let n=0;n<e.length;n++)t.classList.add(e[n])}function y(){return window.scrollY>100}function b(){if(function(){let t=!1,n=0;const e=g();for(let t=0;t<o.length;t++)e.classList.contains(o[t])&&n++;return n===o.length&&(t=!0),t}())return;const t=g();for(let n=0;n<e.length;n++)t.classList.remove(e[n]);for(let n=0;n<o.length;n++)t.classList.add(o[n])}function L(){!function(){const t=document.querySelectorAll(`[${l}]`);for(let n=0;n<t.length;n++){const e=h(t[n]);null!=e&&void 0!==e&&e.addEventListener("click",u)}}(),document.querySelector("#nav-checkbox").addEventListener("click",s),function(){const t=document.querySelectorAll(`[${a}]`);for(let n=0;n<t.length;n++)t[n].addEventListener("click",c)}(),window.onscroll=n=>{!function(n){if(!t(n))throw`Type Error: Argument is not an Event: ${n}`;y()||f()?b():p()}(n)}}"loading"==document.readyState?document.addEventListener("DOMContentLoaded",L):L()})();