<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                list-style: none;
                text-decoration: none;
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

            li {
                width: 65%;
                background: whitesmoke;
                padding: .25rem 1rem;
                margin: 1.5rem auto;
                border: 1px solid rgba(121, 154, 109, 1);
                border-bottom-width: 6px;
                border-radius: .25rem;
                text-align: center;
                font-size: 16px;
                font-style: italic;
                text-transform: unset;
            }
            li > h2 {
                text-decoration: underline;
            }
            li > a {
                display: inline-block;
                padding: 0.5rem 1rem;
                margin: 1rem auto;
                border: 1px solid rgba(121, 154, 109, 1);
                font-style: normal;
                font-weight: bold;
                border-bottom-width: 4px;
            }
        </style>
</head>
<body>
    <section>
        <ul>
            <li>
                <h2>Задание 1</h2>
                <p>    
                    Дан массив [[399, 9160, 144, 3230, 407, 8875, 1597, 9835], [2093, 3279, 21, 9038, 918, 9238, 2592, 7467], [3531, 1597, 3225, 153, 9970, 2937, 8, 807], [7010, 662, 6005, 4181, 3, 4606, 5, 3980], [6367, 2098, 89, 13, 337, 9196, 9950, 5424], [7204, 9393, 7149, 8, 89, 6765, 8579, 55], [1597, 4360, 8625, 34, 4409, 8034, 2584, 2], [920, 3172, 2400, 2326, 3413, 4756, 6453, 8], [4914, 21, 4923, 4012, 7960, 2254, 4448, 1]].
                    Среди его ячеек некоторые числа явлвяются простыми числами. Найдите сумму простых чисел в этом массиве.
                </p>
                <a href="task-1" target="_blank">Результат</a>
            </li>
            <li>
                <h2>Задание 2</h2>
                <p>    
                Задание на базе игры "Быки и коровы". Суть игры состоит в том, что ведущий загадывает четырехзначное число, а игрок пытается его угадать. Игрок на каждом ходу сообщает ведущему свое предположение (четырехзначное число, тот в свою очередь овтечает ему: "ты угадал столько-то букв, из них столько-то на своем месте").
 
 Например: если ведущий загадал число 3810, а игрок предположил "0856", то ведущий должен ответить "угадал 2 цифры, из них на своем месте 1 цифра". Итак задание: ваша программа является ведущим в этой игры. Загадно число "3810". Программа должна последовательно вывести ответы на следующие числа: 2679, 1234, 5678, 0183, 3801, 3810. Каждый ответ должен быть на новой строке и должен быть записан в формате "x-x", где первое число это количество совпавших цифр, а второе — кол-во совпавших цифр, находящихся на своей позиции.
                </p>
                <a href="task-2" target="_blank">Результат</a>
            </li>
            <li>
                <h2>Задание 3</h2>
                <p>    
                Возьмите все числа от 1 до 1000 (включительно). Выбросьте из этой последовательности все числа, где одна и та же цифра встречается более, чем 1 раз. Найдите сумму оставшихся чисел.
                </p>
                <a href="task-3" target="_blank">Результат</a>
            </li>
        </ul>
    </section>
</body>
</html>