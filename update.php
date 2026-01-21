<?php
include 'koneksi.php';

$id = $_POST['id'];
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
sesak_napas='$sesak_napas'
WHERE id='$id'
");

header("Location: admin.php");
exit;
?>