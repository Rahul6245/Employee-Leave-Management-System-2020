<?php
session_start();

$con = mysqli_connect('localhost', 'root' );
$db = mysqli_select_db($con, 'leave');
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = " select * from  employee where username='$username' and password='$password' ";
	$query = mysqli_query($con,$sql);

	$row = mysqli_num_rows($query);
		if($row == 1){
			echo "login successful";
			$_SESSION['username'] = $username;
			header('location:empdashboard.php');
		}else{
			header('location:failed.php');
		}


?>