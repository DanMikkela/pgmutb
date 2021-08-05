<!-- saved from url=(0014)about:internet -->
<HTML>
<HEAD>
 <TITLE>Min Kattklubb - Inställningar</TITLE>
<!-- Min kattklubb, den personliga klubben i södra Sverige  -->
 <link rel="stylesheet" href="../min.css" type="text/css">
<script language=JavaScript src="common.js"></script>
</HEAD>
<?
# stäng av felmeddelanden
error_reporting(0);
if ( !isset($anim)) { $anim="av"; }
if ( !isset($musik)) { $musik="av"; }
 if ("$musik" == "på") {
  print ("<bgsound src=\"/data/jul3.mid\">");} 
?>
<h3>Personliga inst&auml;llningar</h3>
<p>H&auml;r kan st&auml;lla in om du vill ha r&ouml;rliga bilder, musik mm.</p>
<table>
  <tr> 
    <td>&nbsp;</td>
    <td>Dina inst&auml;llningar just nu:</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td><img src="../bilder/arrow1.gif"></td>
    <td>r&ouml;rliga bilder</td>
    <td> 
      <?
if ("$anim" == "av") {
 print ("&nbsp;");
} else {
 print ("<img src=\"./bilder/check2.gif\">");
}
?>
    </td>
    <td>
      <? if ("$anim" == "av") {
 print ("<a href=\"javascript:bytanim('på')\"> Sätt på</a>");
} else {
 print ("<a href=\"javascript:bytanim('av')\"> Stäng av</a>");
} ?>
    </td>
  </tr>
  <tr> 
    <td><img src="../bilder/speaker.gif"></td>
    <td>musik</td>
    <td>
      <? if ("$musik" == "av") {
 print ("&nbsp;");
} else {
 print ("<img src=\"/bilder/check2.gif\">");
} ?>
    </td>
    <td>
      <?
if ("$musik" == "av") {
 print ("<a href=\"javascript:bytmusik('på')\"> Sätt på</a>");
} else {
 print ("<a href=\"javascript:bytmusik('av')\"> Stäng av</a>");
}
?>
    </td>
  </tr>
  <tr>
    <td><img src="/bilder/tv.gif" width="13" height="12"></td>
    <td>bakgrunder</td>
    <td><? if ("$bakgrund" == "av") {
 print ("&nbsp;");
} else {
 print ("<img src=\"/bilder/check2.gif\">");
} ?>     
</td>
    <td>      <?
if ("$bakgrund" == "av") {
 print ("<a href=\"javascript:bytbakgrund('på')\"> Sätt på</a>");
} else {
 print ("<a href=\"javascript:bytbakgrund('av')\"> Stäng av</a>");
}
?>
</td>
  </tr>
</table> 
</BODY>
</HTML>
