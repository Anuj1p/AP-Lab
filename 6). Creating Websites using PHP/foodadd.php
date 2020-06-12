<?php
session_start();
$conn = mysqli_connect("localhost","root","","db");
$itemName = $_POST['itemName'];
$price = $_POST['price']; 
$restroName = $_SESSION['restroName'];
$restroId = $_SESSION['restroId'];
$imageLink = $_POST['itemLink'];   
$type = $_POST['veg'];

$query = "INSERT INTO food_items(ItemName,RestroName,RestroId,Image,Price,Type) Values('$itemName','$restroName','$restroId','$imageLink','$price','$type')";




?>
<html>
  <body>
<?php
if(mysqli_query($conn,$query)){
  echo '<script>alert("Item Uploaded")</script>';
?>
<script>
window.location.href = "restro1.php";
</script>

<?php
}else{

?>
<script>
  echo '<script>alert("Item not uploaded")</script>';
window.location.href = "restro1.php"
</script>
<?php
}
?>

</body>
</html>