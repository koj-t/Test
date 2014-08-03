<?php 

require_once('calendar.php');

function h($s){
    return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
}

//Now
$ym=isset($_GET['ym']) ? $_GET['ym'] : date("Y-m");

$cal=new Calendar($ym);
$cal->create();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>PHP Cal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table> 
        <thead>
            <tr>
            <th><a href="?ym=<?php echo h($cal->prev()); ?>">&laquo;</a></th>
            <th colspan="5"><?php echo h($cal->yearmonth()); ?></th>
                <th><a href="?ym=<?php echo h($cal->next()); ?>"">&raquo;</a></th>
            </tr>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cal->getweeks() as $week){
                    echo $week;
                } 
            ?>
        </tbody>
    </table>
</body>
</html>

