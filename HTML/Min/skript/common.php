<?
$dbpw = "XJFLJgBK";
$db = "minkattklubb_se";
$today=date("Y-m-d", time());
$link = mysql_connect("localhost",$db,$dbpw);
$idag = date("Y-m-d", time());
$new  = date("Y-m-d", time()-60*60*24*8);
$user = $HTTP_SESSION_VARS['user'];
$behö = $HTTP_SESSION_VARS['behö'];
function getnewdate($bd, $off) {
  $m=substr($bd,5,2);
  $d=substr($bd,8,2);
  $y=substr($bd,0,4);
  return date("Y-m-d", mktime(0,0,0,$m,$d+$off,$y));
  }
?>