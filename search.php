<?php

$array = [];
for ($i = 0; $i < 1000000; $i++) {
    $array[] = $i;
}

$target = 500000;

$start = microtime(true);
for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] == $target) {
        $indexLinear = $i;
        break;
    }
}
$end = microtime(true);
echo "Индекс в линейном поиске " . $indexLinear . " Время потребовалось " . ($end - $start) . " секунд" . PHP_EOL;

$start = microtime(true);
$binaryIndex = array_search($target, $array);
$end = microtime(true);
echo "Индекс в бинарном поиске " . $binaryIndex . ". Время потребовалось " . ($end - $start) . " секунд"  . PHP_EOL;

$start = microtime(true);
$interpolIndex = InterpolationSearch($array, $target);
$end = microtime(true);
echo "Индекс в интерполярном поиске " . $interpolIndex . ". Время потребовалось " . ($end - $start) . " секунд"  . PHP_EOL;

function InterpolationSearch($myArray, $num)
{
    $start = 0;
    $last = count($myArray) - 1;
    while (($start <= $last) && ($num >= $myArray[$start])
        && ($num <= $myArray[$last])
    ) {
        $pos = floor($start + (
            (($last - $start) / ($myArray[$last] - $myArray[$start]))
            * ($num - $myArray[$start])
        ));
        if ($myArray[$pos] == $num) {
            return $pos;
        }
        if ($myArray[$pos] < $num) {
            $start = $pos + 1;
        } else {
            $last = $pos - 1;
        }
    }
    return null;
}
