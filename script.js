// const loginWrapper = document.querySelector('.login__wrapper')
// const loginEmailInput = document.querySelector('.login__emailInput')
// const loginPasswordInput = document.querySelector('.login__passwordInput')
// const formSubmit = document.querySelector('.form__submit')
// // const errorInputText = document.querySelector('.error__input__text')
// const loginForm = document.querySelector('.loginForm')
// let errorInputText;

// const formValidation = (e) => {
//     // e.preventDefault()

//     // if(loginEmailInput.value === "" || loginPasswordInput.value === ""){

//     //     loginEmailInput.classList.add('error__input')
//     //     loginPasswordInput.classList.add('error__input')
//     //     errorInputText = document.createElement('span')
//     //     errorInputText.classList.add('error__input__text')
//     //     errorInputText.textContent = "Wypełnij wszystkie pola!"
//     //     loginWrapper.appendChild(errorInputText)

//     // } else {

//     //     if (errorInputText) {
//     //         loginWrapper.removeChild(errorInputText);
//     //         loginEmailInput.classList.remove('error__input')
//     //         loginPasswordInput.classList.remove('error__input')
//     //       }
//     // }

// }

// const ValidationFormEmail = (e) => {
//     if(loginEmailInput.value == ''){
//         loginEmailInput.classList.add('error__input')

//         errorInputText = document.createElement('span')
//         errorInputText.classList.add('error__input__text')
//         errorInputText.textContent = "Wypełnij wszystkie pola!"
//         loginWrapper.appendChild(errorInputText)
//     } else {
//         loginEmailInput.classList.remove('error__input')
//     }
// }

// const ValidationFormPassword = (e) => {
//     if(loginPasswordInput.value == ''){
//         loginPasswordInput.classList.add('error__input')
//     } else {
//         loginPasswordInput.classList.remove('error__input')
//     }

//     errorInputText = document.createElement('span')
//     errorInputText.classList.add('error__input__text')
//     errorInputText.textContent = "Wypełnij wszystkie pola!"
//     loginWrapper.appendChild(errorInputText)
// }

// loginEmailInput.addEventListener('input', ValidationFormEmail)
// loginPasswordInput.addEventListener('input', ValidationFormPassword)