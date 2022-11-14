<?php
require("Mysql.php");
class Data
{

    // Showing All Streams
    public static function getAllStream()
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `streams`";
        $result = $conn->query($sql);
        if ($result) {
            $total = $result->num_rows;
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return array("total" => $total, "streams" => $arr);
        } else
            return false;
    }
    // Showing All Semesters
    public static function getSemesterByStreamId($stream_id)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `semesters` WHERE `streams_id`='$stream_id'";
        $result = $conn->query($sql);
        if ($result) {
            $total = $result->num_rows;
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return array("total" => $total, "semesters" => $arr);
        } else
            return false;
    }
    // Showing All Subjects
    public static function getSubjectBySemesterId($semesters_id)
    {
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        $sql = "SELECT * FROM `subjects` WHERE `semesters_id`='$semesters_id'";
        $result = $conn->query($sql);
        if ($result) {
            $total = $result->num_rows;
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return array("total" => $total, "subjects" => $arr);
        } else
            return false;
    }
}