<div class="newpost">
    <span class='newpost__title'>Dodaj post</span>

    <form class='newpost__form' method="POST" enctype="multipart/form-data">
        <input maxlength="64" class='newpost__input title__input' type="text" name="newpostTitle" placeholder="Tytuł">
        <textarea maxlength='250' class='newpost__input desc__input' name="newpostDesc" placeholder="Opis"></textarea>
        <input type="file" name="newpostImages" multiple>
        <select name="postCategory">
            <option value="comic">Komiks</option>
            <option value="meme">Memy</option>
        </select>
        <input class='newpost__submit' type="submit" value="Dodaj post">
    </form>
</div>

<?php
    if (isset($_POST['newpostTitle']) && isset($_POST['newpostDesc']) && isset($_POST['postCategory']) &&
        !empty($_POST['newpostTitle']) && !empty($_POST['newpostDesc']) && !empty($_POST['postCategory'])) {

        $newpostTitle = $_POST['newpostTitle'];
        $newpostDesc = $_POST['newpostDesc'];
        $postCategory = $_POST['postCategory'];

        $conn = new mysqli("localhost", "root", "", "forumapporsmth");

        if ($conn->connect_error) {
            die("Błąd połączenia z bazą danych: " . $conn->connect_error);
        }

        $query = "INSERT INTO posts (tytul, autor_id, opis, kategoria) VALUES ('$newpostTitle', '$userId', '$newpostDesc', '$postCategory')";

        if ($conn->query($query) === TRUE) {
            echo "dodano post";
        } else {
            echo "Błąd przy dodawaniu posta: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Wypełnij wszystkie pola!";
    }
?>

<?php

// if (isset($_POST['newpostTitle']) && isset($_POST['newpostDesc']) && isset($_POST['postCategory'])) {
//     $newpostTitle = $_POST['newpostTitle'];
//     $newpostDesc = $_POST['newpostDesc'];
//     $postCategory = $_POST['postCategory'];

//     // UWAGA: Wartość $userId powinna być ustawiona na ID aktualnie zalogowanego użytkownika.
//  // Przykładowe ID użytkownika - zastąp odpowiednią wartością.

//     // Połączenie z bazą danych
//     $conn = new mysqli("localhost", "root", "", "forumapporsmth");
//     if ($conn->connect_error) {
//         die("Błąd połączenia z bazą danych: " . $conn->connect_error);
//     }

//     // Zabezpieczenie przed SQL Injection - użyj prepared statements
//     $stmt = $conn->prepare("INSERT INTO posts (`tytul`, `autor_id`, `opis`, `kategoria`, `tresc`) VALUES (?, ?, ?, ?, ?)");
//     $stmt->bind_param("sssss", $newpostTitle, $userId, $newpostDesc, $postCategory, '');
//     if ($stmt->execute()) {
//         $post_id = $stmt->insert_id;
//     } else {
//         die("Błąd podczas dodawania postu: " . $conn->error);
//     }
//     $stmt->close();

//     // Przetwarzanie przesłanych obrazków
//     if (isset($_FILES['newpostImages'])) {
//         $target_dir = "./postImg/";
//         $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
//         $image_names = array();

//         foreach ($_FILES['newpostImages']['tmp_name'] as $key => $tmp_name) {
//             $file_name = $_FILES['newpostImages']['name'][$key];
//             $file_tmp = $_FILES['newpostImages']['tmp_name'][$key];
//             $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

//             if (in_array($file_extension, $allowed_extensions)) {
//                 $new_file_name = uniqid('image_') . '.' . $file_extension;
//                 if (move_uploaded_file($file_tmp, $target_dir . $new_file_name)) {
//                     $image_names[] = $new_file_name;
//                 } else {
//                     echo "Błąd podczas przesyłania pliku $file_name. Spróbuj ponownie.";
//                 }
//             } else {
//                 echo "Niedozwolone rozszerzenie pliku $file_name. Dozwolone rozszerzenia: " . implode(', ', $allowed_extensions);
//             }
//         }

//         $image_names_str = implode(',', $image_names);

//         // Zabezpieczenie przed SQL Injection - użyj prepared statements
//         $stmt = $conn->prepare("UPDATE posts SET tresc = ? WHERE id = ?");
//         $stmt->bind_param("si", $image_names_str, $post_id);
//         if (!$stmt->execute()) {
//             echo "Błąd podczas aktualizacji postu: " . $conn->error;
//         }
//         $stmt->close();
//     }

//     $conn->close();
// }
?>

