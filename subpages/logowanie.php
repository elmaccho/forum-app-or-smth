<?php
$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($email) || empty($password)) {
        $errors[] = "Wypełnij wszystkie pola";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Podany adres e-mail jest nieprawidłowy.";
    }
}

?>

<div class='login__wrapper'>
    <h2 class='login__title'>Logowanie</h2>

    <form id='loginForm' method='post'>
        <label for='email'>Email</label>
        <input id='email' class='form__input login__emailInput' placeholder='Email' type='email' name='email'>


        <label for='password'>Hasło</label>
        <input id='password' class='form__input login__passwordInput' placeholder='Hasło' type='password' name='password'>
        <a class='form__remindPassword' href='?page=przypomnij haslo'>Nie pamiętam hasła</a>
        <input class='form__submit' type='submit' value='Zaloguj się'>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($errors) && count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<span class='error__input__text'>$error</span>";
        }
    }
    ?>

    <p class='form__text'>Nie masz konta? <a class='form__link' href='?page=rejestracja'>Załóż je!</a></p>
</div>
