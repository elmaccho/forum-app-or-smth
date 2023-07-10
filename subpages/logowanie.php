<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($email) || empty($password)) {
            $errors[] = "Wypełnij wszystkie pola";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Podany adres e-mail jest nieprawidłowy.";
        }
    }

    if (empty($errors)){
        $conn = new mysqli("localhost", "root", "", "forumapporsmth");

        if($conn->connect_error){
            die("Błąd połączenia z bazą danych. Przepraszamy za problemy");
        }

        $query = "SELECT email, haslo FROM users WHERE email = '$email'";

        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['haslo'];
        
            if (password_verify($password, $hashedPassword)) {
                session_start();
                $_SESSION['email'] = $email;
        
                $query = "SELECT imie FROM users WHERE email = '$email'";
                $result = $conn->query($query);
                $user = $result->fetch_assoc();
                $imie = $user['imie'];
        
                $_SESSION['imie'] = $imie;
        
                header('Location: ./main/main.php');
                exit();
            } else {
                $errors[] = "Nieprawidłowe hasło";
            }
        } else {
            $errors[] = "Nieprawidłowy e-mail";
        }
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
