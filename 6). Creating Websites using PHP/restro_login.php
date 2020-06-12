<?php

    session_start();    
    $conn =  mysqli_connect("localhost","root","","db");
    if(!$conn)
    {
         die("Connection failed" .mysqli_connect_error());
    }
    $username = $_POST['restroid'];
    $password = $_POST['password'];
    $button = $_POST['btn'];

   
    $check = "SELECT * FROM restro WHERE Username = '$username' AND Password = '$password'";
	$qu = mysqli_query($conn,$check);
    $rows = mysqli_num_rows($qu);
    $name = mysqli_fetch_assoc($qu);

    
   
?>

<?php
    if($rows>0){
        $_SESSION['ifLogin'] = "true";    // Setting the Restaurant's login Session Variable  
        $_SESSION['restroId'] = $username;      // Setting the Restaurant's Id Session Variable
        $_SESSION['restroName'] = $name['RestroName'];  // Setting the Restaurant's Name Session Variable
?>
<html>

<body>


<script>
    alert("Login Successfull!!");
    window.location.href = "restro1.php";   //Redirecting to Restaurant's main page
</script>


<?php }
    else{
        $_SESSION['ifLogin'] = "false";    //Setting the Restaurant's login Session Variable to be False
    ?>
<script>
alert('Wrong Credential!!');
window.location.href = "restro1.php"

</script>


<?php
    }
    ?>

    </body>

    </html>