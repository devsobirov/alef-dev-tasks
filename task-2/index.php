<?php

    $rounds = [
        1 => '3810',
        2 => '2679', 
        3 => '1234', 
        4 => '5678',
        5 => '0183', 
        6 => '3801', 
        7 => '3810'
    ];

    $round = (!empty($_COOKIE['round']) && $_COOKIE['round'] < 8) ? $_COOKIE['round'] : 1;

    $hiddenNum = $rounds[$round];

    $totalAttempts = [];
    if (!empty($_COOKIE['totalAttempts'])) {
        $totalAttempts = json_decode($_COOKIE['totalAttempts'], true);
    }

    $userAttempt = (isset($_POST['attempt'])) ? $_POST['attempt'] : null;
    $guessedNums = 0;
    $guessedPositions = 0;
    $userWins = false;
    $gameRestarted = (isset($_POST['restart'])) ? true : false;

    // Перезагружаем игру если пользователь нажал кнопу "Рестарт"
    if ($gameRestarted) {
        setcookie('round', $round, time() - 1);
        setcookie('totalAttempts', "", time() - 1);

        header("Location: {$_SERVER['REQUEST_URI']}");
    }

    /**
     * Возвращает количество угаданных пользователем цифр;
     * 
     * @param array $userNums Цифры полученные от пользователья ввиде простого массива 
     * @param array hiddenNums Загаданные цифры ввиде массива 
     * @return int $amount;
     */
    function getGuessedNumsAmount($userNums, $hiddenNums) {
        foreach($userNums as $number) {
            $matchedNumIndex = array_search($number, $hiddenNums);
            if($matchedNumIndex !== false) {
                unset($hiddenNums[$matchedNumIndex]);
            }
        }

        $amount = 4 - count($hiddenNums);

        return $amount;
    }

    /**
     * Возвращает количество угаданных пользователем цифр с правильной позицией;
     * 
     * @param array $userNums Цифры полученные от пользователья ввиде простого массива 
     * @param array hiddenNums Загаданные цифры ввиде массива 
     * @return int $amount;
     */
    function getGuessedPositionsAmount($userNums, $hiddenNums) {
        $amount = 0;

        for($i = 0; $i < 4; $i++) {
            $amount += ($userNums[$i] == $hiddenNums[$i]) ? 1 : 0;
        }

        return $amount;
    }

    if ($userAttempt) {
        /** @var $currentAttempt - Подсчёты для текущей попытки */
        $currentAttempt = [];
        /** @var $currentAttempt - Номер текущего попытка */
        $currentAttemptsKey = count($totalAttempts) + 1;

        //Разделяем натуральные числа отдельные цифры и конвертируем их в простой массив;
        $userAttemptCharsArr = str_split($userAttempt);
        $hiddenNumCharsArray = str_split($hiddenNum);

        $guessedNums = getGuessedNumsAmount($userAttemptCharsArr, $hiddenNumCharsArray);
        $guessedPositions = getGuessedPositionsAmount($userAttemptCharsArr, $hiddenNumCharsArray);

        // Если число не отгадано заполняем подсчётов данной попытки 
        // и устанавливаем их в Куки
        if ($guessedPositions === 4) {
            $userWins = true;
        } else {
            $currentAttempt['challange'] = $currentAttemptsKey;
            $currentAttempt['guessedNums'] = $guessedNums;
            $currentAttempt['guessedPositions'] = $guessedPositions;

            array_unshift($totalAttempts, $currentAttempt);
            setcookie('totalAttempts', json_encode($totalAttempts));
        }
    }
    //Если число отгадано запускаем следующий раунд
    if ($userWins) {
        $totalAttempts = [];
        $round++;

        setcookie('round', $round, time() + 36000);
        setcookie('totalAttempts', "", time() - 1);

        $message = "Вы выиграли! Загаданное число действительно было - $hiddenNum";
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Быки и коровы</title>

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                list-style: none;
                font-family: monospace;
            }

            body {
                background: linear-gradient(70deg, rgba(158, 201, 143, .1), rgba(170, 228, 149, .8));
                min-height: 100vh;
            }

            section {
                background: rgba(220, 237, 214, 1);
                width: 65%;
                padding: 1.5rem;
                margin: 2rem auto;
                border-radius: .5rem;
                box-shadow: 0 0 15px 1px rgba(0,0,0, 0.3);
            }

            .user-actions {
                display: flex;
                justify-content: space-around;
            }
            form {
                display: flex;
            }

            input {
                display: inline-block;
                min-width: 25%;
                margin: 0 .25rem;
                padding: .5rem;
                border-radius: .25rem;
                border: 1px solid lightgreen;
                outline: none;
            }
            input:focus {
                font-weight: bold;
                background: lightgreen;
                border-color: green;
            }

            li {
                width: 65%;
                background: whitesmoke;
                padding: .25rem 1rem;
                margin: .5rem auto;
                border: 1px solid rgba(121, 154, 109, 1);
                border-bottom-width: 6px;
                /* border-bottom-color: rgba(170, 228, 149); */
                border-radius: .25rem;
                text-align: center;
                font-size: 16px;
                text-decoration: underline;
                font-style: italic;
                text-transform: unset;
            }

            .text-center {
                font-size: 18px;
                text-transform: uppercase;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php if ($message) { ?>
            <section class="message text-center"> <?php echo $message?>  </section>
        <?php } ?>
        <section class="header text-center">
            Раунд - <?php echo $round; ?>
        </section>
        <section class="user-actions">
            <form action="/task-2/" method="post">
                <input 
                name="attempt"
                placeholder="Введите число - хххх"
                type="text" pattern="[0-9]{4}"
                minlength="4"
                title="Пожайлуста, веедите только 4-значное целое число"
                required>
                <input type="submit" value="Проверить">
            </form>

            <form action="/task-2/" method="post">
                <input type="submit" value="Рестарт" name="restart">
            </form>
        </section>
        <section class="results">
            <ul>
                <?php if( !empty($totalAttempts)) {
                    foreach($totalAttempts as $key => $attempt) { ?>
                        <li> 
                            <?php echo "Угадано: кол.-позиции, попытка - #{$attempt['challange']}: {$attempt['guessedNums']} - {$attempt['guessedPositions']}" ?>  
                        </li>
                <?php }} else { ?>
                        <li> 
                            <?php echo "0 - попыток для роунда - $round" ?>  
                        </li>
                <?php }?>
            </ul>
        </section>
    </body>
</html>