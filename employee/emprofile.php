<?php
session_start();
?>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'leave');
if(isset($_SESSION['username'])){
  $username =$_SESSION['username'];
  $query = "SELECt * FROM employee WHERE username = '{$username}'";
  $select_user_profile_query = mysqli_query($connection,$query);

  while($row = mysqli_fetch_array($select_user_profile_query)){
    $name = $row['name'];
    $emp = $row['emp'];
    $email = $row['email'];
    $phn = $row['phn'];
    $gender = $row['gender'];
    $dep = $row['dep'];
    $username = $row['username'];
    $password = $row['password'];

  }
  
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
.box{
                width:800px;
                padding: 40px;
                background: white;
                margin: 200px auto;
                box-shadow: 0 0 10px;
                position: relative;
                margin-top: 2%;
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


table, th, td {
border: 1px solid black;
border-collapse: collapse;
}
th, td {
  padding: 9px;
  text-align: left;
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
.icon {
  padding: 7px;
  background: gray;
  color: white;
  min-width: 50px;
  text-align: center;
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
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
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
<div class="navbar">
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
  <a href="emprofile.php?"><i class="fas fa-address-book"></i> My Profile</a>
  <a href="logout.php"> <i class="fas fa-user"></i>  Logout</a>
</div>
<div class="box">
            <h2>My Profile</h2>
            <p>

            <table style="width:100%">

            <tr>
    <th colspan="2" style="text-align:center">Welcome To My Profile</th>
  </tr>
  <tr>
    <th><i class="fas fa-signature icon"></i> Name:</th>
    <td><?php echo $name;?></td>
  </tr>
  <tr>
    <th><i class="fas fa-user icon"></i> Employee ID:</th>
    <td><?php echo $emp;?></td>
  </tr>
  <tr>
    <th><i class="fas fa-envelope-square icon"></i> Email:</th>
    <td><?php echo $email;?></td>
  </tr>
  <tr>
    <th><i class="fas fa-phone-volume icon"></i> Phone:</th>
    <td><?php echo $phn;?></td>
  </tr>
  <tr>
    <th><i class="fas fa-users icon"></i> Gender:</th>
    <td><?php echo $gender;?></td>
  </tr>
  <tr>
    <th><i class="fas fa-building icon"></i> Department:</th>
    <td><?php echo $dep;?></td>
  </tr>
  <tr>
    <th><i class="fas fa-user-check icon"></i> Username:</th>
    <td><?php echo $username;?></td>
  </tr>
  <tr>
    <th><i class="fas fa-key icon"></i> Password:</th>
    <td><?php echo $password;?></td>
  </tr>
  <tr>
    <th colspan="2"><center><button type="submit" name="done" style="color: black;" class="b1" id="myBtn"><b>Change Password</b></button>
  </center></th>

  </tr>
</table>
            </p>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div id="myModal" class="modal">
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

</div>
<script>
setTimeout(function(){

  $('.loader_bg').fadeToggle();
},1500);

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
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
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

if(isset($_POST['done'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $npsw = $_POST['npsw'];
        $cpsw = $_POST['cpsw'];
 $q = mysqli_query($connection,"SELECT username,password from employee where username='$username' AND password = '$password' ");
 $num = mysqli_fetch_array($q);
  
if($num>0){
  $connection = mysqli_query($connection,"UPDATE employee set password = '$npsw' where username = '$username' ");
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