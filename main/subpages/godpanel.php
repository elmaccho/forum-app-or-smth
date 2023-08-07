<?php include 'main/main.php'; 
    if ($rank !== "Administrator" && $rank !== "Właściciel") {
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
        include 'functions/showusers.php';
            showUsers();


            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (isset($_POST["user_id"]) && isset($_POST["new_rank"])) {
                    include 'functions/userrank.php';
        
                    $user_id = $_POST["user_id"];
                    $new_rank = $_POST["new_rank"];
        
                    changeRank($user_id, $new_rank);
                }
            }
        ?>
    </span>

    <h3 class="errorInfo"></h3>
</div>

<script>
    const userSearchInput = document.querySelector('.user__search__input');
    const userList = document.querySelector('#userList');
    const errorInfo = document.querySelector('.errorInfo');
    const users = userList.getElementsByClassName('user__box');

</script>
