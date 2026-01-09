<?php
// Config Header
header('Content-Type: application/json; charset=utf-8');
// config CORS
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/factory/GetIntroduceDataFactory.php';

function getIntroduce($id) {
    $introduce = GetIntroduceDataFactory::create($id);

    if($introduce) {
        return $introduce -> getIntroduceData();
    }

    // trả lại null nếu chưa tồn tại
    return null;
}




echo json_encode(getIntroduce("big_sorting"));
exit;