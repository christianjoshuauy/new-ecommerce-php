<?php
session_start();

if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>RILL</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./assets/js/form.js"></script>
</head>

<body>
    <div class="auth-background">
        <header>
            <img src="./assets/img/logo2.png" class="logo" alt="RILL" width="150">
            <nav></nav>
            <div class="searchbox">
            </div>
        </header>
        <main class="auth">
            <div class="card">
                <div class="card-start">
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "<p class='error-message'>" . $_SESSION['error'] . "</p>";
                        unset($_SESSION['error']);
                    }
                    ?>
                    <h3 id="auth-title">Register</h3>
                    <form id="register-form" method="POST" action="auth.php">
                        <input type="text" name="firstname" placeholder="First Name">
                        <input type="text" name="lastname" placeholder="Last Name">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <button type="submit" name="register" class="signup-button">Sign Up</button>
                        <p>Already have an account? <button type="button" id="sign-up-button" class="p-button" onclick="toggleForm()">Sign In</button></p>
                    </form>
                    <form id="login-form" method="POST" action="auth.php" style="display: none;">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <button type="submit" name="login" class="signup-button">Sign In</button>
                        <p>Don't have an account? <button type="button" id="sign-up-button" class="p-button" onclick="toggleForm()">Sign Up</button></p>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>