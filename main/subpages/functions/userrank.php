<?php
function changeRank($user_id, $nowa_ranga) {
    $conn = new mysqli("localhost", "root", "", "forumapporsmth");

    // Wykonujemy prostą walidację danych, aby zapobiec SQL injection
    $user_id = (int)$user_id;
    $nowa_ranga = $conn->real_escape_string($nowa_ranga);

    // Przygotowujemy i wykonujemy zapytanie SQL do aktualizacji rangi użytkownika
    $query = "UPDATE users SET ranga = '$nowa_ranga' WHERE id = $user_id";
    $conn->query($query);

    $conn->close();
}
?>
