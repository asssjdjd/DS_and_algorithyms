<?php

namespace App\Controller\Get;

use App\Domain\AlgorithymEnum;

require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../Domain/AlgorithymEnum.php';

class GetAlgorithyms
{
    public static function handle(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');

        $algorithyms = AlgorithymEnum::getEnumAlgorithym();
        echo json_encode($algorithyms);
        exit;
    }
}

GetAlgorithyms::handle();