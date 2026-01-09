<?php

require_once __DIR__ . '/../../interface/GetIntroduceDataAlgorithym.php';

class BigSorting implements GetIntroduceDataAlgorithymInterface {
    public function getIntroduceData() :array
    {
        // write introduce here. 
        return [
            'intro' => 'Vui lòng nhập một mảng đã sắp xếp vào ô input',
            'data' => 'Ví dụ : 1 2 3 4 5 6 7',
            'note' => 'Lưu ý chỉ nhập một dòng và cách nhau có khoảng trắng giữa các ký tự',
        ];
    }
}