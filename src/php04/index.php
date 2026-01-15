<?php
session_start();
require_once 'config/status_codes.php';

$total = count($questions);


if (!isset($_SESSION['current'])) $_SESSION['current'] = 0;
if (!isset($_SESSION['wrong'])) $_SESSION['wrong'] = [];
if (!isset($_SESSION['mode'])) $_SESSION['mode'] = 'normal';


if ($_SESSION['mode'] === 'normal') {

    if ($_SESSION['current'] >= $total) {
        // 1周目終了 → 間違い直しへ
        if (count($_SESSION['wrong']) > 0) {
            $_SESSION['mode'] = 'wrong';
            $_SESSION['current'] = 0;
        } else {
            echo '全問正解！';
            session_destroy();
            exit;
        }
    }

    $questionIndex = $_SESSION['current'];

} else {

    // 間違い直し
    if ($_SESSION['current'] >= count($_SESSION['wrong'])) {
        header('Location: summary.php');
        exit;
    }

    $questionIndex = $_SESSION['wrong'][$_SESSION['current']];
}

$question = $questions[$questionIndex];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>四択問題</title>
</head>
<body>

<h2>問題 <?= $question['id'] ?></h2>
<p>残り時間：<span id="timer">60</span> 秒</p>
<p><?= htmlspecialchars($question['question'], ENT_QUOTES) ?></p>

<form id="quizForm" method="post" action="result.php">
    <?php foreach ($question['choices'] as $i => $choice): ?>
        <label>
            <input type="radio" name="answer" value="<?= $i ?>" required>
            <?= htmlspecialchars($choice, ENT_QUOTES) ?>
        </label><br>
    <?php endforeach; ?>

    <input type="hidden" name="correct_answer" value="<?= $question['answer'] ?>">
    <input type="hidden" name="explanation" value="<?= htmlspecialchars($question['explanation'], ENT_QUOTES) ?>">
    <input type="hidden" name="question_index" value="<?= $questionIndex ?>">

    <button type="submit">回答</button>
</form>

<p>
<?= $_SESSION['mode'] === 'normal' ? '通常問題' : '間違い直し' ?>
</p>
<script>
let timeLeft = 60;
const timer = document.getElementById('timer');
const form = document.getElementById('quizForm');

const countdown = setInterval(() => {
    timeLeft--;
    timer.textContent = timeLeft;
    if (timeLeft <= 10) {
        timer.style.color = 'red';
    }

    if (timeLeft <= 0) {
        clearInterval(countdown);
        form.submit();
    }
}, 1000);
</script>
</body>
</html>

