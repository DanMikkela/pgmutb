<?php
error_reporting(0);
include("common.php");
session_start();

# Logga ut ? (?logoff=1)
if (isset($logoff) && $logoff==1){
  $LogDate=date("Y-m-d H:i");
  $fh = fopen("log.txt","a"); fwrite($fh, "$LogDate\tUtloggning av medlem $admin\n"); fclose($fh);
  session_unset();
  session_destroy();
  session_unregister('admin');
?>
  <SCRIPT language='JavaScript'>parent.menu.location.href='meny.php';
  location.href = 'base.htm';
  </SCRIPT>
<?
  exit;
}

# Logga in? (?login=1)
if (isset($login) && $login==1) {
  $link = mysql_connect("localhost",$db,$dbpw);
  $query = "select fnamn, enamn, webkod, behorighet from medlem where nr = "."$nr".
	" and aktiv = 'Y'";
  $result = mysql_db_query($db, $query, $link);
  $num_rows = mysql_num_rows($result);
  $row = mysql_fetch_array($result);
  $admin = $nr;
  $beho = "$row[behorighet]";
# finns medlemmen
  if ("$num_rows" < 1) {
    $LogDate=date("Y-m-d H:i");
    $fh = fopen("log.txt","a");
    fwrite($fh, "$LogDate\tFel inloggning av medlem $admin\t$pw\t");
	fwrite($fh, "$HTTP_SERVER_VARS[REMOTE_ADDR]\n");
    fclose($fh);
    print ("<SCRIPT language='JavaScript'>location.href='login.php';</SCRIPT>");
    exit;
  }
# password?
  if ($pw != "$row[webkod]" or $num_rows < 1) {
    $LogDate=date("Y-m-d H:i");
    $fh = fopen("log.txt","a");
    fwrite($fh, "$LogDate\tFel inloggning av medlem $admin\t$pw\t");
	fwrite($fh, "$HTTP_SERVER_VARS[REMOTE_ADDR]\n");
    fclose($fh);
    print ("<SCRIPT language='JavaScript'>location.href='login.php';</SCRIPT>");
    exit;
  }
  session_register('admin');
  $user = "$row[fnamn] "."$row[enamn]";
  session_register('user');
  session_register('beho');
 $LogDate=date("Y-m-d H:i");
  $fh = fopen("log.txt","a");
  fwrite($fh, "$LogDate\tInloggning av medlem $admin\tok\n");
  fclose($fh);
?>
  <SCRIPT language='JavaScript'>parent.menu.location.href='meny.php';
  location.href = 'base.htm';</SCRIPT>
<?
  exit;
}
 $admin=1;
# Inloggad?
if ($HTTP_SESSION_VARS['admin']) {
?>
  <SCRIPT language='JavaScript'>location.href = 'base.htm';</SCRIPT>
<?
  exit;
} else {    # Inte inloggad
?>
  <HTML>
  <LINK REL='stylesheet' HREF='../min.css' TYPE='TEXT/CSS'>
<!-- Min kattklubb, den personliga klubben i södra Sverige  -->
   <FORM method='POST' action='login.php?login=1'>Du är inte inloggad.
  <br>Ange medlemsnummer :&nbsp;
  <input type=input name=nr size='3'>
  <br>
	Din webbkod:&nbsp; 
	<INPUT type=password name=pw size='10'>
  &nbsp;OBS! Ny kod medf&ouml;ljer varje nytt nummer av KattenMin !<br>
  <br>
  <INPUT type=submit value='Skicka'></FORM></HTML>
<?
  exit;
}
?>

