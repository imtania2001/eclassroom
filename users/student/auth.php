<?php
session_start();
ob_start();

if(!$_SESSION['login'] || !$_SESSION['student']){
    header("Location: /");
    exit();
}

?>