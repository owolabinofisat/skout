<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>

    <form action=" signup.php" method="post" enctype="multipart/form-data">
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
        <input type="email" id="email" name="email" required>

        <label for="profile">Profile Image:</label>
        <input type="file" id="profile" name="profile" accept="image/png, image/jpeg" required>

        <label for="banner">Banner:</label>
        <input type="file" id="banner" name="banner" accept="image/png, image/jpeg" required>

        <label for="record">record:</label>
        <input type="file" id="record" name="record" accept="record/mpeg" required>

        <input type="submit" value="Create">
    </form>
</body>
</html>
