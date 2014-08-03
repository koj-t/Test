<?php

$message="Hello World!";
$x=5;
$y=1.22;
$flag=true;
$n=null;


/*
define("ADMIN_NAME", "kojima");
 */

$youbi=array("Sun","Mon","Tue");
$youbi[]="Wed";

/*
unset($youbi[2]);
var_dump($youbi);

*/

/*
var_dump($message);
var_dump($x);
var_dump($y);
var_dump($flag);
var_dump($n);
 */

$sales = array("tanaka"=>100,"taguchi"=>200);
//echo $sales["tanaka"];
/*
foreach ($youbi as $y){
    echo $y;
}
 */
/*
foreach ($sales as $key => $y){
    echo $key ,$y;
}
 */
/*
function sayHi(){
    echo "Hello";
}

sayHi();

$s="absceddd";
echo strlen($s);
echo strpos($s,"e");
echo substr($s,2,2);

$s="banana";
$n= 40;
$p=5.23;

printf ("kojima ate %d %ss for $%.2f.",$n,$s,$p);
 */
/*
$members=array("kojima","tanaka","motoki");
//var_dump($members);

if(in_array("tanaka",$members)){
    echo "kk";
}
echo implode("@",$members);
 */
//print time();
//var_dump(strtotime("2012/6/7 11:22:33"));
//echo date("Y-m-d");

$testfile="test.dat";
$contents="hello!";
/*
if(is_writable($testfile)){
    if(!$fp=fopen($testfile,"a")){
        print "could note open";
        exit;
    }

    if(fwrite($fp,$contents)===false){
        echo "could not write";
        exit;
    }

    echo "success";

    fclose($fp);

}else{
    echo "not writable";
    exit;
}
if(!$fp=fopen($testfile,"r")){
    echo "could not open";
    exit;
}

$contents=fread($fp,filesize($testfile));

 */

//$contents=file_get_contents('http://dotinstall.com');

$contents=file($testfile);

var_dump($contents);

//fclose($fp);









?>
