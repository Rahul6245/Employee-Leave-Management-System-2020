<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}


.input-container {
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  margin-bottom: 15px;
  margin-top: 5%;
}

.icon {
  padding: 10px;
  background: gray;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid gray;
}
.btn {
  background-color: gray;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
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
.box{
                width:600px;
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
</style>
</head>
<body>
<div class="loader_bg">
  <div class="loader"></div>

</div>
<div class="topnav">
<b><a href="login.php">Admin</a></b>
 <b> <a href="employee/emplogin.php">Employee</a></b>
  <b><a href="newsletter.php">Developer</a></b>
</div>
<h3 style="text-align: center;">Employee Leave Management System 2020</h3>
<div class="box">
<h2>LogIn Failed!</h2>
<p style="color: red;"><b>Maybe your Username or Password Wrong! Enter The Correct One.Thank You.</b>
</p>

 <a href="login.php"> <button type="submit" name="submit" class="btn">Try Again</button></a>
</form>
<div class="footer">
<center><h5>All Rights By Rahul Biswas 2020 &copy; CopyRight</h5></center>
</div>
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
