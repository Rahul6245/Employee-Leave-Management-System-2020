<?php
session_start();
?>

<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<head>
<style>
  .loader_bg{
    position: fixed;
    z-index: 999999;
    background:#77c;
    width: 100%;
    height: 100%;
  }
  .loader{
    border: 0 solid transparent;
    border-radius: 50%;
    width: 150px;
    height: 150px;
    position: absolute;
    top: calc(50vh - 75px);
    left: calc(50vw - 75px);
  }
  .loader:before, .loader:after{
    content: '';
    border: 1em solid #ffda76;
    border-radius: 50%;
    width: inherit;
    height: inherit;
    position: absolute;
    top: 0;
    left: 0;
    animation: loader 2s linear infinite;
    opacity: 0;
  }
  .loader:before{
    animation-delay: .5s;
  }
  @keyframes loader{
    0%{
      transform: scale(0);
      opacity: 0;
    }
    50%{
      opacity: 1;
    }
    100%{
      transform: scale(1);
      opacity: 0;
    }
  }
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 1%;
}

#customers td, #customers th {
  border: 1px solid black;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: grey;
  color: white;
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
.box{
                width:1100px;
                padding: 40px;
                background: white;
                margin: 200px auto;
                box-shadow: 0 0 10px;
                margin-top: 5%;
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
            .sticky {
  position: fixed;
  top: 0;
  width: 100%;
}
            @media print{
  body{
    visibility: hidden;
  }
  .print-container, .print-container{
    visibility: visible;
  }
}
.b1{
  background-color:#2196F3;
  color: black;
  padding: 8px 12px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  float: right;
}
</style>
</head>
<body>
<div class="loader_bg">
  <div class="loader"></div>

</div>
<div class="navbar" id="mynavbar">
  <a href="empdashboard.php"><i class="fab fa-dashcube"></i> Dashboard</a>
  <div class="dropdown">
    <button class="dropbtn"><i class="fas fa-sign-out-alt"></i> Leave 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="leavedisplay.php">Leave Status</a>
      <a href="apply.php">Apply For Leave</a>
      <a href="myallleave.php">My Leave History</a>
    </div>
  </div> 
  <a href="mymsg.php"><i class="fas fa-comment-dots"></i> My Message</a>
  <a href="emprofile.php"><i class="fas fa-address-book"></i> My Profile</a>
  <a href="logout.php"> <i class="fas fa-user"></i>  Logout</a>
</div>
<div class="box">
    <button class="b1" onclick="window.print()"><b> <i class="fas fa-print"></i> Print</b></button><br><br>
    <div class="print-container">
    <center><h3><u>EMPLOYEE LEAVE MANAGEMENT SYSTEM 2020</u></h3></center>

<table id="customers">
    </tr></table>
    <table id="customers">
    <tr>
    <th style='text-align:center' colspan="9" ><h3>Records Of Leave</h3></th>
    </tr>
  <tr>
    <th style='text-align:center'>Name</th>
    <th style='text-align:center'>Employee ID</th>
    <th style='text-align:center'>Email</th>
    <th style='text-align:center'>Phone</th>
    <th style='text-align:center'>Leave Type</th>
    <th style='text-align:center'>Leave Start</th>
    <th style='text-align:center'>Leave End</th>
    <th style='text-align:center'>Status</th>
  </tr>
  <?php

$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,'leave');

$res = mysqli_query($connection,"select * from apply where username='$_SESSION[username]'");
while($result = mysqli_fetch_array($res)){
  echo"
      <tr>
      <td style='text-align:center'>" .$result['name']. "</td>
      <td style='text-align:center'>" .$result['emp']. "</td>
      <td style='text-align:center'>" .$result['email']. "</td>
      <td style='text-align:center'>" .$result['phn']. "</td>
      <td style='text-align:center'>" .$result['type']. "</td>
      <td style='text-align:center'>" .$result['start']. "</td>
      <td style='text-align:center'>" .$result['end']. "</td>
      <td style='text-align:center;color:red'>" .$result['status']. "</td>
     </tr>
      ";


 }
     ?>
</table>
</div></div>
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