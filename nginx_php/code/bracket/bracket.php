<?php

/**
 * Проверка строки на корректность количества открывающих и закрывающих скобок
 * 
 * @param string $str Проверяемая строка
 * @return array ['valid' => bool, 'message' => string]
 */
function checkBrackets($str)
{
    // Проверка на непустоту
    if (empty($str)) {
        return [
            'valid' => false,
            'message' => 'Строка пуста'
        ];
    }

    // Проверка корректности скобок
    $stack = [];
    // Виды поддерживаемых скобок
    $pairBrackets = [
        '(' => ')',
        '[' => ']',
        '{' => '}'
    ];

    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        $char = $str[$i];

        // Если открывающая скобка - добавляем в стек
        if (isset($pairBrackets[$char])) {
            $stack[] = $char;
        }
        // Если закрывающая скобка
        elseif (in_array($char, $pairBrackets)) {
            if (empty($stack)) {
                return [
                    'valid' => false,
                    'message' => 'Закрывающая скобка без открывающей'
                ];
            }

            $last = array_pop($stack);
            if ($pairBrackets[$last] !== $char) {
                return [
                    'valid' => false,
                    'message' => 'Несоответствие типов скобок'
                ];
            }
        }
        // Игнорируем все остальные символы (буквы, цифры, пробелы)
    }

    // Проверяем, не осталось ли незакрытых скобок
    if (!empty($stack)) {
        return [
            'valid' => false,
            'message' => 'Есть незакрытые скобки'
        ];
    }

    return [
        'valid' => true,
        'message' => "Строка корректна"
    ];
}

// Получаем данные из POST запроса
$string = $_POST['string'] ?? '';

// Проверяем
$result = checkBrackets($string);

// Формируем ответ
if ($result['valid']) {
    http_response_code(200);
    $data = [
        'status' => 'ok',
        'message' => $result['message']
    ];
} else {
    http_response_code(400);
    $data = [
        'status' => 'error',
        'message' => $result['message']
    ];
}

// Возвращаем ответ
echo json_encode($data, JSON_UNESCAPED_UNICODE);
