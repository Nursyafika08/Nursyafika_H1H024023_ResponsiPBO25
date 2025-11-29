<?php
require_once __DIR__ . '/classes/FairyPokemon.php';

$pokemon = new FairyPokemon("Jigglypuff", "Fairy", 1, 50);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PokéCare - Beranda</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">

    <h1>PokéCare - Beranda</h1>

    <div class="nav">
        <a href="index.php">Beranda</a>
        <a href="latihan.php">Latihan</a>
        <a href="history.php">Riwayat Latihan</a>
    </div>

    <div class="card">
        <h2>Informasi Pokémon</h2>

        <p><strong>Nama:</strong> <?php echo $pokemon->getName(); ?></p>
        <p><strong>Tipe:</strong> <?php echo $pokemon->getType(); ?></p>
        <p><strong>Level:</strong> <?php echo $pokemon->getLevel(); ?></p>
        <p><strong>HP:</strong> <?php echo $pokemon->getHp(); ?></p>

        <p><strong>Jurus Spesial:</strong> <br>
            <?php echo $pokemon->specialMove(); ?>
        </p>
    </div>

    <p>Gunakan menu di atas untuk melakukan latihan dan melihat riwayat latihan.</p>

</div>
</body>
</html>
