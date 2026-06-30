<?php

include __DIR__ . '/vendor/autoload.php';

use Firstlib\ExampleClass;

echo "Тестовая страница для пакетов Composer<br>";

$test = new ExampleClass();
echo $test->makeSum(16, 4);
