<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

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

.box{
                width:1000px;
                padding: 50px;
                background: white;
                margin: 150px auto;
                box-shadow: 0 0 10px;
                position: relative;
                margin-top: 1%;
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
            .topnav {
  overflow: hidden;
  background-color: burlywood;
}

.topnav a {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: blue;
  color: white;
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
<div class="topnav">
<b><a href="login.php">Admin</a></b>
 <b> <a href="#contact">Employee</a></b>
  <b><a href="contact.php">Contact</a></b>
</div>
<h3 style="text-align: center;"><u>CONTACT FORM</u></h3>
  <div class="box">
  <form action="" method="POST">
    <label for="fname">Name</label><br>
    <input type="text"  name="name" placeholder="Your name.." required><br>

    <label for="lname">Email</label><br>
    <input type="text"  name="email" placeholder="Your email.." required><br>

    <label for="lname">Employee ID</label><br>
    <input type="text"  name="emp" placeholder="Your ID.." required><br>

    <label for="subject">Subject</label><br>
    <textarea  name="subject" placeholder="Your Query.." style="height:150px" required></textarea><br>

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

if(isset($_POST['done'])){

 $name = $_POST['name'];
     $email = $_POST['email'];
     $emp = $_POST['emp'];
     $subject = $_POST['subject'];
     $status = $_POST['Unread'];
     $query="INSERT INTO `contact`(`name`, `email`, `emp`, `subject`, `status`) VALUES ('$name','$email','$emp','$subject','unread')";

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