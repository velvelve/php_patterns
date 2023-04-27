<?php
function delete_element_by_value(&$array, $value)
{
    $index = array_search($value, $array);
    while ($index !== false) {
        array_splice($array, $index, 1);
        $index = array_search($value, $array);
    }
}


$array = [1, 4, 3, 2, 4, 5, 2, 4];

delete_element_by_value($array, 4);

print_r($array);
