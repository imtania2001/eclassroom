<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIH COLLEGE SPACE</title>
    <?php
        include "utils/header.php"
    ?>
</head>
<body class="d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="card col-sm-8 border-0">
        <div class="card-body">
            <form class="form col-sm-8 m-auto" id="login_form">
                <h4 class="card-title text-center">Login Here</h4>
                <div class="form-group mb-3">
                    <label for="">Email Id</label>
                    <div class="col-sm-12">
                        <input type="email" required class="form-control" placeholder="Enter Email" id="email_id" name="email_id">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="">Password</label>
                    <div class="col-sm-12">
                        <input type="password" required class="form-control" placeholder="Enter Password" id="password" name="password">
                    </div>
                </div>
                <div class="form-group mb-3 d-flex align-items-center  flex-wrap">
                    <button class="btn btn-primary" type="submit" style="width: 100px;">Login</button>
                    <p class=" m-auto" style="width: 150px;"><a href="">Forget Password?</a></p>
                    <p class=" m-auto" style="width: 250px;">Don't have account? <a href="teacher_signup.php">Register Now</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="static/js/index.js"></script>
</body>
</html>