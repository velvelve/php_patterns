<?php

$array = [];
for ($i = 0; $i < 1000000; $i++) {
    $array[] = rand(1, 1000000);
}

$start = microtime(true);
sort($array);
$end = microtime(true);
echo "Время сортировки с sort(): " . ($end - $start) . " секунд" . PHP_EOL;

$start = microtime(true);
asort($array);
$end = microtime(true);
echo "Время сортировки с asort(): " . ($end - $start) . " секунд" . PHP_EOL;

$start = microtime(true);
rsort($array);
$end = microtime(true);
echo "Время сортировки с rsort(): " . ($end - $start) . " секунд" . PHP_EOL;

$start = microtime(true);
arsort($array);
$end = microtime(true);
echo "Время сортировки с arsort(): " . ($end - $start) . " секунд" . PHP_EOL;
