<?php
session_start();
ob_start();

if(!$_SESSION['login'] || !$_SESSION['admin']){
    header("Location: /");
    exit();
}

?>