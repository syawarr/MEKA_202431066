<?php

include '../config/koneksi.php';

$id = (int) $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM event
        WHERE id_event='$id'"
    )
);

if(isset($_POST['update']))
{
    $id_user = $_POST['id_user'];
    $id_kategori = $_POST['id_kategori'];
    $nama_event = $_POST['nama_event'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_event = $_POST['tanggal_event'];
    $lokasi = $_POST['lokasi'];
    $kuota = $_POST['kuota'];
    $biaya = $_POST['biaya'];

    $poster = $data['poster'];

    if(!empty($_FILES['poster']['name']))
    {
        $poster = $_FILES['poster']['name'];

        move_uploaded_file(
            $_FILES['poster']['tmp_name'],
            "../Upload/poster/".$poster
        );
    }

    mysqli_query(
        $conn,

        "UPDATE event SET

        id_user='$id_user',
        id_kategori='$id_kategori',
        nama_event='$nama_event',
        deskripsi='$deskripsi',
        tanggal_event='$tanggal_event',
        lokasi='$lokasi',
        kuota='$kuota',
        poster='$poster',
        biaya='$biaya'

        WHERE id_event='$id'"
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

    <title>Edit Event</title>

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

<h2>Edit Event</h2>

<form method="POST" enctype="multipart/form-data">

<div class="form-group">

<label>Pembuat Event</label>

<select name="id_user">

<?php

$user = mysqli_query($conn,"SELECT * FROM users");

while($u = mysqli_fetch_assoc($user)){

?>

<option
value="<?= $u['id_user']; ?>"
<?= ($u['id_user']==$data['id_user']) ? 'selected' : ''; ?>>

<?= $u['nama']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="form-group">

<label>Kategori Event</label>

<select name="id_kategori">

<?php

$kategori = mysqli_query(
    $conn,
    "SELECT * FROM kategori_event"
);

while($k = mysqli_fetch_assoc($kategori)){

?>

<option
value="<?= $k['id_kategori']; ?>"
<?= ($k['id_kategori']==$data['id_kategori']) ? 'selected' : ''; ?>>

<?= $k['nama_kategori']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="form-group">
<label>Nama Event</label>
<input type="text" name="nama_event" value="<?= $data['nama_event']; ?>" required>
</div>

<div class="form-group">
<label>Deskripsi</label>
<textarea name="deskripsi" rows="5" required><?= $data['deskripsi']; ?></textarea>
</div>

<div class="form-group">
<label>Tanggal Event</label>
<input type="date" name="tanggal_event" value="<?= $data['tanggal_event']; ?>" required>
</div>

<div class="form-group">
<label>Lokasi</label>
<input type="text" name="lokasi" value="<?= $data['lokasi']; ?>" required>
</div>

<div class="form-group">
<label>Kuota</label>
<input type="number" name="kuota" value="<?= $data['kuota']; ?>" required>
</div>

<div class="form-group">
<label>Biaya</label>
<input type="number" name="biaya" value="<?= $data['biaya']; ?>" required>
</div>

<div class="form-group">

<label>Poster Saat Ini</label>

<br><br>

<img
src="../Upload/poster/<?= $data['poster']; ?>"
width="120">

</div>

<div class="form-group">

<label>Ganti Poster</label>

<input type="file" name="poster">

</div>

<button type="submit" name="update">
Update
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