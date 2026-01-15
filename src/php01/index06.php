<?php
for($i=2; $i<11; $i+=2){
    echo $i."<br>";
}

$count=0;
while($count<21){
    if($count!==0)
    echo $count.'<br>';
    $count++;
}

$count = 0;

while ($count < 20) {
$count += 1;
echo $count . '<br />';
}

$count=0;
while($count<100){
    $count++;
    if($count==3||$count==6||$count==9||$count==12||$count==15||$count==18)
    {continue;}
    if($count==20){break;}
    echo $count.'<br>';
}

$num=0;
do{
    echo 'num='.$num.'<br>';
    $num++;}
    while($num<3);
    echo "<br />";

    $i=1;
for($i=1;$i<50;$i+=1){
    echo$i;
    }

    echo "<br />";


for($a=1;$a<=50;$a++)
{if($a%3==0&&$a%5==0){echo"FizzBuzz";}
elseif($a%3==0){echo"Fizz";}
elseif($a%5==0){echo"Buzz";}
else{echo "$a";}
echo "<br />";
}







