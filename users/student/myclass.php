<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT | Classes</title>
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
                <div class="sc-heading">
                    <div class="sc-heading-part">
                        
                        <div class="sc-heading">
                    <div class="sc-heading-part">
                        <h4 class="card-title">All classes(<span id="total-class">0</span>)</h4>
                    </div>
                </div>
        
                </div>
                <div class="page-content overflow-auto" id="myclass-container">
                <table class="table table-hover">
                        <thead>
                            <th>S.No</th>
                            <th>Date</th>
                           
                            <th>Stream</th>
                            <th>Semester</th>
                            <th>Section</th>
                            <th>Subject</th>
                            <th>Topic</th>
                            <th>Link</th>
                        </thead>
                        <tbody id="fetch-class">

                        </tbody>
                    </table>
                    <p class="text-muted text-center" id="message"></p>
                </div>
                </div>
            </section>
        </div>
    </div>

    <script src="static/js/admin.js"></script>
    <script src="static/js/myclass.js"></script>
</body>

</html>