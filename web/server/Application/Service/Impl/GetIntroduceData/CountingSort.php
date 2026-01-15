<?php
namespace App\Application\Service\Impl\GetIntroduceData;
use App\Application\Service\Interface\GetIntroduceDataAlgorithymInterface;



class CountingSort implements GetIntroduceDataAlgorithymInterface {
    public function getIntroduceData() :array
    {
        // write introduce here. 
        return [
            'intro' => 'Thuật toán CountingSort. Vui lòng nhập một mảng  vào ô input',
            'data' => 'Ví dụ : nhập mảng: 1 2 3 4 5 6 7',
            'note' => 'Lưu ý :  chỉ nhập một dòng và cách nhau có khoảng trắng giữa các ký tự.
             Và phải là số !',
        ];
    }
}