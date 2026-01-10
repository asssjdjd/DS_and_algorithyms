<?php
// Config Header    
header('Content-Type: application/json; charset=utf-8');
// config CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); 
header('Access-Control-Allow-Headers: Content-Type, Authorization'); 

require_once __DIR__ . '/../get/factory/HandleInputAlgorithmFactory.php';
// require_once __DIR__ . '/../get/factory/GetIntroduceDataFactory.php';

$rawData = file_get_contents('php://input');
$request = json_decode($rawData, true);


// gửi dữ liệu lại cho người dùng 
// Dữ liệu trả về được chuẩn hóa có kiểu : [data : Kết quả của thuật toán, explaint : Giải thích của thuật toán]
function handleInput($name, $data) {
    $outputAndExplaint = HandleInputAlgorithmFactory::create($name);
    if($outputAndExplaint) {
        return $outputAndExplaint -> handleInputDataAlgorithm($data);
    }
    // trả lại message nếu chưa tồn tại
    return [
        "message" => "Không tồn tại thuật toán này",
        "status" => "failed",
    ];
}

if ($request) {
    echo json_encode([
        "status" => "received",
        "data_received" => handleInput($request["algorithym_id"],$request),
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Không nhận được dữ liệu hoặc JSON sai định dạng",
        "raw_payload" => $rawData 
    ]);
}

exit;
