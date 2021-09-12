<?php 

$inputNumsArray = [
    [399, 9160, 144, 3230, 407, 8875, 1597, 9835], 
    [2093, 3279, 21, 9038, 918, 9238, 2592, 7467], 
    [3531, 1597, 3225, 153, 9970, 2937, 8, 807], 
    [7010, 662, 6005, 4181, 3, 4606, 5, 3980], 
    [6367, 2098, 89, 13, 337, 9196, 9950, 5424], 
    [7204, 9393, 7149, 8, 89, 6765, 8579, 55], 
    [1597, 4360, 8625, 34, 4409, 8034, 2584, 2], 
    [920, 3172, 2400, 2326, 3413, 4756, 6453, 8], 
    [4914, 21, 4923, 4012, 7960, 2254, 4448, 1]
];
//Массив с простыми числами
$primeNumbersArray = [];
//Сумма простых чисел;
$sumOfPrimeNumbers = 0;

/**
 * Определяет является ли простым число возвращает его в случае правды, или false;
 * 
 * @param integer $number
 * @return false|integer $number
 */
function checkIsPrimeNumber($number){
    if ($number == 1) {
        return 1;
    }
     
    for ($i = 2; $i <= sqrt($number); $i++){
        if ($number % $i == 0) {
            return false;
        }
    }
    return $number;
}

/**
 * Фильтрирует числа простых чисел из массива и возвращает дополненный
 * входной массив массив;
 * 
 * @param array $inputArray массив с числами для фильтрации
 * @return array $outputArray 
 */
function getAllPrimeNumbers ($inputArray, $outputArray)
{
    foreach ($inputArray as $num) {
        $primeNumber = checkIsPrimeNumber($num);

        if ($primeNumber) {
            $outputArray[] = $primeNumber;
        }
    }

    return $outputArray;
}

//Фильтрируем простых чисел каждого массива из входного двухмерного массива
foreach($inputNumsArray as $numsArray) {
    $primeNumbersArray = getAllPrimeNumbers($numsArray, $primeNumbersArray);
}

//Суммаризируем простых чисел если они есть;
if ( !empty($primeNumbersArray) ) {
    $sumOfPrimeNumbers = array_sum($primeNumbersArray);
}

echo $sumOfPrimeNumbers;
