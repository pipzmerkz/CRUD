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
				<th colspan="2">Action</th>
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
				<td>
					<a href="update.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
				</td>
				
				<td>
					<a href="crud.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
				</td>
			</tr>
			<?php } ?>
			<div class="input-group">
				<tr class = "buttons">
					<td><a href = "create.php"><button class="add_btn" type="submit" name="add" >Add</button></a></td>
					<td><a href = "index.php"><button class="exit_btn" type="submit" name="exit" >Exit</button></a></td>
				</tr>
			</div>
	</table>

</body>
</html>










