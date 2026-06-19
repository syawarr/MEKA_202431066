<?php

include '../config/koneksi.php';

if(!isset($_GET['id']))
{
    header("Location:index.php");
    exit;
}

$id = (int) $_GET['id'];

$data = mysqli_fetch_assoc(

    mysqli_query(

        $conn,

        "SELECT bukti_bayar
        FROM pembayaran
        WHERE id_pembayaran='$id'"
    )
);

if(
    !empty($data['bukti_bayar']) &&
    file_exists("../Upload/bukti/".$data['bukti_bayar'])
){
    unlink("../Upload/bukti/".$data['bukti_bayar']);
}

mysqli_query(

    $conn,

    "DELETE FROM pembayaran
    WHERE id_pembayaran='$id'"
);

header("Location:index.php");
exit;