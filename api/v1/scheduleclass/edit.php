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
if(isset($_REQUEST['id'])){
    include "../../controllers/Schedule.php";
    $result =Schedule::edit($_REQUEST['id']);
    
    if($result){
        echo json_encode(
            array(
                "status" => "success", 
                "status_code" => "1200" , 
                "message" => "Class Updated"
            )
        );
    }else{
        echo json_encode(array('status' => 'success', 'status_code' => 1300, "message" => "Error Occured"));
    }
    
}else{
    echo json_encode(array('status' => 'error', 'status_code' => 1400,  'message' => 'PARAMS NOT FOUND'));
}

?>