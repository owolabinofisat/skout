<?php
// Ensure PDO extension is enabled in your PHP configuration

// Database connection details
$dbHost = 'localhost';
$dbName = 'mydb';
$dbUser = 'root';
$dbPass = '';

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve record ID to delete
    $id = $_POST['id'];

    // Delete record from the database
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    // Record deleted successfully
    echo 'Record deleted successfully!';
    header("Location: dashboard.php");
    exit();
} catch (PDOException $e) {
    // Handle database errors
    echo 'Database error: ' . $e->getMessage();
}
?>
