<?php
require 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT | Dashboard</title>
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
                    <div class="row">
                        <div class="col-sm-4 px-5 ">
                            <div class="row row-cols-1 row-cols-md-1 g-2">
                                <div class="col">
                                    <div class="card bg-transparent" style=" box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
                                        <img src="<?php echo $_SESSION['student']['photo']; ?>" id="profile_img" class="card-img-top py-3 " alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"><?php echo $_SESSION['student']['first_name']." ".$_SESSION['student']['mid_name']." ".$_SESSION['student']['lastname']; ?></h5>
                                            <p class="card-text m-0 text-center">
                                            <p class="m-0 p-1"><span class="fw-bold">Mobile : </span> <?php echo $_SESSION['student']['phone']; ?></p>
                                            <p class="m-0 p-1"><span class="fw-bold">Email : </span> <?php echo $_SESSION['student']['email']; ?></p>
                                            <p class="m-0 p-1"><span class="fw-bold">D.O.B : </span> <?php echo $_SESSION['student']['dob']; ?></p>
                                            <button class="btn btn-success w-100 my-2">Edit Profile</button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8 px-5 py-5">
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
                                        <h1 class="text-center fw-bold blockquote fs-1" id="upload_notes">(0)</h1>
                                            <h5 class="card-title text-center">Notes Uploaded</h5>
                                                                                    </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 bg-transparent box-shadow">
                                        <img src="static/images/envelope.png" class="card-img-top w-auto m-auto py-2" height="100px" alt="...">
                                        <div class="card-body">
                                        <h1 class="text-center fw-bold blockquote fs-1" id="updates">(0)</h1>
                                            <h5 class="card-title text-center">Updates</h5>
                                            
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