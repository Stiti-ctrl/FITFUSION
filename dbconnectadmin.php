<?php
// Define your database credentials
$host = 'localhost';        // Database host
$dbname = 'fitness_db';     // Database name
$email = 'root';         // Database username (change to your own username if not 'root')
$password = '';             // Database password (leave blank if no password)

try {
    // Establish a PDO connection to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $email, $password);
    
    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // You can use this to confirm the connection (optional)
    // echo "Connected to the database successfully!";
    
} catch (PDOException $e) {
    // Catch any connection errors
    echo "Connection failed: " . $e->getMessage();
    exit(); // Stop script execution if connection fails
}
?>
