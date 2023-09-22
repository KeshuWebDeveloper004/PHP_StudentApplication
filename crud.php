<?php
// Database configuration
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CREATE operation
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);
    
    // Execute the statement
    $stmt->execute();
    
    echo "Record created successfully";
    $stmt->close();
}

// READ operation
$result = $conn->query("SELECT * FROM users");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . ", Name: " . $row["name"] . ", Email: " . $row["email"] . "<br>";
    }
} else {
    echo "No records found";
}

// UPDATE operation
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $newName = $_POST["new_name"];
    $newEmail = $_POST["new_email"];
    
    // Prepare and bind the statement
    $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $newName, $newEmail, $id);
    
    // Execute the statement
    $stmt->execute();
    
    echo "Record updated successfully";
    $stmt->close();
}

// DELETE operation
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];
    
    // Prepare and bind the statement
    $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("i", $id);
    
    // Execute the statement
    $stmt->execute();
    
    echo "Record deleted successfully";
    $stmt->close();
}

// Close the connection
$conn->close();
?>
