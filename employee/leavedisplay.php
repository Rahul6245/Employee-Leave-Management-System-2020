<?php
session_start();
?>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'leave');
error_reporting(0);
if(isset($_SESSION['username'])){
  $username =$_SESSION['username'];
  $query = "SELECt * FROM apply WHERE username = '{$username}'";
  $select_user_profile_query = mysqli_query($connection,$query);

  while($row = mysqli_fetch_array($select_user_profile_query)){
    $id = $row['id'];
    $name = $row['name'];
    $emp = $row['emp'];
    $email = $row['email'];
    $phn = $row['phn'];
    $username = $row['username'];
    $type = $row['type'];
    $start = $row['start'];
    $end = $row['end'];
    $status = $row['status'];
  }
  
}
?>

<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<head>
<style>
table, th, td {
border: 1px solid black;
border-collapse: collapse;
margin-top: 1%;
}
th, td {
  padding: 9px;
  text-align: left;
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
    <h2>View  My Leave Status</h2>
    <button class="b1" onclick="window.print()"><b> <i class="fas fa-print"></i> Print</b></button><br><br>
    <div class="print-container">
    <center><h3><u>EMPLOYEE LEAVE MANAGEMENT SYSTEM 2020</u></h3></center>

    <table style="width:100%">

<tr>
<th colspan="2" style="text-align:center">MY LEAVE STATUS</th>
</tr>
<tr>
<th>LEAVE ID:</th>
<td><?php echo $id;?></td>
</tr>
<tr>
<th> NAME:</th>
<td><?php echo $name;?></td>
</tr>
<tr>
<th>EMPLOYEE ID:</th>
<td><?php echo $emp;?></td>
</tr>
<tr>
<th>EMAIL:</th>
<td><?php echo $email;?></td>
</tr>
<tr>
<th>PHONE:</th>
<td><?php echo $phn;?></td>
</tr>
<tr>
<th>LEAVE TYPE:</th>
<td><?php echo $type;?></td>
</tr>
<tr>
<th> LEAVE START DATE:</th>
<td><?php echo $start;?></td>
</tr>
<tr>
<th> LEAVE END DATE</th>
<td><?php echo $end;?></td>
</tr>
<tr>
<th> LEAVE STATUS:</th>
<td style="color: red;"><b><?php echo $status;?></b></td>
</tr>
</table>
<p>*This is electronic print.No signature need.</p>
</div></div>
<script>
setTimeout(function(){

  $('.loader_bg').fadeToggle();
},1500);

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