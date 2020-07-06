<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 1%;
}

#customers td, #customers th {
  border: 3px solid black;
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
<table id="customers">
<tr>
    <th style='text-align:center' colspan="10"> 
    <a href="display.php" class="button" onclick="window.print()"> <i class="fas fa-print"></i> Print</a>
</th>
    </tr></table>
    <table id="customers" class="print-container">
    <tr>
    <th style='text-align:center' colspan="10" ><h3>Employee Leave Management System 2020 <br><u>Details Of Employee</u></h3></th>
    </tr>
  <tr>
    <th style='text-align:center'>ID</th>
    <th style='text-align:center'>Name</th>
    <th style='text-align:center'>Employee ID</th>
    <th style='text-align:center'>Email</th>
    <th style='text-align:center'>Phone</th>
    <th style='text-align:center'>Gender</th>
    <th style='text-align:center'>Department</th>
  </tr>
  <?php

$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,'leave');
 $q = "select * from employee ";

 $query = mysqli_query($connection,$q);
 $total = mysqli_num_rows($query );
 if($total!=0)
 {
  while($result = mysqli_fetch_assoc($query))
  {
      echo"
      <tr>
      <td style='text-align:center'>" .$result['id']. "</td>
      <td style='text-align:center'>" .$result['name']. "</td>
      <td style='text-align:center'>" .$result['emp']. "</td>
      <td style='text-align:center'>" .$result['email']. "</td>
      <td style='text-align:center'>" .$result['phn']. "</td>
      <td style='text-align:center'>" .$result['gender']. "</td>
      <td style='text-align:center'>" .$result['dep']. "</td>
     </tr>
      ";
  }
 }
else
{
  echo " No records Found";
}
?>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>

<script>
setTimeout(function(){

  $('.loader_bg').fadeToggle();
},1500);

  </script>
</body>
</html>