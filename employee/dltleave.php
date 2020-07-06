<?php

$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,'leave');


$id = $_GET['id'];

$q = " DELETE FROM `apply` WHERE id = $id ";

$query = mysqli_query($connection, $q);

header('location:leavedisplay.php');

?>