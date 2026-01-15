<?php

namespace App\Controller\Post;

// 1. Load Composer Autoloader (Chỉ cần 1 dòng này)
require_once __DIR__ . '/../../../vendor/autoload.php';

// 2. Sử dụng namespace để import Factory
use App\Application\Service\Factory\HandleInputAlgorithmFactory;

class PostInputData
{
    public static function handleInput(string $name, array $data): array
    {
        $outputAndExplaint = HandleInputAlgorithmFactory::create($name);
        if ($outputAndExplaint) {
            return $outputAndExplaint->handleInputDataAlgorithm($data);
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
                "status" => "received",
                "data_received" => self::handleInput($request["algorithym_id"], $request),
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Không nhận được dữ liệu hoặc JSON sai định dạng",
                "raw_payload" => $rawData
            ]);
        }
        exit;
    }
}

PostInputData::handle();