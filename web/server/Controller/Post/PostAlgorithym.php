<?php

namespace App\Controller\Post;

// 1. Chỉ cần dòng này là đủ để load TOÀN BỘ thư viện và code của bạn
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Application\Service\Factory\GetIntroduceDataFactory;
use App\Domain\AlgorithymEnum;

class PostAlgorithym
{
    public static function getIntroduce(string $id): array
    {
        $introduce = GetIntroduceDataFactory::create($id);
        if ($introduce) {
            return $introduce->getIntroduceData();
        }
        return [
            "message" => "Không tồn tại thuật toán này",
            "status" => "failed",
        ];
    }

    public static function handle(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');

        $rawData = file_get_contents('php://input');
        $request = json_decode($rawData, true);

        if ($request) {
            echo json_encode([
                "data_received" => self::getIntroduce($request["id"]),
                "status" => "success",
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Không nhận được dữ liệu hoặc JSON sai định dạng",
            ]);
        }
        exit;
    }
}

PostAlgorithym::handle();