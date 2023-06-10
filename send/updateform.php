<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Form</title>
</head>
<body>
    <h2>Update Form</h2>
    <form action="update.php" method="POST"enctype="multipart/form-data">

           <label for="id">id:</label>
        <input type="id" id="id" name="id" ><br><br>
        
        <label for="username">userName:</label>
        <input type="text" id="username" name="username">

        <label for="firstname">firstName:</label>
        <input type="text" id="firstname" name="firstname">

        <label for="lastname">lastName:</label>
        <input type="text" id="lastname" name="lastname">

        <label for="phone_number">phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number">

        <label for="password">password:</label>
        <input type="password" id="password" name="password">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" >

        <label for="profile">Profile Image:</label>
        <input type="file" id="profile" name="profile" accept="image/png, image/jpeg" >

        <label for="banner">Banner:</label>
        <input type="file" id="banner" name="banner" accept="image/png, image/jpeg" >

        <label for="record">record:</label>
        <input type="file" id="record" name="record" accept="record/mpeg" >


        <input type="submit" value="Update">
    </form>
</body>
</html>
