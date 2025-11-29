<?php
require_once __DIR__ . '/data/data_handler.php';
$sessions = loadSessions();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PokéCare - Riwayat Latihan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">

    <h1>Riwayat Latihan Pokémon</h1>

    <div class="nav">
        <a href="index.php">Beranda</a>
        <a href="latihan.php">Latihan</a>
        <a href="history.php">Riwayat</a>
    </div>

    <div class="card">
        <h2>Daftar Riwayat</h2>

        <?php if (empty($sessions)): ?>
            <p>Belum ada latihan yang tersimpan.</p>

        <?php else: ?>
            <table>
                <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Pokémon</th>
                    <th>Latihan</th>
                    <th>Intensitas</th>
                    <th>Level</th>
                    <th>HP</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach(array_reverse($sessions) as $s): ?>
                    <tr>
                        <td><?= $s['timestamp'] ?></td>
                        <td><?= $s['pokemon'] ?> (<?= $s['type'] ?>)</td>
                        <td><?= $s['training_type'] ?></td>
                        <td><?= $s['intensity'] ?></td>
                        <td><?= $s['level_before'] ?> → <?= $s['level_after'] ?></td>
                        <td><?= $s['hp_before'] ?> → <?= $s['hp_after'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</div>
</body>
</html>
