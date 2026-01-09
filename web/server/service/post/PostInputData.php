<?php
// Config Header    
header('Content-Type: application/json; charset=utf-8');
// config CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); 
header('Access-Control-Allow-Headers: Content-Type, Authorization'); 

$rawData = file_get_contents('php://input');
$request = json_decode($rawData, true);


// gửi dữ liệu lại cho người dùng 



if ($request) {
    echo json_encode([
        "status" => "received",
        "data_received" => $request
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Không nhận được dữ liệu hoặc JSON sai định dạng",
        "raw_payload" => $rawData 
    ]);
}

exit;
