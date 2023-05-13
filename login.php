<?php
// Start a session (if not already started)
session_start();

// Check if the user is not logged in
if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    // Redirect the user to the login page
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
    <link rel="stylesheet" href="./assets/css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function toggleForm() {
            var registerForm = document.getElementById("register-form");
            var loginForm = document.getElementById("login-form");
            var signUpButton = document.getElementById("sign-up-button");
            var authTitle = document.getElementById("auth-title");

            if (registerForm.style.display === "none") {
                registerForm.style.display = "block";
                loginForm.style.display = "none";
                signUpButton.innerText = "Sign In";
                authTitle.innerText = "Register";
                signUpButton.setAttribute("onclick", "toggleForm()");
            } else {
                registerForm.style.display = "none";
                loginForm.style.display = "block";
                signUpButton.innerText = "Sign Up";
                authTitle.innerText = "Sign in";
                signUpButton.setAttribute("onclick", "toggleForm()");
            }
        }
    </script>
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