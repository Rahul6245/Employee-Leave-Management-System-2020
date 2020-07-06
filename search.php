<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example input[type=submit] {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: black;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}
.b{
  margin-top: 2%;
    border: none;
  color: black;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  background-color: #2196F3;
}
form.example::after {
  content: "";
  clear: both;
  display: table;
}

table, th, td {
border: 1px solid black;
border-collapse: collapse;
width: 60%;
}
th, td {
  padding: 9px;
  text-align: left;
}

.box{
                width:800px;
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



@media print{
  body{
    visibility: hidden;
  }
  .print-container, .print-container{
    visibility: visible;
  }
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
<form class="example" action="" method="POST">
  <input type="text" placeholder="Search.." name="emp">
  <input type="submit" name="search" value="Search By employee ID">
</form>

<?php

$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,'leave');

if(isset($_POST['search'])){

    $emp= $_POST['emp'];

$query="SELECT * FROM employee where emp='$emp' ";

$query_run = mysqli_query($connection,$query);

while($row = mysqli_fetch_array($query_run))
{
?>
<div class="box">
            <h2>Employee Details</h2>
<center>
<div class="print-container">
<table>
<tr>
    <th colspan="2" style="text-align: center">Details Of Employee</th>
  </tr>
  <tr>
    <th>Name:</th>
    <td><?php echo $row['name'] ?></td>
  </tr>
  <tr>
    <th>Employee ID:</th>
    <td><?php echo $row['emp'] ?></td>
  </tr>
  <tr>
    <th>Eamil ID:</th>
    <td><?php echo $row['email'] ?></td>
  </tr>
<tr>
    <th>Phone No:</th>
    <td><?php echo $row['phn'] ?></td>
  </tr>
  <tr>
    <th>Gender:</th>
    <td><?php echo $row['gender'] ?></td>
  </tr>
  <tr>
    <th>Department:</th>
    <td><?php echo $row['dep'] ?></td>
  </tr>
  <tr>
    <th>Username:</th>
    <td><?php echo $row['username'] ?></td>
  </tr>
  <tr>
    <th>Password:</th>
    <td><?php echo $row['password'] ?></td>
  </tr>
  <tr>
    <th colspan="2" style="text-align: center;">All Rights Reserved By Rahul Biswas &copy; 2020</th>
  </tr>
  <tr>
  
    <th colspan="2" style="text-align: center;">
  
  <button onclick="window.print()" class="b">Print Details</button>
  </th>
  </tr>
</table></div>
    <?php
    
}
}
?>
</center>
</div>
<script>
setTimeout(function(){

  $('.loader_bg').fadeToggle();
},1500);

  </script>
</body>
</html>