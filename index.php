<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <main>
        <?php
                error_reporting(0);

                    if($_GET['page']){
                        $allowed_pages = array("logowanie", "rejestracja", "start","przypomnij haslo");

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
                        include("./subpages/start.php");
                    }
        ?>
    </main>

    <span class="blob1">
        <li></li>
    </span>
    <span class="blob2">
        <li></li>
    </span>
    <span class="blob3">
        <li></li>
    </span>
    <script src="./script.js"></script>
</body>
</html>