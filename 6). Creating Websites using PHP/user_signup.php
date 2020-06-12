<?php

    session_start();    
    $conn =  mysqli_connect("localhost","root","","db");
    if(!$conn)
    {
         die("Connection failed" .mysqli_connect_error());
    }
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $FoodPref = $_POST['FoodPref'];
    $button = $_POST['btn'];

    if(isset($button))
   {
   		$q = "SELECT * FROM Users WHERE email = '$email'";
        $query = mysqli_query($conn,$q);
        $rows = mysqli_num_rows($query);

   if($rows<1)
   {
   		$qu = "INSERT INTO Users values('$first_name' , '$last_name' , '$username','$email','$password','$FoodPref')";
   		mysqli_query($conn,$qu);
   		echo("Successfull!!");
   }
   else {
   		echo "User already exists";
   }

   }
   
?>