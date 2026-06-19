<?php

include '../config/koneksi.php';

if(isset($_POST['simpan']))
{
    $nama = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query(

        $conn,

        "INSERT INTO kategori_event
        (
            nama_kategori,
            deskripsi
        )

        VALUES

        (
            '$nama',
            '$deskripsi'
        )"
    );

    header("Location:index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Kategori Event</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="wrapper">

    <?php include '../layout/sidebar.php'; ?>

    <div class="main-content">

        <?php include '../layout/header.php'; ?>

        <div class="content">

            <div class="form-container">

                <h2>Tambah Kategori Event</h2>

                <form method="POST">

                    <div class="form-group">

                        <label>Nama Kategori</label>

                        <input
                        type="text"
                        name="nama_kategori"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea
                        name="deskripsi"
                        rows="5"
                        required></textarea>

                    </div>

                    <button
                    type="submit"
                    name="simpan">
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