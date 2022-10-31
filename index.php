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
            <h3>login now</h3>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>don't have an account? <a href="teacher_signup.php">register now</a></p>
        </form>

    </div>

    <script src="static/js/index.js"></script>
</body>

</html>