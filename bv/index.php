<?PHP
$av = $_GET['av'];
$cmd = shell_exec('python3 /www/wwwroot/AppleStart/bv/bv.py '.$av);
echo $cmd;
?>