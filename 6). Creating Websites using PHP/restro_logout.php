<?php
    session_start();
    $conn =  mysqli_connect("localhost","root","","db");
    if(!$conn)
    {
         die("Connection failed" .mysqli_connect_error());
    }
    $_SESSION['ifLogin'] = "false";
?>

<html>

<body>

<script>
alert("Logout Successful!!");
window.location.href = "restro1.php";

</script>
</body>

</html>
