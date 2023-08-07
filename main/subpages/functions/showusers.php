<?php
    function showUsers(){
        $conn = new mysqli("localhost","root","","forumapporsmth");
        $query = "SELECT `id`, `imie`, `nazwisko`, `email`, `profile_img`, `ranga` FROM `users`";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['id'];
                $user_pic = $row['profile_img'];
                $user_name = $row['imie'];
                $user_lastname = $row['nazwisko'];
                $user_email = $row['email'];
                $user_rank = $row['ranga'];
        
                $user_fullname = $user_name . " " . $user_lastname;
        
                echo "
                    <div class='user__box'>
                        <img class='user__img' src='./img/$user_pic' alt=''>
                        <div class='user__col'>
                            <span class='user__fullname'>$user_fullname</span>
                            <span class='user__email'>$user_email</span>
                            <span class='user__rank'>$user_rank</span>
                        </div>
                        <form class='rank__form' method='POST'>
                            <input type='hidden' name='user_id' value='$user_id'>
                            <select name='new_rank'>
                            <option value='Użytkownik' " . ($user_rank === 'Użytkownik' ? 'selected' : '') . ">Użytkownik</option>
                            <option value='Administrator' " . ($user_rank === 'Administrator' ? 'selected' : '') . ">Administrator</option>
                            <option value='Właściciel' " . ($user_rank === 'Właściciel' ? 'selected' : '') . ">Właściciel</option>
                        </select>
                            <button type='submit'>Zmień Rangę</button>
                        </form>
                    </div>
                ";

            }
        }
        
        $conn->close();
    }
?>