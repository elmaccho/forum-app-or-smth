<div class="home">
    <div class="post">

        <button class="post__actionBtn">
            <i class="fa-solid fa-ellipsis"></i>
        </button>

        <span class="post__author__img">
            <img src="./img/profile/profile-default.jpg" alt="">
            <div class="post__author__info">
                <div class="author__name">Maciej Chojnacki</div>
                <span class="author__rank">Właściciel</span>
            </div>
        </span>

        <span class="description__wrapper">
            <div class="post__desc">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure nihil rerum excepturi quas quod soluta necessitatibus ipsum reprehenderit. Expedita officiis mollitia similique neque, et minima corporis consequatur. Aliquid reiciendis nemo doloremque accusantium natus commodi consequatur quos repellat? Eius, reprehenderit cumque, iusto in itaque tempora accusantium, dicta est maxime voluptatum sed?
            </div>
            <button class="post__expand-button">Zobacz więcej</button>
        </span>
        

        <div class="post__img">
            <img src="./img/Bez nazwy.png" alt="">
        </div>

        <div class="post__info">
            <span class='post__likes'>
                <button class='post__likeBtn'><i class="fa-regular fa-thumbs-up"></i></button>
                874
            </span>

            <span class='post__dislikes'>
                <button class='post__dislikeBtn'><i class="fa-regular fa-thumbs-down"></i></button>
                874
            </span>

            <div class="post__date">
                02.08.2023
            </div>
        </div>

        <div class="post__comments">
            <input type="text" name="" id="" placeholder="Dodaj komentarz...">
            <button type="submit"><i class="fa-regular fa-comment-dots"></i></button>
        </div>

    </div>
</div>


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
