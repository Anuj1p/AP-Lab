<?php
session_start();
if(!(isset($_SESSION['ifLogin']))){
    $_SESSION['ifLogin'] = "false";
}
?>

<html>

<head>
    <title>FoodShala</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .label {
        color:white;
    }
   
    body{
        background-image: url('images/back.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
      
        background-size: cover;
    }
    .front1{
            margin: auto;
            width: 90%;
            padding: 10px;
            text-align: center;
            margin-top: 200px;
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
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                
                
            </ul>
                  </div>
    </nav>
<div class = "container">
<div class = "front1">
       <?php

if(($_SESSION['ifLogin'] == "true")){
    ?>
    
    <h1 class = "label">Welcome To FoodShala!!</h1>

    <a href="restro_logout.php"><button type="button" class="btn btn-success">Logout</button></a>
    <a href="add.php"><button type="button" class="btn btn-success">Add FoodItems to Your Menu</button></a>
    <a href="seeMenu.php"><button type="button" class="btn btn-success">See Your Menu</button></a>
    <a href="orders.php" class = "my-3"><button type="button" class="btn btn-success">See Orders From Your Restro</button></a>

    <?php
}
else{
?>
     <h1 class = "label">Welcome To FoodShala!!</h1>

    <button type="button" class="btn btn-success user" data-toggle="modal" data-target="#signup"
        data-whatever="@mdo">Signup</button>
    <button type="button" class="btn btn-success user" data-toggle="modal" data-target="#login"
        data-whatever="@fat">Login</button>

    <?php
}
?>
</div>
</div>
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SignUp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="restro_signup.php" onsubmit="return check()" method="POST">

                        <div class="form-group">
                            <label for="RestroName" class="col-form-label">Restro Name</label>
                            <input type="text" class="form-control" name="restroname" id="restro_name"
                                placeholder="Restro Name" required>
                        </div>
                        <div class="form-group">
                            <label for="RestroId" class="col-form-label">RestroId</label>
                            <input type="text" class="form-control" name="restroid" id="RestroId"
                                placeholder="Restro Id">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Restro Email"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number"
                                required></textarea>
                        </div>







                        <button type="submit" name="btn" class="btn btn-primary">SignUp</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="restro_login.php" onsubmit="return check2()" method="POST">

                        <div class="form-group">
                            <label for="restroid" class="col-form-label">RestroId</label>
                            <input type="text" class="form-control" id="restroid" name="restroid">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"></textarea>
                        </div>


                        <button type="submit" name="btn" class="btn btn-primary">Login</button>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


</body>


</html>