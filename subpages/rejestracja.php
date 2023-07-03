<?php

    $name = $_POST['name'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = $_POST['password'];

    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($name) || empty($lastName) || empty($email) || empty($password)) {
            $errors[] = "Wypełnij wszystkie pola";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Podany adres e-mail jest nieprawidłowy.";
        }
    }
    ?>

        <div class='register__wrapper'>
            <h2 class='register__title'>Rejestracja</h2>
            <form method="post">
                <span>
                    <label for='name'>Imię</label>
                        <input id='name' class='form__input short__input l__input' type='text' placeholder='Imię' name='name'>
                    <label for='lastName'>Nazwisko</label>
                        <input id='lastName' class='form__input short__input r__input' type='text' placeholder='Nazwisko' name='lastname'>
                </span>
                        <label for='email'>Email</label>
                        <input id='email' class='form__input' type='email' placeholder='Email' name='email'>
                <span>
                    <div class='password__pattern_box'>
                        Hasło musi zawierać:<br>
                        <span class='patternLength'>Conajmniej 8 znaków</span>
                        <span class='patternUppercase'>Conajmniej 1 dużą literę</span>
                        <span class='patternDigit '>Conajmniej 1 cyfrę</span>
                    </div>
                    <label for='password'>Hasło</label>
                        <input id='password' class='form__input short__input l__input' type='password' placeholder='Hasło' name='password'>
                    <label for='rpassword'>Powtórz hasło</label>    
                        <input id='rpassword' class='form__input short__input r__input' type='password' placeholder='Powtórz hasło' name='rpassword'>
                </span>

                <input class='form__submit' type='submit' value='Zarejestruj się'>
            </form>
            <p class='form__text'>Masz już konto? <a class='form__link' href='?page=logowanie'>Zaloguj się!</a></p>
            <?php
                if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($errors) && count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo "<span class='error__input__text'>$error</span>";
                    }
                }
            ?>
        </div>
