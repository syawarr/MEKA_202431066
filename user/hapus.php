<?php

include '../config/koneksi.php';

if(!isset($_GET['id']))
{
    header("Location:index.php");
    exit;
}

$id = (int) $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM users
    WHERE id_user='$id'"
);

header("Location:index.php");
exit;