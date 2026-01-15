<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Application\Core\Greedy\GreedyAlgorithm;

class GreedyAlgorithmTest extends TestCase {

    public function testMinimumAbsoluteDifference() {
        // Input: [-59, -36, -13, 1, -53, -92, -2, -96, -54, 75]
        // Sắp xếp: -96, -92, -59, -54, -53, -36, -13, -2, 1, 75
        // Hiệu nhỏ nhất: |-54 - (-53)| = 1. Hoặc |-53 - (-54)| = 1
        $input = [-59, -36, -13, 1, -53, -92, -2, -96, -54, 75];

        // Code của bạn trả về mảng chứa số min: [$min]
        $result = GreedyAlgorithm::minimumAbsoluteDifference($input);

        $this->assertIsArray($result);
        $this->assertEquals(1, $result[0]);
    }

    public function testMinimumAbsoluteDifferenceWithZeroDiff() {
        // Trường hợp có 2 số giống nhau -> hiệu = 0
        $input = [1, 5, 3, 1]; 
        $result = GreedyAlgorithm::minimumAbsoluteDifference($input);
        
        $this->assertEquals(0, $result[0]);
    }
}