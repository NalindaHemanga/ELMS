<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<style>
   ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

li {
    float: left;
}

a:link, a:visited {
    display: block;
    width: 120px;
    font-weight: bold;
    color: #ffffff;
    background-color: #001833;
    text-align: center;
    padding: 4px;
    text-decoration: none;
    text-transform: uppercase;
}

a:hover, a:active {
    background-color: #ffffff;
    color:#000000;
}
    
    
    
#slideshow { 
    margin: 50px auto; 
    position: relative; 
    width: 300px; 
    height: 300px; 
    padding: 10px; 
    box-shadow: 0 0 20px rgba(0,0,0,0.4); 
}

#slideshow > div { 
    position: absolute; 
    top: 20px; 
    left: 20px; 
    right: 20px; 
    bottom: 20px; 
}
 body {
        background: url(img/slideshow/home.png);
        overflow:hidden;
    }
    
  p {
    
    text-shadow: 1px 0 0 #000000, 0 -2px 0 #000, 0 3px 0 #000, -2px 0 0 #000;
  }


    
    
    
</style>

<script src="lib/jquery.min.js"></script>
    
  <script>  
    
    $("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  3000);

    
    </script>


</head>
<body>
    <div id="wrapper">

<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="about.php">About Us</a></li>
     <li><a href="login.php">Login</a></li>
</ul>
			
        <div><p style="text-align: center;"><img src="img/logonew.png" height="150" width="150" /></p>
                <p style="text-align: center;"><strong><span style="font-size: 26px; color:#00ccff;"> University of Colombo School of Computing</span></strong></p>
        <p style="text-align: center;"><span style="color: #0B4C5F;"><span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 22px; color:#1ad1ff;">Electronic Laboratory Management System of UCSC</span></span></p></div>
<!--		<?php include "includes/headerHomePage.php" ?>-->
		
		
<!--
		<div id="contentwrap" style=" width: 100%;">
        <div id="content">
-->


            
            <div id="slideshow">
   <div>
     <img src="img/slideshow/actuator.png">  </div>
     <div><img src="img/slideshow/breadboard.png">  </div>
      <div> <img src="img/slideshow/motor.png">  </div>
      <div> <img src="img/slideshow/Relay.png">  </div>
      <div> <img src="img/slideshow/shield.png">  </div>
  
 
   
</div>
            

        </div>
        </div>
		
<!--       <?php include "includes/footer.php" ?>-->
    </div>
</body>
</html>
