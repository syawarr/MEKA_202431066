<?php

include '../config/koneksi.php';

$query = mysqli_query(

    $conn,

    "SELECT

    e.*,
    u.nama,
    k.nama_kategori

    FROM event e

    JOIN users u
    ON e.id_user = u.id_user

    JOIN kategori_event k
    ON e.id_kategori = k.id_kategori

    ORDER BY e.id_event DESC"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Data Event</title>

    <link rel="stylesheet"
    href="../assets/style.css">

</head>

<body>

<div class="wrapper">

    <?php include '../layout/sidebar.php'; ?>

    <div class="main-content">

        <?php include '../layout/header.php'; ?>

        <div class="content">

            <h2>Data Event</h2>

            <a href="tambah.php" class="btn-tambah">
                + Tambah Event
            </a>

            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Poster</th>
                            <th>Nama Event</th>
                            <th>Kategori</th>
                            <th>Pembuat</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Kuota</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    $no = 1;

                    while($data = mysqli_fetch_assoc($query)){

                    ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td>

                            <img
                            src="../uploads/poster/<?= $data['poster']; ?>"
                            style="
                                width:70px;
                                height:70px;
                                object-fit:cover;
                                border-radius:8px;
                            ">

                        </td>

                        <td><?= $data['nama_event']; ?></td>
                        <td><?= $data['nama_kategori']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['tanggal_event']; ?></td>
                        <td><?= $data['lokasi']; ?></td>
                        <td><?= $data['kuota']; ?></td>

                        <td>
                            Rp <?= number_format($data['biaya']); ?>
                        </td>

                        <td>

                            <a
                            href="edit.php?id=<?= $data['id_event']; ?>"
                            class="btn-edit">
                                Edit
                            </a>

                            <a
                            href="hapus.php?id=<?= $data['id_event']; ?>"
                            class="btn-hapus"
                            onclick="return confirm('Yakin ingin menghapus event ini?')">
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