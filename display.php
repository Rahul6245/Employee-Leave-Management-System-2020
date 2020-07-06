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
  .box{
                width:1100px;
                padding: 50px;
                background: white;
                margin: 150px auto;
                box-shadow: 0 0 10px;
                position: relative;
                margin-top: 1%;
                margin-bottom: 2%;
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
      <a href="#">All Leave</a>
      <a href="#">Approved Leave</a>
      <a href="#">Pending Leave</a>
      <a href="#">Not Approved Leave</a>
    </div>
  </div> 
  <a href="profile.php"><i class="fas fa-address-book"></i> My Profile</a>
  <a href="msg.php"><i class="fas fa-comment-dots"></i>  Message</a>
  <a href="logout.php"> <i class="fas fa-user"></i>  Logout</a>
</div>
<div class="box">
<table id="customers">
<tr>
    <th style='text-align:center' colspan="10"> 
    <a href="add.php" class="button"> <i class="fas fa-directions"></i> Insert Employee</a>
    <a href="printemp.php" class="button"> <i class="fas fa-print"></i> Print</a>
    <a href="search.php" class="button"><i class="fas fa-search"></i> Search Employee</a>
</th>
    </tr></table>
    <table id="customers">
    <tr>
    <th style='text-align:center' colspan="12" ><h3>Details Of Employee</h3></th>
    </tr>
  <tr>
    <th style='text-align:center'>ID</th>
    <th style='text-align:center'>Name</th>
    <th style='text-align:center'>Employee ID</th>
    <th style='text-align:center'>Email</th>
    <th style='text-align:center'>Phone</th>
    <th style='text-align:center'>Gender</th>
    <th style='text-align:center'>Department</th>
    <th style='text-align:center'>Username</th>
    <th style='text-align:center'>Password</th>
    <th style='text-align:center'>Update</th>
    <th style='text-align:center'>Delete</th>
  </tr>
  <?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'leave');
 $q = "select * from employee  ";

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
      <td style='text-align:center'>" .$result['username']. "</td>
      <td style='text-align:center'>" .$result['password']. "</td>
      <td style='text-align:center'><a href='update.php?id=$result[id]&name=$result[name]&emp=$result[emp]&email=$result[email]&phn=$result[phn]&gender=$result[gender]&dep=$result[dep]&username=$result[username]&password=$result[password]'><i class='fas fa-user-edit' style='color:green'></i> </a> </td>
      <td style='text-align:center'><a href='dlt.php?id=$result[id]'><i class='fas fa-trash-alt' style='color:red'></i> </a> </td>
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
<script>
setTimeout(function(){

  $('.loader_bg').fadeToggle();
},1500);

  </script>
</div>
</body>
</html>