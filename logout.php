<?php
session_start();
session_unset();
header("location:index.php");
?>

<script>
localStorage.clear();
</script>