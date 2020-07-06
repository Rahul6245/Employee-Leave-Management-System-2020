<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<head>
<style>
.box{
                width:1300px;
                padding: 40px;
                background: white;
                margin: 200px auto;
                box-shadow: 0 0 10px;
                margin-top: 1%;
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
.loader_bg{
    position: fixed;
    z-index: 999999;
     background: #77c;
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
  <a href="../dashboard.php"><i class="fab fa-dashcube"></i> Dashboard</a>
  <a href="../add.php"><i class="fas fa-user-friends"></i> Employee</a>
  <div class="dropdown">
    <button class="dropbtn"><i class="fas fa-sign-out-alt"></i> Leave 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="viewleaveonly.php">All Leave</a>
      <a href="viewleave.php">Action Leave</a>
      <a href="../searchleave.php">Search Leave</a>
    </div>
  </div> 
  <a href="../profile.php"><i class="fas fa-address-book"></i> My Profile</a>
  <a href="../msg.php"><i class="fas fa-comment-dots"></i>  Message</a>
  <a href="../logout.php"> <i class="fas fa-user"></i>  Logout</a>
</div>
<div class="box">
<form method="GET">
    <table id="customers">
    <tr>
    <th style='text-align:center' colspan="13" ><h3>Details Of Leave</h3></th>
    </tr>
  <tr>
    <th style='text-align:center'>ID</th>
    <th style='text-align:center'>Name</th>
    <th style='text-align:center'>Employee ID</th>
    <th style='text-align:center'>Email</th>
    <th style='text-align:center'>Phone</th>
    <th style='text-align:center'>Username</th>
    <th style='text-align:center'>Leave Type</th>
    <th style='text-align:center'>Leave Start</th>
    <th style='text-align:center'>Leave End</th>
    <th style='text-align:center'>Status</th>
    <th style='text-align:center'>Action</th>
  </tr>
  <?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'leave');
 $q = "select * from apply  ";

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
      <td style='text-align:center'>" .$result['username']. "</td>
      <td style='text-align:center'>" .$result['type']. "</td>
      <td style='text-align:center'>" .$result['start']. "</td>
      <td style='text-align:center'>" .$result['end']. "</td>
      <td style='text-align:center;color:green'>" .$result['status']. "</td>
      <td style='text-align:center'><a href='approve.php?id=$result[id]&name=$result[name]&emp=$result[emp]&email=$result[email]&phn=$result[phn]&username=$result[username]&type=$result[type]&start=$result[start]&end=$result[end]&status=$result[status]'><i class='fas fa-user-edit' style='color:green'></i> </a> </td>

     </tr>
      ";
  }
 }
else
{
  echo " No records Found";
}
?>
    </div>
</table>
</form>
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