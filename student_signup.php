<?php
session_start();
ob_start();
if ($_SESSION['user_role'] != "student") {
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
    <title>Student | Signup</title>
    <link rel="stylesheet" href="static/css/style.css">
    <?php
    include "utils/header.php"
    ?>
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>register now</h3>
            <input type="text" id="unique_id" required placeholder="Unique_id">
            <input type="text" id="first_name" required placeholder="First Name">
            <input type="text" id="mid_name" required placeholder="Mid Name">
            <input type="text" id="last_name" required placeholder="Last Name">
            <input type="date" id="dob" required placeholder="dob">
            <select id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>
            <select id="stream" onchange="fetchSemester();">
                <option value="" selected disabled>Select Stream</option>
            </select>
            <select id="semester"><option value="" selected disabled>Select Semester</option>
            </select>
            <select id="section">
            <option value="alpha">ALPHA</option>
            <option value="beta">BETA</option>
            
         </select>

            
            <input type="tel" maxlength="10" id="phone" required placeholder="Mobile Number">
            <input type="email" id="email" value="<?php echo $_SESSION['user_email']; ?>" readonly required placeholder="Email Id">
            <input type="password" id="password" required placeholder="password">
            <input type="password" id="cpassword" required placeholder="confirm your password">
            <input type="file" id="photo" required placeholder="photo">
            <input type="button" onclick="studentRegistration();" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="index.php">login now</a></p>
        </form>

    </div>

    <script src="static/js/index.js"></script>
    <script src="static/js/student_signup.js"></script>
    <script>
        let user_role = sessionStorage.getItem('user_role');
        if(user_role!="student"){
            window.location.replace("/signup.php");
        }
    </script>
</body>

</html>