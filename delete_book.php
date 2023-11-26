<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];
    $query = "DELETE FROM buku WHERE id_buku = '$id_buku'";
    mysqli_query($mysqli, $query);
}
?>
