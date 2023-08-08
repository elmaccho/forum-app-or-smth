<div class="home">
    <?php
        // include("./functions/showcomments.php");


        $conn = new mysqli("localhost","root","","forumapporsmth");
        $query = "SELECT posts.id, posts.tytul, posts.opis, posts.tresc, posts.kategoria, posts.polubienia, posts.dislike, DATE_FORMAT(posts.data, '%d.%m.%Y') as data_formatowana, users.imie, users.nazwisko, users.profile_img, users.ranga FROM posts inner join users where posts.autor_id = users.id";
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
                $postId = $row['id'];

                echo "
                <div class='post'>
                $postId
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
                    
            
                    <form class='post__comments' method='POST'>
                            <input class='comments__input' type='text' name='comment' placeholder='Dodaj komentarz...'>
                            <button class='comments__submit'><i class='fa-regular fa-comment-dots'></i></button>
                    </form>
                    <div class='post__comments-wrapper'>
                    e
                    ";

                        $postId = $row['id'];
                        $commentsQuery = "SELECT * FROM comments WHERE post_id = '$postId'";
                        $commentsResult = $conn->query($commentsQuery);

                        if($commentsResult->num_rows > 0){
                            while($commentRow = $commentsResult->fetch_assoc()){
                                $commentContent = $commentRow['tresc'];
                                $commentAuthorId = $commentRow['author_id'];

                                $commentUserQuery = "SELECT imie, nazwisko, profile_img FROM users WHERE id = '$commentAuthorId'";
                                $commentUserResult = $conn->query($commentUserQuery);

                                if ($commentUserResult->num_rows > 0) {
                                    $commentAuthorData = $commentUserResult->fetch_assoc();
                                    $commentAuthorName = $commentAuthorData['imie'] . ' ' . $commentAuthorData['nazwisko'];
                                    $commentAuthorProfileImg = $commentAuthorData['profile_img'];

                                    // Wyświetl komentarz wewnątrz pętli komentarzy
                                    echo "
                                    <div class='comment'>
                                        <span class='comment__author__img'>
                                            <img src='./img/$commentAuthorProfileImg' alt='$commentAuthorName'>
                                        </span>
                                        <span class='comment__content'>$commentContent</span>
                                    </div>";
                                }
                            }
                        }
                    
                    echo "
                        </div>
                    </div>";
            }
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['comment']) && !empty($_POST['comment'])){
                $commentValue = $_POST['comment'];

                $conn = new mysqli("localhost","root","","forumapporsmth");

                if ($conn->connect_error) {
                    die("Błąd połączenia z bazą danych: ". $conn->connect_error);
                }

                $query = "INSERT INTO `comments`(`post_id`, `autor_id`, `tresc`) VALUES ('$postId','$userId','$commentValue')";

                if ($conn->query($query) === TRUE) {
                    echo "Dodano komentarz";
                } else {
                    echo "Błąd przy dodawaniu komentarza: " . $conn->error;
                }

                $conn->close();
            }
        }
        $conn->close();
    ?>

<script>
    const postDescElements = document.querySelectorAll('.post__desc');
    const postExpandButtons = document.querySelectorAll('.post__expand-button');

    postDescElements.forEach((element, index) => {
        const originalText = element.textContent;
        const maxVisibleCharacters = 143;

        if (originalText.length > maxVisibleCharacters) {
            const visibleText = originalText.substring(0, maxVisibleCharacters) + '...';
            element.textContent = visibleText;
            postExpandButtons[index].style.display = 'inline'; // Pokazujemy przycisk tylko jeśli tekst został skrócony
        }

        postExpandButtons[index].addEventListener('click', () => {
            if (element.classList.contains('expanded')) {
                // Jeśli jest rozszerzone, skracamy tekst i zmieniamy tekst przycisku
                element.classList.remove('expanded');
                element.textContent = originalText.substring(0, maxVisibleCharacters) + '...';
                postExpandButtons[index].textContent = 'Zobacz więcej';
            } else {
                // Jeśli jest skrócone, pokazujemy cały tekst i zmieniamy tekst przycisku
                element.classList.add('expanded');
                element.textContent = originalText;
                postExpandButtons[index].textContent = 'Zobacz mniej';
            }
        });
    });
</script>
