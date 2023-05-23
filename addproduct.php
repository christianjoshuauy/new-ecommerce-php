<?php
session_start();

if (!isset($_SESSION['auth']) || !$_SESSION['auth']) {
  header("Location: login.php");
  exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbecommerce";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST["addproduct"])) {
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productImage = $_POST['productImage'];
    $productPrice = $_POST['productPrice'];
    $productCategory = $_POST['productCategory'];

    $sql = "INSERT INTO product (productName, productDescription, productImage, productPrice)
        VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssd", $productName, $productDescription, $productImage, $productPrice);


    if (mysqli_stmt_execute($stmt)) {
      $productID = mysqli_insert_id($conn);
      $sql = "INSERT INTO product_category (productID, categoryID)
        VALUES ($productID, $productCategory)";
      if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "New product added successfully";
      } else {
        $_SESSION['error'] = "Error inserting product category: " . mysqli_error($conn);
      }
    } else {
      $_SESSION['error'] = "Error inserting product: " . mysqli_error($conn);
    }
  } elseif (isset($_POST["updateproduct"])) {
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productImage = $_POST['productImage'];
    $productPrice = $_POST['productPrice'];
    $productCategory = $_POST['productCategory'];

    $sql = "UPDATE product SET productName = '$productName', productDescription = '$productDescription', productImage = '$productImage', productPrice = '$productPrice' WHERE productID = $productID";

    if (mysqli_query($conn, $sql)) {
      $sql = "UPDATE product_category SET categoryID = '$productCategory' WHERE productID = $productID";
      if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Product updated successfully";
        header('Location: dashboard.php');
      } else {
        $_SESSION['error'] = "Error updating product category: " . mysqli_error($conn);
      }
    } else {
      $_SESSION['error'] = "Error updating product: " . mysqli_error($conn);
    }
  }
} elseif (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['deleteID'])) {
  $deleteID = $_GET['deleteID'];

  $sql = "DELETE FROM product WHERE productID = $deleteID";

  if (mysqli_query($conn, $sql)) {
    $sql = "DELETE FROM product_category WHERE productID = $deleteID";
    if (mysqli_query($conn, $sql)) {
      $_SESSION['success'] = "Product deleted successfully";
      header('Location: dashboard.php');
    } else {
      $_SESSION['error'] = "Error deleting product category: " . mysqli_error($conn);
    }
  } else {
    $_SESSION['error'] = "Error deleting product: " . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Add Product</title>
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/header.css">
  <link rel="stylesheet" href="./assets/css/footer.css">
  <link rel="stylesheet" href="./assets/css/profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="./assets/js/profile-menu.js"></script>
</head>

<body>
  <header>
    <img src="./assets/img/logo.png" class="logo" alt="RILL" width="150">
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="#">Clothing</a></li>
        <li><a href="#">Gadgets</a></li>
        <li><a href="#">Sports</a></li>
        <li><a href="about_me.php">About Me</a></li>
      </ul>
    </nav>
    <div class="searchbox">
      <svg viewBox="0 0 24 24" role="img" width="30px" height="30px" fill="none">
        <path stroke="#201c1c" stroke-width="1.5" d="M13.962 16.296a6.716 6.716 0 01-3.462.954 6.728 6.728 0 01-4.773-1.977A6.728 6.728 0 013.75 10.5c0-1.864.755-3.551 1.977-4.773A6.728 6.728 0 0110.5 3.75c1.864 0 3.551.755 4.773 1.977A6.728 6.728 0 0117.25 10.5a6.726 6.726 0 01-.921 3.407c-.517.882-.434 1.988.289 2.711l3.853 3.853">
        </path>
      </svg>
      <input type="text" id="search" class="pre-search-input input-text" name="search" placeholder="Search"></input>
      <div class="profile-container">
        <div class="profile-circle" onclick="toggleMenu()">
          <img src="./assets/img/profile-pic.png" alt="profile pic">
        </div>
        <div id="profile-menu" class="hidden">
          <ul>
            <li onclick="window.location.href = 'profile.php';">Profile</li>
            <hr>
            <li onclick="signOut()">Sign Out</li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <div class="add-container">
    <?php
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (isset($_SESSION['error'])) {
      echo "<p class='error-message'>" . $_SESSION['error'] . "</p>";
      unset($_SESSION['error']);
    } else if (isset($_SESSION['success'])) {
      echo "<p class='success-message'>" . $_SESSION['success'] . "</p>";
      unset($_SESSION['success']);
    }
    if (isset($_GET['id'])) {
      $prodId = $_GET['id'];
      $sql = "SELECT * FROM product WHERE productID = $prodId";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      $productID = $row['productID'];
      $productName = $row['productName'];
      $productDescription = $row['productDescription'];
      $productImage = $row['productImage'];
      $productPrice = $row['productPrice'];

      $sql = "SELECT * FROM product_category WHERE productID = $prodId";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      $categoryID = $row['categoryID'];


      echo '<h1>Edit Product</h1>';
      echo '<form method="post">';
      echo '<input type="hidden" name="productID" value="' . $prodId . '">';
      echo '<input type="text" name="productName" placeholder="Product Name" value="' . $productName . '" required>';
      echo '<input type="text" name="productDescription" placeholder="Product Description" value="' . $productDescription . '" required>';
      echo '<input type="text" name="productImage" placeholder="Product Image Link" value="' . $productImage . '" required>';
      echo '<input type="number" name="productPrice" placeholder="Product Price" value="' . $productPrice . '" required>';
      echo '<select name="productCategory" required>';
      echo '<option value="1" ' . ($categoryID == 1 ? 'selected' : '') . '>Shoes</option>';
      echo '<option value="2" ' . ($categoryID == 2 ? 'selected' : '') . '>Clothes</option>';
      echo '<option value="3" ' . ($categoryID == 3 ? 'selected' : '') . '>Accessories</option>';
      echo '<option value="4" ' . ($categoryID == 4 ? 'selected' : '') . '>Gadgets</option>';
      echo '</select>';
      echo '<button type="submit" name="updateproduct" class="button-add-product">Edit Product</button>';
      echo '</form>';
    } else {
      echo '<h1>Add Product</h1>';
      echo '<form method="post">';
      echo '<input type="text" name="productName" placeholder="Product Name" required>';
      echo '<input type="text" name="productDescription" placeholder="Product Description" required>';
      echo '<input type="text" name="productImage" placeholder="Product Image Link" required>';
      echo '<input type="number" name="productPrice" placeholder="Product Price" required>';
      echo '<select name="productCategory" required>';
      echo '<option value="1">Shoes</option>';
      echo '<option value="2">Clothes</option>';
      echo '<option value="3">Accessories</option>';
      echo '<option value="4">Gadgets</option>';
      echo '</select>';
      echo '<button type="submit" name="addproduct" class="button-add-product">Add Product</button>';
      echo '</form>';
    }

    mysqli_close($conn);
    ?>


  </div>
  <footer class="footer-black">
    <div class="footer-fashion">
      <img src="./assets/img/dashboard_foot.png" alt="fashion" width="400">
    </div>
    <div class="footer-nav">
      <ul>
        <li>ABOUT US</li>
        <li>Find a Store</li>
        <li>Order Status</li>
        <li>Delivery</li>
        <li>Get Help</li>
      </ul>
    </div>
    <div class="footer-nav">
      <ul>
        <li>CLOTHING</li>
        <li>Men's Apparel</li>
        <li>Women's Apparel</li>
        <li>Kids' Apparel</li>
        <li>Sale</li>
      </ul>
    </div>
    <div class="footer-nav">
      <ul>
        <li>GADGETS</li>
        <li>Laptops</li>
        <li>Computers</li>
        <li>Mobile Phones</li>
        <li>Accessories</li>
      </ul>
    </div>
    <div class="footer-nav">
      <ul>
        <li>SPORTS</li>
        <li>Sport Clothes</li>
        <li>Shoes</li>
        <li>Sport Gears</li>
        <li>Accessories</li>
      </ul>
    </div>
    <div class="footer-nav">
      <ul>
        <li>FOLLOW US</li>
        <li><a href="#" class="fa fa-facebook"></a></li>
        <li><a href="#" class="fa fa-twitter"></a></li>
        <li><a href="#" class="fa fa-instagram"></a></li>
      </ul>
    </div>
    <p class="copyright">&copy; RILL Philippines 2023</p>
  </footer>
</body>

</html>