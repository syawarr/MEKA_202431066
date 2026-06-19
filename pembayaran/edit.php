<?php

include '../config/koneksi.php';

$id = (int) $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM pembayaran
        WHERE id_pembayaran='$id'"
    )
);

if(isset($_POST['update']))
{
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $tanggal_bayar = $_POST['tanggal_bayar'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $status_verifikasi = $_POST['status_verifikasi'];

    $bukti_bayar = $data['bukti_bayar'];

    if(!empty($_FILES['bukti_bayar']['name']))
    {
        $bukti_bayar = $_FILES['bukti_bayar']['name'];

        move_uploaded_file(
            $_FILES['bukti_bayar']['tmp_name'],
            "../Upload/bukti/".$bukti_bayar
        );
    }

    mysqli_query(

        $conn,

        "UPDATE pembayaran

        SET

        id_pendaftaran='$id_pendaftaran',
        tanggal_bayar='$tanggal_bayar',
        jumlah_bayar='$jumlah_bayar',
        bukti_bayar='$bukti_bayar',
        status_verifikasi='$status_verifikasi'

        WHERE id_pembayaran='$id'"
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

    <title>Edit Pembayaran</title>

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

<h2>Edit Pembayaran</h2>

<form method="POST" enctype="multipart/form-data">

<div class="form-group">

<label>Pendaftaran</label>

<select name="id_pendaftaran">

<?php

$pendaftaran = mysqli_query(

$conn,

"SELECT
p.id_pendaftaran,
ps.nama_peserta,
e.nama_event

FROM pendaftaran p

JOIN peserta ps
ON p.id_peserta=ps.id_peserta

JOIN event e
ON p.id_event=e.id_event"
);

while($p=mysqli_fetch_assoc($pendaftaran)){

?>

<option
value="<?= $p['id_pendaftaran']; ?>"
<?= ($p['id_pendaftaran']==$data['id_pendaftaran']) ? 'selected' : ''; ?>>

<?= $p['nama_peserta']; ?> -
<?= $p['nama_event']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="form-group">
<label>Tanggal Bayar</label>

<input
type="date"
name="tanggal_bayar"
value="<?= $data['tanggal_bayar']; ?>"
required>
</div>

<div class="form-group">
<label>Jumlah Bayar</label>

<input
type="number"
name="jumlah_bayar"
value="<?= $data['jumlah_bayar']; ?>"
required>
</div>

<div class="form-group">

<label>Bukti Saat Ini</label>

<br><br>

<img
src="../Upload/bukti/<?= $data['bukti_bayar']; ?>"
width="120">

</div>

<div class="form-group">
<label>Ganti Bukti</label>
<input type="file" name="bukti_bayar">
</div>

<div class="form-group">

<label>Status Verifikasi</label>

<select name="status_verifikasi">

<option value="Pending"
<?= $data['status_verifikasi']=='Pending' ? 'selected' : ''; ?>>
Pending
</option>

<option value="Valid"
<?= $data['status_verifikasi']=='Valid' ? 'selected' : ''; ?>>
Valid
</option>

<option value="Tidak Valid"
<?= $data['status_verifikasi']=='Tidak Valid' ? 'selected' : ''; ?>>
Tidak Valid
</option>

</select>

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