<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbuyecommerce";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $productName = $_POST['productName'];
  $productDescription = $_POST['productDescription'];
  $productImage = $_POST['productImage'];
  $productPrice = $_POST['productPrice'];

  $sql = "INSERT INTO product (productName, productDescription, productImage, productPrice)
			VALUES ('$productName', '$productDescription', '$productImage', '$productPrice')";

  if (mysqli_query($conn, $sql)) {
    echo "New product added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Online Ecommerce System</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Online Ecommerce System</h1>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="display.php">View Sellers</a></li>
        <li><a href="payment.php">Add Payment Method</a></li>
        <li><a href="displayPayment.php">View Payment Methods</a></li>
      </ul>
    </nav>
    <form method="post">
      <label for="sfname">Product Name:</label>
      <input type="text" name="productName" required>

      <label for="sfname">Product Description:</label>
      <input type="text" name="productDescription" required>

      <label for="slname">Product Image:</label>
      <input type="text" name="productImage" required>

      <label for="sphonenumber">Price:</label>
      <input type="number" name="productPrice" required>

      <button type="submit">Add Product</button>
    </form>
  </div>
  <footer>Christian Joshua Uy BSCS-2 F2</footer>
</body>

</html>