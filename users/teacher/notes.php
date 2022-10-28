<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEACHER | Notes</title>
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
                        <button type="button" class="btn btn-success btn-lg btn-block" id="show-table" onclick="getFacultyNoteByIdHTML()">List of Notes (1)</button>
                    </div>
                    <div class="sc-heading-part">
                        <button type="button" class="btn btn-success btn-lg btn-block" id="show-form" onclick="showCreateNoteForm()">New Note</button>
                    </div>
                </div>
                <div class="page-content overflow-auto" id="mynote-container">

                </div>
            </section>
        </div>
    </div>

    <script src="static/js/admin.js"></script>
    <script src="static/js/mynotes.js"></script>
</body>

</html>