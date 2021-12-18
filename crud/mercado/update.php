<?php
	include 'conn.php';
	include 'crud.php';

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit = true;
    
		$record = mysqli_query($conn, "SELECT * FROM student WHERE id= $id");
		$data = mysqli_fetch_array($record);

		$id = $data['id'];
		$name = $data['name'];
		$age = $data['age'];
		$email = $data['email'];
		$gpa = $data['gpa'];
	}
?>
<!DOCTYPE html>
<head>
      <title>UPDATE</title>
      <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		if (isset($_SESSION['message'])):?>
		<div class="message">
	<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);       
	?>
		</div>
		<?php endif ?>

	<div class='input-group'>
		<form class="login" method="POST" action="crud.php">
			<label>Update Data Form:</label>
			<div class="input-group">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
			</div>
			
			<div class="input-group">
				<label>Name:</label>
				<input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
			</div>
			
			<div class="input-group">
				<label>Age:</label>
				<input type="int" name="age" placeholder="Age" value="<?php echo $age; ?>">
			</div>

			<div class="input-group">
				<label>Email:</label>
				<input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
			</div>

			<div class="input-group">
				<label>GPA</label>
				<input type="float" name="gpa" placeholder="Gpa" value="<?php echo $gpa; ?>">
			</div>

			<div class="input-group">
				<?php if ($edit == false): ?>
					<button class="btn" type="submit" name="save" >Save</button>
				<?php else: ?>
					<button class="btn" type="submit" name="update" >Update</button>
				<?php endif ?>
			</div>
		</form>
	</div>
</body>
</html>
