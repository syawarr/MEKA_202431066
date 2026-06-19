<?php

include '../config/koneksi.php';

$id = (int) $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM peserta
        WHERE id_peserta='$id'"
    )
);

if(isset($_POST['update']))
{
    $nama_peserta = $_POST['nama_peserta'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    mysqli_query(
        $conn,

        "UPDATE peserta SET

        nama_peserta='$nama_peserta',
        nim='$nim',
        prodi='$prodi',
        email='$email',
        no_hp='$no_hp'

        WHERE id_peserta='$id'"
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

    <title>Edit Peserta</title>

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

<h2>Edit Peserta</h2>

<form method="POST">

<div class="form-group">
<label>Nama Peserta</label>
<input
type="text"
name="nama_peserta"
value="<?= $data['nama_peserta']; ?>"
required>
</div>

<div class="form-group">
<label>NIM</label>
<input
type="text"
name="nim"
value="<?= $data['nim']; ?>"
required>
</div>

<div class="form-group">
<label>Prodi</label>
<input
type="text"
name="prodi"
value="<?= $data['prodi']; ?>"
required>
</div>

<div class="form-group">
<label>Email</label>
<input
type="email"
name="email"
value="<?= $data['email']; ?>"
required>
</div>

<div class="form-group">
<label>No HP</label>
<input
type="text"
name="no_hp"
value="<?= $data['no_hp']; ?>"
required>
</div>

<div class="form-action">

<button
type="submit"
name="update">
Update
</button>

<a href="index.php" class="btn-kembali">
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