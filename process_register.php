<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbuyecommerce";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = hash('sha256', $_POST["password"]);

    $sql = "INSERT INTO tbluseraccount (username, password, firstname, lastname) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $password, $firstname, $lastname);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    }
    echo "Invalid params";
    exit();
}

?>