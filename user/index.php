<?php

include '../config/koneksi.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<div class="wrapper">

    <?php include '../layout/sidebar.php'; ?>

    <div class="main-content">

        <?php include '../layout/header.php'; ?>

        <div class="content">

            <h2>Data User</h2>

            <a href="tambah.php" class="btn-tambah">
                + Tambah User
            </a>

            <div class="table-container">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                    $no = 1;

                    $query = mysqli_query(
                        $conn,
                        "SELECT * FROM users ORDER BY id_user DESC"
                    );

                    while($data = mysqli_fetch_assoc($query)){

                    ?>

                    <tr>

                        <td><?= $no++; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['email']; ?></td>
                        <td><?= ucfirst($data['role']); ?></td>
                        <td><?= $data['created_at']; ?></td>

                        <td>

                            <a href="edit.php?id=<?= $data['id_user']; ?>" class="btn-edit">
                                Edit
                            </a>

                            <a href="hapus.php?id=<?= $data['id_user']; ?>"
                               class="btn-hapus"
                               onclick="return confirm('Yakin ingin menghapus user ini?')">
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