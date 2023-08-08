<div class="newpost">
    <span class='newpost__title'>Dodaj post</span>

    <form class='newpost__form' method="POST" enctype="multipart/form-data">
        <input maxlength="64" class='newpost__input title__input' type="text" name="newpostTitle" placeholder="Tytuł">
        <textarea maxlength='250' class='newpost__input desc__input' name="newpostDesc" placeholder="Opis"></textarea>
        <input type="file" name="newpostImages">
        <select name="postCategory">
            <option value="comic">Komiks</option>
            <option value="meme">Memy</option>
        </select>
        <input class='newpost__submit' type="submit" value="Dodaj post">
    </form>
</div>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['newpostTitle']) && isset($_POST['newpostDesc']) && isset($_POST['postCategory']) &&
            !empty($_POST['newpostTitle']) && !empty($_POST['postCategory'])) {

            $newpostTitle = $_POST['newpostTitle'];
            $newpostDesc = $_POST['newpostDesc'];
            $postCategory = $_POST['postCategory'];

            $newpostImagesName = "";
            if (!empty($_FILES['newpostImages']['name'])) {
                $newpostImagesName = $_FILES['newpostImages']['name'];
                $newpostImagesTmpName = $_FILES['newpostImages']['tmp_name'];
                $targetDir = "./postImg/";
                $targetFile = $targetDir . basename($newpostImagesName);
                if (!move_uploaded_file($newpostImagesTmpName, $targetFile)) {
                    echo "Błąd przy przesyłaniu pliku.";
                    exit;
                }
            }

            $conn = new mysqli("localhost", "root", "", "forumapporsmth");

            if ($conn->connect_error) {
                die("Błąd połączenia z bazą danych: ". $conn->connect_error);
            }

            $query = "INSERT INTO posts (tytul, autor_id, tresc, opis, kategoria) VALUES ('$newpostTitle', '$userId', '$newpostImagesName', '$newpostDesc', '$postCategory')";

            if ($conn->query($query) === TRUE) {
                echo "Dodano post";
            } else {
                echo "Błąd przy dodawaniu posta: " . $conn->error;
            }

            $conn->close();
        } else {
            echo "Wypełnij wszystkie pola!";
        }
    }
?>
