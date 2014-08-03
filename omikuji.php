<?php 
$omikuji= array('min','max','middle');
$result=$omikuji[mt_rand(0,count($omikuji)-1)];




?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>omikuji</title>
</head>
<body>
    <h1>omikuji</h1>
    <p>Today's Luck is ...<?php echo $result; ?></p>
    <p><a href="">again!</a></p>
</body>
</html>
