<?php

require_once __DIR__ . '/../../interface/GetIntroduceDataAlgorithym.php';

class QuickSort2 implements GetIntroduceDataAlgorithymInterface {
    public function getIntroduceData() :array
    {
        // write introduce here. 
        return [
            'intro' => 'Thuật toán QuickSort2. Vui lòng nhập một mảng vào ô input',
            'data' => 'Ví dụ : nhập mảng: 5 4 2 6 7 8',
            'note' => 'Lưu ý :  chỉ nhập một dòng và cách nhau có khoảng trắng giữa các ký tự.
              Và phải là số!',
        ];
    }
}