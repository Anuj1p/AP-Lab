<?php
session_start();
$con = mysqli_connect("localhost","root","","db");
$restroId = $_SESSION['restroId'];
$query = "SELECT * FROM orders WHERE RestroId = '$restroId'";
$res = mysqli_query($con,$query);
$count = 0;
?>
<html>

<head>
    <title>FoodShala</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .label {
        align-content: center;
        color: white;
    }
    body {
            background-image: url('images/menu.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
       
    </style>
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
        <h1 class = "label">Orders From Your Restaurant...</h1>
        <br>
        <table class="table table-light">
            <thead>
            <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item_Name</th>
                    <th scope="col">CustomerId</th>
                    <th scope="col">CustomerAddress</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
                <?php
        while($result = mysqli_fetch_assoc($res)){
            $count = $count + 1;
      ?>
              
            <tbody>
                <tr>
                    <th scope="row"><?php echo $count;  ?></th>
                    <td><?php echo $result['FoodItem'];?></td>
                    <td><?php echo $result['Username'];?></td>
                    <td><?php echo $result['Address'];?></td>
                    <td><?php echo $result['Price'];?></td>
                </tr>
                <?php

        }

        ?>
            </tbody>
        </table>

        <?php
}else{
        ?>
   
<h1>Please Login first</h1>
<a href = "restro1.php"><button type = "button" class = "btn btn-success">Login Here</button></a>
<?php
}
?>
</div>
</body>


</html>