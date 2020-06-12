<?php

    session_start();    
    $conn =  mysqli_connect("localhost","root","","db");
    if(!$conn)
    {
         die("Connection failed" .mysqli_connect_error());
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $button = $_POST['btn'];

   
    $check = "SELECT * FROM Users WHERE username = '$username' AND password = '$password'";
	$qu = mysqli_query($conn,$check);
    $rows = mysqli_num_rows($qu);
   
    
?>
<?php
if($rows>0){
    $_SESSION['userLogin'] = "true";
    $_SESSION['username'] = $username;

?>

<html>
<body>


<script>
    alert("Login Successfull!!");
    window.location.href = "user.php";
</script>
</body>



<?php 
}else{
    $_SESSION['userLogin'] = "false";

?>

<script>

    alert('Wrong Credentials!!');
    window.location.href = "user.php";
</script>

<?php }?>

</html>