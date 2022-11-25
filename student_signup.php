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
    <div class="form-container row dusty-grass-gradient color-block mb-3 mx-auto rounded-circle z-depth-1-half  ">
        <form action="" method="post" class="col-8 m-auto">
            <h3>Student register now</h3>
             <div class="row">
                <div class="col">
            <input type="text" id="unique_id" required placeholder="Unique_id">
</div>
<div class="col">
            <input type="text" id="first_name" required placeholder="First Name"></div></div>
            <div class="row">
                <div class="col">
            <input type="text" id="mid_name" required placeholder="Mid Name"></div>
            <div class="col">
            <input type="text" id="last_name" required placeholder="Last Name"></div></div>
            <div class="row">
                <div class="col">
            <input type="date" id="dob" required placeholder="dob"></div>
            <div class="col">
            <select id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select></div></div>
            <div class="row">
                  <div class="col">
            <select id="stream" onchange="fetchSemester();">
                <option value="" selected disabled>Select Stream</option>
            </select></div>
            <div class="col">
            <select id="semester"><option value="" selected disabled>Select Semester</option>
            </select></div>
            <!-- <div class="row">
                <div class="col"> -->
            <select id="section">
            <option value="alpha">ALPHA</option>
            <option value="beta">BETA</option>
            
         </select>
         
             <!-- <div class="row">
            <div clss="col"> -->
            <input type="tel" maxlength="10" id="phone" required placeholder="Mobile Number">
            <input type="email" id="email" value="<?php echo $_SESSION['user_email']; ?>" readonly required placeholder="Email Id">
           <div class="row">
            <div class="col">
            <input type="password" id="password" required placeholder="password"></div>
            <div class="col">
            <input type="password" id="cpassword" required placeholder="confirm your password"></div></div>
            <input type="file" id="photo" accept="image/jpg,image/jpeg,image/png" required placeholder="photo">
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
    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
</body>

</html>