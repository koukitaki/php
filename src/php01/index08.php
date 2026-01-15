<?php
$people = array('Taro', 'Jiro', 'Saburo');

var_dump($people);
echo '<br />';


$people=array(
    'Taro'=>'(25歳men)',
    'Jiro'=>'(20歳men)',
    'hanako'=>'(16歳women)',
);

foreach ($people as $name => $age) {
    echo $name . $age . '<br />';
}