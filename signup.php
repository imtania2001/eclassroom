<?php
session_start();
session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Signup</title>
   <?php
    include "utils/header.php"
    ?>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" id="signup_form">
      <h3>Signup Here</h3>
      <input type="email" id="email_id" name="email" required placeholder="enter your email">
      <input type="submit" name="submit" value="Signup" class="form-btn">
      <p>Already have an account? <a href="/">Log in</a></p>
   </form>

</div>

<script>
// localStorage.clear();
</script>
<script src="static/js/index.js?v=1.3"></script>
</body>
</html>