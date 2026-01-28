<?php
function intToRoman($n)
{
    $roman = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
    $res = '';

    // Массив уже отсортирован от большего к меньшему, реверс не нужен
    foreach ($roman as $key => $val) {
        while ($n >= $val) {
            $res .= $key;
            $n -= $val;
        }
    }
    return $res;
}

echo intToRoman(58);
// https://leetcode.com/problems/roman-to-integer/description/