<?php

include '../config/koneksi.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pembayaran</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="wrapper">

    <?php include '../layout/sidebar.php'; ?>

    <div class="main-content">

        <?php include '../layout/header.php'; ?>

        <div class="content">

            <h2>Data Pembayaran</h2>

            <a href="tambah.php" class="btn-tambah">
                + Tambah Pembayaran
            </a>

            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Peserta</th>
                            <th>Event</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah Bayar</th>
                            <th>Bukti Bayar</th>
                            <th>Status Verifikasi</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    $no = 1;

                    $query = mysqli_query(
                        $conn,

                        "SELECT

                        pb.*,
                        ps.nama_peserta,
                        e.nama_event

                        FROM pembayaran pb

                        JOIN pendaftaran p
                        ON pb.id_pendaftaran = p.id_pendaftaran

                        JOIN peserta ps
                        ON p.id_peserta = ps.id_peserta

                        JOIN event e
                        ON p.id_event = e.id_event

                        ORDER BY pb.id_pembayaran DESC"
                    );

                    while($data = mysqli_fetch_assoc($query)){

                    ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $data['nama_peserta']; ?></td>

                        <td><?= $data['nama_event']; ?></td>

                        <td><?= $data['tanggal_bayar']; ?></td>

                        <td>
                            Rp <?= number_format($data['jumlah_bayar'],0,',','.'); ?>
                        </td>

                        <td>

                            <?php if(!empty($data['bukti_bayar'])){ ?>

                            <img
                            src="../uploads/bukti/<?= $data['bukti_bayar']; ?>"
                            style="
                                width:80px;
                                height:80px;
                                object-fit:cover;
                                border-radius:8px;
                            ">

                            <?php } ?>

                        </td>

                        <td>

                            <?php

                            if($data['status_verifikasi'] == 'Valid'){
                                echo '<span style="color:green;font-weight:bold;">Valid</span>';
                            }
                            elseif($data['status_verifikasi'] == 'Pending'){
                                echo '<span style="color:orange;font-weight:bold;">Pending</span>';
                            }
                            else{
                                echo '<span style="color:red;font-weight:bold;">Tidak Valid</span>';
                            }

                            ?>

                        </td>

                        <td>

                            <a href="edit.php?id=<?= $data['id_pembayaran']; ?>"
                               class="btn-edit">
                                Edit
                            </a>

                            <a href="hapus.php?id=<?= $data['id_pembayaran']; ?>"
                               class="btn-hapus"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
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