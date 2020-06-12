<?php
session_start();
$conn = mysqli_connect("localhost","root","","db");
$id = $_SESSION['restroId'];
$query = "SELECT * FROM food_items WHERE RestroId = '$id'";
$res = mysqli_query($conn,$query);

?>

<html>
<style>
    
    body {
            background-image: url('images/burger.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
       
</style>
<head>
    <title>Your Menu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand" href="#">FoodShala</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="restro1.php">Home <span class="sr-only">(current)</span></a>
                </li>
               
            </ul>
            
        </div>
    </nav>
    <div class="container">
    <?php
    if($_SESSION['ifLogin'] == "true"){
    ?>
    
    <div class="row">
    <?php

while($result = mysqli_fetch_assoc($res)){

?>
    
        
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="card align-items-center main my-4" style="width: 18rem;">
                    <img src="<?php echo $result['Image'];?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" id=""><?php echo $result['ItemName'];?></h5>
                        
                        <p class="card-text" id="">Price: <?php echo $result['Price'];?></p>
                        <b><p class="card-text"><?php echo $result['Type'];?></p></b>
                    </div>
                </div>
            </div>
        

        <?php
}
?>
</div>


<?php
    }else{
    ?>
    <h1>Please Login first!</h1>
    <a href = "restro1.php"><button type = "button" class = "btn btn-success">Login Here</button></a>
    <?php
    }
    ?>
</div>
</body>


</html>