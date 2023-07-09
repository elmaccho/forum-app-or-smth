const searchButton = document.querySelector('.search__button')
const navSearch = document.querySelector('.nav__search')
const navInput = document.querySelector('.search__input')

const toggleSearch = () => {
    navSearch.classList.toggle('nav__search__open')
    navInput.classList.toggle('search__open')
    searchButton.classList.toggle('search__open')

    console.log('eeee');
}

const searchOutsideClick = (e) => {
    if(!navSearch.contains(e.target)){
        navSearch.classList.remove('nav__search__open')
        navInput.classList.remove('search__open')
        searchButton.classList.remove('search__open')
    }
}


searchButton.addEventListener('click', toggleSearch)
document.addEventListener('click', searchOutsideClick)