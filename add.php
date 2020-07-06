<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 20%;
  background-color: #4CAF50;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 10px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: green;
}

.box{
                width:1000px;
                padding: 50px;
                background: white;
                margin: 150px auto;
                box-shadow: 0 0 10px;
                margin-top: 1%;
                margin-bottom: 1%;
            }
.but{
  margin-top: 1%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding:2px;
  text-align: center;
}
.button {
  background-color: #2196F3;
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 10px;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}
</style>
</head>

<body>
<div class="loader_bg">
  <div class="loader"></div>

</div>
<div class="navbar" id="mynavbar">
  <a href="dashboard.php"><i class="fab fa-dashcube"></i> Dashboard</a>
  <a href="add.php"><i class="fas fa-user-friends"></i> Employee</a>
  <div class="dropdown">
    <button class="dropbtn"><i class="fas fa-sign-out-alt"></i> Leave 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="employee/viewleaveonly.php">All Leave</a>
      <a href="employee/viewleave.php">Action Leave</a>
      <a href="searchleave.php">Search Leave</a>
    </div>
  </div> 
  <a href="profile.php"><i class="fas fa-address-book"></i> My Profile</a>
  <a href="msg.php"><i class="fas fa-comment-dots"></i>  Message</a>
  <a href="logout.php"> <i class="fas fa-user"></i>  Logout</a>
</div>



<div class="box">
  <form action="" method="POST">
<center><h2><u>Insert Employee</u></h2></center>



    <label for="fname">Name</label>
    <input type="text" name="name" placeholder="Enter the employee name" required>

    <label for="fname">Emp ID</label>
    <input type="text" name="emp" placeholder="Enter the employee ID" required>

    <label for="lname">Email</label>
    <input type="text"  name="email" placeholder="Enter the email" required>
    <label for="lname">Phone</label>
    <input type="text"  name="phn" placeholder="Enter the phone" required>

    <label for="country">Gender</label>
    <select id="country" name="gender" required>
    <option >Select Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select>

    <label for="country">Department</label>
    <select name="dep" required>
    <option>Select Department</option>
      <option value="IT">IT</option>
      <option value="Management">Management</option>
      <option value="Accounting">Accounting</option>
    </select>
    <label for="lname">Usename</label>
    <input type="text"  name="username" placeholder="Enter the username" required>
    
    <label for="lname">Password</label>
    <input type="text"  name="password" placeholder="Enter the password" required>


    <input type="submit" name="done" value="Insert Employee"><br>
    <a href="display.php" class="button"> <i class="fas fa-directions"></i><b> Go To Action</b></a><a href="search.php" class="button"><i class="fas fa-search"></i> <b>Search Employee</b></a>
  </form>
</div>
</div>
<div class="but">
<h5>All Rights Reserved By Rahul Biswas &copy; 2020</h5>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>

<script>
setTimeout(function(){

  $('.loader_bg').fadeToggle();
},1500);

  </script>
  <script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("mynavbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</body>
</html>
<?php

$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,'leave');
error_reporting(0);


if(isset($_POST['done'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $emp = $_POST['emp'];
    $email = $_POST['email'];
    $phn = $_POST['phn'];
    $gender = $_POST['gender'];
    $dep = $_POST['dep'];
    $username = $_POST['username'];
	  $password = $_POST['password'];

$q="INSERT INTO `employee`(`id`, `name`, `emp` , `email` , `phn` , `gender` ,`dep`,`username`,`password`  ) VALUES ('$id','$name','$emp','$email' ,'$phn', '$gender','$dep','$username','$password')";

 $query = mysqli_query($connection,$q);
 

 if($query)
 {
     echo '<script> alert("Employee Data Insert")</script>';
 }
 else
 {
    echo '<script> alert("Employee Data Not Insert")</script>';
}
}
?>