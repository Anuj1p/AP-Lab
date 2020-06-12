<?php
session_start();

?>

<html>

<head>
    <title>Menu</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .main {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .label {
        color: white;
    }

    body {
        background-image: url('images/menu.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
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
                    <a class="nav-link" href="#"></a>
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

            <button type="button" class="btn btn-secondary mx-2" id="popcart" data-container="body"
                data-toggle="popover" data-placement="bottom" data-html="true">
                Cart(<span id="cart">0</span>)
            </button>


        </div>
    </nav>



    <div class="container">
        <div class="col">
            <h1 class="label">FoodShala CheckOut!</h1>
            <h2 class="label">Review Your Cart Items!</h2>


            <ul class="list-group" id = "items">
                
               
            </ul>

        </div>
        <div class="col my-4">
            <h1 class="label">Enter Your Address..</h1>

            <form action = "done.php" method = "POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="inputName" class="label">Name</label>
                            <input type="text" class="form-control" id="Name" placeholder="Name">
                        </div>
                        <div hidden class="form-group">
                            <input type="text" class="form-control" id="RestroId" name = "RestroId">
                        </div>
                        <div hidden class="form-group">
                            
                            <input type="text" class="form-control" id="foodName" name = "foodName">
                        </div>
                        <div hidden class="form-group">
                            
                            <input type="text" class="form-control" id="price" name = "price">
                        </div>
                                                 
                        <div class="form-group">
                            <label for="inputAddress" class="label">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name = "address" placeholder="1234 Main St">
                        </div>
                        
                        
                    </div>


                    <button type="submit" class="btn btn-primary">Place Order</button>
            </form>


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
    if (localStorage.getItem('cart') == null) {
        var cart = {};
        console.log(cart);

    } else {
        cart = JSON.parse(localStorage.getItem('cart'));
        let arr = [];
        var i = 0;
        console.log(cart);
        for(var item in cart){
            var qty = cart[item][0];
            var food_name = cart[item][1];
            var restro_name = cart[item][4];
            var price = cart[item][3];
            var restro_id = cart[item][2];
            
            mystr = `<li class="list-group-item d-flex justify-content-between align-items-center">
                    ${food_name}   FROM--------------------   ${restro_name}
                    <span class="badge badge-primary badge-pill">Quantity: ${qty}</span>
                </li>`
                $('#items').append(mystr);
        }
        var total_price = qty*price;
        $('#RestroId').val(restro_id);  // Setting the Restaurant's id value in the hidden field 
        $('#foodName').val(food_name);
        $('#price').val(total_price);
        
        localStorage.clear();
    }
    </script>
</body>


</html>