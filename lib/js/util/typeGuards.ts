
// isEvent is a type guard for Event.
export function isEvent(obj) {
  if (typeof obj !== "object") return false
  if (obj.bubbles === undefined) return false
  if (obj.cancelable === undefined) return false
  if (obj.composed === undefined) return false
  if (obj.currentTarget === undefined) return false
  if (obj.defaultPrevented === undefined) return false
  if (obj.eventPhase === undefined) return false
  if (obj.isTrusted === undefined) return false
  if (obj.target === undefined) return false
  if (obj.timeStamp === undefined) return false
  if (obj.type === undefined) return false

  return true
}

// isElement is a type guard for Element.
export function isElement(obj) {
  if (typeof obj !== "object") return false
  if (obj.assignedSlot === undefined) return false
  if (obj.attributes === undefined) return false
  if (obj.childElementCount === undefined) return false
  if (obj.children === undefined) return false
  if (obj.classList === undefined) return false
  if (obj.className === undefined) return false
  if (obj.clientHeight === undefined) return false
  if (obj.clientLeft === undefined) return false
  if (obj.clientTop === undefined) return false
  if (obj.clientWidth === undefined) return false
  if (obj.firstElementChild === undefined) return false
  if (obj.id === undefined) return false
  if (obj.innerHTML === undefined) return false
  if (obj.lastElementChild === undefined) return false
  if (obj.localName === undefined) return false
  if (obj.namespaceURI === undefined) return false
  if (obj.nextElementSibling === undefined) return false
  if (obj.outerHTML === undefined) return false
  if (obj.part === undefined) return false
  if (obj.prefix === undefined) return false
  if (obj.previousElementSibling === undefined) return false
  if (obj.scrollHeight === undefined) return false
  if (obj.scrollLeft === undefined) return false
  if (obj.scrollTop === undefined) return false
  if (obj.scrollWidth === undefined) return false
  if (obj.shadowRoot === undefined) return false
  if (obj.slot === undefined) return false
  if (obj.tagName === undefined) return false

  return true
}
