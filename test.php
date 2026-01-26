<?php
function romanToInt($s)
{
    $roman = ['I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000];
    $num = [1, 5, 10, 50, 100, 500, 1000];
    if (strlen($s) === 1)
        return $roman[$s];
    $n = $roman[$s[strlen($s) - 1]];
    for ($i = strlen($s) - 1; $i > 0; $i--) {
        echo $s[$i];
        echo PHP_EOL;
        if ($roman[$s[$i - 1]] <= $roman[$s[$i]]) {
            $n = -$roman[$s[$i - 1]];
        } else {
            $n += $roman[$s[$i - 1]];
        }
    }
    return $n;
}

echo romanToInt('XIX');
// https://leetcode.com/problems/roman-to-integer/description/