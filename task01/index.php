<?php
function sortByFirstNumber($arr)
{
    sort($arr, SORT_STRING);

    $lengthArr = count($arr);
    foreach ($arr as $key => $val) {
        if ($key + 1 < $lengthArr) {
            if (isChangePlace($arr[$key], $arr[$key+1])) {
                $tmp = $arr[$key];
                $arr[$key] = $arr[$key+1];
                $arr[$key+1] = $tmp;
            }
        }
    }

    $result = '';
    for ($i = count($arr); $i >= 0; $i--) {
        $result .= $arr[$i];
    }

    return $result;
}

function isChangePlace($x, $y)
{
    $xLenght = strlen((string) $x);
    $yLenght = strlen((string) $y);

    if ($xLenght == $yLenght) {
        return ($x > $y);
    } else {
        if ($xLenght < $yLenght) {
            $newY = substr($y, 0, $xLenght);
            return ($x >= $newY);
        } else {
            $newX = substr($x, 0, $yLenght);
            return ($newX > $y);
        }
    }
}

var_dump(sortByFirstNumber([50, 2, 1, 9]));
?>