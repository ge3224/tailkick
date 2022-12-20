import { isElement, isEvent } from "./util/typeGuards"

// Navbar defines the state and behavior of site's site-wide menu bar.
export const Navbar = () => {
  initNavParentItems()
  initChildItems()
  initNavCheckbox()
  pageScrollWatcher()
}

// Tailwind styles
const BG_HIDE = ["bg-gray-50/0", "shadow", "shadow-zinc-900/0", "transition", "ease-in-out", "delay-200", "duration-500"]
const BG_SHOW = ["bg-gray-50/95", "shadow", "shadow-zinc-900/20"]
const CHILD_MENU_HIDE = ["hidden"]

// DOM attributes
const NAVBAR_ID = "nav-primary"
const NAV_CHECKBOX_ID = "nav-checkbox"
const DATASET_PARENT = "data-ui='nav-parent'"
const DATASET_DROPDOWN = "data-ui='nav-dropdown'"
const DATASET_CHILD = "data-ui='nav-child'"

const PAGE_Y_OFFSET = 100

// Initializers ///////////////////////////////////////////////////////////////

function initChildItems() {
  const children = document.querySelectorAll(`[${DATASET_CHILD}]`)
  for (let i = 0; i < children.length; i++) {
    const child = children[i] as HTMLAnchorElement
    child.addEventListener("click", navChildClickHandler)
  }
}

// initNavParentItems searches for elements that have the "data-ui" attribute with 
// a value of "nav-parent".
function initNavParentItems() {
  const parents = document.querySelectorAll(`[${DATASET_PARENT}]`)
  for (let i = 0; i < parents.length; i++) {
    const dropIco = parents[i].querySelector(`[${DATASET_DROPDOWN}]`)
    if (dropIco !== null && dropIco !== undefined && dropIco !== void 0) {
      dropIco.addEventListener("click", dropdownClickHandler);
    }
  }
}

// navCheckbox searches for a hidden checkbox element in the site's navbar and
// attaches EventListeners.
function initNavCheckbox() {
  const checkbox = document.querySelector("#nav-checkbox")
  checkbox.addEventListener("click", checkboxHandler)
}

// Handlers ///////////////////////////////////////////////////////////////////

function checkboxHandler(e: PointerEvent) {
  if (!isEvent(e)) {
    throw (`Type Error: Argument is not an Event: ${e}`)
  }

  if (checkboxIsChecked()) {
    showNavbarBg()
    return
  }

  if (pageIsScrolled()) {
    showNavbarBg()
  } else {
    hideNavbarBg()
  }
}

function navChildClickHandler(e: PointerEvent) {
  if (!isEvent) {
    throw (`Type Error: Argument is not an Event: ${e}`)
  }

  e.stopPropagation()
}

function dropdownClickHandler(e: PointerEvent) {
  if (!isEvent(e)) {
    throw (`Type Error: Argument is not an Event: ${e}`)
  }

  e.stopPropagation()
  e.preventDefault()

  const el = e.currentTarget as HTMLSpanElement
  const parent = el.parentElement as HTMLLIElement

  if (childMenuIsVisible(parent)) {
    hideChildMenu(parent)
  } else {
    showChildMenu(parent)
  }
}

function navbarBGToggle(e: Event) {
  if (!isEvent(e)) {
    throw (`Type Error: Argument is not an Event: ${e}`)
  }

  if (pageIsScrolled()) {
    showNavbarBg()
    return
  }

  if (checkboxIsChecked()) {
    showNavbarBg()
  } else {
    hideNavbarBg()
  }
}

function pageScrollWatcher() {
  window.onscroll = (e: Event) => {
    navbarBGToggle(e)
  }
}

// Helper Functions ///////////////////////////////////////////////////////////

function bgIsInvisible(): boolean {
  let invisible = false
  let requirements = 0

  const bg = getNavbarElement()

  for (let i = 0; i < BG_HIDE.length; i++) {
    if (bg.classList.contains(BG_HIDE[i])) {
      requirements++
    }
  }

  if (requirements === BG_HIDE.length) invisible = true

  return invisible
}

function bgIsVisible(): boolean {
  let visible = false
  let requirements = 0

  const bg = getNavbarElement()

  for (let i = 0; i < BG_SHOW.length; i++) {
    if (bg.classList.contains(BG_SHOW[i])) {
      requirements++
    }
  }

  if (requirements === BG_SHOW.length) visible = true

  return visible
}

function checkboxIsChecked(): boolean {
  const box = getNavbarCheckboxElement() as HTMLInputElement
  return box.checked
}

function childMenuIsVisible(parent: HTMLLIElement): boolean {
  if (!isElement(parent)) {
    throw (`Type Error: Argument is not an Element: "${parent}"`)
  }

  const cm = getChildMenu(parent)
  if (!cm) return false

  if (cm.classList.contains("hidden")) {
    return false
  }

  return true
}

function getChildMenu(parent: HTMLLIElement): HTMLUListElement | null {
  if (!isElement(parent)) {
    throw (`Type Error: Argument is not an Element: "${parent}"`)
  }

  const ul = parent.querySelector(":scope ul") as HTMLUListElement
  if (ul === null || ul === undefined || ul === void 0) {
    console.error(`Error: A child menu could not be found for ${parent.tagName}`)
    return null
  }
  return ul
}

function getNavbarCheckboxElement(): HTMLElement {
  const box = document.getElementById(NAV_CHECKBOX_ID)
  if (box === null || box === undefined || box === void 0) {
    throw (`Error: An element with and ID of "${NAV_CHECKBOX_ID}" could not be found`)
  }
  return box
}

function getNavbarElement(): HTMLElement {
  const bg = document.getElementById(NAVBAR_ID)
  if (bg === null || bg === undefined || bg === void 0) {
    throw (`Error: An element with an ID of "${NAVBAR_ID}" could not be found`)
  }
  return bg
}

function hideChildMenu(parent: HTMLLIElement) {
  if (!isElement(parent)) {
    throw (`Type Error: Argument is not an Element: "${parent}"`)
  }

  const cm = getChildMenu(parent)
  if (!cm) return

  if (!childMenuIsVisible(parent)) return

  for (let i = 0; i < CHILD_MENU_HIDE.length; i++) {
    cm.classList.add(CHILD_MENU_HIDE[i])
  }
}

function hideNavbarBg() {
  if (bgIsInvisible()) return
  const bg = getNavbarElement()
  for (let i = 0; i < BG_SHOW.length; i++) {
    bg.classList.remove(BG_SHOW[i])
  }
  for (let j = 0; j < BG_HIDE.length; j++) {
    bg.classList.add(BG_HIDE[j])
  }
}

function pageIsScrolled(): boolean {
  if (window.scrollY > PAGE_Y_OFFSET) {
    return true
  } else {
    return false
  }
}

function showChildMenu(parent: HTMLLIElement) {
  if (!isElement(parent)) {
    throw (`Type Error: Argument is not an Element: "${parent}"`)
  }

  const cm = getChildMenu(parent)
  if (!cm) return

  if (childMenuIsVisible(parent)) return

  for (let i = 0; i < CHILD_MENU_HIDE.length; i++) {
    cm.classList.remove(CHILD_MENU_HIDE[i])
  }
}

function showNavbarBg() {
  if (bgIsVisible()) return
  const bg = getNavbarElement()
  for (let i = 0; i < BG_HIDE.length; i++) {
    bg.classList.remove(BG_HIDE[i])
  }
  for (let j = 0; j < BG_SHOW.length; j++) {
    bg.classList.add(BG_SHOW[j])
  }
}
