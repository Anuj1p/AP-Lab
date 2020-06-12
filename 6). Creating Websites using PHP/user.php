<?php
session_start();
$con = mysqli_connect("localhost","root","","db");
$query = "SELECT * FROM restro";
$run_query = mysqli_query($con,$query);
if(isset($_POST['search'])){
    $searchVal = $_POST['searchValue'];
    echo "<script>alert('hello')</script>";
}
if(!(isset($_SESSION['userLogin']))){
    $_SESSION['userLogin'] = "false";
}



?>

<html>

<head>
    <title>FoodShala</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .label {
        align-content: center;
    }
    .name{
        margin-top:5px;
        margin-left:10px;
        margin-right:10px;
    }
    .heading {
        color: white;
    }

    .main {
        margin-top: 20px;
        padding-bottom: 20px;
    }

    body {
        background-image: url('images/burger.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;

    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand" href="index.html">FoodShala</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <?php

if($_SESSION['userLogin'] == "true"){

    ?>
                <li class="nav-item name">
                    Hello<?php echo $_SESSION['username'];?>
                </li>
                <a href="user_logout.php"><button type="button" class="btn btn-success">Logout</button></a>
                <a href="user_orders.php"><button type="button" class="btn btn-success">Your Orders</button></a>


                <?php
}
    else{ 
        ?>
                <button type="button" class="btn btn-success user" data-toggle="modal" data-target="#signup"
                    data-whatever="@mdo">Signup</button>
                <button type="button" class="btn btn-success user" data-toggle="modal" data-target="#login"
                    data-whatever="@fat">Login</button>
                <?php
    }
    ?>


            </ul>
            
        </div>
    </nav>




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
                    <form action="user_signup.php" onsubmit="return check()" method="POST">

                        <div class="form-group">
                            <label for="first_name" class="col-form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="col-form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">UserName</label>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Your UserName" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="food" class="col-form-label">Your Food Preference</label>
                            <input type="text" class="form-control" name="FoodPref" placeholder="Veg/Non-Veg"
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
                    <form action="user_login.php" onsubmit="return check2()" method="POST">

                        <div class="form-group">
                            <label for="username" class="col-form-label">UserName</label>
                            <input type="text" class="form-control" id="username" name="username">
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

    </div>
    <div class="container">
        <div class="row">

            <?php
                      while($result = mysqli_fetch_assoc($run_query)){

?>


            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="card align-items-center main" style="width: 18rem;">
                    <img src="images/restro.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" id=""><?php echo $result['RestroName'];?></h5>
                        <form action="userMenu.php" method="POST">
                            <input type="hidden" name="menu" value="<?php echo $result['Username'];?>">
                            <button type="submit" class="btn btn-success">See Menu</button>
                        </form>
                    </div>
                </div>
            </div>


            <?php
}
?>

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

    <script>
    function check() {
        fname = document.getElementById('first_name').value;
        lname = document.getElementById('last_name').value;
        match = /[0-9]/g;
        check1 = match.test(fname); // Checking if the name has some numeric value of not
        check2 = match.test(lname);
        if (!check1 && !check2) {
            return true;
        } else {
            alert("Please Check the format!!");
            return false;
        }
    }
    </script>



</body>


</html>