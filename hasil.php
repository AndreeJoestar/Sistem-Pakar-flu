<?php
$hasil = $_GET['hasil'] ?? 'Tidak ada hasil';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Hasil Diagnosis</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #eef4ff, #f9fbff);
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Inter', sans-serif;
}

.card {
    background: white;
    width: 500px;
    padding: 40px;
    border-radius: 22px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    text-align: center;
    animation: fade 0.7s ease;
}

h2 {
    color: #2c3e50;
}

.result {
    margin: 25px 0;
    padding: 20px;
    border-radius: 16px;
    font-size: 22px;
    font-weight: 700;
}

.ringan { background: #e8f8f5; color: #16a085; }
.sedang { background: #fff3cd; color: #d68910; }
.berat  { background: #fdecea; color: #c0392b; }
.normal { background: #ecf0f1; color: #2c3e50; }

a {
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    padding: 12px 26px;
    background: #3498db;
    color: white;
    border-radius: 12px;
    font-weight: 600;
    transition: 0.25s;
}

a:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(52,152,219,0.4);
}

@keyframes fade {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>
</head>

<body>

<div class="card">
    <h2>🩺 Hasil Diagnosis</h2>

    <?php
    $class = 'normal';
    if (strpos($hasil, 'Ringan') !== false) $class = 'ringan';
    elseif (strpos($hasil, 'Sedang') !== false) $class = 'sedang';
    elseif (strpos($hasil, 'Berat') !== false)  $class = 'berat';
    ?>

    <div class="result <?= $class ?>">
        <?= htmlspecialchars($hasil) ?>
    </div>

    <a href="index.php">🔁 Diagnosis Ulang</a>
    <br><br>
    <a href="home.php" style="background:#2ecc71">🏠 Home</a>
</div>

</body>
</html>
