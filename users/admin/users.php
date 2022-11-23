<?php
 require 'auth.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | Users</title>
    <link rel="stylesheet" href="static/css/panel.css">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="shortcut icon" href="static/images/tihlogo.png" />
    <?php
    include "utils/header.php";
    ?>
    <style>
    .card {
        background: #ffffff96;
        margin: 2px auto;
    }
    </style>
</head>

<body>
    <div class="home">
        <div class="topdesign">
        </div>
        <div class="action">
            <div class="profile" onclick="toggle();">
                <img src="../../static/images/tihlogo.png" alt="">
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
                    <a href="index.php"><img src="../../static/images/tihlogo.png" alt="Tih E-Classroom"></a>
                </div>
                <div class="sc-header-name">
                    <a href="index.php">
                        <h2>TIH E-Classroom</h2>
                    </a>
                </div>
            </div class="content" id="first">

            <section class="page-container">
                <section class="page-content">
                    <div class="row d-flex flex-wrap justify-content-evenly">
                        <div class="col-sm-5 card">
                            <div class="card-body">
                                <h4 class="card-title">Registered Users : <span id="fetch_users_total">0</span></h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>S.No</th>
                                            <th>Email Id</th>
                                            <th>Role</th>
                                            <th>Remove</th>
                                        </thead>
                                        <tbody id="fetch_users">
                                            
                                        </tbody>
                                    </table>
                                    <p class="text-center text-muted" id="fetch_users_message"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 card">
                            <div class="card-body">
                                <h4 class="card-title">Add a New User</h4>
                                <div class="row g-3 m-auto">
                                    <div class="col-md-6">
                                        <label for="inputuser" class="form-label">Usertype</label>
                                        <select  class="form-control" id="usertype"onchange="removerBorderDanger(this);">
                                            <option value="">Choose Role</option>
                                            <option value="student">Student</option>
                                            <option value="teacher">Teacher</option>
                                        </select>
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" placeholder="Enter Email Id" oninput="removerBorderDanger(this);" class="form-control" id="email">
                                    </div>
                                    <div class="col-12">
                                        <button type="button" onclick="addUser();" class="btn btn-primary">Submit</button>
                                    </div>
</div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex flex-wrap justify-content-evenly">
                        <div class="col-sm-11 card">
                            <div class="card-body">
                                <h4 class="card-title">All Teachers : <span id="fetch_teacher_total">0</span></h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>S.No</th>
                                            <th>Unique Id</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>DOB</th>
                                            <th>Gender</th>
                                        </thead>
                                        <tbody id="fetch_teacher">
                                            
                                        </tbody>
                                    </table>
                                    <p class="text-center text-muted" id="fetch_teacher_message"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex flex-wrap justify-content-evenly">
                        <div class="col-sm-11 card">
                            <div class="card-body">
                                <h4 class="card-title">All Students : <span id="fetch_student_total">0</span></h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>S.No</th>
                                            <th>Roll No</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>DOB</th>
                                            <th>Stream</th>
                                            <th>Semester</th>
                                        </thead>
                                        <tbody id="fetch_student">
                                        </tbody>
                                    </table>
                                    <p class="text-center text-muted" id="fetch_student_message"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 200px;">

                    </div>
                </section>
            </section>
        </div>
    </div>

    <script src="static/js/admin.js"></script>
    <script src="static/js/users.js"></script>
</body>

</html>