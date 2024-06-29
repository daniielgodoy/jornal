<?php
        require('includes/mysqli.php');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['campo_pesquisa'])) {
    $marca = $mysqli->real_escape_string($_POST['campo_pesquisa']);
    $query = "SELECT * FROM tbl_noticias WHERE marca LIKE '%" . $marca . "%'";
} else {
    $query = "SELECT * FROM tbl_noticias";
}

$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) { 
        echo '<div class="card" style="display: flex; flex-direction: row; align-items: center; width: 100%; height: 25%;">'; 
        echo '<img src="' . $row['imagem'] . '" class="card-img-left img-fluid" alt="Imagem da notícia" style="height: 100%; width: 25%; margin-left: -1%; border-radius: 5px;margin-right: 20px; object-fit: cover;">'; 
        echo '<div class="card-body" style="width: 70%;">'; 
        echo '<h2 class="card-title" style="font-size: 1.5em;text-align: left; margin-bottom: 10px;">' . $row['titulo'] . '</h2>'; 
        echo '<h5 class="card-text" style="font-size: 1em; color: gray; text-align: left;">' . $row['subtitulo'] . '</h5>'; 
        echo '</div></div>';
    }
    echo '</div>';
}



else {
    echo "Nenhuma notícia encontrada.";
}

$mysqli->close();
?>
