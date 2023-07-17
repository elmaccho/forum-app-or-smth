<div class="main__profile">

    <div class="main__bckImg">
            <?php echo "<img class='bckImg' src='img/$bckImg' alt=''>"; ?>
            <button class="bckImg__changeBtn changeBtn"><i class="fa-solid fa-camera"></i></button>

        <div class="main__profImg">
            <?php echo "<img class='profImg' src='img/$profImg' alt=''>"; ?>

            <button class="profImg__changeBtn changeBtn"><i class="fa-solid fa-camera"></i></button>
        </div>
    </div>

    <div class="main__row1">
        <?php
            echo "<span class='main__fullname'>$name $lastname</span>"; 
            echo "<a class='redSett__btn' href='?page=settings'>
                <i class='fa-solid fa-pencil'></i> Edytuj profil
                </a>";
        ?>
    </div>

    <div class="main__row2">
        <span class="biography__title">Biogram</span>
        <?php
            echo $biography;
        ?>
    </div>

</div>