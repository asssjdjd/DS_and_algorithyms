<?php
interface HandleInputAlgorithmDataInterface
{
    // Data chính là dữ liệu cho thuật toán
    public function handleInputDataAlgorithm($data) : array;
}

//  BigSorting dữ liệu là dạng mảng [1,2,3,4,5]
// Các thuật toán khác sẽ được triển khai dưới đây