<?php

include '../config/koneksi.php';

$id = (int) $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM users
        WHERE id_user='$id'"
    )
);

if(isset($_POST['update']))
{
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    mysqli_query(
        $conn,
        "UPDATE users

        SET
            nama='$nama',
            email='$email',
            role='$role'

        WHERE id_user='$id'"
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
    <title>Edit User</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<div class="wrapper">

    <?php include '../layout/sidebar.php'; ?>

    <div class="main-content">

        <?php include '../layout/header.php'; ?>

        <div class="content">

            <div class="form-container">

                <h2>Edit User</h2>

                <form method="POST">

                    <div class="form-group">
                        <label>Nama</label>
                        <input
                            type="text"
                            name="nama"
                            value="<?= $data['nama']; ?>"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input
                            type="email"
                            name="email"
                            value="<?= $data['email']; ?>"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Role</label>

                        <select name="role">

                            <option value="admin"
                            <?= $data['role']=='admin' ? 'selected' : ''; ?>>
                                Admin
                            </option>

                            <option value="panitia"
                            <?= $data['role']=='panitia' ? 'selected' : ''; ?>>
                                Panitia
                            </option>

                        </select>

                    </div>

                    <button type="submit" name="update">
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