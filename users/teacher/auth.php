<?php
session_start();
ob_start();

if(!$_SESSION['login'] || !$_SESSION['teacher']){
    header("Location: /");
    exit();
}

?>