<?php
require('./config.php');
$id = $_GET['id'];
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];
$adress = $_POST['alamat'];


if (isset($_POST['submit'])) {
    $sql = mysqli_query($koneksi, "UPDATE `pegawai` SET nama='$nama',nohp='$nohp', alamat='$adress', email='$email' WHERE id='$id'");   
    if ($sql) {
        header('location:tables.php');
    }
} elseif (isset($_POST['close'])) {
    header("location: tables.php");
}
