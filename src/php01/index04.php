<?php
$a=15;
$b=3;
$c=10;
$answer1 = $a + $b;
$answer2 = $a - $b;
$answer3 = $a * $b;
$answer4 = $a / $b;
$answer5 = $a % $c;

echo $answer1;
echo "<br />";
echo $answer2;
echo "<br />";
echo $answer3;
echo "<br />";
echo $answer4;
echo "<br />";
echo $answer5;
echo "<br />";


$a=15;
$b=3;
$c=10;
$d=5;
$answer1= $a=$b;
$answer2= $a*=$d;

echo $answer1;
echo "<br />";
echo $answer2;
echo "<br />";
$a=20;
$b=5;
$answer1= $a>$b;
echo $answer1;
echo "<br />";


$a=20;
$b=5;
echo ($a>10 &&$a<30);
echo "<br />";

$a=$b=10;
$c=$d=5;
$answer1= ++$a;
$answer2= --$a;
$answer3= --$c;
$answer4= $d++;
echo $answer1;
echo "<br />";
echo $answer2;
echo "<br />";
echo $answer3;
echo "<br />";
echo $answer4;
echo "<br />";
