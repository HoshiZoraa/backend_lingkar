<?php
require ('koneksi.php');

if( isset($_POST['submit'])){
	$email = $_POST['txt_email'];
	$pass = $_POST['txt_pass'];

	if(!empty(trim($email)) && !empty(trim($pass))){
		$query = "SELECT * FROM login WHERE email = '$email'";
		$result = mysqli_query($koneksi, $query);
		$num = mysqli_num_rows($result);

		while($row = mysqli_fetch_array($result)){
			$id = $row['id'];
			$userVal = $row['email'];
			$passVal = $row['password'];
		}
		if ($num != 0){
			if($userVal==$email && $passVal==$pass){
				$_SESSION['id']=$id;
				$_SESSION['name']=$userName;
				header('Location: dashboard.php');
			}else{
				$error = 'user atau password salah!!';
				header('Location: login.php');
			}
		}else{
			$error = 'user tidak ditemukan!!';
			header('Location: login.php');
		}
	}else{
		$error = 'data tidak boleh kosong';
		echo $error;
	}
} 
// END LOGIN BACKEND


// REGISTER
?>