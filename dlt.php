<?php

$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,'leave');


$id = $_GET['id'];

$q = " DELETE FROM `employee` WHERE id = $id ";

$query = mysqli_query($connection, $q);

header('location:display.php');

?>