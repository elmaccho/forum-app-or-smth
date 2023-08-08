<?php
    // include('../main.php');

    // function addComment(){
    //     if($_SERVER["REQUEST_METHOD"] == "POST"){
    //         if(isset($_POST['comment']) && !empty($_POST['comment'])){
    //             $commentValue = $_POST['comment'];

    //             $conn = new mysqli("localhost","root","","forumapporsmth");

    //             if ($conn->connect_error) {
    //                 die("Błąd połączenia z bazą danych: ". $conn->connect_error);
    //             }

    //             $query = "INSERT INTO `comments`(`post_id`, `autor_id`, `tresc`) VALUES ('$postId','$userId','$commentValue')";

    //             if ($conn->query($query) === TRUE) {
    //                 echo "Dodano komentarz";
    //             } else {
    //                 echo "Błąd przy dodawaniu komentarza: " . $conn->error;
    //             }
    
    //             $conn->close();
    //         }
    //     }
    // }

?>