const password = document.getElementById('password')
const rpassword = document.getElementById('rpassword')


const passwordPatternBox = document.querySelector('.password__pattern_box')

const patternLengthPattern = document.querySelector('.patternLength')
const patternUppercasePattern = document.querySelector('.patternUppercase')
const patternDigitPattern = document.querySelector('.patternDigit')

const passwordValidator = () => {
    if(password.value === rpassword.value && password.value.length != 0 && rpassword.value.length != 0){
        console.log('jest git');
        password.style.border = "2px solid #8F4AFF";
        rpassword.style.border = "2px solid #8F4AFF";
    } else if(password.value.length == 0 && rpassword.value.length == 0){
        password.style.border = "2px solid #F4F4F4"
        rpassword.style.border = "2px solid #F4F4F4"
    } else {
        password.style.border = "2px solid tomato";
        rpassword.style.border = "2px solid tomato";
    }
}

const passwordPatternInfoIn = () => {
    passwordPatternBox.classList.add('patter_box__in')
    passwordPatternBox.classList.remove('patter_box__out')
}
const passwordPatternInfoOut = () => {
    passwordPatternBox.classList.remove('patter_box__in')
    passwordPatternBox.classList.add('patter_box__out')
}

const passwordPatternValidator = () => {
    let patternLength = /^.{8,}$/;
    let patternUppercase = /[A-Z]/;
    let patternDigit = /[0-9]/;

    let hasLength = patternLength.test(password.value);
    let hasUppercase = patternUppercase.test(password.value);
    let hasDigit = patternDigit.test(password.value);

    if(hasLength){
        patternLengthPattern.style.textDecoration = 'line-through'
        patternLengthPattern.style.color = '#8F4AFF'
    } else {
        patternLengthPattern.style.textDecoration = 'none'
        patternLengthPattern.style.color = '#232323'
    }

    if(hasUppercase){
        patternUppercasePattern.style.textDecoration = 'line-through'
        patternUppercasePattern.style.color = '#8F4AFF'
    } else {
        patternUppercasePattern.style.textDecoration = 'none'
        patternUppercasePattern.style.color = '#232323'
    }

    if(hasDigit){
        patternDigitPattern.style.textDecoration = 'line-through'
        patternDigitPattern.style.color = '#8F4AFF'
    } else {
        patternDigitPattern.style.textDecoration = 'none'
        patternDigitPattern.style.color = '#232323'
    }

    if (hasLength && hasUppercase && hasDigit){
        console.log('zajebiscie');
    }
    
}

password.addEventListener('input', passwordPatternValidator)
password.addEventListener('input', passwordValidator)
rpassword.addEventListener('input', passwordValidator)
password.addEventListener('focus', passwordPatternInfoIn);
password.addEventListener('blur', passwordPatternInfoOut);