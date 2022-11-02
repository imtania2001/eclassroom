<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIHCOLLEGESPACE | Login</title>
    <link rel="stylesheet" href="static/css/style.css">
    <?php
    include "utils/header.php"
    ?>
</head>

<body>
    <div class="form-container" id="form_content">

        <form id="login_form">
            <h3>Login Now</h3>
            <input type="email" id="email_id" name="email" required placeholder="Enter your email">
            <input type="password" id="password" name="password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>Don't Have an Account? <a href="teacher_signup.php">register now</a></p>
        </form>

    </div>

    <script src="static/js/index.js?v=1.1"></script>
</body>

</html>