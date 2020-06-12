<?php

    session_start();    
    $conn =  mysqli_connect("localhost","root","","db");
    if(!$conn)
    {
         die("Connection failed" .mysqli_connect_error());
    }
    $restro_name = $_POST['restroname'];
    $restro_id = $_POST['restroid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $button = $_POST['btn'];
    
    if(isset($button))
   {
   		$q = "SELECT * FROM restro WHERE email = '$email'";
        $query = mysqli_query($conn,$q);
        $rows = mysqli_num_rows($query);


  

   }
   
?>
<html>
<body>

<?php
if($rows<1){
     $qu = "INSERT INTO restro values('$restro_name' , '$restro_id' , '$email','$phone','$password')";
     mysqli_query($conn,$qu);
     
?>

<script>
     alert("Signup Successfull!!");
     window.location.href = "restro1.php";

</script>

<?php
}
else{
?>
<script>
alert("User already exists");
     window.location.href = "restro1.php";
</script>
<?php
}
?>
</body>



</html>