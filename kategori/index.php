<?php

include '../config/koneksi.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Kategori Event</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="wrapper">

    <?php include '../layout/sidebar.php'; ?>

    <div class="main-content">

        <?php include '../layout/header.php'; ?>

        <div class="content">

            <h2>Data Kategori Event</h2>

            <a href="tambah.php" class="btn-tambah">
                + Tambah Kategori
            </a>

            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    $no = 1;

                    $query = mysqli_query(
                        $conn,
                        "SELECT * FROM kategori_event ORDER BY id_kategori DESC"
                    );

                    while($data = mysqli_fetch_assoc($query)){

                    ?>

                    <tr>

                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_kategori']; ?></td>
                        <td><?= $data['deskripsi']; ?></td>

                        <td>

                            <a href="edit.php?id=<?= $data['id_kategori']; ?>" class="btn-edit">
                                Edit
                            </a>

                            <a href="hapus.php?id=<?= $data['id_kategori']; ?>"
                               class="btn-hapus"
                               onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                Hapus
                            </a>

                        </td>

                    </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>

</html>