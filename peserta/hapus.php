<?php

include '../config/koneksi.php';

$id = (int) $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM peserta
    WHERE id_peserta='$id'"
);

header("Location:index.php");
exit;