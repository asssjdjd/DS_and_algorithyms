<?php
namespace Tests;
use App\Application\Core\Sort\SortAlgorithm;
use PHPUnit\Framework\TestCase;

class SortAlgorithmTest extends TestCase {
    /** 
     * BigSorting : Test trường hợp mảng lộn xộn. có phần tử có số dài.
    */
    public function testBigSortingAlgorithm() {
        $unsorted = ["6", "31415926535897932384626433832795", "1", "3", "10", "3", "5"];
        $expected = ["1", "3", "3", "5", "6", "10", "31415926535897932384626433832795"];

        $actual = SortAlgorithm::bigSorting($unsorted);
        
        $this->assertEquals($expected, $actual,
         "Mảng các số lớn không được sắp xếp đúng thứ tự");
    }
    // --- CountingSort ---
    public function testCountingSort() {
        // Input: mảng số nguyên dương
        $input = [1, 4, 1, 2, 7, 5, 2];
        $expectedArr = [1, 1, 2, 2, 4, 5, 7];

        // Biến explain để hứng kết quả giải thích
        $explain = []; 
        
        // Gọi hàm
        [$resultArr, $resultExplain] = SortAlgorithm::countingSort($input, $explain);

        // Assert
        $this->assertEquals($expectedArr, $resultArr, "CountingSort sắp xếp sai");
        $this->assertNotEmpty($resultExplain, "CountingSort phải trả về giải thích (bảng tần suất)");
    }

    // --- InsertionSort1 (Test logic chèn phần tử cuối) ---
    public function testInsertionSort1() {
        // Mảng gần được sắp xếp, chỉ có số cuối sai vị trí
        $input = [1, 2, 4, 5, 3]; 
        $n = count($input);
        $explain = [];

        // Lưu ý: InsertionSort1 trong code của bạn trả về mảng đã sửa
        [$resultArr, $resultExplain] = SortAlgorithm::insertionSort1($n, $input, $explain);

        $expected = [1, 2, 3, 4, 5];
        $this->assertEquals($expected, $resultArr);
        $this->assertGreaterThan(0, count($resultExplain));
    }

    // --- InsertionSort2 (Full Sort) ---
    public function testInsertionSort2() {
        $input = [3, 4, 7, 5, 6, 2, 1];
        $n = count($input);
        $explain = [];

        [$resultArr, $resultExplain] = SortAlgorithm::insertionSort2($n, $input, $explain);

        $expected = [1, 2, 3, 4, 5, 6, 7];
        $this->assertEquals($expected, $resultArr, "InsertionSort2 sắp xếp sai");
    }

    // --- QuickSort1 (Partition - Chỉ chia mảng, không sort full) ---
    public function testQuickSort1() {
        // Logic: Chọn phần tử đầu (4) làm pivot.
        // Left: < 4 (3, 2)
        // Equal: = 4 (4)
        // Right: > 4 (5, 7)
        // Kết quả merge: [3, 2] + [4] + [5, 7] -> [3, 2, 4, 5, 7]
        $input = [4, 5, 3, 7, 2];
        
        $result = SortAlgorithm::quickSort1($input);

        // Kiểm tra xem Pivot (4) có nằm giữa nhóm nhỏ hơn và nhóm lớn hơn không
        $this->assertEquals(4, $result[2]); // Vị trí pivot
        $this->assertTrue(in_array($result[0], [3, 2]));
        $this->assertTrue(in_array($result[4], [5, 7]));
    }

    // --- QuickSort2 (Full Sort Recursive) ---
    public function testQuickSort2() {
        $input = [5, 8, 1, 3, 7, 9, 2];
        $explain = [];

        [$resultArr, $resultExplain] = SortAlgorithm::quickSort_2($input, $explain);

        $expected = [1, 2, 3, 5, 7, 8, 9];
        $this->assertEquals($expected, $resultArr, "QuickSort2 sắp xếp sai");
    }
}

