<?php
    require 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT | Notes</title>
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
            <div class="profile" onclick="toggle();">
                <img src="../../static/images/logo.png" alt="">
            </div>
            <div class="menu">
                <h3>Tania Ghosh <br>
                    <span>Student</span>
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
                <div class="page-content overflow-auto" id="mynote-container">
                    <div class="limit">
                        <div class="login-container">
                            <div class="bb-login row">
                                <form class="bb-form validate-form col-sm-6 m-auto" method="post"> <span class="bb-form-title p-b-26">
                                        <h4 class="text-center my-2">Change Password</h4>
                                        <input type="password" class="form-control mt-4 mb-4" placeholder="Enter Current Password">
                                        <input type="password" class="form-control mb-4" placeholder="Enter New Password">
                                        <input type="password" class="form-control mb-4" placeholder="Re-Enter New Password">
                                        <div class="login-container-form-btn d-flex flex-wrap justify-content-center">
                                            <button class="mx-2 my-3 btn btn-success"> Submit </button>
                                            <button class="mx-2 my-3 btn btn-danger" onclick="window.location.reload();">Cancel</button>

                                            <div>

                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
        </div>
    </div>

    <script src="static/js/admin.js"></script>
    <!-- <script src="static/js/mynotes.js"></script> -->
</body>

</html>