const searchButton = document.querySelector('.search__button')
const navSearch = document.querySelector('.nav__search')
const navInput = document.querySelector('.search__input')

const textareaCounter = document.querySelector('.textarea__counter')
const biographyInput = document.querySelector('.biography__input')

const navClose = document.querySelector('.nav__close')
const navOpen = document.querySelector('.nav__open')
const nav = document.querySelector('nav')

const toggleSearch = () => {
    navSearch.classList.toggle('nav__search__open')
    navInput.classList.toggle('search__open')
    searchButton.classList.toggle('search__open')
}

const searchOutsideClick = (e) => {
    if(!navSearch.contains(e.target)){
        navSearch.classList.remove('nav__search__open')
        navInput.classList.remove('search__open')
        searchButton.classList.remove('search__open')
    }
}

const biographyCounter = () => {
    textareaCounter.textContent = biographyInput.value.length + '/150'
}

const openNav = () => {
    nav.style.transform = "translateX(0%)"
}

const closeNav = () => {
    nav.style.transform = "translateX(-100%)"
}

navOpen.addEventListener('click', openNav)
navClose.addEventListener('click', closeNav)
document.addEventListener('click', e => {
    if(!nav.contains(e.target) && !navOpen.contains(e.target)){
        closeNav()
    }
})

searchButton.addEventListener('click', toggleSearch)
document.addEventListener('click', searchOutsideClick)
biographyInput.addEventListener('input', biographyCounter)
