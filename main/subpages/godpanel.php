<?php include 'main/main.php'; 

    if($rank !== "Administrator" && $rank !== "Właściciel"){
        echo "
        <span class='jmpscr3'>
            <h1 class='jmpscr2'>NIEAUTORYZOWANY DOSTĘP</h1>
            <img class='jmpscr' src='./img/jeff-jeff-the-killer.gif' alt=''>
        </span>
        ";
        header("Refresh:3; url=?page=");
        die;
    }
?>


<div class="main__godpanel">
    <span class="godpanel__title">Panel Administracyjny</span>

    <input type="text" name="" id="" class="user__search__input" placeholder="Wyszukaj użytkownika">
    
    <span id="userList">
        <?php
            $conn = new mysqli("localhost","root","","forumapporsmth");
            $query = "SELECT * FROM users";
            $result = $conn->query($query);

            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){

                    $user_id = $row['id'];
                    $user_pic = $row['profile_img'];
                    $user_name = $row['imie'];
                    $user_lastname = $row['nazwisko'];
                    $user_email = $row['email'];
                    $user_rank = $row['ranga'];

                    echo "
                        <div class='user__box'>
                            <img class='user__img' src='./img/$user_pic' alt=''>
                    
                            <div class='user__col'>
                                <span class='user__fullname'>$user_name $user_lastname</span>
                                <span class='user__email'>$user_email</span>
                                <span class='user__rank'>$user_rank</span>
                            </div>
                    
                            <button class='editUser__btn'><i class='fa-solid fa-ellipsis'></i></button>
                        </div>
                    ";
                }
            }

            $conn->close();
        ?>
    </span>

    <h3 class="errorInfo"></h3>

    <script>
        const userSearchInput = document.querySelector('.user__search__input')
        const userList = document.querySelector('#userList')
        const errorInfo = document.querySelector('.errorInfo')


        userSearchInput.addEventListener('input', ()=>{
            const searchValue = userSearchInput.value
            const users = userList.getElementsByClassName('user__box')

            for(const user of users){
                const userName = user.querySelector('.user__fullname').textContent

                if(userName.includes(searchValue)){
                    user.style.display = "flex"
                    userList.style.display = "flex"
                    errorInfo.textContent = ""
                } else {
                    user.style.display = "none"
                    userList.style.display = "none"
                    errorInfo.textContent = "Brak użytkowników o podanej nazwie"
                }
            }
        })
    </script>
</div>