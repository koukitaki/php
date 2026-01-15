<?php
$username = htmlspecialchars($_POST['username'], ENT_QUOTES);
$merchandise=htmlspecialchars($_POST['merchandise'], ENT_QUOTES);
$orders=htmlspecialchars($_POST['orders'], ENT_QUOTES);
print "私の名前は、" . $username . "<br/>";
print "ご希望の商品は" . $merchandise . "<br/>";
print "注文数は" . $orders . "";
echo"<br>";

echo "<br><br>九九の表<br>";
$kuku = [];

$i = 1;
while ($i <= 9) {
    $j = 1;
    while ($j <= 9) {
        $kuku[$i][$j] = $i * $j;
        echo $i . "×" . $j . "=" . $kuku[$i][$j] . "";
        $j++;
    }
    echo "<br>";
    $i++;
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>九九表</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td, th {
            border: 1px solid #666;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <caption>九九の表</caption>
        <tr>
            <th>×</th>
            <?php
            $j = 1;
            while ($j <= 9) {
                echo "<th>{$j}</th>";
                $j++;
            }
            ?>
        </tr>

        <?php
        $i = 1;
        while ($i <= 9) {
            echo "<tr><th>{$i}</th>";
            $j = 1;
            while ($j <= 9) {
                $kuku[$i][$j] = $i * $j;
                echo "<td>{$kuku[$i][$j]}</td>";
                $j++;
            }
            echo "</tr>";
            $i++;
        }
        ?>
    </table>




</body>
</html>

</body>
</html>


