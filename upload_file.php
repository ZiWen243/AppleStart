<?php
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp); // 获取文件后缀名
if ($_FILES["file"]["error"] > 0) {
    echo "error";
} 
else {
    $dir = './upload';
    if(is_dir($dir) == false){
        mkdir($dir);
    }
    
    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
    echo "success.";
}
?>