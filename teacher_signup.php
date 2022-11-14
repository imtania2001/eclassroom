<?php
session_start();
ob_start();
if ($_SESSION['user_role'] != "teacher") {
    header("Location: /signup.php");
    exit();
}
?>

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
            <input type="text" id="unique_id" name="Unique_id" required placeholder="Unique_id">
            <input type="text" id="firstname" name="Firstname" required placeholder="Firstname">
            <input type="text" id="midname" name="midname" required placeholder="midname">
            <input type="text" id="Lastname" name="Lastname" required placeholder="lastname">
            <input type="date" id="dob" required placeholder="dob">
            <select id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>
            <input type="text" id="bba" name="bba" required placeholder="Bba">
            <input type="text" id="bca" name="bca" required placeholder="Bca">
            <input type="text" id="mca" name="mca" required placeholder="mca">
            <input type="text" id="msc" name="msc" required placeholder="msc">
            <input type="number" id="phone" name="phone" required placeholder="phone">
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['user_email']; ?>" readonly required placeholder="email">
            <input type="password" id="password" name="password" required placeholder="password">
            <input type="password" id="cpassword" name="cpassword" required placeholder="confirm your password">
            <input type="file" id="photo" name="photo" required placeholder="photo">

            <input type="button" onclick="teacherRegistration();" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="index.php">login now</a></p>
        </form>

    </div>

    <script src="static/js/index.js"></script>
    <script>
        let user_role = sessionStorage.getItem('user_role');
        if (user_role != "teacher") {
            window.location.replace("/signup.php");
        }
    </script>
</body>

</html>