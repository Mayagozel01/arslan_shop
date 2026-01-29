<?php
function isValid($s)
{
    $par = ['()', '{}', '[]'];
    label:
    for ($i = 0; $i < count($par); $i++) {
        if (str_contains($s, $par[$i])) {
            $s = str_replace($par[$i], '', $s);
            goto label;
        }
        if (strlen($s) > 0)
            return 0;
        return 1;
    }
}


echo isValid("()");
echo PHP_EOL;
echo isValid("()[]{}");
echo PHP_EOL;
echo isValid("(]");
