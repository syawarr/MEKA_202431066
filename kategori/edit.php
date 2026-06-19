<?php

include '../config/koneksi.php';

$id = (int) $_GET['id'];

$data = mysqli_fetch_assoc(

    mysqli_query(

        $conn,

        "SELECT *
        FROM kategori_event
        WHERE id_kategori='$id'"
    )
);

if(isset($_POST['update']))
{
    $nama = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query(

        $conn,

        "UPDATE kategori_event

        SET

        nama_kategori='$nama',
        deskripsi='$deskripsi'

        WHERE id_kategori='$id'"
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

    <title>Edit Kategori Event</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="wrapper">

    <?php include '../layout/sidebar.php'; ?>

    <div class="main-content">

        <?php include '../layout/header.php'; ?>

        <div class="content">

            <div class="form-container">

                <h2>Edit Kategori Event</h2>

                <form method="POST">

                    <div class="form-group">

                        <label>Nama Kategori</label>

                        <input
                        type="text"
                        name="nama_kategori"
                        value="<?= $data['nama_kategori']; ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea
                        name="deskripsi"
                        rows="5"
                        required><?= $data['deskripsi']; ?></textarea>

                    </div>

                    <button
                    type="submit"
                    name="update">
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