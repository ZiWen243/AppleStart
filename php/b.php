<?php
header("Content-Type: text/html;charset=utf-8");    //设置字符编码
$file = '../chat/data.data';
$filearr = file($file,FILE_IGNORE_NEW_LINES); 
$result = array_slice($filearr,-100); //截取数组后2位的元素
echo implode("\n",$result);;
?>