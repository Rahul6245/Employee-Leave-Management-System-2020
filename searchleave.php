<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
form.example input[type=date] {
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
                width:1100px;
                padding: 50px;
                background: white;
                margin: 150px auto;
                box-shadow: 0 0 10px;
                margin-top: 1%;
                margin-bottom: 1%;
            }
@media print{
  body{
    visibility: hidden;
  }
  .print-container, .print-container{
    visibility: visible;
  }
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
<form class="example" action="" method="GET">
  <input type="date" placeholder="Search.." name="start">
  <input type="submit" name="search" value="Search Leave By Date"></i>
</form>
<div class="box">
<center>
<div class="table">
    <table id="customers">
    <tr>
    <th colspan="13"  style="text-align:center"> Employee In Today Leave</th></tr>
        <tr>
        <tr>
          <th style="text-align:center">Name</th>
          <th style="text-align:center">Employee ID</th>
          <th style="text-align:center">Email</th>
          <th style="text-align:center">Phone</th>
          <th style="text-align:center">Username</th>
          <th style="text-align:center">Type</th>
          <th style="text-align:center">Leave Start</th>
          <th style="text-align:center">Leave End</th>
          <th style="text-align:center">Status</th>
</tr>

        <?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'leave');
   
   if(isset($_GET['search']))
   {
       $start = $_GET['start'];
       $q = "select * from apply where start like '%$start%' ";
   }
   else{
       $q = "select * from apply ";
   }
$query = mysqli_query($connection,$q);
while($res = mysqli_fetch_array($query)){
  ?>
  <td style="text-align:center"> <?php echo $res['name'];  ?> </td>
 <td style="text-align:center"> <?php echo $res['emp'];  ?> </td>
 <td style="text-align:center"> <?php echo $res['email'];  ?> </td>
 <td style="text-align:center"> <?php echo $res['phn'];  ?> </td>
 <td style="text-align:center"> <?php echo $res['username'];  ?> </td>
 <td style="text-align:center"> <?php echo $res['type'];  ?> </td>
 <td style="text-align:center"> <?php echo $res['start'];  ?> </td>
 <td style="text-align:center"> <?php echo $res['end'];  ?> </td>
 <td style="text-align:center"> <?php echo $res['status'];  ?> </td>

        </tr>
<?php 
}
 ?>
          </table>
    <?php
?>
</center>
</div>
</div>
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