<div class="main__settings">
    <div class="sett__box">
        <span>
            <h2 class="sett__title">
                Zdjęcie profilowe
            </h2>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="900000">
                <input type="file" name="profileImg" id="">
                <input type="submit" value="Wyślij">
            </form>
            <?php
                if (isset($_POST['profileImg'])) {
                    $profileImg = $_POST['profileImg'];

                    $conn = new mysqli("localhost", "root", "", "forumapporsmth");

                    if ($conn->connect_error) {
                        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
                    }
                    $profileImg = $conn->real_escape_string($profileImg);
                    $query = "UPDATE users SET profile_img = '$profileImg' WHERE email = '$email'";

                    if ($conn->query($query) === TRUE) {

                    } else {
                        echo "Błąd podczas aktualizacji profilowego: " . $conn->error;
                    }
                    
                    $conn->close();
                }

                if(isset($_FILES['profileImg'])){
                    switch ($_FILES['profileImg']['error']) {
                        case 0:
                            if ($_FILES['profileImg']['type'] == "image/jpeg" || $_FILES['profileImg']['type'] == "image/png" || $_FILES['profileImg']['type'] == "image/webp") {
                                move_uploaded_file($_FILES['profileImg']['tmp_name'], "./img/" . $_FILES['profileImg']['name']);

                                $conn = new mysqli("localhost", "root", "", "forumapporsmth");

                                if ($conn->connect_error) {
                                    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
                                }

                                $profileImg = $conn->real_escape_string($_FILES['profileImg']['name']);
                                $query = "UPDATE users SET profile_img = '$profileImg' WHERE email = '$email'";

                                if ($conn->query($query) === TRUE) {
                                    header("Refresh:0");
                                } else {
                                    echo "Błąd podczas aktualizacji profilowego: " . $conn->error;
                                }
                                
                                $conn->close();
                            } else {
                                echo "Niedozwolone rozszerzenie pliku";
                            }
                            break;
                        case 1:
                            echo "Za duży plik (PHP.ini)";
                            break;
                        case 2:
                            echo "Za duży plik";
                            break;
                        case 3:
                            echo "Niepełny plik";
                            break;
                        case 4:
                            echo "Nie wybrano pliku";
                            break;
                        default:
                            echo "Nieznany błąd. Prosimy o kontakt";
                    }
                }
            ?>
        </span>
            <?php
                echo "<img class='profile__img' src='./img/$profImg' alt=''>";
            ?>
    </div>
    <div class="sett__box">
        <span>
            <h2 class="sett__title">
                Zdjęcie w tle
            </h2>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="9000000">
                <input type="file" name="backgroundImg" id="">
                <input type="submit" value="Wyślij">
            </form>
            <?php
                if (isset($_POST['backgroundImg'])) {
                    $backgroundImg = $_POST['backgroundImg'];

                    $conn = new mysqli("localhost", "root", "", "forumapporsmth");

                    if ($conn->connect_error) {
                        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
                    }
                    $backgroundImg = $conn->real_escape_string($backgroundImg);
                    $query = "UPDATE users SET background_img = '$backgroundImg' WHERE email = '$email'";

                    if ($conn->query($query) === TRUE) {

                    } else {
                        echo "Błąd podczas aktualizacji profilowego: " . $conn->error;
                    }
                    
                    $conn->close();
                }

                if(isset($_FILES['backgroundImg'])){
                    switch ($_FILES['backgroundImg']['error']) {
                        case 0:
                            if ($_FILES['backgroundImg']['type'] == "image/jpeg" || $_FILES['backgroundImg']['type'] == "image/png" || $_FILES['backgroundImg']['type'] == "image/webp") {
                                move_uploaded_file($_FILES['backgroundImg']['tmp_name'], "./img/" . $_FILES['backgroundImg']['name']);

                                $conn = new mysqli("localhost", "root", "", "forumapporsmth");

                                if ($conn->connect_error) {
                                    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
                                }

                                $backgroundImg = $conn->real_escape_string($_FILES['backgroundImg']['name']);
                                $query = "UPDATE users SET background_img = '$backgroundImg' WHERE email = '$email'";

                                if ($conn->query($query) === TRUE) {
                                    header("Refresh:0");
                                } else {
                                    echo "Błąd podczas aktualizacji profilowego: " . $conn->error;
                                }
                                
                                $conn->close();
                            } else {
                                echo "Niedozwolone rozszerzenie pliku";
                            }
                            break;
                        case 1:
                            echo "Za duży plik (PHP.ini)";
                            break;
                        case 2:
                            echo "Za duży plik";
                            break;
                        case 3:
                            echo "Niepełny plik";
                            break;
                        case 4:
                            echo "Nie wybrano pliku";
                            break;
                        default:
                            echo "Nieznany błąd. Prosimy o kontakt";
                    }
                }
            ?>
        </span>
            <?php
                echo "<img class='background__img' src='./img/$bckImg' alt=''>";
            ?>
    </div>
    <div class="sett__box">

            <h2 class="sett__title">
                Biogram
            </h2>

            <form method="post">
                <span class="biography__span">
                    <textarea class="biography__input" name="biography" id="" maxlength="150"></textarea>

                    <span class="textarea__counter">0/150</span>

                </span>
                <input type="submit" value="Zatwierdź">
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
                        echo "Zaktualizowano biogram";
                    }

                    $conn->close();
                }
            ?>
    </div>
    <div class="sett__box">
            <h2 class="sett__title">
                Imię i nazwisko
            </h2>
            <form method="post">
                    <?php 
                    echo $email;
                        echo "<input type='text' name='' id='' placeholder='$name'>";
                    ?>
                    <input type="text" name="" id="" placeholder="Nazwisko">
                    <input type="submit" value="Zatwierdź">
            </form>
    </div>
    <div class="sett__box">
            <h2 class="sett__title">
                Zmień hasło
            </h2>
            <form method="post">
                    <input type="password" name="" id="" placeholder="Stare hasło">
                    <input type="password" name="" id="" placeholder="Nowe hasło">
                    <input type="submit" value="Zatwierdź">
            </form>
    </div>
</div>