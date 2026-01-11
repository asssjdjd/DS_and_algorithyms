<?php

require_once __DIR__ . '/../../interface/GetIntroduceDataAlgorithym.php';

class InsertionSort1 implements GetIntroduceDataAlgorithymInterface {
    public function getIntroduceData() :array
    {
        // write introduce here. 
        return [
            'intro' => 'Thuật toán InsertionSort1. Vui lòng nhập một mảng và số lượng các số trong mảng vào ô input',
            'data' => 'Ví dụ : Dòng đầu nhập số lượng ký tự : 5. Dòng 2 nhập mảng: 1 2 3 4 5 6 7',
            'note' => 'Lưu ý :  chỉ nhập một dòng và cách nhau có khoảng trắng giữa các ký tự.
             Và phải là số !.
             Và phải nhập 2 dòng',
        ];
    }
}