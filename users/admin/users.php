<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | Users</title>
    <link rel="stylesheet" href="static/css/panel.css">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="shortcut icon" href="static/images/logo.png" />
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
                    <div class="row d-flex flex-wrap justify-content-evenly">
                        <div class="col-sm-5 card">
                            <div class="card-body">
                                <h4 class="card-title">Registered Users : <span>(0)</span></h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>S.No</th>
                                            <th>Email Id</th>
                                            <th>Role</th>
                                            <th>Remove</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>tania@gmail.com</td>
                                                <td>student</td>
                                                <td><button class="btn btn-danger"><i
                                                            class="fa-solid fa-trash"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 card">
                            <div class="card-body">
                                <h4 class="card-title">Add a New User</h4>
                                <form class="row g-3 m-auto">
                                    <div class="col-md-6">
                                        <label for="inputuser" class="form-label">Usertype</label>
                                        <input type="user" class="form-control" id="inputusers">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="Email" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex flex-wrap justify-content-evenly">
                        <div class="col-sm-11 card">
                            <div class="card-body">
                                <h4 class="card-title">All Teachers : <span>(0)</span></h4>
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
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>15201220056</td>
                                                <td>Tania Ghosh</td>
                                                <td>1497648694</td>
                                                <td>tania@gmail.com</td>
                                                <td>10-56-2500</td>
                                                <td>Female</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex flex-wrap justify-content-evenly">
                        <div class="col-sm-11 card">
                            <div class="card-body">
                                <h4 class="card-title">All Students : <span>(0)</span></h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>S.No</th>
                                            <th>Roll No</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>DOB</th>
                                            <th>Gender</th>
                                            <th>Stream</th>
                                            <th>Semester</th>
                                            <th>Batch</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>15201220056</td>
                                                <td>Tania Ghosh</td>
                                                <td>1497648694</td>
                                                <td>tania@gmail.com</td>
                                                <td>10-56-2500</td>
                                                <td>Female</td>
                                                <td>Bca</td>
                                                <td>Semester 1</td>
                                                <td>2020</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
</body>

</html>