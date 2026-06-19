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

        "SELECT *
        FROM event
        WHERE id_event='$id'"
    )
);

if(!$data)
{
    header("Location:index.php");
    exit;
}

if(
    !empty($data['poster']) &&
    file_exists("../Upload/poster/".$data['poster'])
)
{
    unlink("../Upload/poster/".$data['poster']);
}

mysqli_query(

    $conn,

    "DELETE FROM event
    WHERE id_event='$id'"
);

header("Location:index.php");
exit;