<?php
    session_start();    
    $conn =  mysqli_connect("localhost","root","","db");
    if(!$conn)
    {
         die("Connection failed" .mysqli_connect_error());
    }

    $q = "SELECT * FROM food_items";           
    $query = mysqli_query($conn,$q);   
    $rows = mysqli_num_rows($query);
    

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
           

            <button type="button" class="btn btn-secondary mx-2" id="popcart" data-container="body"
                data-toggle="popover" data-placement="bottom" data-html="true">  
                Cart(<span id="cart">0</span>)   
            </button>  


        </div>
    </nav>
    <div class="container">
        <?php
        if($_SESSION['userLogin'] != "true" ){
        ?>
        <h3 class="label">Please Login to order</h3>
        <a href="user.php"><button class="btn btn-success">Login Here</button></a>
        <?php
        }
        ?>
        <div class="row">
            <?php
while($result = mysqli_fetch_assoc($query)){    

    ?>
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="card align-items-center main my-4" style="width: 18rem;">
                    <img src="<?php echo $result['Image'];?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" id="namepr<?php echo $result['id']?>"><?php echo $result['ItemName'];?>
                        </h5>
                        <p class="card-text" id="restnamepr<?php echo $result['id']?>">
                            <?php echo $result['RestroName'];?></p>
                        <p class="card-text" id="pricepr<?php echo $result['id']?>"> <?php echo $result['Price'];?></p>
                        <p hidden class="card-text" name="rest"
                                id="restpr<?php echo $result['id'];?>"><?php echo $result['RestroId'];?></p>
                           
                        <?php
                        if($_SESSION['userLogin'] == "true"){    // Checking if the User if Login Or Not
                        ?>
                        <span id="divpr<?php echo $result['id'];?>" class="divpr">
                             <button href="#" id="pr<?php echo $result['id'];?>" name="cart"
                                class="btn btn-primary cart">Add To Cart</button>
                        </span>
                        <?php
                        }else{
                        ?>


                        <?php
                        }
                        ?>
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
    <?php
if($_SESSION['userLogin'] == "true"){  // Checking if the User is logged in or Not
?>
    <script>
    if (localStorage.getItem('cart') == null) {  // Initializing the cart
        var cart = {};       
        updatePopover(cart);
    } else {
        cart = JSON.parse(localStorage.getItem('cart'));
        updateCart(cart);
        updatePopover(cart);
    }
    $('.divpr').on("click", "button.cart", function() {
        var idStr = this.id.toString();
        if (cart[idStr] != undefined) {   // Checking if the item already exists in the cart
            qty = cart[idStr][0] + 1;      // incrementing the count of the already exisiting item 
        } else {
            qty = 1;
            price = document.getElementById('price' + idStr).innerHTML; 
            name = document.getElementById('name' + idStr).innerHTML;
            restro_id = document.getElementById('rest' + idStr).innerHTML;
            cart1 = JSON.parse(localStorage.getItem('cart')); 
            var canOrder = true; //
            restro_name = document.getElementById('restname' + idStr).innerHTML;

            for (var item in cart1) {
                if (cart1[item][2] != restro_id) {  // Checking if some other restaurant's food item already exists in the cart 
                    canOrder = false;
                }
            }

            if (canOrder) {
                cart[idStr] = [qty, name, restro_id, price, restro_name]; // initializing the cart with all the necessary values for a particular product id
            } else {
                alert("You cannot order from two restaurants simultaneously!");
            }
        }

        updateCart(cart);
        updatePopover(cart);
    });

    function updateCart(cart) {         // This function will replace add to cart button with + and - buttons
        for (var item in cart) {
            document.getElementById('div' + item).innerHTML = "<button id = 'minus" + item +
                "'class = 'btn btn-primary minus'>-</button> <span id = 'val" + item + "''>" + cart[item][0] +
                "</span> <button id = 'plus" + item + "' class = 'btn btn-primary plus'> + </button>"
            localStorage.setItem('cart', JSON.stringify(cart));   // Storing the cart inside localStorage after converting it into a string
           
            updatePopover(cart);  

        }
    }

    $('.divpr').on("click", "button.minus", function() {    // action if the minus button is clicked
        a = this.id.slice(7, );   // getting the product id by slicing
        cart['pr' + a][0] = cart["pr" + a][0] - 1;
        cart['pr' + a][0] = Math.max(0, cart['pr' + a][0]);  // ensuring that the quantity of product does not become negative
        document.getElementById('valpr' + a).innerHTML = cart['pr' + a][0];
        updateCart(cart);
        updatePopover(cart);

    })
    $('.divpr').on("click", "button.plus", function() {
        console.log("plus clicked");
        a = this.id.slice(6, );
        cart['pr' + a][0] = cart["pr" + a][0] + 1;
        document.getElementById('valpr' + a).innerHTML = cart['pr' + a][0];
        updateCart(cart);
        updatePopover(cart);
    })


    function updatePopover(cart) {    // This function updates the popover of the cart items
        var popStr = "";
        popStr = popStr + "<h5> Cart For Your Food </h5><div class = 'mx-1 my-1'>";
        var i = 1;
        var sum = 0;
        for (var item in cart) {
            popStr = popStr + "<b>" + i + ". " + "</b>";
            popStr = popStr + document.getElementById('name' + item).innerHTML + "Qty: " + cart[item][0] + "<br>";
            i = i + 1;
            sum = sum + cart[item][0];  // Counting the total number of items in the cart
        }
        document.getElementById('cart').innerHTML = sum;
        if (sum == 0) {
            popStr = popStr + "<h5>Empty:(</h5>";
            clearCart(cart);
        } else {
            popStr = popStr +
                "</div> <a href = 'checkOut.php'> <div type = 'button' class = 'btn btn-primary' id= 'checkOut'>CheckOut</div></a>  <button type = 'button' class = 'btn btn-success' onclick = 'clearCart()'id= 'clearCart'>clearCart</button>";
        }
        $('#popcart').popover();
        document.getElementById("popcart").setAttribute('data-content', popStr);  // Setting the Value of Popover

    }

    function clearCart() {
        cart = JSON.parse(localStorage.getItem('cart'));
        for (var item in cart) {
            document.getElementById('div' + item).innerHTML = '<button  id="' + item +
                '" name="cart" class="btn btn-primary cart">Add To Cart</button>'
        }
        document.getElementById('cart').innerHTML = 0;
        localStorage.clear();
        cart = {}
        updateCart(cart);
    }
    </script>
    <?php
}
?>


</body>


</html>