<?php

    function showComments(){
        $conn = new mysqli("localhost","root","","forumapporsmth");
        $query = "SELECT users.imie, users.nazwisko, users.profile_img, users.ranga, users.id, comments.autor_id, comments.tresc from users inner join comments where users.id = comments.autor_id";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_name = $row['imie'];
                $user_lastname = $row['nazwisko'];
                $user_pic = $row['profile_img'];
                $user_rank = $row['ranga'];
                $comments_content = $row['tresc'];

                echo "
                
                        <div class='post__comm'>
                        <button class='comm__actionBtn'><i class='fa-solid fa-ellipsis'></i></button>

                        <div class='comm__row-info'>
                            <div class='comm__info-img'>
                                <img src='./img/364026801_3566251460325160_2469454463339477737_n.jpg' alt='Maciej Chojnacki'>
                            </div>
                            <div class='comm__info-userInfo'>
                                <span class='comm__userName'>
                                    Maciej Chojnacki
                                </span>
                                <div class='comm__userRank'>
                                    Właściciel
                                </div>
                            </div>
                            <span class='comm__dateAdded'>
                                07.08.2023
                            </span>
                        </div>
                        <div class='comm__row-content'>
                            $comments_content
                            <hr>
                        </div>

                    </div>

                ";
            }
        }
    }
?>