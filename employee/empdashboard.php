<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location:empdashboard.php');
}
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
    $email = $row['email'];
    $emp = $row['emp'];
    $username = $row['username'];
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
button{
    margin-top: 2%;
    border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}
.info {background-color: red;}
.info:hover {background: #0b7dda;}

.welcome{
  display: inline-block;
  padding: 0 25px;
  height: 50px;
  font-size: 16px;
  line-height: 50px;
  border-radius: 25px;
  background-color: #f1f1f1;
}
.welcome img {
  float: left;
  margin: 0 10px 0 -25px;
  height: 50px;
  width: 50px;
  border-radius: 50%;
}
.box{
                width:1000px;
                padding: 50px;
                background: white;
                margin: 150px auto;
                box-shadow: 0 0 10px;
                margin-top: 1%;
                margin-bottom: 1%;
                position: relative;
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
            input[type=text],[type=date], textarea {
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
<div class="welcome">
<img src="img_avatar.png" alt="Person" width="96" height="96">Welcome Employee <b><?php echo $_SESSION['username']  ?></b>
</div><br>

<center><button id="myBtn" class="info">Important Spotlight Circuler</button></center>


<div id="myModal" class="modal">


  <div class="modal-content">
    <span class="close">&times;</span>
    <?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'leave');
 $q = "select * from notice ";

 $query = mysqli_query($connection,$q);
 $total = mysqli_num_rows($query );
 if($total!=0)
 {
  while($result = mysqli_fetch_assoc($query))
  {
    echo"
   <b> <p>" .$result['subject']. "</p></b>

    </p>
    ";
  }
}
else
{
 echo " No records Found";
}
?>
  </div>

</div>
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
<div class="box">
  <h2>Message Form</h2>
  <form action="" method="POST">
    <label for="fname">Name</label><br>
    <input type="text"  name="name" value="<?php echo $name;?>" readonly ><br>

    <label for="lname">Email</label><br>
    <input type="text"  name="email" value="<?php echo $email;?>" readonly ><br>

    <label for="lname">Employee ID</label><br>
    <input type="text"  name="emp" value="<?php echo $emp;?>" readonly><br>
    <label for="lname">Username</label><br>
    <input type="text"  name="username" value="<?php echo $username;?>" readonly><br>
    <label for="lname">Subject</label><br>
    <input type="text"  name="subject" placeholder="Your  Messages Subject"><br>

    <label for="subject">Write Your Mesage Here</label><br>
    <textarea  name="content" placeholder="Your Messages." style="height:150px" required></textarea><br>

    <input type="submit" name="done"  value="Submit">
  </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>

<script>
setTimeout(function(){

  $('.loader_bg').fadeToggle();
},1500);

  </script>
</body>
</html>
<?php

$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,'leave');
error_reporting(0);

if(isset($_POST['done'])){

 $name = $_POST['name'];
     $email = $_POST['email'];
     $emp = $_POST['emp'];
     $username = $_POST['username'];
     $subject = $_POST['subject'];
     $content = $_POST['content'];
     $status = $_POST['Unread'];
     $query="INSERT INTO `contact`(`name`, `email`, `emp`,`username`, `subject`,`content`, `status`) VALUES ('$name','$email','$emp','$username','$subject','$content','unread')";

 $query_run = mysqli_query($connection,$query);
 if($query)
 {
     echo '<script> alert("Your Message Suucessfully Sent")</script>';
 }
 else
 {
    echo '<script> alert("Sorry! Message Not Sent")</script>';
}
}
?>