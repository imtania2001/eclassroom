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
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
  rel="stylesheet"
/>
<style>
    body{
        /* background: rgb(2,0,36);
background: radial-gradient(circle, rgba(2,0,36,1) 0%, rgba(0,53,255,0.72919590199361) 100%); */
background: rgb(63,94,251);
background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);
    }

    .form-container{
        /* background: rgb(2,0,36);
background: radial-gradient(circle, rgba(2,0,36,1) 0%, rgba(0,53,255,0.24180094401041663) 100%); */
/* background: rgb(2,0,36);

background: radial-gradient(circle, rgba(2,0,36,1) 0%, rgba(164,255,0,0.5891398795846463) 100%); */
/* background: rgb(63,94,251);
background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%); */
background: rgb(63,94,251);
background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(252,70,107,0.7740138291644783) 100%);
    }
</style>
</head>

<body>
    <div class="form-container dusty-grass-gradient color-block mb-3 mx-auto rounded-circle z-depth-1-half  ">
        <form action="" method="post">
            <h3>Student register now</h3>
            <input type="text" id="unique_id" name="Unique_id" required placeholder="Unique_id">
            <input type="text" id="firstname" name="Firstname" required placeholder="Firstname">
            <input type="text" id="midname" name="midname"  placeholder="midname">
            <input type="text" id="Lastname" name="Lastname" required placeholder="lastname">
            <input type="date" id="dob" required placeholder="dob">
            <select id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>
            <input type="number" id="phone" name="phone" required placeholder="phone">
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['user_email']; ?>" readonly required placeholder="email">
            <input type="password" id="password" name="password" required placeholder="password">
            <input type="password" id="cpassword" name="cpassword" required placeholder="confirm your password">
            <input type="file" id="photo" accept="image/jpg,image/jpeg,image/png" name="photo" required placeholder="photo">

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
    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
</body>

</html>