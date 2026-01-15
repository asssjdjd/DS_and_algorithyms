<?php
namespace App\Application\Service\Impl\GetIntroduceData;

use App\Application\Service\Interface\GetIntroduceDataAlgorithymInterface;

class InsertionSort2 implements GetIntroduceDataAlgorithymInterface {
    public function getIntroduceData() :array
    {
        // write introduce here. 
        return [
            'intro' => 'Thuật toán InsertionSort2.
             Vui lòng nhập số lượng các số trong mảng và mảng vào ô input',
            'data' => 'Ví dụ :
                                Dòng đầu nhập số lượng ký tự : 7. 
                                Dòng 2 nhập mảng: 1 2 3 4 5 6 7
                                ',
            'note' => 'Lưu ý :  chỉ nhập một dòng và cách nhau có khoảng trắng giữa các ký tự.
             Và phải là số !.
             Và phải nhập 2 dòng',
        ];
    }
}