<?php 

function h($s){
    return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
}

//Now
$ym=isset($_GET['ym']) ? $_GET['ym'] : date("Y-m");

$timestamp=strtotime($ym . "-01");
if($timestamp===false){
    $timestamp=time();
}

//p,n month
$prev=date("Y-m",mktime(0,0,0,date("m",$timestamp)-1,1,date("Y",$timestamp)));
$next=date("Y-m",mktime(0,0,0,date("m",$timestamp)+1,1,date("Y",$timestamp)));


$lastday=date("t",$timestamp);

$youbi=date("w",mktime(0,0,0,date("m",$timestamp),1,date("Y",$timestamp)));

/*
var_dump($lastday);
var_dump($youbi);
 */

$weeks =array();
$week ='';
$week .=str_repeat('<td></td>',$youbi);
for($day=1;$day<=$lastday;$day++,$youbi++){
    $week .= sprintf('<td class="youbi_%d">%d</td>',$youbi %7,$day);

    if($youbi % 7 == 6 || $day == $lastday){
        if($day==$lastday){
            $week .=str_repeat('<td></td>',6-($youbi % 7));
        }
        $weeks[] = '<tr>' . $week . '</tr>';
        $week = '';
    }
}
//var_dump($weeks);

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
            <th><a href="?ym=<?php echo h($prev); ?>">&laquo;</a></th>
            <th colspan="5"><?php echo h(date("Y",$timestamp),"-" . date("m",$timestamp)); ?></th>
                <th><a href="?ym=<?php echo h($next); ?>"">&raquo;</a></th>
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
            <?php foreach($weeks as $week){
                    echo $week;
                } 
            ?>
        </tbody>
    </table>
</body>
</html>

