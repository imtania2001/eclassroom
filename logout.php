<?php
session_start();
session_unset();
header("location:/");
?>

<script>
localStorage.clear();
</script>