<?php
session_start();
if (!isset($_SESSION['stats'])) {
    echo 'まだ回答データがありません';
    exit;
}
require_once 'config/status_codes.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>成績結果</title>
</head>
<body>

<h2>問題ごとの正答率</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>問題ID</th>
        <th>問題文</th>
        <th>正解数</th>
        <th>回答数</th>
        <th>正答率</th>
    </tr>

<?php foreach ($_SESSION['stats'] as $index => $stat):
    $rate = round(($stat['correct'] / $stat['try']) * 100);
?>
    <tr>
        <td><?= $questions[$index]['id'] ?></td>
        <td><?= htmlspecialchars($questions[$index]['question'], ENT_QUOTES) ?></td>
        <td><?= $stat['correct'] ?></td>
        <td><?= $stat['try'] ?></td>
        <td><?= $rate ?>%</td>
    </tr>
<?php endforeach; ?>

</table>

<br>
<a href="reset.php">最初からやり直す</a>

</body>
</html>
