<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'leave');
error_reporting(0);
$id = $_GET['id'];
$subject = $_GET['subject'];
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

            input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
.b1{
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
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
<h2>UPDATE THE NOTICE</h2>
<form method="POST">
<label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write The Notice Here..." style="height:200px" ><?php echo $subject; ?></textarea>

    <input type="submit" name ="done"  value="Update Notice"></form><br>

    <a href="noticeview.php"><button class="b1" style="background-color: #2196F3;text-decoration:none; display: inline-block;"> <i class="fas fa-eye" style="color: black;"></i> Action</button></a>
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
if(isset($_POST['done'])){
    $subject = $_POST['subject'];
    
       $q = "update notice set id='$id',subject='$subject' where id=$id";
       $query = mysqli_query($connection,$q);
       if($query)
 {
     echo '<script> alert("Employee Data Update")</script>';
 }
 else
 {
    echo '<script> alert("Employee Data Not Update")</script>';
}
header('location:noticeview.php');
}

?>