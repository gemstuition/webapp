<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome to Gems Tuition </title>
   </head>
   
   <body>
      <h1>Welcome to Gems Tuition <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>