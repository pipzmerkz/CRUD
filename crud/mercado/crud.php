<?php 
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'studentdb');

	//INITIALIZING VARIABLES
	$name = "";
	$age = "";
	$email = "";
	$gpa = "";
	$id = 0;
	$update = false;
	
	//INSERTING OF VALUES
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$email = $_POST['email'];
		$gpa = $_POST['gpa'];

		$sql = "INSERT INTO student (name,age,email,gpa) VALUES ('$name','$age','$email','$gpa')"; 
		if (mysqli_query($conn, $sql)) { 
			$_SESSION['message'] = "Information saved";
			header("Location: CUD.php");
		}
		else{
			mysqli_close($conn);
		}
		
	}
		
	//UPDATING OF VALUES
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$email = $_POST['email'];
		$gpa = $_POST['gpa'];

	mysqli_query($conn, "UPDATE student SET name = '$name', age = '$age', email = '$email', gpa = '$gpa' WHERE id = '$id' ");
	$_SESSION['message'] = "Information updated!"; 
	header('location: CUD.php');
	}
	
	//DELETING OF VALUES
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM student WHERE id=$id");
	$_SESSION['message'] = "Information deleted!"; 
	header('location: CUD.php');
}