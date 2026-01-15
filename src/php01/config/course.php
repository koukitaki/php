<?php
if (!empty($_GET['company'])){
$company = htmlspecialchars($_GET['company'], ENT_QUOTES);
print "会社名は" . $company . "ですね";
} else {
    print "会社名を入力してください。";
}
