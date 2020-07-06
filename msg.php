<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<head>
<style>
  .box{
                width:1100px;
                padding: 50px;
                background: white;
                margin: 150px auto;
                box-shadow: 0 0 10px;
                margin-top: 1%;
                margin-bottom: 1%;
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
<table id="customers">
    <tr>
    <th style='text-align:center' colspan="7"><h3>Message Of Employee</h3></th>
    </tr>
  <tr>
    <th style='text-align:center'>Name</th>
    <th style='text-align:center'>Email</th>
    <th style='text-align:center'>Employee ID</th>
    <th style='text-align:center'>Subject</th>
    <th style='text-align:center'>Message Of Employee</th>
    <th style='text-align:center'>Status</th>
    <th style='text-align:center'>Action</th>
  </tr>
  <?php

$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,'leave');
 $q = "select * from contact ";

 $query = mysqli_query($connection,$q);
 $total = mysqli_num_rows($query );
 if($total!=0)
 {
  while($result = mysqli_fetch_assoc($query))
  {
      echo"
      <tr>
      <td style='text-align:center'>" .$result['name']. "</td>
      <td style='text-align:center'>" .$result['email']. "</td>
      <td style='text-align:center'>" .$result['emp']. "</td>
      <b><td style='text-align:center'>" .$result['subject']. "</td></b>
      <td style='text-align:center'>" .$result['content']. "</td>
      <td style='text-align:center;color:red'><b>" .$result['status']. "</b></td>
      <td style='text-align:center'><a href='read.php?id=$result[id]&status=$result[status]'><i class='fas fa-reply'></i></a> </td>
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

  </script></div>
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
