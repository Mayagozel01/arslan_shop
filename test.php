<?php
function BinarySearch($nums, $target)
{
    $low = 0;
    $high = count($nums) - 1;
    $mid = floor(($low + $high) / 2);
    $guess = $nums[$mid];
    while ($low <= $high) {
        $mid = floor(($low + $high) / 2);

        if ($nums[$mid] === $target) {
            return $mid;
        }

        if ($nums[$mid] < $target) {
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }

    return -1;
}

echo BinarySearch([-1, 0, 3, 5, 9, 12], 9);