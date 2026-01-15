<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Application\Core\Search\SearchAlgorithm;

class SearchAlgorithmTest extends TestCase {

    public function testMissingNumbers() {
        // Mảng A (thiếu)
        $arr = [203, 204, 205, 206, 207, 208, 203, 204, 205, 206];
        // Mảng B (đủ) -> Có thêm: 204, 205, 206
        $brr = [203, 204, 204, 205, 206, 207, 205, 208, 203, 206, 205, 206, 204];

        $result = SearchAlgorithm::missingNumbers($arr, $brr);

        // Kết quả mong đợi: các số xuất hiện trong B nhiều hơn trong A
        $expected = [204, 205, 206];
        $this->assertEquals($expected, $result);
    }

    public function testIcecreamParlor() {
        // Tìm 2 vị trí sao cho tổng giá trị = m
        $m = 4;
        $arr = [1, 4, 5, 3, 2];
        // Giải thích: 1 (index 1) + 3 (index 4) = 4.

        $result = SearchAlgorithm::icecreamParlor($m, $arr);

        // Code của bạn trả về index bắt đầu từ 1 (1-based index)
        // Mong đợi: [1, 4]
        $this->assertEquals([1, 4], $result);
    }
    
    public function testIcecreamParlorNotFound() {
        $m = 100;
        $arr = [1, 2, 3];
        $result = SearchAlgorithm::icecreamParlor($m, $arr);
        $this->assertEmpty($result, "Nếu không tìm thấy phải trả về mảng rỗng");
    }
}