<?php

include '../config/koneksi.php';

if(isset($_POST['simpan']))
{
    $id_peserta = $_POST['id_peserta'];
    $id_event = $_POST['id_event'];
    $tanggal_daftar = $_POST['tanggal_daftar'];
    $status_pendaftaran = $_POST['status_pendaftaran'];

    mysqli_query(
        $conn,

        "INSERT INTO pendaftaran
        (
            id_peserta,
            id_event,
            tanggal_daftar,
            status_pendaftaran
        )

        VALUES
        (
            '$id_peserta',
            '$id_event',
            '$tanggal_daftar',
            '$status_pendaftaran'
        )"
    );

    header("Location:index.php");
    exit;
}

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Tambah Pembayaran</title>

    <link rel="stylesheet"
    href="../assets/style.css">

</head>

<body>

<div class="wrapper">

<?php include '../layout/sidebar.php'; ?>

<div class="main-content">

<?php include '../layout/header.php'; ?>

<div class="content">

<div class="form-container">

<h2>Tambah Pendaftaran</h2>

<form method="POST">

<div class="form-group">

<label>Peserta</label>

<select name="id_peserta" required>

<option value="">-- Pilih Peserta --</option>

<?php

$peserta = mysqli_query(
    $conn,
    "SELECT * FROM peserta
    ORDER BY nama_peserta"
);

while($p = mysqli_fetch_assoc($peserta)){
?>

<option value="<?= $p['id_peserta']; ?>">
<?= $p['nama_peserta']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="form-group">

<label>Event</label>

<select name="id_event" required>

<option value="">-- Pilih Event --</option>

<?php

$event = mysqli_query(
    $conn,
    "SELECT * FROM event
    ORDER BY nama_event"
);

while($e = mysqli_fetch_assoc($event)){
?>

<option value="<?= $e['id_event']; ?>">
<?= $e['nama_event']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="form-group">

<label>Tanggal Daftar</label>

<input
type="date"
name="tanggal_daftar"
required>

</div>

<div class="form-group">

<label>Status Pendaftaran</label>

<select name="status_pendaftaran" required>

<option value="Menunggu">Menunggu</option>
<option value="Diterima">Diterima</option>
<option value="Ditolak">Ditolak</option>

</select>

</div>

<div class="form-action">

<button
type="submit"
name="simpan">
Simpan
</button>

<a href="index.php"
class="btn-kembali">
Kembali
</a>

</div>

</form>

</div>

</div>

</div>

</div>

</body>

</html>