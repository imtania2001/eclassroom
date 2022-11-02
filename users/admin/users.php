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
            </div class="content" id="first">

            <section class="page-container">
                <section class="page-content">
                    <div>

                        <table class="table table-hover" width=50%>
                            <thead>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Stream</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>28-10-2022</td>
                                    <td>10:00 AM</td>
                                    <td>BCA</td>
                                </tr>
                            </tbody>
                        </table>
                        <form class="row g-3">
                        <form class="row g-3">
     <                      
    <label for="inputuser" class="form-label">usertype</label>
    <input type="user" class="form-control" id="inputusers">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="Email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
        </div>
<div>
        <table class="table table-hover" width=50%>
                            <thead>
                                <th>SL NO.</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>stream</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>28-10-2022</td>
                                    <td>10:00 AM</td>
                                    <td>BCA</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-hover" width=50%>
                            <thead>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Stream</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>28-10-2022</td>
                                    <td>10:00 AM</td>
                                    <td>BCA</td>
                                </tr>
                            </tbody>
                        </table>

    </div>

    <script src="static/js/admin.js"></script>
</body>

</html>