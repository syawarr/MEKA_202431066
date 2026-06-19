<?php

include '../config/koneksi.php';

if(isset($_POST['simpan']))
{
    $id_user = $_POST['id_user'];
    $id_kategori = $_POST['id_kategori'];
    $nama_event = $_POST['nama_event'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_event = $_POST['tanggal_event'];
    $lokasi = $_POST['lokasi'];
    $kuota = $_POST['kuota'];
    $biaya = $_POST['biaya'];

    $poster = $_FILES['poster']['name'];

    if(move_uploaded_file(
        $_FILES['poster']['tmp_name'],
        "../uploads/poster/".$poster
    )){

        mysqli_query(
            $conn,

            "INSERT INTO event
            (
                id_user,
                id_kategori,
                nama_event,
                deskripsi,
                tanggal_event,
                lokasi,
                kuota,
                poster,
                biaya
            )

            VALUES
            (
                '$id_user',
                '$id_kategori',
                '$nama_event',
                '$deskripsi',
                '$tanggal_event',
                '$lokasi',
                '$kuota',
                '$poster',
                '$biaya'
            )"
        );

    }else{

        die("Upload gambar gagal");

    }

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

<h2>Tambah Event</h2>

<form method="POST" enctype="multipart/form-data">

<div class="form-group">

<label>Pembuat Event</label>

<select name="id_user" required>

<option value="">-- Pilih User --</option>

<?php

$user = mysqli_query($conn,"SELECT * FROM users");

while($u = mysqli_fetch_assoc($user)){

?>

<option value="<?= $u['id_user']; ?>">
<?= $u['nama']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="form-group">

<label>Kategori Event</label>

<select name="id_kategori" required>

<option value="">-- Pilih Kategori --</option>

<?php

$kategori = mysqli_query(
    $conn,
    "SELECT * FROM kategori_event"
);

while($k = mysqli_fetch_assoc($kategori)){

?>

<option value="<?= $k['id_kategori']; ?>">
<?= $k['nama_kategori']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="form-group">
<label>Nama Event</label>
<input type="text" name="nama_event" required>
</div>

<div class="form-group">
<label>Deskripsi</label>
<textarea name="deskripsi" rows="5" required></textarea>
</div>

<div class="form-group">
<label>Tanggal Event</label>
<input type="date" name="tanggal_event" required>
</div>

<div class="form-group">
<label>Lokasi</label>
<input type="text" name="lokasi" required>
</div>

<div class="form-group">
<label>Kuota</label>
<input type="number" name="kuota" required>
</div>

<div class="form-group">
<label>Biaya</label>
<input type="number" name="biaya" required>
</div>

<div class="form-group">
<label>Poster</label>
<input type="file" name="poster" required>
</div>

<button type="submit" name="simpan">
Simpan
</button>

<a href="index.php" class="btn-kembali">
Kembali
</a>

</form>

</div>

</div>

</div>

</div>

</body>

</html>