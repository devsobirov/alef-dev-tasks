<?php

    $summary = 0;

    $inputNum = 1;

    //Входные числа от 1 до 1000;
    while($inputNum < 1001) {
        //Конвертируем входные числа на массив с отдельными числами
        $splittedCharsArr = str_split($inputNum);
        //Удаляем дублированные значения из массива
        $uniqueizedCharsArr = array_unique($splittedCharsArr);

        //Если элементы из изначального и фильтрованного массива равны
        // прибавляем входное число к сумме;
        if (count($splittedCharsArr) === count($uniqueizedCharsArr)) {
            $summary += $inputNum;
        }
        $inputNum++;
    }

    echo $summary;