<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Form</title>
</head>
<body>
    <h2>Delete Form</h2>
    <form action="delete.php" method="POST" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="id">id:</label>
        <input type="id" id="id" name="id" required><br><br>
        
        
        <input type="submit" value="Delete">
    </form>
</body>
</html>
