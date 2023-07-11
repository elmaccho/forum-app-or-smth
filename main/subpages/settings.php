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
                Zdjęcie profilowe
            </h2>
            <button class="sett__changeBtn">
                Edytuj
            </button>
        </span>

            <?php
                echo "<img class='background__img' src='./img/$bckImg' alt=''>";
            ?>
    </div>
    <div class="sett__box">

        <span>
            <h2 class="sett__title">
                Zdjęcie profilowe
            </h2>

        </span>

        <textarea class="biography__input" name="" id=""></textarea>
    </div>
    <div class="sett__box sett__accountSett">

        <span>
            <h2 class="sett__title">
                Ustawienia konta
            </h2>
            <button class="sett__changeBtn">
                Edytuj
            </button>
        </span>
    </div>
</div>