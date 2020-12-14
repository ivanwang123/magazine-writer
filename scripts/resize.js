let cols = document.querySelectorAll('.col')
export const colWidth = (window.screen.width-100) / 4
const colHeight = window.screen.height
cols.forEach((col) => {
    col.style.width = colWidth + 'px'
    col.style.minWidth = colWidth + 'px'
    col.style.maxWidth = colWidth + 'px'
    // col.style.maxHeight = colHeight + 'px'
})

let front = document.querySelector('.front-pg')
front.style.width = (colWidth*2) + 'px'
front.style.maxWidth = (colWidth*2) + 'px'
front.style.minWidth = (colWidth*2) + 'px'
// document.body.style.minWidth = (colWidth*2) + 'px'
