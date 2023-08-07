<?php
    function showPosts(){
        $conn = new mysqli("localhost","root","","forumapporsmth");
        $query = "SELECT posts.tytul, posts.opis, posts.tresc, posts.kategoria, posts.polubienia, posts.dislike, DATE_FORMAT(posts.data, '%d.%m.%Y') as data_formatowana, users.imie, users.nazwisko, users.profile_img, users.ranga FROM posts inner join users where posts.autor_id = users.id";
        $result = $conn->query($query);

        if ($conn->connect_error) {
            die("Błąd połączenia z bazą danych: " . $conn->connect_error);
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $postTitle = $row['tytul'];
                $postDesc = $row['opis'];
                $postImg = $row['tresc'];
                $postCategory = $row['kategoria'];
                $postLikes = $row['polubienia'];
                $postDislikes = $row['dislike'];
                $postDate = $row['data_formatowana'];
                $postName = $row['imie'];
                $postLastname = $row['nazwisko'];
                $postProfImg = $row['profile_img'];
                $postRank = $row['ranga'];
        
                echo "
                <div class='post'>
        
                    <button class='post__actionBtn'>
                        <i class='fa-solid fa-ellipsis'></i>
                    </button>
            
                    <span class='post__author__img'>
                        <img src='./img/$postProfImg' alt='$postName $postLastname'>
                        <div class='post__author__info'>
                            <div class='author__name'>$postName $postLastname</div>
                            <span class='author__rank'>$postRank</span>
                        </div>
                    </span>

                    <span class='post__title-wrapper'>
                        <p class='post__title'>$postTitle</p>
                    </span>

                    <span class='description__wrapper'>
                        <div class='post__desc'>
                            $postDesc
                        </div>
                        <button class='post__expand-button'>Zobacz więcej</button>
                    </span>
                    
                    <div class='post__img'>
                        <img src='postImg/$postImg' alt=''>
                    </div>
            
                    <div class='post__info'>
                        <span class='post__likes'>
                            <button class='post__likeBtn'><i class='fa-regular fa-thumbs-up'></i></button>
                            $postLikes
                        </span>
            
                        <span class='post__dislikes'>
                            <button class='post__dislikeBtn'><i class='fa-regular fa-thumbs-down'></i></button>
                            $postDislikes
                        </span>
            
                        <div class='post__date'>
                            $postDate
                        </div>
                    </div>
            
                    <form class='post__comments'>
                            <input class='comments__input' type='text' name='comment' placeholder='Dodaj komentarz...'>
                            <button class='comments__submit'><i class='fa-regular fa-comment-dots'></i></button>
                    </form>
        
                </div>";
            }
        }
        

        $conn->close();
    }
?>