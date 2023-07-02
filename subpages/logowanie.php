<?php
    echo "
        <div class='login__wrapper'>
            <h2 class='login__title'>Logowanie</h2>

            <form>
                <input class='form__input' placeholder='Email' type='email'>
                <input class='form__input' placeholder='Hasło' type='password'>
                <a class='form__remindPassword' href='?page=przypomnij haslo'>Nie pamiętam hasła</a>
                <input class='form__submit' type='submit' value='Zaloguj się'>
            </form>
            <p class='form__text'>Nie masz konta? <a class='form__link' href='?page=rejestracja'>Załóż je!</a></p>
        </div>
    ";
?>