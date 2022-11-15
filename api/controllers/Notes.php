<?php
require("Mysql.php");
class Notes
{
    public static function create($faculty_id, $faculty_name, $stream, $sem, $section, $subject, $topic, $date, $file, $recordinglink = "")
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "INSERT INTO `upload_notes`(`faculty_id`, `faculty_name`, `stream`, `sem`, `section`, `subject`, `topic`, `date`, `file`, `recordinglink`) VALUES ('$faculty_id', '$faculty_name', '$stream', '$sem', '$section', '$subject', '$topic', '$date', '$file', '$recordinglink')";
        $result = $conn->query($sql);
        if ($result)
            return true;
        else
            return false;
    }
    // For Teacher
    public static function viewnotes($faculty_id)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `upload_notes` WHERE `faculty_id`='$faculty_id'";
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
    public static function viewallnotes($stream, $sem, $section)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `upload_notes` WHERE `stream`='$stream' AND `sem`='$sem' AND `section`='$section'";
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

        $sql = "DELETE FROM `upload_notes` WHERE `id`='$id' ";
        $result = $conn->query($sql);
        if ($result)
            return true;

        else
            return false;
    }
}
