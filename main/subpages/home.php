<div class="home">
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
