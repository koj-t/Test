<?php echo "kojima test"; ?>
<?php 


session_start();

function h($s){
    return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
}

function resetSession(){
    $_SESSION['correct_count']=0;
    $_SESSION['num']=0;
    $_SESSION['token']=sha1(uniqid(mt_rand(),true));

}


function redirect(){
    header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    exit;
}

$quizlist=array(
    array(
        'q'=> 'html represents what?',
        'a'=> array('hyper','bibib')
    ),
    array(
        'q'=> 'md represents what?',
        'a'=> array('markdown','markup')
    )
);


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if ($_POST['token'] !== $_SESSION['token']){
        echo "error post!";
        exit;
    }
    if (!isset($_POST['q_num']) || $_SESSION['q_num'] !== $_POST['q_num']){
        echo 'error post 2!';
        exit;
    }
    if (!isset($quizlist[$_POST['q_num']])){
        echo 'error post 3';
        exit;
    }

    if (isset($_POST['reset']) && $_POST['reset']==='1'){
        resetSession();
        redirect();
    }
    if ($_POST['answer'] === $quizlist[$_SESSION['q_num']]['a'][0]){
//        echo "correct!";
//        exit;
        $_SESSION['correct_count']++;
    }
    $_SESSION['num']++;
    header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    exit;
}

//var_dump($quizlist);

$q_num=mt_rand(0,count($quizlist)-1);
$quiz=$quizlist[$q_num];

if (empty($_SESSION)){
    $_SESSION['correct_count']=0;
    $_SESSION['num']=0;
    $_SESSION['token']=sha1(uniqid(mt_rand(),true));
}


$_SESSION['q_num']=(string)$q_num;

shuffle($quiz['a']);


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Quiz</title>
</head>
<body>
    <div style = "padding:7px;background:#eee;border:#ccc;">
        <?php echo h($_SESSION['num']); ?> questions, <?php echo h($_SESSION['correct_count']) ?> correct answer!<br>
        <?php if ($_SESSION['num'] > 0) : ?>
        correct rate is <?php echo h(sprintf("%.2f",$_SESSION['correct_count']/$_SESSION['num'])) ?>
        <?php endif; ?>
    </div>
    <p>Q.<?php echo h($quiz['q']); ?></p>
    <?php foreach ($quiz['a'] as $answer) : ?>
        <form action = "" method = "post">
            <input type = "submit" name= "answer" value ="<?php echo h($answer); ?>">
            <input type = "hidden" name= "q_num" value ="<?php echo h($_SESSION['q_num']); ?>">
            <input type = "hidden" name= "token" value ="<?php echo h($_SESSION['token']); ?>">
        </form>
    <?php endforeach; ?>
    <hr>
    <form action = "" method = "post">
        <input type = "submit" value="Reset">
        <input type = "hidden" name="reset" value=1>
        <input type = "hidden" name= "q_num" value ="<?php echo h($_SESSION['q_num']); ?>">
        <input type = "hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
    </form>

</body>
</html>
