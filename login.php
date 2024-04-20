<?php
// Include your database connection configuration here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Retrieve user data from the database
    $sql = "SELECT id, password FROM logusers WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        echo "Login successful. Welcome, " . $username;
    } else {
        echo "Login failed. Invalid username or password.";
    }

    $stmt->close();
}
 
// Close the database connection here
?>
