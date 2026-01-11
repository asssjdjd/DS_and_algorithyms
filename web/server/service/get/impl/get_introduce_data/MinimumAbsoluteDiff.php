<?php

require_once __DIR__ . '/../../interface/GetIntroduceDataAlgorithym.php';

class MinimumAbsoluteDiff implements GetIntroduceDataAlgorithymInterface {
    public function getIntroduceData() :array
    {
        // write introduce here. 
        return [
            'intro' => 'Thuật toán MinimumAbsoluteDiff. Vui lòng nhập một mảng vào ô input',
            'data' => 'Ví dụ : nhập mảng: -9 -1 1 4 8 11 7',
            'note' => 'Lưu ý :  chỉ nhập một dòng và cách nhau có khoảng trắng giữa các ký tự.
             Và phải là số !',
        ];
    }
}