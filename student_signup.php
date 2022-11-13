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
            <select id="stream">
                <option value="bca">BCA</option>
                <option value="bba">BBA</option>
                <option value="mca">MCA</option>
                <option value="msc">Msc.</option>
            </select>
            <select id="semester">
                <option value="Semester1">Semester1</option>
                <option value="Semester2">Semester2</option>
                <option value="Semester3">Semester3</option>
                <option value="Semester4">Semester4</option>
                <option value="Semester5">Semester5</option>
                <option value="Semester6">Semester6</option>
            </select>
            <select id="section">
            <option value="alpha">ALPHA</option>
            <option value="beta">BETA</option>
            <option value="others">OTHERS</option>
            
         </select>

            
            <input type="tel" maxlength="10" id="phone" required placeholder="Mobile Number">
            <input type="email" id="email" required placeholder="Email Id">
            <input type="password" id="password" required placeholder="password">
            <input type="password" id="cpassword" required placeholder="confirm your password">
            <input type="file" id="photo" required placeholder="photo">
            <input type="button" onclick="studentRegistration();" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="index.php">login now</a></p>
        </form>

    </div>

    <script src="static/js/index.js"></script>
</body>

</html>