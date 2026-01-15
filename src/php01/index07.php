<?php
function text($a,$b){
    $value=$a*$b;
    return $value;
}
$total=text(2,3);
echo $total;
echo "<br />";




function exam($score1, $score2, $score3)
{
$total = $score1 + $score2 + $score3;
if ($total > 210) {
    echo $total . "点なので合格です";
} else {
    echo $total . "点なので不合格です";
}
}
echo (exam(80, 60, 90));
echo "<br />";

function triangle($a,$b)
{
    $triangle3=$a*$b/2;
    return $triangle3;
}
$answer=triangle(7,8);
echo $answer;
echo "<br />";


function getSquareArea($base, $height)
{
  return $base * $height;
}
function getTriangleArea($base, $height)
{
  return $base * $height / 2;
}
function getTrapezoidArea($upperBase, $lowerBase, $height)
{
  return ($upperBase + $lowerBase) * $height / 2;
}

echo getSquareArea(5, 5) . "\n";
echo getTriangleArea(7, 8) . "\n";
echo getTrapezoidArea(4, 5, 4);

