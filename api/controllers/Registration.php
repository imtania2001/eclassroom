
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
    public static function edit($id)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;
        $sql = "SELECT * FROM `teachers` WHERE `id`='$id' ";
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
