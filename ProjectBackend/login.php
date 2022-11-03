<?php
require ('koneksi.php');

session_start();
// LOGIN
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
<!DOCTYPE html>
<html>
<head>
	<title>Lingkar Angkringan</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
<form class="user" action="login.php" method="POST">
  <div class="cont">
    <div class="form sign-in">
      <h2>Sign In</h2>
      <label>
        <span>Email Address</span>
        <input type="text" name="txt_email">
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="txt_pass">
      </label>
      <button class="submit" type="submit" name="submit">Sign In</button>
      </form>

      <p class="forgot-pass">Forgot Password ?</p>

      <div class="social-media">
        <ul>
          <li><img src="images/facebook.png"></li>
          <li><img src="images/twitter.png"></li>
          <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li>
        </ul>
      </div>
    </div>
    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover great amount of new opportunities!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
       <form class="user" method="POST" name="submit" action="">
        <div class="form sign-up">
        <h2>Sign Up</h2>
        <label>
          <span>Name</span>
        <input type="text" name="txt_nama">
        </label>
        <label>
          <span>Email</span>
        <input type="text" name="txt_email">
        </label>
        <label>
          <span>Password</span>
          <input type="text" name="txt_pass">
        </label>
        <button type="submit" class="submit" name="submit">Sign Up Now</button>
       </div>
      </form>
    </div>
  </div>
<script type="text/javascript" src="script.js"></script>
</body>
</html>