<?php 
    include 'conn.php';
	if(isset($_POST['login'])){
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		$utype = $_POST['utype'];
		
		$query = "SELECT * FROM login WHERE uname = '".$uname."' AND pass = '".$pass."'  ";
		$result = mysqli_query($conn,$query);
		
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				if($row["utype"] == "admin"){
					?>
					<script>alert('Logged in as Admin!');</script>
					<script type="text/javascript">window.location.href="CUD.php"</script>
					<?php
				}
				else{
					?>
					<script>alert('Logged in as Student!');</script>
					<script type="text/javascript">window.location.href="read.php"</script>
					<?php 
				}
			}
		}
		else{
			?><script>alert('Wrong Username or Password')</script><?php
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="post" action="" >
		<label>Login Form:</label>
		<div class="input-group">
			<input type="hidden" name="id" value="">
		</div>
		
		<div class="input-group">
			<label>Username:</label>
			<input type="text" name="uname" placeholder = "Username" required>
		</div>
		
		<div class="input-group">
			<label>Password:</label>
			<input type="password" name="pass" placeholder = "Password" required>
		</div>
		
		<div class="input-group">
			<input type="hidden" name="utype" value="">
		</div>
		
		<div class="input-group">
			<button class="btn" type="submit" name="login">Login</button>
		</div>
	</form>
</body>
</html>