<?php
require("Mysql.php");
class User{
    public static function login($email_id,$password){
        session_start();
        $config = Mysql::config();
        $conn = new mysqli($config[0],$config[1],$config[2],$config[3]);
        if(!$conn)
            return false;
        
        $sql = "SELECT * FROM `login` WHERE `email_id`='$email_id' AND `password`='$password'";
        $result = $conn->query($sql);

        if($result){
            if($result->num_rows){
                $row = $result->fetch_assoc();
                $role = $row['role'];
                $_SESSION['login'] = true;
                if($role == "admin"){
                    $sql = "SELECT * FROM `admins` WHERE `email_id`='$email_id' AND `password`='$password'";
                    $result = $conn->query($sql);
                    if(!$result || !$result->num_rows)
                        return false;
                    $_SESSION['admin'] = $result->fetch_assoc();
                }else if($role == "teacher"){
                    $sql = "SELECT * FROM `techers` WHERE `email_id`='$email_id' AND `password`='$password'";
                    $result = $conn->query($sql);
                    if(!$result || !$result->num_rows)
                        return false;
                    $_SESSION['teacher'] = $result->fetch_assoc();
                }else if($role == "student"){
                    $sql = "SELECT * FROM `students` WHERE `email_id`='$email_id' AND `password`='$password'";
                    $result = $conn->query($sql);
                    if(!$result || !$result->num_rows)
                        return false;
                    $_SESSION['student'] = $result->fetch_assoc();
                }
                else{
                    return false;
                }
                $arr["role"] = $role;
                return $arr;
            }
        }
        return false;
        
    }
}
