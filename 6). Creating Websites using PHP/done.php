<?php
    session_start();
    $RestroId = $_POST['RestroId'];
    $foodName = $_POST['foodName'];
    $price = $_POST['price'];
    $address = $_POST['address'];
    $username = $_SESSION['username'];

    $con = mysqli_connect("localhost","root","","db");
    
    $query = "INSERT INTO orders (Username,Address,RestroId,FoodItem,Price) VALUES ('$username','$address','$RestroId','$foodName','$price')";
    $res = mysqli_query($con,$query);
    
   
?>

<html>

<body>
    <?php
if($res){
        

?>
    <script>
    alert('Yay! Order Successful!');
    window.location.href = "user.php";
    </script>
    <?php
}else{

    ?>

    <script>
        alert("Sorry Order Not Succesful please try again!");
        window.location.href = "menu.php";
    </script>

    <?php

}?>
</body>



</html>