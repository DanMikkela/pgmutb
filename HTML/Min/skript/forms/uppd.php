<?
# error_reporting(0);
include("../common.php");
session_start();
$lvl =$HTTP_SESSION_VARS['behö'];
?>
<HTML>
<HEAD>
 <TITLE>Min Kattklubb svensk bassida</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
 <META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
 <META HTTP-EQUIV="pragma" CONTENT="no-cache">
 <script language="JavaScript" src="../common.js"> </script>
 <LINK REL="stylesheet" HREF="../../min.css" TYPE="TEXT/CSS">
<?
if (isset($next)) { 
  print ("<SCRIPT language='JavaScript'>function go() {self.location = \"".$next."\";}</SCRIPT>");
} else {
  echo "<SCRIPT language='JavaScript'>function go() {self.location = '../base.htm';}</SCRIPT>";
}
?>
</HEAD>

<BODY onLoad="window.setInterval('go();',2000)">
<?
# detta är en samling skript för uppdateringar av databas : kattklubb_se

# högsta behörighet krävs för att få uppdatera databasen ...
if (!isset($lvl) || "$lvl" < 9) { header("location:../base.htm"); exit;}

# har vi parametrar ?
if (!isset($tab)) { header("location:../base.htm"); exit;}

# öppna databasen (kattklubb_se)
$link = mysql_connect("localhost",$db,$dbpw);

# skapa ny post i tabell : uppdaterat (?tab=uppd)
# datum date, sida varchar(40), url varchar(40)
if ($tab=="uppd") {
  $sql = "insert into uppdaterat values(\"".$datum."\",\"".$sida.
  "\",\"".$url."\")";
}

# skapa ny post i tabell : medlem (?tab=medl)
# typ char(2), nr smallint(3), enamn varchar(30), fnamn varchar(30),
# adr varchar(30), pnr varchar(6), ort varchar(20), tfn varchar(20),
# epost varchar(40), webkod varchar(10), behörighet smallint(1),
# medlemsedan date, huvudmedlem smallint(3)
if ($tab=="medl") {
  $sql = "insert into medlem values(\"".$typ."\",\"".$nr.
  "\",\"".$enamn."\",\"".$fnamn."\",\"".$adr."\",\"".$pnr.
  "\",\"".$ort."\",\"".$tfn."\",\"".$epost."\",\"".$webkod.
  "\",\"0\",\"".$medlemsedan."\",\"".$huvudmedlem."\")";
}

# skapa ny post i tabell : stamnamn (?tab=stam)
# id smallint(3), prefix char(2) default 'S*', namn varchar(40),
# inneh varchar(40), medinneh varchar(60), regdat date,
# epost varchar(40), hemsida varchar(40), medlem smallint(3),
# medlem2 smallint(3), aktiv char(1) default 'Y'
if ($tab=="stam") {
  $sql = "insert into stamnamn values(\"".$id."\",\"".$prefix.
  "\",\"".$namn."\",\"".$inneh."\",\"".$medinneh."\",\"".$regdat.
  "\",\"".$epost."\",\"".$hemsida."\",\"".$medlem."\",\"".$medlem2.
  "\",\"".$aktiv."\")";
}

# skapa ny post i tabell : funktionär (?tab=funk)
# id int(1), ordn smallint(2), funktion varchar(20),
# befattning varchar(40), kortbef varchar(10), medlemsnr char(3),
# epost varchar(30)
if ($tab=="funk") {
  $sql = "insert into funktionär values(\"".$ordn.
  "\",\"".$funktion."\",\"".$befattning."\",\"".$kortbef.
  "\",\"".$medlemsnr."\",\"".$epost."\")";
}

# skapa ny post i tabell : kattunge (?tab=unge)
# id int(3), sex varchar(4), ems varchar(20), status varchar(20),
# upplagd date, upplagdav varchar(30), bestfore date
if ($tab=="unge") {
  $sql = "insert into kattunge values(\"".$id."\",\"".$sex.
  "\",\"".$ems."\",\"".$status."\",\"".$upplagd."\",\"".$upplagdav.
  "\",\"".$bestfore."\")";
}

# skapa ny post i tabell : kull (?tab=kull)
# id smallint(3), stamnamn smallint(3), h_med char(1) default 'H',
# neddatum date, ras varchar(30), levdatum date, far varchar(40),
# mor varchar(40), status char(1), upplagd date, bestfore date
if ($tab=="kull") {
  $sql = "insert into kull values(\"".$id."\",\"".$stamnamn.
  "\",\"".$h_med."\",\"".$neddatum."\",\"".$ras."\",\"".$levdatum.
  "\",\"".$far."\",\"".$mor."\",\"".$status."\",\"".$upplagd.
  "\",\"".$bestfore."\")";
}
echo "$sql";
# skicka sql-satsen 
$result = mysql_db_query($db, $sql, $link);
echo "$result";

 
# stäng databasen (kattklubb_se)
mysql_close($link);
?>
</BODY>
</HTML>
