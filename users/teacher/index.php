<?php
    require 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEACHER | Dashboard</title>
    <link rel="stylesheet" href="static/css/panel.css">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="shortcut icon" href="static/images/logo.png" />
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
                    <a href="index.php"><img src="../../static/images/logo.png" alt="TihCollegeSpace"></a>
                </div>
                <div class="sc-header-name">
                    <a href="index.php">
                        <h2>TIH College Space</h2>
                    </a>
                </div>
            </div>

            <section class="page-container">
                <section class="page-content">
                    <div id="change-uploadnotes">

                        <?php
                        // include 'uploadnoteslist.php' 
                        ?>

                    </div>
                    <div style="height:100px; width:100%;">
                    </div>
                </section>
            </section>

        </div>



    </div>

    <script src="static/js/admin.js"></script>
</body>

</html>