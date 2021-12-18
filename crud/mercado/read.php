<?php  
	include('conn.php');
	include('crud.php');

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		
		$record = mysqli_query($conn, "SELECT * FROM student WHERE id=$id");
		$data = mysqli_fetch_array($record);
		
		$id = $data['id'];
		$name = $data['name'];
		$age = $data['age'];
		$email = $data['email'];
		$gpa = $data['gpa'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Age</th>
				<th>Email</th>
				<th>GPA</th>
			</tr>
		</thead>
		
		<?php
			$result = mysqli_query($conn, "SELECT * FROM student");
			while ($row = mysqli_fetch_assoc($result)) {
		?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['age']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['gpa']; ?></td>
			</tr>
		<?php } ?>
			<tr>
				<td><a href = "index.php"><button class="exit_btn" type="submit" name="exit" >Exit</button></a></td>
			</tr>
	</table>

</body>
</html>










