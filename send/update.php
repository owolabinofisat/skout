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

// Handle HTTP requests
$method = $_SERVER['REQUEST_METHOD'];

// Create a new user
if ($method === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    //hash the password
  //  $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    // $hashedpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);


    // Handle file uploads
    $profile = uploadFile('profile', 'uploads/profiles/');
    $record = uploadFile('record', 'uploads/records/');
    $banner = uploadFile('banner', 'uploads/banners/');

//update
    $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, password = ?, firstname = ?, lastname = ?, profile = ?, record = ?, banner = ? WHERE id = ?");
    // username = ?, email = ?, profile = ?, record = ? WHERE id = ?");
    $stmt->execute([$username, $email, $password, $firstname, $lastname, $profile, $record, $banner, $id]);

    // // Insert the user into the database
    // $stmt = $pdo->prepare("INSERT INTO users (username, password, firstname, lastname, phone_number, profile, record, email) 
    // VALUES (:username, :password, :firstname, :lastname, :phone_number, :profile, :record, :email)");
    // $stmt->execute([":username"=> $username, ":password"=> $password, ":firstname"=> $firstname,":lastname"=> $lastname,":phone_number"=> $phone_number, ":profile"=> $profile, ":record"=> $record, ":email"=> $email]);

    echo 'User uPDATED successfully';

    header("Location: index.php");
    exit();

  // header("Location: fetch.php");

}
// Function to handle file uploads
function uploadFile($fieldName, $targetDir)
{
    $allowedExtensions = ['png', 'jpg', 'jpeg', 'mp3'];

    $file = $_FILES[$fieldName];
    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Generate a unique filename
    $newFileName = uniqid() . '.' . $fileExtension;
    $targetPath = $targetDir . $newFileName;

    // Check if the file extension is allowed
    if (!in_array($fileExtension, $allowedExtensions)) {
        die("Error: Invalid file extension");
    }

    // Move the uploaded file to the target directory
    if (!move_uploaded_file($fileTmp, $targetPath)) {
        die("Error: Failed to upload file");
    }

    return $targetPath;
}
?>