<?php
namespace App\Application\Service\Impl\GetIntroduceData;

use App\Application\Service\Interface\GetIntroduceDataAlgorithymInterface;


class SearchMissingNumber implements GetIntroduceDataAlgorithymInterface {
    public function getIntroduceData() :array
    {
        // write introduce here. 
        return [
            'intro' => 'Thuật toán SearchMissingNumber.
             Vui lòng nhập 2 mảng vào ô input',
            'data' => 'Ví dụ :
                                Dòng đầu nhập mảng số 1 ví dụ : 1 2 3 4. 
                                Dòng 2 nhập mảng còn lại : 1 2 3 3 4 4 5 6 7 8.
                                ',
            'note' => 'Lưu ý :  chỉ nhập mỗi mảng một dòng và cách nhau có khoảng trắng giữa các ký tự.
             Và phải là số !.
             Và phải nhập 2 dòng',
        ];
    }
}