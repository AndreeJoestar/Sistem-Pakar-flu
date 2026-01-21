<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM diagnosis ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin - Data Diagnosis</title>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f4f7fb;
}

/* HEADER */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 40px;
    background: #f8fbff;
}

.header h2 {
    margin: 0;
    color: #2c3e50;
}

.home-btn {
    background: #3498db;
    color: white;
    padding: 10px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
}

/* CARD */
.card {
    background: white;
    margin: 20px 40px;
    padding: 20px;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #3498db;
    color: white;
}

th, td {
    padding: 14px;
    text-align: center;
}

tbody tr {
    border-bottom: 1px solid #eee;
}

tbody tr:hover {
    background: #f9fcff;
}

/* BADGE HASIL */
.badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: bold;
}

.badge.no {
    background: #fdecea;
    color: #c0392b;
}

/* AKSI BUTTON */
.aksi-btn {
    display: flex;
    gap: 8px;
    justify-content: center;
}

.btn-edit {
    background: #f1c40f;
    color: black;
    padding: 6px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
    font-weight: bold;
}

.btn-hapus {
    background: #e74c3c;
    color: white;
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 13px;
    font-weight: bold;
}

/* MODAL */
.modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.4);
    align-items: center;
    justify-content: center;
}

.modal-box {
    background: white;
    width: 360px;
    padding: 30px;
    border-radius: 16px;
    text-align: center;
    animation: zoom .2s ease;
}

@keyframes zoom {
    from { transform: scale(.8); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.modal-box h3 {
    margin-top: 10px;
    color: #2c3e50;
}

.modal-box p {
    color: #7f8c8d;
}

.modal-actions {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 10px;
}

.btn-cancel {
    background: #95a5a6;
    color: white;
    padding: 8px 16px;
    border-radius: 8px;
    border: none;
}

.btn-confirm {
    background: #e74c3c;
    color: white;
    padding: 8px 16px;
    border-radius: 8px;
    border: none;
}
</style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <h2>📊 Data Diagnosis Pasien</h2>
    <a href="home.php" class="home-btn">🏠 Home</a>
</div>

<!-- CARD -->
<div class="card">
<table>
<thead>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Suhu</th>
    <th>Umur</th>
    <th>Lama Demam</th>
    <th>Gejala</th>
    <th>Hasil</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php
$no = 1;
while ($row = mysqli_fetch_assoc($data)) {

    $gejala = [];
    if ($row['demam']) $gejala[] = 'Demam';
    if ($row['batuk']) $gejala[] = 'Batuk';
    if ($row['pilek']) $gejala[] = 'Pilek';
    if ($row['tenggorokan']) $gejala[] = 'Tenggorokan';
    if ($row['nyeri_otot']) $gejala[] = 'Nyeri Otot';
    if ($row['sesak_napas']) $gejala[] = 'Sesak Napas';

    $listGejala = $gejala ? implode(', ', $gejala) : '-';
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($row['nama']) ?></td>
    <td><?= $row['suhu'] ?>°C</td>
    <td><?= $row['umur'] ?></td>
    <td><?= $row['lama_demam'] ?> hari</td>
    <td><?= $listGejala ?></td>
    <td><span class="badge no"><?= $row['hasil_diagnosis'] ?></span></td>
    <td><?= $row['tanggal'] ?></td>
    <td>
        <div class="aksi-btn">
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
            <button class="btn-hapus" onclick="openModal('delete.php?id=<?= $row['id'] ?>')">Hapus</button>
        </div>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

<!-- MODAL -->
<div class="modal" id="modalHapus">
    <div class="modal-box">
        <h3>⚠️ Konfirmasi Hapus</h3>
        <p>Data diagnosis akan dihapus permanen</p>
        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeModal()">Batal</button>
            <a id="linkDelete" class="btn-confirm">Ya, Hapus</a>
        </div>
    </div>
</div>

<script>
function openModal(link) {
    document.getElementById('linkDelete').href = link;
    document.getElementById('modalHapus').style.display = 'flex';
}
function closeModal() {
    document.getElementById('modalHapus').style.display = 'none';
}
</script>

</body>
</html>
