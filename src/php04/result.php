<?php
session_start();
if (!isset($_SESSION['stats'])) {
    $_SESSION['stats'] = [];
}
$userAnswer = isset($_POST['answer']) ? (int)$_POST['answer'] : -1;
$correct = (int)$_POST['correct_answer'];
$explanation = $_POST['explanation'];
$questionIndex = (int)$_POST['question_index'];
$isCorrect = ($userAnswer === $correct);
// 問題ごとの成績初期化
if (!isset($_SESSION['stats'][$questionIndex])) {
    $_SESSION['stats'][$questionIndex] = [
        'try' => 0,
        'correct' => 0
    ];
}

// 回答回数を増やす
$_SESSION['stats'][$questionIndex]['try']++;

// 正解なら正解数を増やす
if ($isCorrect) {
    $_SESSION['stats'][$questionIndex]['correct']++;
}
/* 間違えたら保存（1周目のみ） */
if (!$isCorrect && $_SESSION['mode'] === 'normal') {
    $_SESSION['wrong'][] = $questionIndex;
}

/* 次の問題へ */
$_SESSION['current']++;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>結果</title>
</head>
<body>

<h2><?= $isCorrect ? '正解！' : '不正解'; ?></h2>

<p><?= htmlspecialchars($explanation, ENT_QUOTES); ?></p>

<a href="index.php">次の問題へ</a>

</body>
</html>

