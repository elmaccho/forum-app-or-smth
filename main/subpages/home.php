<div class="home">

<div class="post">
        
                    <button class="post__actionBtn">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
            
                    <span class="post__author__img">
                        <img src="./img/364026801_3566251460325160_2469454463339477737_n.jpg" alt="Maciej Chojnacki">
                        <div class="post__author__info">
                            <div class="author__name">Maciej Chojnacki</div>
                            <span class="author__rank">Właściciel</span>
                        </div>
                    </span>

                    <span class="post__title-wrapper">
                        <p class="post__title">Olimpkjuziw</p>
                    </span>

                    <span class="description__wrapper">
                        <div class="post__desc">
                            
                        </div>
                        <button class="post__expand-button">Zobacz więcej</button>
                    </span>
                    
                    <div class="post__img">
                        <!-- <img src="postImg/364026801_3566251460325160_2469454463339477737_n.jpg" alt=""> -->
                    </div>
            
                    <div class="post__info">
                        <span class="post__likes">
                            <button class="post__likeBtn"><i class="fa-regular fa-thumbs-up"></i></button>
                            2137
                        </span>
            
                        <span class="post__dislikes">
                            <button class="post__dislikeBtn"><i class="fa-regular fa-thumbs-down"></i></button>
                            69
                        </span>
            
                        <div class="post__date">
                            07.08.2023
                        </div>
                    </div>
            
                    <form class="post__comments">
                            <input class="comments__input" type="text" name="comment" placeholder="Dodaj komentarz...">
                            <button class="comments__submit"><i class="fa-regular fa-comment-dots"></i></button>
                    </form>

                    <div class="post__comments-wrapper">
                        <div class="post__comm">
                            <button class="comm__actionBtn"><i class="fa-solid fa-ellipsis"></i></button>

                             <div class="comm__row-info">
                                <div class="comm__info-img">
                                    <img src="./img/364026801_3566251460325160_2469454463339477737_n.jpg" alt="Maciej Chojnacki">
                                </div>
                                <div class="comm__info-userInfo">
                                    <span class="comm__userName">
                                        Maciej Chojnacki
                                    </span>
                                    <div class="comm__userRank">
                                        Właściciel
                                    </div>
                                </div>
                                <span class="comm__dateAdded">
                                    07.08.2023
                                </span>
                             </div>
                             <div class="comm__row-content">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Quia, totam expedita magni fugit quis esse minus 
                                laudantium ut modi consectetur ab quisquam. Suscipit et 
                                maxime magni esse odit eos repudiandae, eveniet error 
                                laboriosam itaque eaque saepe nulla distinctio fugit 
                                expedita consectetur hic harum repellat, omnis veniam! 
                                Iste asperiores maxime amet.
                                <hr>
                             </div>

                        </div>

                        <div class="post__comm">
                            <button class="comm__actionBtn"><i class="fa-solid fa-ellipsis"></i></button>

                             <div class="comm__row-info">
                                <div class="comm__info-img">
                                    <img src="./img/364026801_3566251460325160_2469454463339477737_n.jpg" alt="Maciej Chojnacki">
                                </div>
                                <div class="comm__info-userInfo">
                                    <span class="comm__userName">
                                        Maciej Chojnacki
                                    </span>
                                    <div class="comm__userRank">
                                        Właściciel
                                    </div>
                                </div>
                                <span class="comm__dateAdded">
                                    07.08.2023
                                </span>
                             </div>
                             <div class="comm__row-content">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Quia, totam expedita magni fugit quis esse minus 
                                laudantium ut modi consectetur ab quisquam. Suscipit et 
                                maxime magni esse odit eos repudiandae, eveniet error 
                                laboriosam itaque eaque saepe nulla distinctio fugit 
                                expedita consectetur hic harum repellat, omnis veniam! 
                                Iste asperiores maxime amet.

                                <hr>
                             </div>

                             
                        </div>
                    </div>
         
                </div>
    <?php
        include ("functions/showposts.php");
        showPosts();
    ?>

<script>
    const postDescElements = document.querySelectorAll('.post__desc');
    const expandButtons = document.querySelectorAll('.post__expand-button');

    postDescElements.forEach((element, index) => {
        const originalText = element.textContent;
        const maxVisibleCharacters = 143;

        if (originalText.length > maxVisibleCharacters) {
            const visibleText = originalText.substring(0, maxVisibleCharacters) + '...';
            element.textContent = visibleText;
            expandButtons[index].style.display = 'inline'; // Pokazujemy przycisk tylko jeśli tekst został skrócony
        }

        expandButtons[index].addEventListener('click', () => {
            if (element.classList.contains('expanded')) {
                // Jeśli jest rozszerzone, skracamy tekst i zmieniamy tekst przycisku
                element.classList.remove('expanded');
                element.textContent = originalText.substring(0, maxVisibleCharacters) + '...';
                expandButtons[index].textContent = 'Zobacz więcej';
            } else {
                // Jeśli jest skrócone, pokazujemy cały tekst i zmieniamy tekst przycisku
                element.classList.add('expanded');
                element.textContent = originalText;
                expandButtons[index].textContent = 'Zobacz mniej';
            }
        });
    });
</script>
