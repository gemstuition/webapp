<?php 

include("config.php");
session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
$query = "SELECT UserNameID FROM user where userName = '$_POST[user]' AND pass = '$_POST[pass]'"; 
$result = mysqli_query($conn,$query);
if (!$query) {
    die("Connection failed: " . mysqli_connect_error());
}
echo " Connected successfully";

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);


$active = $row['active'];
      
      $count = mysqli_num_rows($result);
	  
	  echo $count;
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: welcome.php");
		 //echo " welcome ";
        
      }
	  else 
	  {
         $error = "Your Login Name or Password is invalid";
		 
		 //echo $error;
		 
		 
		 header("location: signin.html");
		 
      }
   }
?>

