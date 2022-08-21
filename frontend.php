<?php 
			if(isset($_POST['login'])){
				session_start();
				include 'db.php';

				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pass = mysqli_real_escape_string($conn, $_POST['pass']);

				$cek = mysqli_query($conn, "SELECT * FROM user_db WHERE user = '".$user."' AND pass = '".$pass."'");
				if(mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true;
					$_SESSION['a_global'] = $d;
					$_SESSION['id'] = $d->id;
					echo '<script>window.location="backend.php"</script>';
				}else{
					echo '<script>alert("Username atau password Anda salah!")</script>';
				}

			}

		?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
	<div class="container">
		<div class="formlogin">
			<div class="foto"><img src="ikon.png"><h1>Login</h1>
		</div>
			<form action="" method="post">
				<input type="text" placeholder="Username" name="user"><br>
				<input type="password" placeholder="Password" name="pass"><br>
				<button type="login" name="login"> LOGIN</button>
			</form>
			
		</div>
	</div>
 
</body>
</html>