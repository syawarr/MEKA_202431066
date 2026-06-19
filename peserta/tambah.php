<?php

include '../config/koneksi.php';

if(isset($_POST['simpan']))
{
    $nama_peserta = $_POST['nama_peserta'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    mysqli_query(
        $conn,

        "INSERT INTO peserta
        (
            nama_peserta,
            nim,
            prodi,
            email,
            no_hp
        )

        VALUES
        (
            '$nama_peserta',
            '$nim',
            '$prodi',
            '$email',
            '$no_hp'
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

    <title>Tambah Event</title>

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

<h2>Tambah Peserta</h2>

<form method="POST">

<div class="form-group">
<label>Nama Peserta</label>
<input type="text" name="nama_peserta" required>
</div>

<div class="form-group">
<label>NIM</label>
<input type="text" name="nim" required>
</div>

<div class="form-group">
<label>Prodi</label>
<input type="text" name="prodi" required>
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="form-group">
<label>No HP</label>
<input type="text" name="no_hp" required>
</div>

<div class="form-action">

<button type="submit" name="simpan">
Simpan
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