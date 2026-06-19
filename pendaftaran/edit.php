<?php

include '../config/koneksi.php';

$id = (int) $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM pendaftaran
        WHERE id_pendaftaran='$id'"
    )
);

if(isset($_POST['update']))
{
    $id_peserta = $_POST['id_peserta'];
    $id_event = $_POST['id_event'];
    $tanggal_daftar = $_POST['tanggal_daftar'];
    $status_pendaftaran = $_POST['status_pendaftaran'];

    mysqli_query(
        $conn,

        "UPDATE pendaftaran SET

        id_peserta='$id_peserta',
        id_event='$id_event',
        tanggal_daftar='$tanggal_daftar',
        status_pendaftaran='$status_pendaftaran'

        WHERE id_pendaftaran='$id'"
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

    <title>Edit Pendaftaran</title>

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

<h2>Edit Pendaftaran</h2>

<form method="POST">

<div class="form-group">

<label>Peserta</label>

<select name="id_peserta" required>

<?php

$peserta = mysqli_query(
    $conn,
    "SELECT * FROM peserta
    ORDER BY nama_peserta"
);

while($p = mysqli_fetch_assoc($peserta)){
?>

<option
value="<?= $p['id_peserta']; ?>"
<?= ($p['id_peserta'] == $data['id_peserta']) ? 'selected' : ''; ?>>

<?= $p['nama_peserta']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="form-group">

<label>Event</label>

<select name="id_event" required>

<?php

$event = mysqli_query(
    $conn,
    "SELECT * FROM event
    ORDER BY nama_event"
);

while($e = mysqli_fetch_assoc($event)){
?>

<option
value="<?= $e['id_event']; ?>"
<?= ($e['id_event'] == $data['id_event']) ? 'selected' : ''; ?>>

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
value="<?= $data['tanggal_daftar']; ?>"
required>

</div>

<div class="form-group">

<label>Status Pendaftaran</label>

<select name="status_pendaftaran">

<option value="Menunggu"
<?= $data['status_pendaftaran']=='Menunggu' ? 'selected' : ''; ?>>
Menunggu
</option>

<option value="Diterima"
<?= $data['status_pendaftaran']=='Diterima' ? 'selected' : ''; ?>>
Diterima
</option>

<option value="Ditolak"
<?= $data['status_pendaftaran']=='Ditolak' ? 'selected' : ''; ?>>
Ditolak
</option>

</select>

</div>

<div class="form-action">

<button
type="submit"
name="update">
Update
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