<?php
require('includes/mysqli.php');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$noticiasPorPagina = 10;
$campoPesquisa = isset($_POST['campo_pesquisa']) ? $mysqli->real_escape_string($_POST['campo_pesquisa']) : '';

if ($campoPesquisa) {
    $totalNoticiasQuery = "SELECT COUNT(*) as total FROM tbl_noticias WHERE marca LIKE '%" . $campoPesquisa . "%'";
} else {
    $totalNoticiasQuery = "SELECT COUNT(*) as total FROM tbl_noticias";
}
$totalNoticiasResult = $mysqli->query($totalNoticiasQuery);
$totalNoticiasRow = $totalNoticiasResult->fetch_assoc();
$totalNoticias = $totalNoticiasRow['total'];

$totalPaginas = ceil($totalNoticias / $noticiasPorPagina);

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($paginaAtual < 1) {
    $paginaAtual = 1;
} elseif ($paginaAtual > $totalPaginas) {
    $paginaAtual = $totalPaginas;
}
$offset = ($paginaAtual - 1) * $noticiasPorPagina;

if ($campoPesquisa) {
    $query = "SELECT * FROM tbl_noticias WHERE marca LIKE '%" . $campoPesquisa . "%' ORDER BY data DESC LIMIT $offset, $noticiasPorPagina";
} else {
    $query = "SELECT * FROM tbl_noticias ORDER BY data DESC LIMIT $offset, $noticiasPorPagina";
}

$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) { 
        echo '<a href="noticias.php?id=' . $row['id'] . '" class="card" style="display: flex;margin-bottom: 10px;background-color: rgb(247, 247, 247); flex-direction: row; align-items: center; width: 100%; height: 170px; text-decoration: none;">'; 
        echo '<img src="' . $row['imagem'] . '" class="card-img-left img-fluid" alt="Imagem da notícia" style="height: 100%; width: 25%; margin-left: -1%; border-radius: 5px;margin-right: 20px; object-fit: cover;">'; 
        echo '<div class="card-body" style="width: 70%;">'; 
        echo '<h2 class="card-title" style="font-size: 1.5em;text-align: left; margin-bottom: 10px;">' . $row['titulo'] . '</h2>'; 
        echo '<h5 class="card-text" style="font-size: 1em; color: gray; text-align: left;">' . $row['subtitulo'] . '</h5>'; 
        echo '</div></a>';
    }
    echo '</div>';
    
    echo '<nav aria-label="Page navigation">';
    echo '<ul class="pagination">';
    for ($i = 1; $i <= $totalPaginas; $i++) {
        echo '<li class="page-item' . ($i == $paginaAtual ? ' active' : '') . '"><a class="page-link" href="?pagina=' . $i . ($campoPesquisa ? '&campo_pesquisa=' . urlencode($campoPesquisa) : '') . '">' . $i . '</a></li>';
    }
    echo '</ul>';
    echo '</nav>';
} else {
    echo "Nenhuma notícia encontrada.";
}

$mysqli->close();
?>
