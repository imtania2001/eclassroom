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
                <div class="sc-heading">
                    <div class="sc-heading-part">
                        <h4 class="card-title">All Notes(<span id="total-note">0</span>)</h4>
                    </div>
                </div>
                <div class="page-content overflow-auto" id="mynote-container">
                    <table class="table table-hover">
                        <thead>
                            <th>S.No</th>
                            <th>Date</th>
                           
                            <th>Stream</th>
                            <th>Semester</th>
                            <th>Section</th>
                            <th>Subject</th>
                            <th>Topic</th>
                            <th>Notes</th>
                        </thead>
                        <tbody id="fetch-notes">

                        </tbody>
                    </table>
                    <p class="text-muted text-center" id="message"></p>
                </div>
            </section>
        </div>
    </div>

    <script src="static/js/admin.js"></script>
    <script src="static/js/mynotes.js"></script>
</body>

</html>