<?php
require("Mysql.php");
class Registrationstudent
{
    public static function create($unique_id, $first_name, $mid_name, $lastname, $dob, $gender, $stream, $section, $semester, $phone, $email, $password, $photo = "")
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        // $sql = "INSERT INTO `schedule_class`(`faculty_id`, `faculty_name`, `stream`, `sem`, `section`, `subject`, `topic`, `date`, `time`) VALUES ('$faculty_id','$faculty_name','$stream', '$sem', '$section', '$subject', '$topic', '$date', '$time')";
        $sql = "INSERT INTO `students` (`unique_id`, `first_name`, `mid_name`, `lastname`, `dob`, `gender`, `stream`, `section`, `semester`,`phone`,`email`,`password`,`photo`) VALUES ( '$unique_id','$first_name','$mid_name', '$lastname', '$dob','$gender' ,'$stream', '$section', '$semester', '$phone','$email','$password','$photo')";
        //return $sql;
        $result = $conn->query($sql);

        if ($result) {
            $sql = "UPDATE `login` SET `status`=1, `password`='$password' WHERE `email_id`='$email'";
            $conn->query($sql);
            return true;
        } else
            return false;
    }
    // Edit
    public static function edit($id, $first_name, $mid_name, $lastname, $dob, $gender, $stream, $section, $semester, $phone, $photo = "")
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        if ($phone != "") {
            $sql = "UPDATE `students` SET `first_name`='$first_name',`mid_name`='$mid_name',`lastname`='$lastname',`dob`='$dob',`gender`='$gender',`stream`='$stream',`section`='$section',`semester`='$semester',`phone`='$phone',`photo`='$photo' WHERE `id`='$id'";
        } else {
            $sql = "UPDATE `students` SET `first_name`='$first_name',`mid_name`='$mid_name',`lastname`='$lastname',`dob`='$dob',`gender`='$gender',`stream`='$stream',`section`='$section',`semester`='$semester',`phone`='$phone' WHERE `id`='$id'";
        }
        $result = $conn->query($sql);

        if ($result) {
            $sql = "SELECT  `id`, `unique_id`, `first_name`, `mid_name`, `lastname`, `dob`, `gender`, `stream`, `section`, `semester`, `phone`, `email`, `photo` FROM `students` WHERE `id`='$id'";
            $result = $conn->query($sql);
            if (!$result || !$result->num_rows)
                return false;
            $user = $result->fetch_assoc();
            $_SESSION['student'] = $user;
            return array("edit" => true,  "user" => $user, "message" => "Profile Edited");
        } else
            return false;
    }
}
