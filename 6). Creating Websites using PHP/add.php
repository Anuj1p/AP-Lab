<?php
session_start();
?>
<html>

<head>
    <title>FoodShala</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .label {

        color: white;
    }
    .main{
        margin-top:200px;
    }
    .data{
        margin-top:10px;
        margin-bottom:10px;
    }
    body{
        background-image: url('images/add.jpg');
        background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
       
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
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
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

<?php
if($_SESSION['ifLogin'] == "true"){
?>
<div class = "container main">
    <h2 class = "label">Enter New Food Item To Your Menu..</h2>
    <form method="POST" onsubmit="return check()" action="foodadd.php">
        <div class="form-group">
            <input type="text" class="form-control data" name="itemName" placeholder="Name Of the Item">
            <input type="text" class="form-control data" name="price" placeholder="Enter the Price of the item">
            <input type = "text" class="form-control data"name = "itemLink" placeholder = "Enter Image's Link!">
            <input type = "radio" class="form-control data"name = "veg" placeholder = "Veg/Non-veg">
            <span class = "label">Veg:<input type = "radio" name = "veg" value = "veg"></span>
            <span class = "label">Non-Veg<input type = "radio" name = "veg" value = "nonveg"></span> 
            <button type="submit" name="insert" id="insert" class="btn btn-success data">Submit</button>
        </div>

    </form>
</div>

<?php
}
else{
?>
    <h1 class = "label">Please Login as a Restaurant First!</h1>
    <a href = "restro1.php"><button type = "button" class = "btn btn-success">Login Here</button></a>

<?php
}
?>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
    
    </script>


</body>


</html>