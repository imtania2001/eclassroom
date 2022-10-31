<?php
// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // should do a check here to match $_SERVER['HTTP_ORIGIN'] to a
    // whitelist of safe domains
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}
header('Content-type: application/json');
if (isset($_REQUEST['faculty_id'])&& isset($_REQUEST['faculty_name']) && isset($_REQUEST['stream'])&& isset($_REQUEST['sem'])&&isset($_REQUEST['section'])&&isset($_REQUEST['subject'])&&isset($_REQUEST['topic'])&&isset($_REQUEST['date'])&& isset($_REQUEST['time']) && isset($_REQUEST['classlink'])) {
    require "../../controllers/Schedule.php";

    $result = Schedule::create($_REQUEST['faculty_id'],$_REQUEST['faculty_name'], $_REQUEST['stream'],$_REQUEST['sem'],$_REQUEST['section'],$_REQUEST['subject'],$_REQUEST['topic'],$_REQUEST['date'], $_REQUEST['time'], $_REQUEST['classlink']);

    
    if($result){
        echo json_encode(
            array(
                "status" => "success", 
                "status_code" => "1200" , 
                "message" => "Class Scheduled"
            )
        );
    }else{
        echo json_encode(array('status' => 'success', 'status_code' => 1300, "message" => "Error Occured"));
    }
    
}else{
    echo json_encode(array('status' => 'error', 'status_code' => 1400,  'message' => 'PARAMS NOT FOUND'));
}

?>