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

<div class="edit__data">
    <button class="closeDataBtn">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>

<div class="edit__rank">
    <button class="closeRankBtn">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>

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

                    $user_fullname = $user_name." ".$user_lastname;

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
                            <a class='openDataBtn' href='#'>Edytuj dane</a>
                            <a class='openRankBtn' href='#'>Zmień rangę</a>
                            <a href=''>Zbanuj użytkownika</a>
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
        const actionBtns = document.querySelectorAll('.editUser__menu a')
        
        const openDataBtn = document.querySelector('.openDataBtn')
        const closeDataBtn = document.querySelector('.closeDataBtn')
        const openRankBtn = document.querySelector('.openRankBtn')
        const closeRankBtn = document.querySelector('.closeRankBtn')
        const editData = document.querySelector('.edit__data')
        const editRank = document.querySelector('.edit__rank')
        


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

            for(const actionBtn of actionBtns){
            actionBtn.addEventListener('click', (e)=>{
                targetMenu.style.transform = "scale(0)"
            })
        }
        })


        // DATAMENU

        const openDataMenu = () => {
            editData.style.transform = "translate(-50%, -50%)"
        }

        const closeDataMenu = () => {
            editData.style.transform = "translate(100%, -50%)"
        }

        openDataBtn.addEventListener('click', openDataMenu)
        closeDataBtn.addEventListener('click', closeDataMenu)

        document.addEventListener('click', (e)=>{
            if(!editData.contains(e.target) && !openDataBtn.contains(e.target)){
                closeDataMenu()
            }
        })


        // RANKMENU

        const openRankMenu = () => {
            editRank.style.transform = "translate(-50%, -50%)"
        }

        const closeRankMenu = () => {
            editRank.style.transform = "translate(100%, -50%)"
        }

        openRankBtn.addEventListener('click', openRankMenu)
        closeRankBtn.addEventListener('click', closeRankMenu)

        document.addEventListener('click', (e)=>{
            if(!editRank.contains(e.target) && !openRankBtn.contains(e.target)){
                closeRankMenu()
            }
        })
    </script>
</div>