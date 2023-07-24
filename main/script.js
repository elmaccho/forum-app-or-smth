const searchButton = document.querySelector('.search__button')
const navSearch = document.querySelector('.nav__search')
const navInput = document.querySelector('.search__input')

const textareaCounter = document.querySelector('.textarea__counter')
const biographyInput = document.querySelector('.biography__input')

const navCloseBtn = document.querySelector('.nav__closeBtn')
const navOpenBtn = document.querySelector('.nav__openBtn')
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
    nav.classList.add('openNav')
    nav.classList.remove('closeNav')
}

const closeNav = () => {
    nav.classList.remove('openNav')
    nav.classList.add('closeNav')
}

navOpenBtn.addEventListener('click', openNav)
navCloseBtn.addEventListener('click', closeNav)
document.addEventListener('click', e => {
    if(!nav.contains(e.target) && !navOpenBtn.contains(e.target)){
        closeNav()
    }
})

searchButton.addEventListener('click', toggleSearch)
document.addEventListener('click', searchOutsideClick)
biographyInput.addEventListener('input', biographyCounter)
