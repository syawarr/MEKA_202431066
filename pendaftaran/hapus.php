<?php

include '../config/koneksi.php';

$id = (int) $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM pendaftaran
    WHERE id_pendaftaran='$id'"
);

header("Location:index.php");
exit;