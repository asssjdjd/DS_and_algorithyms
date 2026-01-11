<?php
interface HandleInputAlgorithmDataInterface
{
    // Data chính là dữ liệu cho thuật toán
    public function handleInputDataAlgorithm($data) : array;
}

//  BigSorting dữ liệu là dạng mảng [1,2,3,4,5]
//  CountingSort dữ liệu là mảng [1,2,3,4,5]
// insertionSort dữ liệu là só lượng 5 và mảng [1,2,3,4,5]
