<?php
require("Mysql.php");
class Update
{
    public static function create( $stream, $semester,$title,$message, $file, $date, $time)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "INSERT INTO `updates`(  `stream`, `semester`,`title`,`message`,`file`, `date`, `time`) VALUES ('$stream', '$semester',  '$title', '$message', '$file', '$date', '$time')";
        $result = $conn->query($sql);
        if ($result)
            return true;
        else
            return false;
    }
    // For Teacher
    public static function viewupdate()
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `updates`";
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
    //For student
    public static function viewallupdate($stream, $semester)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `updates` WHERE `stream`='$stream' AND `semester`='$semester'";
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
    
    //Delete class

    public static function delete($id)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "DELETE FROM `updates` WHERE `id`='$id' ";
        $result = $conn->query($sql);
        if ($result)
            return true;

        else
            return false;
    }
}
