const btns = document.querySelectorAll('button')
const fontColor = document.querySelector('select')
const fontSize = document.querySelector('input[type=text]')
const addBorder = document.querySelector('input[type=checkbox]')
const radioBtns = document.querySelectorAll('input[type=radio]')

const labRat = document.querySelector('article')
const image = document.querySelector('img')
const list = document.querySelector('ul')

let toggleBorder = true

btns.forEach(btn => {
    btn.addEventListener('click', () => {
        labRat.style.background = btn.textContent
    })
})

fontColor.addEventListener('change', () => {
    labRat.style.color = fontColor.value
})

fontSize.addEventListener('blur', () => {
    labRat.style.fontSize = fontSize.value
})

addBorder.addEventListener('click', function() {
    toggleBorder = !toggleBorder
    image.style.border = toggleBorder ? '1px solid white' : 'none'
})

radioBtns.forEach(rmf => {
    rmf.addEventListener('click', () => {
        list.style.listStyleType = rmf.value
    })
})