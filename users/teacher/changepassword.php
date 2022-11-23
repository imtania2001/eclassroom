<?php
require 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEACHER | Notes</title>
    <link rel="stylesheet" href="static/css/panel.css">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="shortcut icon" href="static/images/tihlogo.png" />
    <?php
    include "utils/header.php";
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
                    <a href="index.php"><img src="../../static/images/tihlogo.png" alt="Tih E-Classroom"></a>
                </div>
                <div class="sc-header-name">
                    <a href="index.php">
                        <h2>TIH E-classroom</h2>
                    </a>
                </div>
            </div>

            <section class="page-container">
                <div class="page-content overflow-auto" id="mynote-container" style="margin-top: 0px;">
                    <div class="form-container">
                        <form action="" method="post">
                            <h3>Change Password</h3>
                            <input type="password" id="current_password" required placeholder="Enter Current Password">
                            <input type="password" id="password" required placeholder="Enter New Password">
                            <input type="password" id="confirm_password" required placeholder="Re-enter New Password">
                            <input type="button" onclick="changePassword();" name="submit" value="Change Password" class="form-btn">
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