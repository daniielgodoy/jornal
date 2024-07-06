<?php
require('includes/mysqli.php');

$campoPesquisa = isset($_GET['campo_pesquisa']) ? $mysqli->real_escape_string($_GET['campo_pesquisa']) : '';
$categoria = isset($_GET['categoria']) ? $mysqli->real_escape_string($_GET['categoria']) : '';

$where = "1=1";  // Condição padrão para não filtrar por nada

if ($campoPesquisa) {
    $where .= " AND titulo LIKE '%$campoPesquisa%'";
}

if ($categoria) {
    $where .= " AND categoria = '$categoria'";
}

$noticiasPorPagina = 10;

// Primeiro, obtenha o total de notícias para a categoria especificada
$totalNoticiasQuery = "SELECT COUNT(*) as total FROM tbl_noticias WHERE $where";
$totalNoticiasResult = $mysqli->query($totalNoticiasQuery);
$totalNoticiasRow = $totalNoticiasResult->fetch_assoc();
$totalNoticias = $totalNoticiasRow['total'];

// Calcule o total de páginas
$totalPaginas = ceil($totalNoticias / $noticiasPorPagina);

// Verifique a página atual e o offset
$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($paginaAtual < 1) {
    $paginaAtual = 1;
} elseif ($paginaAtual > $totalPaginas && $totalPaginas > 0) {
    $paginaAtual = $totalPaginas;
}

$offset = ($paginaAtual - 1) * $noticiasPorPagina;
if ($offset < 0) {
    $offset = 0; // Se o offset for negativo, ajuste para 0 para evitar erro no SQL
}

// Agora, faça a consulta para obter as notícias
$query = "SELECT * FROM tbl_noticias WHERE $where ORDER BY data DESC LIMIT $offset, $noticiasPorPagina";
$result = $mysqli->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) { 
            echo '<a href="noticias.php?id=' . $row['id'] . '" class="card" style="display: flex; margin-bottom: 10px; background-color: rgb(247, 247, 247); flex-direction: row; align-items: center; width: 100%; height: 170px; text-decoration: none;">'; 
            echo '<img src="' . $row['imagem'] . '" class="card-img-left img-fluid" alt="Imagem da notícia" style="height: 100%; width: 25%; margin-left: -1%; border-radius: 5px; margin-right: 20px; object-fit: cover;">'; 
            echo '<div class="card-body" style="width: 70%;">'; 
            echo '<h2 class="card-title" style="font-size: 1.5em; text-align: left; margin-bottom: 10px;">' . $row['titulo'] . '</h2>'; 
            echo '<h5 class="card-text" style="font-size: 1em; color: gray; text-align: left;">' . $row['subtitulo'] . '</h5>'; 
            echo '</div></a>';
        }
        echo '</div>';
        
        echo '<nav aria-label="Page navigation">';
        echo '<ul class="pagination">';
        for ($i = 1; $i <= $totalPaginas; $i++) {
            echo '<li class="page-item' . ($i == $paginaAtual ? ' active' : '') . '"><a class="page-link" href="index.php?pagina=' . $i . ($campoPesquisa ? '&campo_pesquisa=' . urlencode($campoPesquisa) : '') . ($categoria ? '&categoria=' . urlencode($categoria) : '') . '">' . $i . '</a></li>';
        }
        echo '</ul>';
        echo '</nav>';
    } else {
        echo "Nenhuma notícia encontrada para esta categoria.";
    }
} else {
    echo "Erro ao executar a consulta: " . $mysqli->error;
}

$mysqli->close();
?>
