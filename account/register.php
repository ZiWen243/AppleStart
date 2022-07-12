<?php
    header("Content-Type: text/html;charset=utf-8");
    error_reporting(0); //禁止错误输出
    $link = mysql_connect('127.0.0.1:3306','RAStart','NkJJynsj26jfMSRC'); //创建数据库连接
    if(!$link){ //如果失败
        die('连接mysql数据库失败'.mysql_error()); //显示出错误信息
    }
    echo '连接mysql服务器成功!'; //否则显示连接成功的信息
    mysql_close($link); //最后关闭数据库连接
?>