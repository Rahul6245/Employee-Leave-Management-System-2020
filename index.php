<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style1.css">
    <style>
        .loader_bg{
  position: fixed;
  z-index: 999999;
  background: #fff;
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
  border: 1em solid blue;
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
    <div class="about-section">
        <div class="inner-container">
            <h1>Employee Leave Management System 2020</h1>
            <p class="text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus velit ducimus, enim inventore earum, eligendi nostrum pariatur necessitatibus eius dicta a voluptates sit deleniti autem error eos totam nisi neque voluptates sit deleniti autem error eos totam nisi neque.
            </p>
            <div class="skills">
                <a href="login.php"><button><span>Enter The LogIn page</span></button></a>
                <a href="owner.php"><button><span>Developer</span></button></a>
                
            </div>
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