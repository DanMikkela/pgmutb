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
  $result = mysql_db_query($db, $query, $link);
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
	<SCRIPT src="../../skript/common.js">
<?	if ("$ungar" == "ja") { ?> location.href="nykull2.php?kullnr=$kullnr;far=$far;mor=$mor" <? } ?>
</SCRIPT>
</HEAD>
<BODY>
<h3>H&auml;r rapporterar du in din kull.<br>
 V&auml;nligen var noga med stavningen,<BR>
 du ansvarar sj&auml;lv f&ouml;r uppgifterna.<br>
</h3>
<FORM name=f method='POST' action='nykull.php?ny=1'>
  <TABLE>
	 <TR>
	  <TD>Stamnamn</TD>
	  <TD>&nbsp;</TD> 
	  <TD><b><? echo $stamnamn;?></b><INPUT type=hidden name=stamnamn value="<? echo $stamnamnid;?>"></TD>
	 </TR>
	 <TR>
	  <TD>Ras</TD>
	  <TD>:</TD> 
	  <TD>
    <SELECT name="ras">
     <OPTION value="Perser">Perser 
     <OPTION value="Exotiskt Korthår">Exotiskt Korthår 
     <OPTION value="Helig Birma">Helig Birma 
     <OPTION value="Maine Coon">Maine Coon 
     <OPTION value="Norsk Skogkatt">Norsk Skogkatt 
     <OPTION value="Ragdoll">Ragdoll 
     <OPTION value="Sibirisk katt">Sibirisk katt 
     <OPTION value="Turkisk angora">Turkisk Angora 
     <OPTION value="Turkisk van">Turkisk Van 
     <OPTION value="Abessinier">Abessinier 
     <OPTION value="Balines">Balines 
     <OPTION value="Bengal">Bengal 
     <OPTION value="Brittiskt korthår">Brittiskt Korthår 
     <OPTION value="Burma">Burma 
     <OPTION value="Burmilla">Burmilla 
     <OPTION value="Cornish rex">Cornish Rex 
     <OPTION value="Devon rex">Devon Rex 
     <OPTION value="Egyptisk mau">Egyptisk Mau 
     <OPTION value="Europé">Europé 
     <OPTION value="Korat">Korat 
     <OPTION value="Manx">Manx 
     <OPTION value="Ocicat">Ocicat 
     <OPTION value="Russian blue">Russian Blue 
     <OPTION value="Sokoke">Sokoke 
     <OPTION value="Somali">Somali 
     <OPTION value="Sphynx">Sphynx 
     <OPTION value="Siames">Siames 
     <OPTION value="Orientaliskt Korthår">Orientaliskt Korthår 
     <OPTION value="Orientaliskt Långhår">Orientaliskt Långhår 
     <OPTION value="Huskatt">Huskatt 
    </SELECT>
   </TD>
	 </TR>
	 <TR>
	  <TD>Nedkomstdatum<br>
			</TD>
	  <TD>:</TD> 
	  <TD><INPUT type=text name=neddatum size='12'
			onblur="f.levdatum.value=kalklev(f.neddatum.value);">
				(&Aring;&Aring;&Aring;&Aring;-MM-DD)</TD>
	 </TR>
	 <TR>
	  <TD>Tidigaste<br>leveransdatum<br>
			</TD>
	  <TD>:</TD> 
	  <TD><INPUT type=text name=levdatum size='12'>
				(&Aring;&Aring;&Aring;&Aring;-MM-DD)
				<INPUT type=hidden name=bestfore value="2004-12-31">
				<INPUT type=hidden name=kullid value="$kullnr">			
				</TD>
	 </TR>
	 <TR>
	  <TD>Far</TD>
	  <TD>:</TD> 
	  <TD><INPUT type=text name=far size='50'></TD>
	 </TR>
	 <TR>
	  <TD>Mor</TD>
	  <TD>:</TD> 
	  <TD><INPUT type=text name=mor size='50'></TD>
	 </TR>
	 <TR>
	  <TD>L&auml;gga in ungar?</TD>
	  <TD>:</TD> 
	  <TD>
    <INPUT type="radio" name="ungar" value="nej">Nej 
    <INPUT type="radio" name="ungar" value="ja">Ja 
  </TD>
	 </TR>
	 <TR>
	  <TD colspan=3><INPUT type=submit value='Spara kull'></TD>
	 </TR>
  </TABLE>
	</FORM>
	</BODY>
	</HTML>

