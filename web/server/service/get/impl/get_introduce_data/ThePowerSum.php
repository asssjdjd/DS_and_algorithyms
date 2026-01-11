<?php

require_once __DIR__ . '/../../interface/GetIntroduceDataAlgorithym.php';

class ThePowerSum implements GetIntroduceDataAlgorithymInterface {
    public function getIntroduceData() :array
    {
        // write introduce here. 
        return [
            'intro' => 'Thuật toán ThePowerSum.
             Vui lòng nhập 2 số vào ô input',
            'data' => 'Ví dụ :
              Dòng đầu nhập một số 1 <= X <= 1000. Ví dụ 100
              Dòng thứ 2 nhập một số 2 <= N <= 10. Ví dụ 2.
              Thuật toán tìm tất cả tổ hợp có các số khác nhau mà mũ N = X ',
            'note' => 'Lưu ý :  chỉ nhập một dòng và cách nhau có khoảng trắng giữa các ký tự.
             Và phải là số !',
        ];
    }
}