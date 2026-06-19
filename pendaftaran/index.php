<?php

include '../config/koneksi.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Pendaftaran</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="wrapper">

    <?php include '../layout/sidebar.php'; ?>

    <div class="main-content">

        <?php include '../layout/header.php'; ?>

        <div class="content">

            <h2>Data Pendaftaran</h2>

            <a href="tambah.php" class="btn-tambah">
                + Tambah Pendaftaran
            </a>

            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Peserta</th>
                            <th>Event</th>
                            <th>Tanggal Daftar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    $no = 1;

                    $query = mysqli_query(
                        $conn,
                        "SELECT
                            p.*,
                            ps.nama_peserta,
                            e.nama_event
                        FROM pendaftaran p
                        JOIN peserta ps
                            ON p.id_peserta = ps.id_peserta
                        JOIN event e
                            ON p.id_event = e.id_event
                        ORDER BY p.id_pendaftaran DESC"
                    );

                    while($data = mysqli_fetch_assoc($query)){
                    ?>

                    <tr>

                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_peserta']; ?></td>
                        <td><?= $data['nama_event']; ?></td>
                        <td><?= $data['tanggal_daftar']; ?></td>
                        <td><?= $data['status_pendaftaran']; ?></td>

                        <td>

                            <a href="edit.php?id=<?= $data['id_pendaftaran']; ?>"
                               class="btn-edit">
                               Edit
                            </a>

                            <a href="hapus.php?id=<?= $data['id_pendaftaran']; ?>"
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