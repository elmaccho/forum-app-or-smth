<?php
    session_start();

    if (!isset($_SESSION['email'])){
        header('Location: ../index.php?page=logowanie');
        exit();
    }
    $name = $_SESSION['imie'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/4798a03daf.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <h2 class="nav__title">
            Forum app<br>
            or smth
        </h2>

        <div class="nav__search">
            <input class="search__input" type="search" name="" id="" placeholder="Wyszukaj...">

            <button class="search__button">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>

        <div class="main__buttons">
            <a class="nav__button" href="?page=home">
                <span class="outer__text">
                    <i class="faIcon fa-solid fa-house"></i> 
                    <span class="inner__text">Strona główna</span>
                </span>
            </a>
        
            <a class="nav__button" href="?page=newpost">
                <span class="outer__text">
                    <i class="faIcon fa-solid fa-square-plus"></i> 
                    <span class="inner__text">Dodaj post</span>
                </span>
            </a>

            <a class="nav__button" href="?page=category">
                <span class="outer__text">
                    <i class="faIcon fa-solid fa-book"></i> 
                    <span class="inner__text">Kategorie</span>
                </span>
            </a>
        </div>

        <div class="profile__buttons">
            <a class="nav__button" href="?page=profile">
                <span class="outer__text">
                    <i class="faIcon fa-solid fa-user"></i> 
                    <span class="inner__text">Profil</span>
                </span>
            </a>

            <a class="nav__button" href="?page=messages">
                <span class="outer__text">
                    <i class="faIcon fa-solid fa-envelope"></i> 
                    <span class="inner__text">Wiadomości</span>
                </span>
            </a>

            <a class="nav__button" href="?page=notifications">
                <span class="outer__text">
                    <i class="faIcon fa-solid fa-bell"></i> 
                    <span class="inner__text">Powiadomienia</span>
                </span>
            </a>

        </div>

        <div class="setting_buttons">
            <a class="nav__button" href="?page=settings">
                <span class="outer__text">
                    <i class="faIcon fa-solid fa-gear"></i> 
                    <span class="inner__text">Ustawienia</span>
                </span>
            </a>
        </div>

        <div class="logout__pannel">
                <a class="profile__btn" href="?page=profile">
                    <img class="profile__image" src="./img/profile/profile-default.jpg" alt="">
                </a>
                
                
                <a class="nav__button" href="./subpages/logout.php">
                    <i class="faIcon fa-solid fa-right-to-bracket"></i>
                    <span class="inner__text">Wyloguj</span>
                </a>
        </div>
    </nav>

    <main>

        <?php
                error_reporting(0);

                    if($_GET['page']){
                        $allowed_pages = array("home", "newpost", "category",
                        "profile","messages","notifications","settings");

                        $page = filter_var($_GET['page'], FILTER_SANITIZE_STRING);
                        
                        if(!empty($page)){
                            if(!in_array($page, $allowed_pages)){
                                include("./subpages/404.php");
                            } else {
                                if(is_file("./subpages/".$page.".php")){
                                    include("./subpages/".$page.".php");
                                } else{
                                    echo "strona nie istnieje";
                                }
                            }
                        }
                    } else {
                        include("./subpages/mainStart.php");
                    }
        ?>

    </main>
    <script src="./script.js"></script>
</body>
</html>