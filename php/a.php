<?php
function msectime() {
    list($msec, $sec) = explode(' ', microtime());
    return (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);  
}
$data = $_GET['data'];
$data_json = array();
$temp = $data_json;
$temp["time"] = msectime();
$data_json["msg_id"] = sha1(json_encode($temp, JSON_UNESCAPED_UNICODE));
$data_json["time"] = msectime();
$data_json += json_decode($data,true);
$data = json_encode($data_json, JSON_UNESCAPED_UNICODE);
$myfile = fopen("../chat/data.data", "a") or die("Unable to open file!");
fwrite($myfile, $data."\n");
fclose($myfile);
?>