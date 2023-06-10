<?php
// Connect to the database
$host = 'localhost';
$db = 'mydb';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
    echo "successful";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Retrieve the username and password from the request
$username = $_POST['username'];
$password = $_POST['password'];

// Query to check if the user exists in the database
$query = "SELECT * FROM users WHERE username = :username AND password = :password";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();

// Check if the login is successful
if ($stmt->rowCount() > 0) {
    // User authenticated
    session_start();
    $_SESSION['username'] = $username;
    echo json_encode(['message' => 'Login successful']);

    header("Location: index.php");
    exit();

} else {
    // Invalid credentials
    echo json_encode(['message' => 'Invalid credentials']);
}

?>