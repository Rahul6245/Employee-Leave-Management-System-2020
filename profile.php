<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
table, th, td {
border: 1px solid black;
border-collapse: collapse;
width: 60%;
margin-top: 2%;
}
th, td {
  padding: 9px;
  text-align: left;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

.b{
  background-color:#2196F3;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 60%;
}

.b:hover {
  opacity: 0.8;
}
.b1{
  background-color:#2196F3;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 40%;
}

.b1:hover {
  opacity: 0.8;
}



.box{
                width:800px;
                padding: 50px;
                background: white;
                margin: 150px auto;
                box-shadow: 0 0 10px;
                position: relative;
                margin-top: 1%;
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

            .modal {
  display: none; 
  position: fixed;
  z-index: 1; 
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4); 
}
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.icon {
  padding: 7px;
  background: gray;
  color: white;
  min-width: 50px;
  text-align: center;
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
<h2>My Profile</h2>
<center>
        <div class="table">
    <table>
      <tr>
    <th colspan="13"  style="text-align:center">My Profile</th></tr>
      <?php

$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,'leave');

 $q = "select * from login ";

 $query = mysqli_query($connection,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <th><i class="fas fa-user-cog icon"></i> Username</th>
 <td > <?php echo $res['username'];  ?> </td>
 </tr>
 <tr>
 <th><i class="fas fa-user icon"></i> User</th>   
<td> Admin </td>
 </tr>
 <?php 
 }
  ?>
  <tr>
    <th colspan="13"  style="text-align:center"><button type="submit" name="done" style="color: black;" class="b1" id="myBtn"><b>Change Password</b></button></th></tr>
          </table>
      </div>    
      <h3>All Rights Reserved By Rahul Biswas &copy; 2020</h3>
</center></div>


<div id="myModal" class="modal">
  
  <form  action="" method="POST">
    

  <div class="modal-content">
    <span class="close">&times;</span>
    <form class="modal-content animate" action="" method="POST">

    <label for="usr"><b>Username</b></label>
      <input type="text" placeholder="Enter The  Username" name="username" required>
      <label for="psw"><b>Old Password</b></label>
      <input type="password" placeholder="Enter The Old Password" name="password" id="myInput" required>
      <label for="psw"><b>New Password</b></label>
      <input type="password" placeholder="Enter The New Password" name="npsw" id="myInput" required>
      <label for="psw"><b>Confirm New Password</b></label>
      <input type="password" placeholder="Enter The Confirm New Password" name="cpsw" id="myInput" required>
        
      <center><button type="submit" name="done" style="color: black;" class="b1"><b>Update Password</b></button></center><br>

    </form>
  </div>

  </form>
</div>

<?php

$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,'leave');

if(isset($_POST['done'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $npsw = $_POST['npsw'];
        $cpsw = $_POST['cpsw'];
 $q = mysqli_query($connection,"SELECT username,password from login where username='$username' AND password = '$password' ");
 $num = mysqli_fetch_array($q);
  
if($num>0){
  $connection = mysqli_query($connection,"UPDATE login set password = '$npsw' where username = '$username' ");
}

 if($num)
 {
     echo '<script> alert("Your Password Update Successfully")</script>';
 }
 else
 {
    echo '<script> alert("Your Password NOT Update Successfully")</script>';
}
}
?>
<script>
setTimeout(function(){

  $('.loader_bg').fadeToggle();
},1500);

  </script>
  </script>
<script>
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
