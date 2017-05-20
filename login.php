<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
	  
	  echo $myusername;
	  echo $mypassword;
      
	  //$query = "SELECT UserNameID FROM user where userName = '$_POST[user]' AND pass = '$_POST[pass]'"; 
       //$result = mysqli_query($conn,$query);
	   
	   //if (!$query) {
    //die("Connection failed: " . mysqli_connect_error());
//}
//echo " Connected successfully";
      $sql = "SELECT UserNameID FROM user WHERE userName = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
	  $active = $row['active'];
      
      $count = mysqli_num_rows($result);
	  echo $count;
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
  
  <body bgcolor = "#73BD32">
   
   <script>
      //document.bgColor = (Math.random() < 0.5) ? '#0000FF' : '#FF0000';

      //(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      //(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      //m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      //})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      //ga('create', 'UA-5681004-6', 'auto');
      //ga('send', 'pageview');
    </script>
	
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>