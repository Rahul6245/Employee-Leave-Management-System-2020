<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'leave');
$id = $_GET['id'];
$status = $_GET['status'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
input[type=text], select {
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

<div class="form">
  <form action="" method="POST">
<h3><u>Approve Leave</u></h3>
<label for="fname">ID</label>
    <input type="text" name="id" value="<?php echo "$id" ?>" placeholder="Enter the Id">
    <label for="country">Leave Status</label>
    <select name="status" value="<?php echo "$status" ?>">
    <option>Select Status</option>
      <option value="Approved">Approved</option>
      <option value="Unapproved">Unapproved</option>
    </select>
    
    <input type="submit" name="done" value="Update Leave"><br>
  </form></div>
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
  $id = $_POST['id'];
    $status = $_POST['status'];
       $q = "update apply set status='$status' where id=$id";
       $query = mysqli_query($connection,$q);
       
if($query)
 {
     echo '<script> alert("Employee Leave Update")</script>';
 }
 else
 {
    echo '<script> alert("Employee Leave Not Update")</script>';
}
}

?>