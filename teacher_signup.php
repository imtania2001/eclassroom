<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher | Signup</title>
    <link rel="stylesheet" href="static/css/style.css">
    <?php
    include "utils/header.php"
    ?>
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>register now</h3>
            <input type="text" name="Firstname" required placeholder="Firstname">
            <input type="text" name="midname" required placeholder="midname">
            <input type="text" name="Lastname" required placeholder="lastname">
            <input type="text" name="dob" required placeholder="dob">
            <input type="text" name="gender" required placeholder="gender">
            <input type="text" name="bba" required placeholder="Bba">
            <input type="text" name="bca" required placeholder="Bca">
            <input type="text" name="mca" required placeholder="mca">
            <input type="text" name="msc" required placeholder="msc">
            <input type="number" name="phone" required placeholder="phone">
            <input type="email" name="email" required placeholder="email">
            <input type="password" name="password" required placeholder="password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <input type="photo" name="photo" required placeholder="photo">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">Teacher</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="index.php">login now</a></p>
        </form>

    </div>

    <script src="static/js/index.js"></script>
</body>

</html>