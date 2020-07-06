<?php
session_start();
?>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'leave');
if(isset($_SESSION['username'])){
  $username =$_SESSION['username'];
  $query = "SELECT * FROM employee WHERE username = '{$username}'";
  $select_user_profile_query = mysqli_query($connection,$query);

  while($row = mysqli_fetch_array($select_user_profile_query)){
    $name = $row['name'];
    $emp = $row['emp'];
    $email = $row['email'];
    $phn = $row['phn'];
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
.box{
                width:800px;
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
input[type=text],[type=date], select {
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
textarea{
    width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
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
<div class="box">

<form action="" method="POST">
<h2>Apply For Leave</h2>
    <label for="fname">Name</label>
    <input type="text" name="name"  value="<?php echo $name;?>" readonly>
    <label for="fname">Employee ID</label>
    <input type="text" name="emp" value="<?php echo $emp;?>"  readonly>

    <label for="lname">Email</label>
    <input type="text"  name="email" value="<?php echo $email;?>"  readonly>
    <label for="lname">Phone</label>
    <input type="text"  name="phn" value="<?php echo $phn;?>"   readonly>
    <label for="lname">Username</label>
    <input type="text"  name="username" value="<?php echo $username;?>"  readonly>
    <label for="leave">Leave Type</label>
    <select id="leave" name="type" required>
    <option >Select Leave Type</option>
      <option value="Official">Official Leave</option>
      <option value="Sick">Medical Leave</option>
      <option value="Emergency">Emergency Leave</option>
      <option value="Emergency">Others</option>
    </select>
    <label for="lname">Leave Start</label>
    <input type="date"  name="start" placeholder="Enter the phone" required>
    <label for="lname">Leave End</label>
    <input type="date"  name="end" placeholder="Enter the phone" required>


    <input type="submit" name="done" value="Submit Leave"><br>
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


if(isset($_POST['done'])){

    $name = $_POST['name'];
    $emp = $_POST['emp'];
    $email = $_POST['email'];
    $phn = $_POST['phn'];
    $username = $_POST['username'];
    $type = $_POST['type'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $status = $_POST['pending'];
   
   
$q="INSERT INTO `apply`(`name`, `emp` , `email` , `phn` , `username` ,`type`,`start`,`end`,`status`) VALUES ('$name','$emp','$email' ,'$phn', '$username','$type','$start','$end','Pending')";

 $query = mysqli_query($connection,$q);
 

 if($query)
 {
     echo '<script> alert("Submit Leave Succseesfully")</script>';
 }
 else
 {
    echo '<script> alert("Submit Leave Succseesfully")</script>';
}
}
?>