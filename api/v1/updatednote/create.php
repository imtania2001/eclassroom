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
if (isset($_REQUEST['faculty_id'])&& isset($_REQUEST['faculty_name']) && isset($_REQUEST['stream'])&& isset($_REQUEST['sem'])&&isset($_REQUEST['section'])&&isset($_REQUEST['subject'])&&isset($_REQUEST['topic'])&&isset($_REQUEST['date'])&& isset($_FILES['file']) && isset($_REQUEST['recordinglink'])) {
    require "../../controllers/Notes.php";

    $url = "../../notes/";  
    $var = $_FILES['file']['name'];
    $furl = $url . $var;
    move_uploaded_file($_FILES['file']['tmp_name'], $furl);  
    $path = "/api/notes/";  
    $filepath = $path.$var; 

        // $filepath = '';
        // $x = count($_FILES['file']['name']); // Count the number of files
        // for ($i = 0; $i < $x; $i++) {       // loop for each file
        //     $temp = $_FILES['file']['tmp_name'][$i];
        //     $url = "../../notes/";             // storing the address from backend perspective
        //     $var = $_FILES['file']['name'][$i]; // storing the file name
        //     $furl = $url . $var;            // storing the complete address of file from backend
        //     move_uploaded_file($_FILES['file']['tmp_name'][$i], $furl); // saving the file in the given address
        //     $path = "/api/notes/";          // storing the address from frontend perspective
        //     $address = $path.$var;          // storing the complete address of file from backend
        //     $filepath = $filepath . $address . ','; // address of all files separated by (,) comma
        // }

    $result = Notes::create($_REQUEST['faculty_id'],$_REQUEST['faculty_name'], $_REQUEST['stream'],$_REQUEST['sem'],$_REQUEST['section'],$_REQUEST['subject'],$_REQUEST['topic'],$_REQUEST['date'],$filepath, $_REQUEST['recordinglink']);

    
    if($result){
        echo json_encode(
            array(
                "status" => "success", 
                "status_code" => "1200" , 
                "message" => "Notes Uploaded"
            )
        );
    }else{
        echo json_encode(array('status' => 'success', 'status_code' => 1300, "message" => "Error Occured"));
    }
    
}else{
    echo json_encode(array('status' => 'error', 'status_code' => 1400,  'message' => 'PARAMS NOT FOUND'));
}
