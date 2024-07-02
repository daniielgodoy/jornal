<?php
require('includes/mysqli.php');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$principalQuery = "SELECT imagem, titulo, id FROM tbl_noticias WHERE principal = 1 ORDER BY data DESC LIMIT 3";
$principalResult = $mysqli->query($principalQuery);

$noticias = [];
while ($row = $principalResult->fetch_assoc()) {
    $noticias[] = $row;
}
?>
<div id="carousel">
    <div class="fotos">
        <div id="ft1">
            <a href="noticias.php?id=<?php echo $noticias[0]['id']; ?>">
                <img src="<?php echo $noticias[0]['imagem']; ?>" alt="Notícia Principal 1">
            </a>
            <div id="txt1">
                <p><?php echo $noticias[0]['titulo']; ?></p>
            </div>
        </div>
        <div id="ft2">
            <a href="noticias.php?id=<?php echo $noticias[1]['id']; ?>">
                <img src="<?php echo $noticias[1]['imagem']; ?>" alt="Notícia Principal 2">
            </a>
            <div id="txt2">
                <p><?php echo $noticias[1]['titulo']; ?></p>
            </div>
        </div>
        <div id="ft3">
            <a href="noticias.php?id=<?php echo $noticias[2]['id']; ?>">
                <img src="<?php echo $noticias[2]['imagem']; ?>" alt="Notícia Principal 3">
            </a>
            <div id="txt3">
                <p><?php echo $noticias[2]['titulo']; ?></p>
            </div>
        </div>
    </div>
</div>
