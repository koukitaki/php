<?php
session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>おみくじ</title>
</head>
<body>
<h1>今年の運勢は！</h1>

<form method="post">
    <input type="submit" name="draw" value="おみくじを引く">
</form>
<hr>
<?php
if(!isset($_SESSION['count'])){
    $_SESSION['count'] = [
        1=>0,
        2=>0,
        3=>0,
        4=>0,
        5=>0,
        6=>0,
        7=>0,
    ];
    $_SESSION['total'] = 0;
}
if (isset($_POST['draw'])) {
    $omikuji = rand(1,7);
    $_SESSION['count'][$omikuji]++;
    $_SESSION['total']++;
    echo "<h2>おみくじの結果は？</h2>";

    switch ($omikuji) {
        case 1:
            echo "<p>大吉です！おめでとうございます！</p>";
            break;
        case 2:
            echo "<p>中吉です！良いことがありますように！</p>";
            break;
        case 3:
            echo "<p>小吉です！頑張りましょう！</p>";
            break;
        case 4:
            echo "<p>吉です！平凡な日々を過ごしましょう！</p>";
            break;
        case 5:
            echo "<p>末吉です！慎重に行動しましょう！</p>";
            break;
        case 6:
            echo "<p>凶です！気をつけてください！</p>";
            break;
        case 7:
            echo "<p>大凶です！運気回復を祈りましょう！</p>";
            break;
    }
    if($_SESSION['total'] > 0) {
        echo "<h3>これまでのおみくじ結果</h3>";
        echo "<ul>";
        $names=[
            1=>"大吉",
            2=>"中吉",
            3=>"小吉",
            4=>"吉",
            5=>"末吉",
            6=>"凶",
            7=>"大凶"
        ];
        for($i = 1; $i<= 7; $i++){
            $count = $_SESSION['count'][$i];
            $percentage = round(($count / $_SESSION['total']) * 100, 1);
            echo "<li>{$names[$i]}: {$count}回 ({$percentage}%)</li>";
        }
    }
}
?>
<style>
    P{
        font-size: 30px;
        font-weight: bold;
    }
</style>
</body>
</html>