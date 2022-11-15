<?php
require("Mysql.php");
class Schedule
{
    public static function create($faculty_id, $faculty_name, $stream, $sem, $section, $subject, $topic, $date, $time, $classlink = "")
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        // $sql = "INSERT INTO `schedule_class`(`faculty_id`, `faculty_name`, `stream`, `sem`, `section`, `subject`, `topic`, `date`, `time`) VALUES ('$faculty_id','$faculty_name','$stream', '$sem', '$section', '$subject', '$topic', '$date', '$time')";
        $sql = "INSERT INTO `schedule_class` (`id`, `faculty_id`, `faculty_name`, `stream`, `sem`, `section`, `subject`, `topic`, `date`, `time`, `classlink`) VALUES (NULL, '$faculty_id','$faculty_name','$stream', '$sem', '$section', '$subject', '$topic', '$date', '$time', '$classlink');";
        $result = $conn->query($sql);
        if ($result)
            return true;
        else
            return false;
    }
    // For Teacher
    public static function view($faculty_id)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `schedule_class` WHERE `faculty_id`='$faculty_id'";
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
    public static function getClassById($id)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `schedule_class` WHERE `id`='$id'";
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
    public static function viewclass($stream, $sem, $section)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `schedule_class` WHERE `stream`='$stream' AND `sem`='$sem' AND `section`='$section'";
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
    //edit class
    public static function edit($id)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `schedule_class` WHERE `id`='$id' ";
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

        $sql = "DELETE FROM `schedule_class` WHERE `id`='$id' ";
        $result = $conn->query($sql);
        if ($result)
            return true;

        else
            return false;
    }
}
