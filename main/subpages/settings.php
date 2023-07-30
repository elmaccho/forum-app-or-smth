<?php include 'main/main.php'; ?>

<div class="main__settings">
    <div class="sett__box">
        <div class="sett__col1">
            <h2 class="sett__title">
                Zdjęcie profilowe
            </h2>
            <form method="post" class="sett__form" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="900000">
                <input type="file" name="profileImg"><br>
                <input type="submit" value="Wyślij" class="sett__button">
            </form>
        </div>
        <div class="sett__col2">
            <?php
                echo "<img class='profile__img' src='./img/$profImg' alt=''>";
            ?>
        </div>
            <?php
                // if (isset($_POST['profileImg'])) {
                //     $profileImg = $_POST['profileImg'];

                //     $conn = new mysqli("localhost", "root", "", "forumapporsmth");

                //     if ($conn->connect_error) {
                //         die("Błąd połączenia z bazą danych: " . $conn->connect_error);
                //     }
                //     $profileImg = $conn->real_escape_string($profileImg);
                //     $query = "UPDATE users SET profile_img = '$profileImg' WHERE email = '$email'";

                //     if ($conn->query($query) === TRUE) {

                //     } else {
                //         echo "Błąd podczas aktualizacji profilowego: " . $conn->error;
                //     }
                    
                //     $conn->close();
                // }

                // if(isset($_FILES['profileImg'])){
                //     switch ($_FILES['profileImg']['error']) {
                //         case 0:
                //             if ($_FILES['profileImg']['type'] == "image/jpeg" || $_FILES['profileImg']['type'] == "image/png" || $_FILES['profileImg']['type'] == "image/webp") {
                //                 move_uploaded_file($_FILES['profileImg']['tmp_name'], "./img/" . $_FILES['profileImg']['name']);

                //                 $conn = new mysqli("localhost", "root", "", "forumapporsmth");

                //                 if ($conn->connect_error) {
                //                     die("Błąd połączenia z bazą danych: " . $conn->connect_error);
                //                 }

                //                 $profileImg = $conn->real_escape_string($_FILES['profileImg']['name']);
                //                 $query = "UPDATE users SET profile_img = '$profileImg' WHERE email = '$email'";

                //                 if ($conn->query($query) === TRUE) {
                //                     header("Refresh:0");
                //                 } else {
                //                     echo "Błąd podczas aktualizacji profilowego: " . $conn->error;
                //                 }
                                
                //                 $conn->close();
                //             } else {
                //                 echo "Niedozwolone rozszerzenie pliku";
                //             }
                //             break;
                //         case 1:
                //             echo "Za duży plik (PHP.ini)";
                //             break;
                //         case 2:
                //             echo "Za duży plik";
                //             break;
                //         case 3:
                //             echo "Niepełny plik";
                //             break;
                //         case 4:
                //             echo "Nie wybrano pliku";
                //             break;
                //         default:
                //             echo "Nieznany błąd. Prosimy o kontakt";
                //     }
                // }
            ?>
    </div>
    <div class="sett__box">
        <div class="sett__col1">
            <h2 class="sett__title">
                Zdjęcie w tle
            </h2>
            <form method="post" class="sett__form" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="9000000">
                <input type="file" name="backgroundImg"><br>
                <input type="submit" value="Wyślij" class="sett__button">
            </form>
        </div>
        <div class="sett__col2">
            <?php
                echo "<img class='background__img' src='./img/$bckImg' alt=''>";
            ?>
        </div>
            <?php
                // if (isset($_POST['backgroundImg'])) {
                //     $backgroundImg = $_POST['backgroundImg'];

                //     $conn = new mysqli("localhost", "root", "", "forumapporsmth");

                //     if ($conn->connect_error) {
                //         die("Błąd połączenia z bazą danych: " . $conn->connect_error);
                //     }
                //     $backgroundImg = $conn->real_escape_string($backgroundImg);
                //     $query = "UPDATE users SET background_img = '$backgroundImg' WHERE email = '$email'";

                //     if ($conn->query($query) === TRUE) {

                //     } else {
                //         echo "Błąd podczas aktualizacji profilowego: " . $conn->error;
                //     }
                    
                //     $conn->close();
                // }

                // if(isset($_FILES['backgroundImg'])){
                //     switch ($_FILES['backgroundImg']['error']) {
                //         case 0:
                //             if ($_FILES['backgroundImg']['type'] == "image/jpeg" || $_FILES['backgroundImg']['type'] == "image/png" || $_FILES['backgroundImg']['type'] == "image/webp") {
                //                 move_uploaded_file($_FILES['backgroundImg']['tmp_name'], "./img/" . $_FILES['backgroundImg']['name']);

                //                 $conn = new mysqli("localhost", "root", "", "forumapporsmth");

                //                 if ($conn->connect_error) {
                //                     die("Błąd połączenia z bazą danych: " . $conn->connect_error);
                //                 }

                //                 $backgroundImg = $conn->real_escape_string($_FILES['backgroundImg']['name']);
                //                 $query = "UPDATE users SET background_img = '$backgroundImg' WHERE email = '$email'";

                //                 if ($conn->query($query) === TRUE) {
                //                     header("Refresh:0");
                //                 } else {
                //                     echo "Błąd podczas aktualizacji profilowego: " . $conn->error;
                //                 }
                                
                //                 $conn->close();
                //             } else {
                //                 echo "Niedozwolone rozszerzenie pliku";
                //             }
                //             break;
                //         case 1:
                //             echo "Za duży plik (PHP.ini)";
                //             break;
                //         case 2:
                //             echo "Za duży plik";
                //             break;
                //         case 3:
                //             echo "Niepełny plik";
                //             break;
                //         case 4:
                //             echo "Nie wybrano pliku";
                //             break;
                //         default:
                //             echo "Nieznany błąd. Prosimy o kontakt";
                //     }
                // }
            ?>
    </div>
    <div class="sett__box">
        <div class="sett__col1">
            <h2 class="sett__title">
                Biogram
            </h2>
        </div>
        <div class="sett__col2">
            <form method="post" class="sett__form">
                <span class="biography__span">
                    <?php 
                        echo "<textarea class='biography__input' name='biography' id='' maxlength='150'>$biography</textarea>";
                    ?>

                    <span class="textarea__counter">0/150</span>
                </span>
                <input type="submit" value="Zatwierdź" class="sett__button">
            </form>
            <?php
                if(isset($_POST['biography'])){
                    $biography = $_POST['biography'];

                    $conn = new mysqli("localhost", "root", "", "forumapporsmth");

                    if ($conn->connect_error) {
                        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
                    }
                    $biography = $conn->real_escape_string($biography);
                    $query = "UPDATE users SET biogram = '$biography' WHERE email = '$email'";

                    if($conn->query($query) === TRUE){
                        header("Refresh:2");
                    }

                    $conn->close();
                }
            ?>
        </div>
    </div>
    <div class="sett__box">
        <div class="sett__col1">
            <h2 class="sett__title">
                Imię i nazwisko
            </h2>
        </div>
        <div class="sett__col2">
            <form method="post" class="sett__form">
                <?php 
                        echo "<input type='text' name='firstName' class='sett__input' value='$name'>";
                        echo "<input type='text' name='lastName' class='sett__input' value='$lastname'>";

                        if(isset($_POST['firstName']) && isset($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['lastName'])){
                            $firstname = $_POST['firstName'];
                            $lastname = $_POST['lastName'];

                            $conn = new mysqli("localhost", "root", "", "forumapporsmth");

                            if($conn->connect_error){
                                die("Błąd połączenia z bazą danych: " . $conn->connect_error);
                            } else {
                                $firstname = $conn->real_escape_string($firstname);
                                $lastname = $conn->real_escape_string($lastname);

                                $query = "UPDATE users SET imie = '$firstname', nazwisko = '$lastname' WHERE email = '$email'";

                                if($conn->query($query) === TRUE){
                                    echo "Zaktualizowano";
                                }
                            }
                        }
                ?>
                    <input type="submit" value="Zatwierdź" class="sett__button">
            </form>
        </div>
    </div>
    <div class="sett__box">
        <div class="sett__col1">
            <h2 class="sett__title">
                Zmień hasło
            </h2>
        </div>
        <div class="sett__col2">
            <form method="post" class="sett__form">
                <?php
                    echo "<input type='password' name='actPassword' class='sett__input' placeholder='Stare hasło'>";
                    echo "<input type='password' name='newPassword' class='sett__input' placeholder='Nowe hasło'>";

                    if(isset($_POST['actPassword']) && isset($_POST['newPassword']) && !empty($_POST['actPassword']) && !empty($_POST['newPassword'])){
                        $actPassword = $_POST['actPassword'];
                        $newPassword = $_POST['newPassword'];

                        $conn = new mysqli("localhost", "root", "", "forumapporsmth");

                        if($conn->connect_error){
                            die("Błąd połączenia z bazą danych: " . $conn->connect_error);
                        } else {
                            $actPassword = $conn->real_escape_string($actPassword);
                            $newPassword = $conn->real_escape_string($newPassword);


                            if(password_verify($actPassword, $password)){
                                $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                                $query = "UPDATE users SET haslo = '$newHashedPassword' WHERE email = '$email'";

                                if($conn->query($query) === TRUE){
                                    echo "Zmieniono hasło";
                                }
                            } else {
                                echo "Nieprawidłowe hasło";
                            }
                        }
                        $conn->close();
                    }

                ?>
                    <input type="submit" value="Zatwierdź" class="sett__button">
            </form>
        </div>
    </div>
</div>