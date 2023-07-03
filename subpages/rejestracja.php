<?php
    echo "
        <div class='register__wrapper'>
            <h2 class='register__title'>Rejestracja</h2>
            <form>
                <span>
                    <label for='name'>Imię</label>
                        <input id='name' class='form__input short__input l__input' type='text' placeholder='Imię' name='name'>
                    <label for='lastName'>Nazwisko</label>
                        <input id='lastName' class='form__input short__input r__input' type='text' placeholder='Nazwisko' name='lastname'>
                </span>
                        <label for='email'>Email</label>
                        <input id='email' class='form__input' type='email' placeholder='Email' name='email'>
                <span>
                    <label for='password'>Hasło</label>
                        <input id='password' class='form__input short__input l__input' type='password' placeholder='Hasło' name='password'>
                    <label for='rpassword'>Powtórz hasło</label>    
                        <input id='rpassword' class='form__input short__input r__input' type='password' placeholder='Powtórz hasło' name='rpassword'>
                </span>

                <input class='form__submit' type='submit' value='Zarejestruj się'>
            </form>
            <p class='form__text'>Masz już konto? <a class='form__link' href='?page=logowanie'>Zaloguj się!</a></p>
            <span class='error__input__text'>Wypełnij wszystkie pola!</span>
        </div>
    ";
?>