<?php 

$dice=mt_rand(1,6);
$dice2=mt_rand(1,6);

$zorome=($dice == $dice2) ? true : false;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>dice</title>
</head>
<body>
    <h1></h1>
    <p>
        dice was -<?php echo $dice; ?>-!</p>
        dice2 was -<?php echo $dice2; ?>-!</p>
        <?php if ($zorome) : ?>
        zorome!!
        <?php endif; ?>
    <p><a href="">again<a/></p>
</body>
</html>
