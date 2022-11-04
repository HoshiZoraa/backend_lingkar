<?php
require('koneksi.php');
if (isset($_POST['register'])) {
    $userMail = $_POST['txt_email'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_nama'];


    $query = "INSERT INTO login (email, password, nama) VALUES ('$userMail','$userPass','$userName')";
    //echo $query;
    $result = mysqli_query($koneksi, $query);
    header('Location: dashboard.php');
}
?>