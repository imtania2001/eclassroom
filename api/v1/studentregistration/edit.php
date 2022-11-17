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
if(isset($_REQUEST['id'])&& isset($_REQUEST['first_name']) && isset($_REQUEST['mid_name'])&& isset($_REQUEST['lastname'])&&isset($_REQUEST['dob'])&&isset($_REQUEST['gender'])&&isset($_REQUEST['stream'])&& isset($_REQUEST['section']) && isset($_REQUEST['phone']) && isset($_REQUEST['semester'])){
    include "../../controllers/Registrationstudent.php";

    $filepath = "";
    if(isset($_FILES['photo'])){
        $url = "../../photos/";  
        $var = $_REQUEST['phone']."_".$_FILES['file']['name'];
        $furl = $url . $var;
        move_uploaded_file($_FILES['file']['tmp_name'], $furl);  
        $path = "/api/photos/";  
        $filepath = $path.$var;
    }

    $result = Registrationstudent::edit($_REQUEST['id'],$_REQUEST['first_name'],$_REQUEST['mid_name'],$_REQUEST['lastname'],$_REQUEST['dob'],$_REQUEST['gender'],$_REQUEST['stream'],$_REQUEST['section'],$_REQUEST['semester'],$_REQUEST['phone'],$filepath);
    
    if($result){
        echo json_encode(
            array(
                "status" => "success", 
                "status_code" => "1200" , 
                "data" => $result
            )
        );
    }else{
        echo json_encode(array('status' => 'success', 'status_code' => 1300, "message" => "Error Occured"));
    }
    
}else{
    echo json_encode(array('status' => 'error', 'status_code' => 1400,  'message' => 'PARAMS NOT FOUND'));
}
