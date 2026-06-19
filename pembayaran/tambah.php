<?php

include '../config/koneksi.php';

if(isset($_POST['simpan']))
{
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $tanggal_bayar = $_POST['tanggal_bayar'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $status_verifikasi = $_POST['status_verifikasi'];

    $bukti_bayar = $_FILES['bukti_bayar']['name'];

    if(!move_uploaded_file(
        $_FILES['bukti_bayar']['tmp_name'],
        "../uploads/bukti/".$bukti_bayar
    )){
        die("Upload bukti bayar gagal");
    }

    mysqli_query(

        $conn,

        "INSERT INTO pembayaran
        (
            id_pendaftaran,
            tanggal_bayar,
            jumlah_bayar,
            bukti_bayar,
            status_verifikasi
        )

        VALUES
        (
            '$id_pendaftaran',
            '$tanggal_bayar',
            '$jumlah_bayar',
            '$bukti_bayar',
            '$status_verifikasi'
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

        <h2>Tambah Pembayaran</h2>

        <form method="POST" enctype="multipart/form-data">

    <div class="form-group">

        <label>Pendaftaran</label>

        <select name="id_pendaftaran" required>

        <option value="">-- Pilih Pendaftaran --</option>

    <?php

    $pendaftaran = mysqli_query(

        $conn,

        "SELECT
        p.id_pendaftaran,
        ps.nama_peserta,
        e.nama_event

        FROM pendaftaran p

        JOIN peserta ps
        ON p.id_peserta = ps.id_peserta

        JOIN event e
        ON p.id_event = e.id_event

        WHERE p.id_pendaftaran NOT IN
        (
            SELECT id_pendaftaran
            FROM pembayaran
        )"
    );

    while($p=mysqli_fetch_assoc($pendaftaran)){

        ?>

        <option value="<?= $p['id_pendaftaran']; ?>">

        <?= $p['nama_peserta']; ?> -
        <?= $p['nama_event']; ?>

        </option>

        <?php } ?>

    </select>

        </div>

        <div class="form-group">
            <label>Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" required>
        </div>

        <div class="form-group">
            <label>Jumlah Bayar</label>
            <input type="number" name="jumlah_bayar" required>
        </div>

        <div class="form-group">
            <label>Bukti Bayar</label>
            <input type="file" name="bukti_bayar" required>
        </div>

        <div class="form-group">

        <label>Status Verifikasi</label>

    <select name="status_verifikasi">

        <option value="Pending">Pending</option>
        <option value="Valid">Valid</option>
        <option value="Tidak Valid">Tidak Valid</option>

    </select>

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