<?php
session_start();


if (!isset($_SESSION['board'])) {
    $numbers = range(1, 75);
    shuffle($numbers);
    $card = array_slice($numbers, 0, 25);

    $board = [];
    $i = 0;
    while ($i < 5) {
        $j = 0;
        while ($j < 5) {
            $board[$i][$j] = $card[$i * 5 + $j];
            $j++;
        }
        $i++;
    }
    $_SESSION['board'] = $board;
}

if (!isset($_SESSION['hits'])) {
    $_SESSION['hits'] = [];
}
if (isset($_POST['draw'])) {
    $hit = rand(1, 75);
    while (in_array($hit, $_SESSION['hits'])) {
        $hit = rand(1, 75);
    }
    $_SESSION['hits'][] = $hit;
}

if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: bingo.php");
    exit;
}


$board = $_SESSION['board'];
$hits = $_SESSION['hits'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PHPビンゴ</title>
    <style>
        body { text-align: center; font-family: sans-serif; }
        table { border-collapse: collapse; margin: 20px auto; }
        td, th {
            border: 1px solid #666;
            padding: 10px;
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
        }
        .free {
            background-color: #eee;
            color: #999;
        }
        .hit {
            background-color: #ffcccc;
            color: red;
            font-weight: bold;
        }
        .draw-button {
            margin: 15px;
            padding: 10px 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<h1>🎲 PHPで作るビンゴゲーム</h1>

<form method="POST">
    <button class="draw-button" type="submit" name="draw">数字を引く！</button>
    <button class="draw-button" type="submit" name="reset">リセット</button>
</form>

<?php if (!empty($hits)): ?>
    <h2>これまでの当たり：<?= implode(', ', $hits) ?></h2>
<?php endif; ?>

<table>
<?php
$i = 0;
while ($i < 5) {
    echo "<tr>";
    $j = 0;
    while ($j < 5) {
        if ($i == 2 && $j == 2) {
            echo "<td class='free'>FREE</td>";
        } elseif (in_array($board[$i][$j], $hits)) {
            echo "<td class='hit'>{$board[$i][$j]}</td>";
        } else {
            echo "<td>{$board[$i][$j]}</td>";
        }
        $j++;
    }
    echo "</tr>";
    $i++;
}
?>
</table>

</body>
</html>
