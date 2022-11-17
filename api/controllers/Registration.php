
<?php
require("Mysql.php");
class Registration
{
    public static function create($unique_id, $firstname, $midname, $Lastname, $dob, $gender, $phone, $email, $password, $photo = "")
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        // $sql = "INSERT INTO `schedule_class`(`faculty_id`, `faculty_name`, `stream`, `sem`, `section`, `subject`, `topic`, `date`, `time`) VALUES ('$faculty_id','$faculty_name','$stream', '$sem', '$section', '$subject', '$topic', '$date', '$time')";
        $sql = "INSERT INTO `teachers` (`unique_id`, `firstname`, `midname`, `Lastname`, `dob`, `gender` ,`phone`,`email`,`password`,`photo`) VALUES ( '$unique_id','$firstname','$midname', '$Lastname', '$dob','$gender' ,'$phone','$email','$password','$photo')";
        //return $sql;
        $result = $conn->query($sql);
        if ($result) {
            $sql = "UPDATE `login` SET `status`=1, `password`='$password' WHERE `email_id`='$email'";
            $conn->query($sql);
            return true;
        } else
            return $sql;
    }

    //Registration Edit for teachers
    public static function edit($id, $first_name, $mid_name, $lastname, $dob, $gender,  $phone, $photo)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        if ($photo != "") {
            $sql = "UPDATE `teachers` SET `firstname`='$first_name',`midname`='$mid_name',`Lastname`='$lastname',`dob`='$dob',`gender`='$gender',`phone`='$phone',`photo`='$photo' WHERE `id`='$id'";
        } else {
            $sql = "UPDATE `teachers` SET `firstname`='$first_name',`midname`='$mid_name',`Lastname`='$lastname',`dob`='$dob',`gender`='$gender',`phone`='$phone' WHERE `id`='$id'";
        }
        $result = $conn->query($sql);

        if ($result) {
            $sql = "SELECT `id`, `unique_id`, `firstname`, `midname`, `Lastname`, `dob`, `gender`, `phone`, `email`, `photo`  FROM `teachers` WHERE `id`='$id'";
            $result = $conn->query($sql);
            if (!$result || !$result->num_rows)
                return false;
            $user = $result->fetch_assoc();
            $_SESSION['teacher'] = $user;
            return array("edit" => true,  "user" => $user, "message" => "Profile Edited", "photo"=>$photo);
        } else
            return false;
    }
}
