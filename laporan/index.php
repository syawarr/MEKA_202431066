<?php

include '../config/koneksi.php';

/* =========================
   CARD UTAMA
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

$total_pendapatan = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT SUM(jumlah_bayar) AS total
        FROM pembayaran
        WHERE status_verifikasi='Valid'"
    )
);

/* =========================
   INSIGHT
========================= */

$event_populer = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT
            e.nama_event,
            COUNT(p.id_pendaftaran) AS jumlah
        FROM event e
        LEFT JOIN pendaftaran p
            ON e.id_event = p.id_event
        GROUP BY e.id_event
        ORDER BY jumlah DESC
        LIMIT 1"
    )
);

$event_termahal = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT
            nama_event,
            biaya
        FROM event
        ORDER BY biaya DESC
        LIMIT 1"
    )
);

$valid = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT *
        FROM pembayaran
        WHERE status_verifikasi='Valid'"
    )
);

$pending = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT *
        FROM pembayaran
        WHERE status_verifikasi='Pending'"
    )
);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Laporan Dashboard</title>

    <link rel="stylesheet"
    href="../assets/style.css">

</head>

<body>

<div class="wrapper">

    <?php include '../layout/sidebar.php'; ?>

    <div class="main-content">

        <?php include '../layout/header.php'; ?>

        <div class="content">

            <h2 style="margin-bottom:20px;">
                Dashboard Laporan Event Kampus
            </h2>

            <!-- CARD UTAMA -->

            <div class="report-grid">

                <div class="report-card">
                    <h4>Total Event</h4>
                    <h2><?= $total_event; ?></h2>
                </div>

                <div class="report-card">
                    <h4>Total Peserta</h4>
                    <h2><?= $total_peserta; ?></h2>
                </div>

                <div class="report-card">
                    <h4>Total Pendaftaran</h4>
                    <h2><?= $total_pendaftaran; ?></h2>
                </div>

                <div class="report-card">
                    <h4>Total Pendapatan</h4>
                    <h2>
                        Rp <?= number_format($total_pendapatan['total'] ?? 0, 0, ',', '.'); ?>
                    </h2>
                </div>

            </div>

            <!-- INSIGHT -->

            <div class="report-grid">

                <div class="report-card">
                    <h4>Event Terpopuler</h4>
                    <p>
                        <?= $event_populer['nama_event'] ?? '-'; ?>
                    </p>
                </div>

                <div class="report-card">
                    <h4>Event Termahal</h4>
                    <p>
                        <?= $event_termahal['nama_event'] ?? '-'; ?>
                        <br>
                        Rp <?= number_format($event_termahal['biaya'] ?? 0, 0, ',', '.'); ?>
                    </p>
                </div>

                <div class="report-card">
                    <h4>Pembayaran Valid</h4>
                    <h2><?= $valid; ?></h2>
                </div>

                <div class="report-card">
                    <h4>Pembayaran Pending</h4>
                    <h2><?= $pending; ?></h2>
                </div>

            </div>

            <!-- TOP EVENT -->

            <div class="report-section">

                <h3>Top 5 Event Terpopuler</h3>

                <ul class="rank-list">

                <?php

                $top = mysqli_query(
                    $conn,
                    "SELECT
                        e.nama_event,
                        COUNT(p.id_pendaftaran) AS jumlah
                    FROM event e
                    LEFT JOIN pendaftaran p
                        ON e.id_event = p.id_event
                    GROUP BY e.id_event
                    ORDER BY jumlah DESC
                    LIMIT 5"
                );

                while($row = mysqli_fetch_assoc($top)){

                ?>

                    <li>
                        <strong><?= $row['nama_event']; ?></strong>
                        - <?= $row['jumlah']; ?> peserta
                    </li>

                <?php } ?>

                </ul>

            </div>

            <!-- PENDAPATAN PER EVENT -->

            <div class="report-section">

                <h3>Pendapatan Per Event</h3>

                <div class="table-container">

                <table class="report-table">

                    <thead>

                        <tr>
                            <th>Nama Event</th>
                            <th>Total Peserta</th>
                            <th>Biaya</th>
                            <th>Pendapatan</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    $query = mysqli_query(
                        $conn,
                        "SELECT
                            e.nama_event,
                            e.biaya,

                            COUNT(DISTINCT p.id_pendaftaran)
                            AS total_peserta,

                            SUM(pb.jumlah_bayar)
                            AS pendapatan

                        FROM event e

                        LEFT JOIN pendaftaran p
                            ON e.id_event = p.id_event

                        LEFT JOIN pembayaran pb
                            ON p.id_pendaftaran = pb.id_pendaftaran
                            AND pb.status_verifikasi='Valid'

                        GROUP BY e.id_event

                        ORDER BY pendapatan DESC"
                    );

                    while($data = mysqli_fetch_assoc($query)){

                    ?>

                    <tr>

                        <td><?= $data['nama_event']; ?></td>

                        <td><?= $data['total_peserta']; ?></td>

                        <td>
                            Rp <?= number_format($data['biaya'], 0, ',', '.'); ?>
                        </td>

                        <td>
                            Rp <?= number_format($data['pendapatan'] ?? 0, 0, ',', '.'); ?>
                        </td>

                    </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        <!-- STATISTIK PRODI -->

        <div class="report-section">

            <h3>Statistik Peserta Berdasarkan Program Studi</h3>

            <div class="table-container">

                <table class="report-table prodi-table">

                    <thead>
                        <tr>
                            <th>Program Studi</th>
                            <th>Jumlah Peserta</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                    $prodi = mysqli_query(
                        $conn,
                        "SELECT
                            prodi,
                            COUNT(*) AS jumlah
                        FROM peserta
                        GROUP BY prodi
                        ORDER BY jumlah DESC"
                    );

                    while($p = mysqli_fetch_assoc($prodi)){

                    ?>

                        <tr>
                            <td><?= $p['prodi']; ?></td>
                            <td><?= $p['jumlah']; ?></td>
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