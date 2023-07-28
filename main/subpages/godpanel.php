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

                    $user_fullname = $user_name." ". $user_lastname;

                    echo "
                        <div class='user__box'>
                            <img class='user__img' src='./img/$user_pic' alt=''>
                    
                            <div class='user__col'>
                                <span class='user__fullname'>$user_fullname</span>
                                <span class='user__email'>$user_email</span>
                                <span class='user__rank'>$user_rank</span>
                            </div>
                    
                            <button class='editUser__btn'><i class='fa-solid fa-ellipsis'></i></button>

                            <div class='editUser__menu'>
                            <a href=''>Edytuj dane</a>
                            <a href=''>Edytuj uprawnienia</a>
                            <a href=''>Zbaduj użytkownika</a>
                            <a href=''>Usuń użytkownika</a>
                            </div>
                        </div>
                    ";
                }
            }

            $conn->close();
        ?>
    </span>

    <h3 class="errorInfo"></h3>

    <script>
    const userSearchInput = document.querySelector('.user__search__input');
    const userList = document.querySelector('#userList');
    const errorInfo = document.querySelector('.errorInfo');
    const users = userList.getElementsByClassName('user__box');

    const editUserBtns = document.querySelectorAll('.editUser__btn')
    const editUserMenus = document.querySelectorAll('.editUser__menu')

    userSearchInput.addEventListener('input', () => {
        const searchValue = userSearchInput.value.toLowerCase();

        let foundUsers = 0;

        for (const user of users) {
            const userName = user.querySelector('.user__fullname').textContent.toLowerCase();

            if (userName.includes(searchValue)) {
                user.style.display = "flex";
                foundUsers++;
            } else {
                user.style.display = "none";
            }
        }

        if (foundUsers === 0) {
            userList.style.display = "none";
            errorInfo.textContent = "Brak użytkowników o podanej nazwie";
        } else {
            userList.style.display = "flex";
            errorInfo.textContent = "";
        }
    });

    for(const editUserBtn of editUserBtns)
    editUserBtn.addEventListener('click', (e)=>{
        const targetMenu = e.target.closest('div').querySelector('.editUser__menu')
        targetMenu.style.transform = "scale(1)"

        document.addEventListener('click', (e)=>{
        if(!targetMenu.contains(e.target) && !editUserBtn.contains(e.target)){
            targetMenu.style.transform = "scale(0)"
        }
        })
    })


</script>
</div>