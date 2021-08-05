<?php
error_reporting(0);
session_start();
include("../skript/common.php");
# Inloggad?
if (!$HTTP_SESSION_VARS['admin']) { exit; }
$user =$HTTP_SESSION_VARS['user'];
$link = mysql_connect("localhost",$db,$dbpw);
$query = "select fnamn, enamn, adr, pnr, ort, tfn from medlem
 where nr = $admin";
$result = mysql_db_query($db, $query, $link);
?>
<HTML>
<HEAD>
 <TITLE>Min Kattklubb - Utställningsanmälan</TITLE>
<LINK rel="stylesheet" href="../min.css" type="text/css">
</HEAD>

<BODY>
<H3>Anm&auml;lan till Min's utst&auml;llning i Malm&ouml;,<BR>
  xx augusti 2008 ( <?echo $user ?>)</H3>  
<FORM action="mailto:utstanm.min@kattklubb.se" method="post" enctype="text/plain">
<!--  enctype="multipart/form-data"   -->
  <TABLE width="600" border="0" cellspacing="0" cellpadding="0">
    <TR> 
      <TD>Min Kattklubb
			<INPUT type="hidden" name="datum" value="<? echo $today ?>">
			
			</TD>
      <TD>Malm&ouml;</TD>
      <TD>x augusti 2008</TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR> 
      <TD>Kattens namn<BR>
        <INPUT type="text" name="namn">
      </TD>
      <TD> 
        <INPUT type="radio" name="kön" value="hane">
        hane<BR>
        <INPUT type="radio" name="kön" value="hona">
        hona </TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR> 
      <TD>EMS-kod<BR>
        <INPUT type="text" name="ems">
      </TD>
      <TD>Grupp<BR>
        <INPUT type="text" name="grupp">
      </TD>
      <TD>Utst.klass<BR>
        <INPUT type="text" name="klass">
      </TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR> 
      <TD height="17">Registreringsnr<BR>
        <INPUT type="text" name="regnr">
      </TD>
      <TD height="17">F&ouml;dd<BR>
        <INPUT type="text" name="fodd">
      </TD>
      <TD height="17">&nbsp;</TD>
      <TD height="17">&nbsp;</TD>
    </TR>
    <TR> 
      <TD>Far : titel + namn<BR>
        <INPUT type="text" name="far_namn">
      </TD>
      <TD>EMS-kod<BR>
        <INPUT type="text" name="far_ems">
      </TD>
      <TD>Registreringsnr<BR>
        <INPUT type="text" name="far_regnr">
      </TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR> 
      <TD>Mor : titel + namn<BR>
        <INPUT type="text" name="mor_namn">
      </TD>
      <TD>EMS-kod<BR>
        <INPUT type="text" name="mor_ems">
      </TD>
      <TD>Registreringsnr<BR>
        <INPUT type="text" name="mor_regnr">
      </TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR> 
      <TD>Dubbelbur tillsammans med<BR>
        <INPUT type="text" name="dubbel">
      </TD>
      <TD>Uppf&ouml;dare<BR>
        <INPUT type="text" name="uppfodare">
      </TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR> 
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR> 
      <TD> 
        <INPUT type="checkbox" name="checkbox" value="katten_till_salu">
        Katten till salu</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR> 
      <TD> 
        <INPUT type="checkbox" name="checkbox2" value="kattungar_till_salu">
        Kattungar till salu</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR> 
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR> 
      <TD> 
        <INPUT type="checkbox" name="checkbox3" value="assistent">
        Jag vill g&aring; Assistent</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR> 
<?
while ($row = mysql_fetch_array($result)) {
  print ("<INPUT type=\"hidden\" name=\"namn\" value=\"$row[fnamn] $row[enamn]\">");
  print ("<INPUT type=\"hidden\" name=\"adress\" value=\"$row[adr]\">");
  print ("<INPUT type=\"hidden\" name=\"padr\" value=\"$row[pnr] $row[ort]\">");
  print ("<INPUT type=\"hidden\" name=\"tfn\" value=\"$row[tfn]\">");
}
?>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR> 
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
    </TR>
  </TABLE>
  <INPUT type="submit" value="Skicka anmälan!">
</FORM>
</BODY>
</HTML>