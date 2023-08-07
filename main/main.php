<?php
    session_start();

    if (!isset($_SESSION['email'])){
        header('Location: ../index.php?page=logowanie');
        exit();
    }
    
    $email = $_SESSION['email'];
    
    $conn = new mysqli("localhost", "root", "", "forumapporsmth");
    
    $query = "SELECT id, imie, nazwisko, haslo, email, profile_img, background_img, biogram, ranga FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $userId = $row['id'];
    $name = $row['imie'];
    $lastname = $row['nazwisko'];
    $password = $row['haslo'];
    $profImg = $row['profile_img'] ?? ''; // Set a default value if profile_img is not set
    $bckImg = $row['background_img'] ?? ''; // Set a default value if background_img is not set
    $biography = $row['biogram'] ?? '';
    $rank = $row['ranga'] ?? '';

    $conn->close();
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
        <!-- <img src="./img/350470195_3561143987507183_4522951566672627173_n.jpg" alt=""> -->

        <button class="nav__closeBtn">
            <i class="fa-solid fa-xmark"></i>
        </button>

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
            <?php
                if($rank === "Administrator" || $rank === "Właściciel"){
                    echo "
                    <a class='nav__button' href='?page=godpanel'>
                        <span class='outer__text'>
                            <i class='faIcon fa-solid fa-gears'></i> 
                            <span class='inner__text'>Panel Administracyjny</span>
                        </span>
                    </a>
                    ";
                }
            ?>
            

            
        </div>

        <div class="logout__pannel">
                <a class="profile__btn" href="?page=profile">
                    <?php
                        echo "<img class='profile__image' src='./img/$profImg' alt=''>";
                    ?>
                </a>
            
                <a class="nav__button" href="./subpages/logout.php">
                    <i class="faIcon fa-solid fa-right-to-bracket"></i>
                    <span class="inner__text">Wyloguj</span>
                </a>
        </div>
    </nav>
    <main>

        <button class="nav__openBtn">
            <i class="fa-solid fa-bars"></i>
        </button>

        <?php
                error_reporting(0);

                    if($_GET['page']){
                        $allowed_pages = array("home", "newpost", "category",
                        "profile","messages","notifications","settings", "godpanel");

                        $page = filter_var($_GET['page'], FILTER_SANITIZE_STRING);
                        
                        if(!empty($page)){
                            if(!in_array($page, $allowed_pages)){
                                include("./subpages/404.php");
                            } else {
                                if(is_file("./subpages/".$page.".php")){
                                    include("./subpages/".$page.".php");
                                } else{
                                    echo "strona w budowie";
                                }
                            }
                        }
                    } else {
                        include("./subpages/mainStart.php");
                    }
        ?>  
    </main>
    <script src="script.js"></script>
</body>
</html>