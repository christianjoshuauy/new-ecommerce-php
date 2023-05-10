<!DOCTYPE html>
<html>

<head>
    <title>RILL</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header-background">
        <header>
            <img src="./assets/img/logo2.png" class="logo" alt="RILL" width="150">
            <nav></nav>
            <div class="searchbox">
            </div>
        </header>
        <main>
            <div class="card">
                <div class="hero-start">
                    <h3>Register</h3>
                    <form method="POST" action="process_register.php">
                        <input type="text" name="firstname" placeholder="First Name">
                        <input type="text" name="lastname" placeholder="Last Name">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <button type="submit" class="signup-button">Sign Up</button>
                        <p>Already have an account? <button onclick="" class="p-button">Sign In</button></p>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <footer class="footer-white">
        <div class="footer-fashion">
            <img src="./assets/img/index_foot.png" alt="fashion" width="400">
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