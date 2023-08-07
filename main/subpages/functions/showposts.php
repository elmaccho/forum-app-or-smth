<?php
    function showPosts(){
        $conn = new mysqli("localhost","root","","forumapporsmth");
        $query = "SELECT `tytul`, `opis`, `tresc`, `kategoria`, `polubienia`, `dislike`, `data` ";
        $result = $conn->query($query);

        if ($conn->connect_error) {
            die("Błąd połączenia z bazą danych: " . $conn->connect_error);
        }

        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $postTitle = $row['tytul'];
                $postDesc = $row['opis'];
                $postImg = $row['tresc'];
                $postCategory = $row['kategoria'];
                $postLikes = $row['polubienia'];
                $postDislikes = $row['dislike'];
                $postDate = $row['data'];
            }
        }
    }
?>