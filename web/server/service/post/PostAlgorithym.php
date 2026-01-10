<?php
require_once __DIR__ . '/../get/factory/GetIntroduceDataFactory.php';

// Config Header    
header('Content-Type: application/json; charset=utf-8');
// config CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); 
header('Access-Control-Allow-Headers: Content-Type, Authorization'); 

$rawData = file_get_contents('php://input');
$request = json_decode($rawData, true);

//  dữ liệu gửi đi có dạng 'id : "thuat toan"'
function getIntroduce($id) {
    $introduce = GetIntroduceDataFactory::create($id);
    if($introduce) {
        return $introduce -> getIntroduceData();
    }
    // trả lại message nếu chưa tồn tại
    return [
        "message" => "Không tồn tại thuật toán này",
        "status" => "failed",
    ];
}

if($request) {
    echo json_encode([
        "data_received" => getIntroduce($request["id"]),
        "status" => "success",
    ]);
}else {
    echo json_encode([
        "status" => "error",
        "message" => "Không nhận được dữ liệu hoặc JSON sai định dạng",
    ]);
}
