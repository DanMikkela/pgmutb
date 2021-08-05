<?
#error_reporting(0);
include("../skript/common.php");
session_start();
$admin = $HTTP_SESSION_VARS['admin'];
$link = mysql_connect("localhost",$db,$dbpw);  # anslut till databasen
# hämta stamnamn baserat på inloggad medlem
$query = "select id, prefix, namn from stamnamn where medlem = $admin or
 medlem2 = $admin";
$result = mysql_db_query($db, $query, $link);
while ($row = mysql_fetch_array($result)) {
  $stamnamnid = "$row[id]";
  $stamnamn = "$row[prefix]$row[namn]";
 	}

$query = "select max(id)+1 max from kull";
$result = mysql_db_query($db, $query, $link);
while ($row = mysql_fetch_array($result)) {
  $kullnr = "$row[max]";
 	}

# Ta bort kull ? (?tabort=kull-id)
if (isset($tabort) && $tabort>0){
  $LogDate=date("Y-m-d H:i");
  $fh = fopen("log.txt","a");
		fwrite($fh, "$LogDate\tKull borttagen av medlem $admin, kull nr=$tabort\n");
		fclose($fh);
}

# Lägga till? (?ny=1)
if (isset($ny) && $ny==1) {
  $query = "insert into kull values (\"$kullid\",\"$stamnamnid\",\"H\",\"$neddatum\"".
		",\"$ras\",\"$levdatum\",\"$far\",\"$mor\",\"B\",\"$bestfore\")";
  echo $result = mysql_db_query($db, $query, $link);
		mysql_close($link);
  $LogDate=date("Y-m-d H:i");
  $fh = fopen("log.txt","a");
  fwrite($fh, "$LogDate\tInläggning av medlem $admin\tkull $kullid\n");
  fclose($fh);
}

# Första sidan med formuläret
?>
<HTML>
<HEAD>
 <LINK REL='stylesheet' HREF='../../min.css' TYPE='TEXT/CSS'>
	<SCRIPT src="../../skript/common.js"></SCRIPT>
</HEAD>
<BODY>
<br>
<FORM name=f method='POST' action='nykull.php?ny=1'>
  <TABLE>
  <TR> 
   <TD>Stamnamn</TD>
   <TD>&nbsp;</TD>
   <TD><b> 
    <? echo $stamnamn;?>
    </b> 
    <INPUT type=hidden name=stamnamn value="<? echo $stamnamnid;?>">
   </TD>
  </TR>
  <TR> 
   <TD>Far</TD>
   <TD>:</TD>
   <TD> 
    <INPUT type=text name=far size='50'>
   </TD>
  </TR>
  <TR> 
   <TD>Mor</TD>
   <TD>:</TD>
   <TD> 
    <INPUT type=text name=mor size='50'>
   </TD>
  </TR>
  <TR> 
   <TD>L&auml;gga in ungar?</TD>
   <TD>:</TD>
   <TD> 
    <INPUT type="radio" name="ungar" value="nej">
    Nej 
    <INPUT type="radio" name="ungar" value="ja">
    Ja </TD>
  </TR>
  <TR> 
   <TD colspan=3> 
    <INPUT type=submit value='Spara kull'>
   </TD>
  </TR>
 </TABLE>
	</FORM>
	</BODY>
	</HTML>

