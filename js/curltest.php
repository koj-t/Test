<?php
$ch = curl_init();
//$url="http://headlines.yahoo.co.jp/hl?a=20140807-00000086-mai-soci";
$url="http://headlines.yahoo.co.jp/hl?a=20140807-00000038-wordleaf-m_est";
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // curl_exec()の結果を文字列で返す
curl_setopt($ch, CURLOPT_HEADER, true); // ヘッダも出力したい場合
$c = curl_exec($ch); // 実行
//-----------CURL-----------------------------------------------------

$dom = new DOMDocument();
@$dom->loadHTML($c);

//-----------TITLE---------------------------------------------------
$title = $dom->getElementsByTagName('title')->item(0)->textContent;
echo '<p id="title">'.$title.'</p>';

$detail=$dom->getElementById("ynDetail");

//-----------IMG-----------------------------------------------------
$img_dom=$detail->getElementsByTagName("img")->item(0);
$img_src=$img_dom->getAttribute('src');
echo('<div id="img_area"><img src='.$img_src.'></div>');

//-----------TEXT---------------------------------------------------
$text_dom=getElementsByClassName($detail->ownerDocument,'ynDetailText');
$text=$text_dom[0]->textContent;
$short_text=explode("。",$text,5);
$text_show=$short_text[0]."。".$short_text[1]."。".$short_text[2]."。";
echo '<p id="article">'.$text_show.'</p>';

$text_utf=mb_convert_encoding($text,"UTF-8","EUC-JP");
echo '<p id="article">'.$text_utf.'</p>';


$text_utf2=mb_convert_encoding($text,"UTF-8","auto");
echo '<p id="article">'.$text_utf2.'</p>';


$replaced = str_replace('charset=euc-jp"', 'charset=UTF-8"', $c);
//echo $c;
//echo $replaced;

curl_close($ch);
//--------------------------------------------------------------------
function getElementsByClassName(DOMDocument $DOMDocument, $ClassName){
    $Elements = $DOMDocument -> getElementsByTagName("*");
    $Matched = array();

    foreach($Elements as $node){
        if( ! $node -> hasAttributes())
            continue; 
        $classAttribute = $node -> attributes -> getNamedItem('class');

        if( ! $classAttribute){
            continue; 
        }
        $classes = explode(' ', $classAttribute -> nodeValue);

        if(in_array($ClassName, $classes)){
            $Matched[] = $node;
        }
    }
    return $Matched;
}
?>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>CurlTest</title>
    <link rel="stylesheet" href="ct.css" type="text/css" />
</head>
<body>
<p><input type="button" id="button1" value="Here"></p>
</body>
</html>
