<?php

include '../config/koneksi.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Peserta</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="wrapper">

    <?php include '../layout/sidebar.php'; ?>

    <div class="main-content">

        <?php include '../layout/header.php'; ?>

        <div class="content">

            <h2>Data Peserta</h2>

            <a href="tambah.php" class="btn-tambah">
                + Tambah Peserta
            </a>

            <div class="table-container">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>NIM</th>
                            <th>Prodi</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                    $no = 1;

                    $query = mysqli_query(
                        $conn,
                        "SELECT * FROM peserta
                        ORDER BY id_peserta DESC"
                    );

                    while($data = mysqli_fetch_assoc($query)){
                    ?>

                    <tr>

                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_peserta']; ?></td>
                        <td><?= $data['nim']; ?></td>
                        <td><?= $data['prodi']; ?></td>
                        <td><?= $data['email']; ?></td>
                        <td><?= $data['no_hp']; ?></td>

                        <td>

                            <a href="edit.php?id=<?= $data['id_peserta']; ?>"
                               class="btn-edit">
                               Edit
                            </a>

                            <a href="hapus.php?id=<?= $data['id_peserta']; ?>"
                               class="btn-hapus"
                               onclick="return confirm('Yakin ingin menghapus?')">
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