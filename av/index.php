<?PHP
$bv = $_GET['bv'];
$cmd = shell_exec('python3 /www/wwwroot/AppleStart/av/av.py '.$bv);
echo $cmd;
?>