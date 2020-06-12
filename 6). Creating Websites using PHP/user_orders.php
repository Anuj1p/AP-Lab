<?php
session_start();
$con = mysqli_connect("localhost","root","","db");
$username = $_SESSION['username'];
$query = "SELECT * FROM orders WHERE Username = '$username'";
$res = mysqli_query($con,$query);

?>

<html>
<head>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .label {
        align-content: center;
        color: white;
    }
    body{
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
                    <a class="nav-link" href="user.php">Home <span class="sr-only">(current)</span></a>
                </li>
                
                
            </ul>
            
        </div>
    </nav>

    
<div class="container">
        <h1 class = "label">Your Orders...</h1>
        <br>
        <table class="table table-light">
            <thead>
                
            <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item_Name</th>
                    <th scope="col">Restaurant Id</th>
                    <th scope="col">Price</th>
                </tr>
                <?php
                $count = 0;
        while($result = mysqli_fetch_assoc($res)){
            $count = $count + 1;
      ?>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $count;  ?></th>
                    <td><?php echo $result['FoodItem'];?></td>
                    <td><?php echo $result['RestroId'];?></td>
                    
                    <td><?php echo $result['Price'];?></td>
                </tr>
                <?php

        }

        ?>
            </tbody>
        </table>
    </div>

    </body>

    </html>