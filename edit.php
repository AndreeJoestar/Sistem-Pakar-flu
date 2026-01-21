<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM diagnosis WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $nama = $_POST['nama'];
    $suhu = $_POST['suhu'];
    $umur = $_POST['umur'];
    $lama_demam = $_POST['lama_demam'];

    $demam = isset($_POST['demam']) ? 1 : 0;
    $batuk = isset($_POST['batuk']) ? 1 : 0;
    $pilek = isset($_POST['pilek']) ? 1 : 0;
    $tenggorokan = isset($_POST['tenggorokan']) ? 1 : 0;
    $nyeri_otot = isset($_POST['nyeri_otot']) ? 1 : 0;
    $sesak_napas = isset($_POST['sesak_napas']) ? 1 : 0;

    // 🔥 HITUNG ULANG DIAGNOSIS
    $hasil = "Tidak terdiagnosis Flu";

    if ($suhu >= 38 && $batuk && $pilek && $sesak_napas) {
        $hasil = "Flu Berat";
    } elseif ($suhu >= 38 && $batuk && $pilek && $lama_demam >= 3) {
        $hasil = "Flu Sedang";
    } elseif ($suhu >= 38 && $batuk && $pilek) {
        $hasil = "Flu Ringan";
    }

    mysqli_query($koneksi, "
        UPDATE diagnosis SET
        nama='$nama',
        suhu='$suhu',
        umur='$umur',
        lama_demam='$lama_demam',
        demam='$demam',
        batuk='$batuk',
        pilek='$pilek',
        tenggorokan='$tenggorokan',
        nyeri_otot='$nyeri_otot',
        sesak_napas='$sesak_napas',
        hasil_diagnosis='$hasil'
        WHERE id='$id'
    ");

    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data Diagnosis</title>

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
    width: 520px;
    padding: 35px;
    border-radius: 22px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

h2 {
    margin-top: 0;
    text-align: center;
    color: #2c3e50;
}

label {
    font-weight: 600;
    margin-top: 12px;
    display: block;
}

input[type=text],
input[type=number] {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #ccc;
    margin-top: 6px;
}

.gejala {
    margin-top: 10px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 8px;
}

button {
    margin-top: 20px;
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 14px;
    background: #3498db;
    color: white;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(52,152,219,0.4);
}

.back {
    display: block;
    text-align: center;
    margin-top: 18px;
    text-decoration: none;
    color: #555;
    font-weight: 600;
}
</style>
</head>

<body>

<div class="card">
<h2>✏️ Edit Data Pasien</h2>

<form method="post">
    <label>Nama</label>
    <input type="text" name="nama" value="<?= $row['nama'] ?>" required>

    <label>Suhu (°C)</label>
    <input type="number" step="0.1" name="suhu" value="<?= $row['suhu'] ?>" required>

    <label>Umur</label>
    <input type="number" name="umur" value="<?= $row['umur'] ?>" required>

    <label>Lama Demam (hari)</label>
    <input type="number" name="lama_demam" value="<?= $row['lama_demam'] ?>" required>

    <label>Gejala</label>
    <div class="gejala">
        <label><input type="checkbox" name="demam" <?= $row['demam'] ? 'checked' : '' ?>> Demam</label>
        <label><input type="checkbox" name="batuk" <?= $row['batuk'] ? 'checked' : '' ?>> Batuk</label>
        <label><input type="checkbox" name="pilek" <?= $row['pilek'] ? 'checked' : '' ?>> Pilek</label>
        <label><input type="checkbox" name="tenggorokan" <?= $row['tenggorokan'] ? 'checked' : '' ?>> Tenggorokan</label>
        <label><input type="checkbox" name="nyeri_otot" <?= $row['nyeri_otot'] ? 'checked' : '' ?>> Nyeri Otot</label>
        <label><input type="checkbox" name="sesak_napas" <?= $row['sesak_napas'] ? 'checked' : '' ?>> Sesak Napas</label>
    </div>

    <button type="submit" name="update">💾 Update Data</button>
</form>

<a class="back" href="admin.php">← Kembali ke Admin</a>
</div>

</body>
</html>
