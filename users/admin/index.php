<?php
require 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | Dashboard</title>
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
                    <span>Admin</span>
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
                    <div class="row">

                        <div class="col-sm-8 px-5 py-5 m-auto">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <div class="col">
                                    <div class="card h-100 bg-transparent box-shadow">
                                        <img src="static/images/schedule.png" class="card-img-top w-auto m-auto py-2" height="100px" alt="...">
                                        <div class="card-body">
                                        <h1 class="text-center fw-bold blockquote fs-1" id="schedule_class">(0)</h1>
                                            <h5 class="card-title text-center">Scheduled Classes</h5>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 bg-transparent box-shadow">
                                        <img src="static/images/edit.png" class="card-img-top w-auto m-auto py-2" height="100px" alt="...">
                                        <div class="card-body">
                                        <h1 class="text-center fw-bold blockquote fs-1" id="note_upload">(0)</h1>
                                            <h5 class="card-title text-center">Notes Uploaded</h5>
                                                                                    </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 bg-transparent box-shadow">
                                        <img src="static/images/envelope.png" class="card-img-top w-auto m-auto py-2" height="100px" alt="...">
                                        <div class="card-body">
                                        <h1 class="text-center fw-bold blockquote fs-1" id="update">(0)</h1>
                                            <h5 class="card-title text-center">Updates</h5>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 bg-transparent box-shadow">
                                        <img src="static/images/user.png" class="card-img-top w-auto m-auto py-2" height="100px" alt="...">
                                        <div class="card-body">
                                        <h1 class="text-center fw-bold blockquote fs-1" id="total_user">(0)</h1>
                                            <h5 class="card-title text-center">Total Users</h5>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 bg-transparent box-shadow">
                                        <img src="static/images/user.png" class="card-img-top w-auto m-auto py-2" height="100px" alt="...">
                                        <div class="card-body">
                                        <h1 class="text-center fw-bold blockquote fs-1" id="register_Teacher">(0)</h1>
                                            <h5 class="card-title text-center">Registered Teachers</h5>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 bg-transparent box-shadow">
                                        <img src="static/images/user.png" class="card-img-top w-auto m-auto py-2" height="100px" alt="...">
                                        <div class="card-body">
                                        <h1 class="text-center fw-bold blockquote fs-1" id="register_student">(0)</h1>
                                            <h5 class="card-title text-center">Registered Students</h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="height:100px; width:100%;">
                    </div>
                </section>
            </section>
        </div>



    </div>

    <script src="static/js/admin.js"></script>
    <script src="static/js/index.js"></script>
</body>

</html>