<?php

include '../config/koneksi.php';

if(isset($_POST['simpan']))
{
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    mysqli_query(
        $conn,
        "INSERT INTO users
        (nama,email,password,role)

        VALUES

        ('$nama','$email','$password','$role')"
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
    <title>Tambah User</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<div class="wrapper">

    <?php include '../layout/sidebar.php'; ?>

    <div class="main-content">

        <?php include '../layout/header.php'; ?>

        <div class="content">

            <div class="form-container">

                <h2>Tambah User</h2>

                <form method="POST">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" required>
                    </div>

                    <div class="form-group">
                        <label>Role</label>

                        <select name="role" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="panitia">Panitia</option>
                        </select>

                    </div>

                    <button type="submit" name="simpan">
                        Simpan
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