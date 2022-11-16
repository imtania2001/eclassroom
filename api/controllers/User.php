<?php
require("Mysql.php");
// session_start();
session_start();
class User
{
    public static function checkUser($email_id)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `login` WHERE `email_id`='$email_id'";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }

        if($result->num_rows){
            $user = $result->fetch_assoc();
            if($user['status'] == 0){
                $role = $user['role'];
                $email_id = $user['email_id'];
                $_SESSION['user_role'] = $role;
                $_SESSION['user_email'] = $email_id;
                return array("login_code"=>100, "role" => $role, "email_id"=>$email_id);
            }else{
                return array("login_code"=>101, "message"=>"You are already registered");
            }
        }else{
            return array("login_code"=>101, "message" => "You don't have access for registration");
        }

    }

    public static function login($email_id, $password)
    {
        // session_start();
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `login` WHERE `email_id`='$email_id' AND `password`='$password'";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows) {
                $row = $result->fetch_assoc();
                $role = $row['role'];
                $_SESSION['login'] = true;
                if ($role == "admin") {
                    $sql = "SELECT `unique_id`, `firstname`, `midname`, `lastname`, `gender`, `phone`, `email`, `password`, `photo` FROM `admins` WHERE `email`='$email_id' AND `password`='$password'";
                    $result = $conn->query($sql);
                    if (!$result || !$result->num_rows)
                        return false;
                    $user = $result->fetch_assoc();
                    $_SESSION['admin'] = $user;
                    return array("login" => true, "role" => $role, "user" => $user, "message" => "Login Successfull");
                } else if ($role == "teacher") {
                    $sql = "SELECT `id`, `unique_id`, `firstname`, `midname`, `Lastname`, `dob`, `gender`, `phone`, `email`, `photo` FROM `teachers` WHERE `email`='$email_id' AND `password`='$password'";

                    $result = $conn->query($sql);
                    if (!$result || !$result->num_rows)
                        return false;
                    $user = $result->fetch_assoc();
                    $_SESSION['teacher'] = $user;
                    return array("login" => true, "role" => $role, "user" => $user, "message" => "Login Successfull");
                } else if ($role == "student") {
                    $sql = "SELECT  `id`, `unique_id`, `first_name`, `mid_name`, `lastname`, `dob`, `gender`, `stream`, `section`, `semester`, `phone`, `email`, `photo` FROM `students` WHERE `email`='$email_id' AND `password`='$password'";
                    $result = $conn->query($sql);
                    if (!$result || !$result->num_rows)
                        return false;
                    $user = $result->fetch_assoc();
                    $_SESSION['student'] = $user;
                    return array("login" => true, "role" => $role, "user" => $user, "message" => "Login Successfull");
                } else {
                    return false;
                }
            }
            return array("login" => false, "message" => "Invalid Credentials");
        }
        return false;
    }

    public static function addusers($email_id, $role)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        // Checking whether the user already exists or not
        $sql = "SELECT * FROM `login` WHERE `email_id`='$email_id'";
        $result = $conn->query($sql);
        if ($result && $result->num_rows) {
            return false;
        }

        $sql = "INSERT INTO `login`(`email_id`,  `role`) VALUES ('$email_id',  '$role')";
        $result = $conn->query($sql);
        // return $result;
        if ($result)
            return true;
        else
            return false;
    }
    //view users
    public static function viewallusers()
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT `id`,`email_id`,`role` FROM `login`";
        $result = $conn->query($sql);
        if ($result) {
            $total = $result->num_rows;
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return array("total" => $total, "row" => $arr);
        } else
            return false;
    }

    //delete users
    public static function deleteusers($id)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "DELETE FROM `login` WHERE `id`='$id' ";
        $result = $conn->query($sql);
        if ($result)
            return true;

        else
            return false;
    }

    //view Teacher
    public static function viewAllTeacher()
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT `id`, `unique_id`, `firstname`, `midname`, `Lastname`, `dob`, `gender`, `phone`, `email`, `photo` FROM `teachers` WHERE 1";
        $result = $conn->query($sql);
        if ($result) {
            $total = $result->num_rows;
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return array("total" => $total, "row" => $arr);
        } else
            return false;
    }

    //view Student
    public static function viewAllStudent()
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT `id`, `name`, `roll_number`, `email_id`, `mobile_number`, `dob`, `stream`, `semester`, `batch`, `photo` FROM `students` WHERE 1";
        $result = $conn->query($sql);
        if ($result) {
            $total = $result->num_rows;
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return array("total" => $total, "row" => $arr);
        } else
            return false;
    }
}
