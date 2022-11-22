<?php
require("./config.php");
if (isset($_GET['id'])) {
    $sql_hapus = "delete from pegawai where id='" . $_GET['id'] . "'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);


    if ($query_hapus) {
        header("location: tables.php");
    } else {
        header("location: tables.php");
    }
} elseif (isset($_POST['submit'])) {
    header("location: tables.php");
} else {
    header("location: tables.php");
}
