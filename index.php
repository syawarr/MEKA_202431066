<?php

include 'config/koneksi.php';

/* =========================
   STATISTIK DASHBOARD
========================= */

$total_event = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM event")
);

$total_peserta = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM peserta")
);

$total_pendaftaran = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM pendaftaran")
);

$total_pembayaran_valid = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT *
        FROM pembayaran
        WHERE status_verifikasi='Valid'"
    )
);

$pendapatan = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT SUM(jumlah_bayar) AS total
        FROM pembayaran
        WHERE status_verifikasi='Valid'"
    )
);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIMEKA - Sistem Manajemen Event Kampus</title>

    <link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="wrapper">

    <?php include 'layout/sidebar.php'; ?>

    <div class="main-content">

        <?php include 'layout/header.php'; ?>

        <div class="content">

            <!-- CARD STATISTIK -->

            <div class="cards">

                <div class="card">
                    <h3>Total Event</h3>
                    <p><?= $total_event; ?></p>
                </div>

                <div class="card">
                    <h3>Total Peserta</h3>
                    <p><?= $total_peserta; ?></p>
                </div>

                <div class="card">
                    <h3>Total Pendaftaran</h3>
                    <p><?= $total_pendaftaran; ?></p>
                </div>

                <div class="card">
                    <h3>Pembayaran Valid</h3>
                    <p><?= $total_pembayaran_valid; ?></p>
                </div>

                <div class="card">
                    <h3>Total Pendapatan</h3>
                    <p>
                        Rp <?= number_format($pendapatan['total'] ?? 0); ?>
                    </p>
                </div>

            </div>

            <!-- EVENT TERBARU -->

            <div class="table-container">

                <h2>Event Terbaru</h2>

                <table>

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama Event</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    $no = 1;

                    $event = mysqli_query(

                        $conn,

                        "SELECT

                        e.nama_event,
                        e.tanggal_event,
                        e.lokasi,

                        k.nama_kategori

                        FROM event e

                        JOIN kategori_event k
                        ON e.id_kategori = k.id_kategori

                        ORDER BY e.id_event DESC

                        LIMIT 5"
                    );

                    while($row = mysqli_fetch_assoc($event)){

                    ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $row['nama_event']; ?></td>

                        <td><?= $row['nama_kategori']; ?></td>

                        <td><?= $row['tanggal_event']; ?></td>

                        <td><?= $row['lokasi']; ?></td>

                    </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

            <br>

            <!-- PEMBAYARAN PENDING -->

            <div class="table-container">

                <h2>Pembayaran Pending</h2>

                <table>

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Peserta</th>
                            <th>Jumlah Bayar</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    $no = 1;

                    $pending = mysqli_query(

                        $conn,

                        "SELECT

                        ps.nama_peserta,
                        pb.jumlah_bayar,
                        pb.status_verifikasi

                        FROM pembayaran pb

                        JOIN pendaftaran pd
                        ON pb.id_pendaftaran = pd.id_pendaftaran

                        JOIN peserta ps
                        ON pd.id_peserta = ps.id_peserta

                        WHERE pb.status_verifikasi='Pending'"
                    );

                    while($row = mysqli_fetch_assoc($pending)){

                    ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $row['nama_peserta']; ?></td>

                        <td>
                            Rp <?= number_format($row['jumlah_bayar']); ?>
                        </td>

                        <td><?= $row['status_verifikasi']; ?></td>

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