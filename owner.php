<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

<link href="style.css" rel="stylesheet" type="text/css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box; }
.box{
                width:1000px;
                padding: 50px;
                background: white;
                margin: 150px auto;
                box-shadow: 0 0 10px;
                position: relative;
                margin-top: 3%;
                margin-bottom: 1%;
                
                text-align:center ;
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
.client{
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}
.client img{
 width: 60px;
 height: 60px;
 border-radius: 50px;
 border:3px solid #333;
 margin: 0 10px;
}
.client span{
  display: block;
}
.name{
  font-weight: 600;
}
.des{
  color:#333;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fab {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fab:hover {
    opacity: 0.7;
    color: #55ACEE;
}
</style>
</head>
<body>
<div class="loader_bg">
  <div class="loader"></div>

</div>
<div class="box">
  <h2>Rahul Biswas</h2>
            <p>
            Hi, I am Rahul Biswas. I am a Web Developer and expert in HTML, CSS, WORDPRESS, PHP. 
            I have already done many projects in my student career. 
            I have already done a 1-month internship in a reputed IT company and gain proper knowledge about the IT World. 
            I represented my project in The 2nd world INDIANA SUMMIT 2019, IUPUI, USA.
            I am interested in web development and done many databases project. 
            I want to share my knowledge in the proper place and do my work with a brilliant output. 
            I am very hard working person and doing my best  till the end. Thank you.
</p>
<div class="client">

<img src="rahul.jpg" alt="">
<div class="">
  <span class="name">Rahul Biswas</span>
  <span class="des">Developer</span>
</div>
</div>
<a href="https://www.facebook.com/profile.php?id=100007680459526" target="_blank"><i class="fab fa-facebook-square"></i></a>
<a href="https://twitter.com/RahulBi77600805" target="_blank"><i class="fab fa-twitter-square"></i></a>
<a href="https://github.com/" target="_blank"><i class="fab fa-github-square"></i></a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>

<script>
setTimeout(function(){

  $('.loader_bg').fadeToggle();
},1500);

  </script>

</body>
</html>
