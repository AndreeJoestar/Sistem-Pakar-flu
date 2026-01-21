<?php
include 'koneksi.php';

// Ambil input
$nama = $_POST['nama'];   // 🔥 INI YANG KEMARIN HILANG
$suhu = $_POST['suhu'];
$umur = $_POST['umur'];
$lama_demam = $_POST['lama_demam'];

$demam = isset($_POST['demam']) ? 1 : 0;
$batuk = isset($_POST['batuk']) ? 1 : 0;
$pilek = isset($_POST['pilek']) ? 1 : 0;
$tenggorokan = isset($_POST['tenggorokan']) ? 1 : 0;
$nyeri_otot = isset($_POST['nyeri_otot']) ? 1 : 0;
$sesak_napas = isset($_POST['sesak_napas']) ? 1 : 0;

// Default hasil
$hasil = "Tidak terdiagnosis Flu";

// 🔥 FORWARD CHAINING
if ($suhu >= 38 && $batuk && $pilek && $sesak_napas) {
    $hasil = "Flu Berat";
} elseif ($suhu >= 38 && $batuk && $pilek && $lama_demam >= 3) {
    $hasil = "Flu Sedang";
} elseif ($suhu >= 38 && $batuk && $pilek) {
    $hasil = "Flu Ringan";
}

// 🔥 QUERY INSERT YANG BENAR (ADA NAMA)
$query = "
INSERT INTO diagnosis 
(nama, suhu, demam, batuk, pilek, tenggorokan, nyeri_otot, sesak_napas, lama_demam, umur, hasil_diagnosis, tanggal)
VALUES
('$nama','$suhu','$demam','$batuk','$pilek','$tenggorokan','$nyeri_otot','$sesak_napas','$lama_demam','$umur','$hasil', NOW())
";

mysqli_query($koneksi, $query);

// Redirect ke hasil
header("Location: hasil.php?hasil=$hasil");
exit;
?>