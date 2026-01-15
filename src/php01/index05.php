<?php
$a=5;
if($a===5){echo "\$は5です";}
echo "<br />";

$a=7;
if($a===5){echo "\$aは5です";}
else{echo"\$aは5以外です";}
echo "<br />";

$a=7;
if($a===1){echo"\$aは1です";}
elseif($a===3){echo"\$aは3です";}
elseif($a===7){echo"\$aは7です";}
else{echo"\$aは1でも3でも7でもありません";}
echo "<br />";

$people="saburo";
switch($people){
    case "taro":
        echo"太郎";
        break;
    case"jiro":
        echo"二郎";
        break;
    case"saburo":
    echo"三郎です";
break;
}
echo "<br />";

$a=7;
$b=($a===7)?TRUE:FALSE;
echo $b;

