<?php
require_once __DIR__ . '/classes/FairyPokemon.php';
require_once __DIR__ . '/data/data_handler.php';

$pokemon = new FairyPokemon("Jigglypuff", "Fairy", 1, 50);

$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trainingType = $_POST['training_type'];
    $intensity = (int)$_POST['intensity'];

      $res = $pokemon->train($trainingType, $intensity);

        $entry = [
        'pokemon' => $pokemon->getName(),
        'type' => $pokemon->getType(),
        'training_type' => $trainingType,
        'intensity' => $intensity,
        'level_before' => $res['before']['level'],
        'level_after' => $res['after']['level'],
        'hp_before' => $res['before']['hp'],
        'hp_after' => $res['after']['hp'],
        'special_move_desc' => $res['special'],
        'timestamp' => date('Y-m-d H:i:s')
    ];

    saveSession($entry);
    $result = $entry;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PokéCare - Latihan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">

    <h1>Latihan Pokémon</h1>

    <div class="nav">
        <a href="index.php">Beranda</a>
        <a href="latihan.php">Latihan</a>
        <a href="history.php">Riwayat</a>
    </div>

    <div class="card">
        <form method="POST">
            <label>Jenis Latihan:</label><br>
            <select name="training_type" required>
                <option value="attack">Attack</option>
                <option value="defense">Defense</option>
                <option value="speed">Speed</option>
            </select>
            <br><br>

            <label>Intensitas (1-20):</label><br>
            <input type="number" name="intensity" min="1" max="20" value="5" required>
            <br><br>

            <button type="submit">Mulai Latihan</button>
        </form>
    </div>

    <?php if ($result): ?>
        <div class="card">
            <h2>Hasil Latihan</h2>
            <p><strong>Pokémon:</strong> <?= $result['pokemon'] ?></p>
            <p><strong>Jenis Latihan:</strong> <?= $result['training_type'] ?></p>
            <p><strong>Intensitas:</strong> <?= $result['intensity'] ?></p>

            <p><strong>Level:</strong> <?= $result['level_before'] ?> → <?= $result['level_after'] ?></p>
            <p><strong>HP:</strong> <?= $result['hp_before'] ?> → <?= $result['hp_after'] ?></p>

            <p><strong>Jurus Spesial:</strong><br><?= $result['special_move_desc'] ?></p>

            <p><em>Waktu:</em> <?= $result['timestamp'] ?></p>
        </div>
    <?php endif; ?>

</div>
</body>
</html>
