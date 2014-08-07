<?php
$ch = curl_init();
$url="http://headlines.yahoo.co.jp/hl?a=20140807-00000086-mai-soci";
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // curl_exec()の結果を文字列で返す
curl_setopt($ch, CURLOPT_HEADER, true); // ヘッダも出力したい場合
$c = curl_exec($ch); // 実行
//-----------CURL-----------------------------------------------------

$dom = new DOMDocument();
@$dom->loadHTML($c);

//-----------TITLE---------------------------------------------------
$title = $dom->getElementsByTagName('title')->item(0)->textContent;
echo $title;

$detail=$dom->getElementById("ynDetail");

//-----------IMG-----------------------------------------------------
$img_dom=$detail->getElementsByTagName("img")->item(0);
$img_src=$img_dom->getAttribute('src');
echo('<img src='.$img_src.'>');

//-----------TEXT---------------------------------------------------
$text_dom=getElementsByClassName($detail->ownerDocument,'ynDetailText');
$text=$text_dom[0]->textContent;
$short_text=explode("。",$text,5);
echo $short_text[0]."。".$short_text[1]."。".$short_text[2]."。";

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
</head>
<body>
</body>
