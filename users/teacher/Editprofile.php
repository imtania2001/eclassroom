<?php

require 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher | Profile</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/panel.css">
    <?php
    include "utils/header.php"
    ?>
</head>

<body>

    <div class="home">
        <div class="topdesign">
        </div>
        <div class="action">
            <div class="profile" id="profile" onclick="toggle();">

            </div>
            <div class="menu">
                <h3 id="login_user_name"><br>
                    <span>Teacher</span>
                </h3>
                <ul>
                    <?php
                    include "utils/menubar.php";
                    ?>
                </ul>
            </div>

            <div class="sc-header" style="background:transparent; ">
                <div class="sc-header-logo">
                    <a href="index.php"><img src="../../static/images/logo.png" alt="TihCollegeSpace"></a>
                </div>
                <div class="sc-header-name">
                    <a href="index.php">
                        <h2>TIH College Space</h2>
                    </a>
                </div>
            </div>

            <section class="page-container">
                <div class="page-content overflow-auto" id="mynote-container" style="margin-top: 100px;">
                    <div class="form-container">
                        <form action="" method="post">
                            <h3>Edit Profile</h3>
                            <input type="text" id="firstname" name="Firstname" required placeholder="Firstname">
                            <input type="text" id="midname" name="midname" placeholder="midname">
                            <input type="text" id="Lastname" name="Lastname" required placeholder="lastname">
                            <input type="date" id="dob" required placeholder="dob">
                            <select id="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                            <input type="number" id="phone" name="phone" required placeholder="phone">
                            <input type="file" id="photo" name="photo"  placeholder="photo">

                            <input type="button" onclick="TeacherEditProfile();" name="submit" value="Submit" class="form-btn">
                        </form>

                    </div>

                    <div style="height:100px; width:100%;">
                    </div>

                </div>
            </section>
        </div>
    </div>


    <script src="static/js/admin.js"></script>
    <script src="static/js/profile.js"></script>

</body>

</html>