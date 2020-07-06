<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'leave');
error_reporting(0);
$id = $_GET['id'];
$name = $_GET['name'];
$emp = $_GET['emp'];
$email = $_GET['email'];
$phn = $_GET['phn'];
$gender = $_GET['gender'];
$dep = $_GET['dep'];
$username = $_GET['username'];
$password = $_GET['password'];
?>
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

.form{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.but{
  margin-top: 1%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding:2px;
  text-align: center;
}
.button {
  background-color: yellow;
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
.box{
                width:1000px;
                padding: 50px;
                background: white;
                margin: 150px auto;
                box-shadow: 0 0 10px;
                position: relative;
                margin-top: 1%;
                margin-bottom: 1%;
            }
            .box h2{
                margin: 0;
                position: absolute;
                top: 12px;
                left: -12px;
                background: #2196F3;
                color: white;
                font-size: 20px;
                padding: 2px 20px;
            }
            .box h2:before{
                content: '';
                width: 24px;
                height: 24px;
                position: absolute;
                background: #515f66;
                left: 5px;
                bottom: -12px;
                transform: rotate(-45deg);
                z-index: -1;
            }
</style>
</head>

<body>
<div class="loader_bg">
  <div class="loader"></div>

</div>
<div class="navbar">
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
  <form action="" method="GET">
<h3><u>Update Employee</u></h3>

  <label for="fname">ID</label>
    <input type="text" name="id" value="<?php echo "$id" ?>" placeholder="Enter the Id">

    <label for="fname">Name</label>
    <input type="text" name="name" value="<?php echo "$name" ?>" placeholder="Enter the employee name">

    <label for="fname">Emp ID</label>
    <input type="text" name="emp" value="<?php echo "$emp" ?>" placeholder="Enter the employee ID" >

    <label for="lname">Email</label>
    <input type="text"  name="email" value="<?php echo "$email" ?>" placeholder="Enter the email">
    <label for="lname">Phone</label>
    <input type="text"  name="phn" value="<?php echo "$phn" ?>" placeholder="Enter the phone">

    <label for="country">Gender</label>
    <select id="country" name="gender" value="<?php echo "$gender" ?>">
    <option >Select Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select>

    <label for="country">Department</label>
    <select name="dep" value="<?php echo "$dep" ?>">
    <option>Select Department</option>
      <option value="IT">IT</option>
      <option value="Management">Management</option>
      <option value="Accounting">Accounting</option>
    </select>
    <label for="lname">Usename</label>
    <input type="text"  name="username" value="<?php echo "$username" ?>" placeholder="Enter the username" >
    
    <label for="lname">Password</label>
    <input type="text"  name="password" value="<?php echo "$password" ?>" placeholder="Enter the password">

    <input type="submit" name="done" value="Update Employee"><br>
  </form>
</div>
<div class="but">
<h5>All Rights Reserved By Rahul Biswas &copy; 2020</h5>
</div>
<script>
setTimeout(function(){

  $('.loader_bg').fadeToggle();
},1500);

  </script>
</body>
</html>



<?php
if(isset($_GET['done'])){
    $id = $_GET['id'];
    $name = $_GET['name'];
    $emp = $_GET['emp'];
    $email = $_GET['email'];
    $phn = $_GET['phn'];
    $gender = $_GET['gender'];
    $dep = $_GET['dep'];
    $username = $_GET['username'];
    $password = $_GET['password'];
    
       $q = "update employee set id='$id',name='$name',emp='$emp',email='$email',phn='$phn',gender='$gender',dep='$dep',username='$username',password='$password' where id=$id";
       $query = mysqli_query($connection,$q);
       if($query)
 {
     echo '<script> alert("Employee Data Update")</script>';
 }
 else
 {
    echo '<script> alert("Employee Data Not Update")</script>';
}
header('location:display.php');
}

?>