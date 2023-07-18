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
    
    <div class="user__box">
        <img class="user__img" src="./img/PiHQ.png" alt="">
        <span class="user__fullname">Maciej Chojnacki</span>
        <span class="user__email">maciek.chojnacki22@wp.pl</span>
        <span class="user__rank">Właściciel</span>

        <button class="editUser__btn"><i class="fa-solid fa-ellipsis"></i></button>
    </div>
    <div class="user__box">
        <img class="user__img" src="./img/PiHQ.png" alt="">
        <span class="user__fullname">Maciej Chojnacki</span>
        <span class="user__email">maciek.chojnacki22@wp.pl</span>
        <span class="user__rank">Właściciel</span>

        <button class="editUser__btn"><i class="fa-solid fa-ellipsis"></i></button>

    </div>
    <div class="user__box">
        <img class="user__img" src="./img/PiHQ.png" alt="">
        <span class="user__fullname">Maciej Chojnacki</span>
        <span class="user__email">maciek.chojnacki22@wp.pl</span>
        <span class="user__rank">Właściciel</span>

        <button class="editUser__btn"><i class="fa-solid fa-ellipsis"></i></button>

    </div>
    <div class="user__box">
        <img class="user__img" src="./img/PiHQ.png" alt="">
        <span class="user__fullname">Maciej Chojnacki</span>
        <span class="user__email">maciek.chojnacki22@wp.pl</span>
        <span class="user__rank">Właściciel</span>

        <button class="editUser__btn"><i class="fa-solid fa-ellipsis"></i></button>

    </div>
</div>