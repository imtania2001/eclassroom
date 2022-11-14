<?php
require("Mysql.php");
class Dashboard
{

    // For Teacher
    public static function teacherDashboard($faculty_id){
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        // All Class Count of Teacher
        $sql = "SELECT *   FROM `schedule_class` WHERE `faculty_id`='$faculty_id'";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $class = $result->num_rows;
        // All notes Count of Teacher
        $sql = "SELECT *  FROM `upload_notes` WHERE `faculty_id`='$faculty_id'";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $notes = $result->num_rows;
        // All updates Count of Teacher
        $sql = "SELECT * FROM `updates`";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $updates = $result->num_rows;

        return array("class"=>$class, "notes"=>$notes, "updates"=>$updates);

        
    }

    // For Student
    public static function studentDashboard($stream, $sem, $section){
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

        // All Class Count of Student
        $sql = "SELECT *  FROM `schedule_class` WHERE `stream`='$stream'AND`sem`='$sem'AND`section`='$section' ";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $class = $result->num_rows;
        // All notes Count of Student
        $sql = "SELECT * FROM  `upload_notes`WHERE`stream`='$stream'AND`sem`='$sem'AND`section`='$section' ";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $notes = $result->num_rows;
        // All updates of Student
        $sql = "SELECT *  FROM  `updates`";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $updates = $result->num_rows;

        return array("class"=>$class, "notes"=>$notes, "updates"=>$updates);

        
    }
    // For Admin
    public static function adminDashboard(){
        $config = Mysql::config();
        $conn = new mysqli($config[0], $config[1], $config[2], $config[3]);
        if (!$conn)
            return false;

            // Show count only
        // All Users Registered
        $sql = "SELECT *  FROM `login` ";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $user= $result->num_rows;


        // All Teachers
        $sql = "SELECT *  FROM `teachers` ";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $teacher= $result->num_rows;

        // All Students
       $sql = "SELECT *  FROM `students` ";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $student = $result->num_rows;

        // All Classes
        $sql = "SELECT *  FROM `schedule_class` ";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $class = $result->num_rows;

        // All Notes
        $sql = "SELECT *  FROM `upload_notes`";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $notes = $result->num_rows;

        // All Updates
        $sql = "SELECT * FROM `updates`";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $updates = $result->num_rows;

        

        // All Streams
        $sql = "SELECT * FROM `streams`";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $stream = $result->num_rows;
        // All Subjects
        $sql = "SELECT * FROM `subjects`";
        $result = $conn->query($sql);
        if(!$result){
            return false;
        }
        $subjects = $result->num_rows;

        return array("class"=>$class, "notes"=>$notes, "updates"=>$updates,"users"=>$user, "teacher"=>$teacher, "student"=>$student, "stream"=>$stream,"subject"=>$subjects);
        
    }
}



