<?
error_reporting(0);
include("./skript/common.php");
$link = mysql_connect("localhost",$db,$dbpw);
?>
<HTML>
<HEAD>
<TITLE>Min Kattklubb - svensk meny</TITLE>
<!-- Min kattklubb, den personliga klubben i södra Sverige  -->
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="expires" CONTENT="Wed, 26 Feb 1997 08:00:00 GMT">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<SCRIPT LANGUAGE="JavaScript" SRC="skript/common.js"></script>
<script type="text/javascript" src="simpletreemenu.js"></script>
<LINK REL="stylesheet" HREF="min.css" TYPE="TEXT/CSS">
<STYLE type=text/css>
.style10 {
	font-size: 8pt;
	color: #666666;
}
</STYLE>
</HEAD>
<!-- Kattklubb, katt, klubb, sverak, raskatt, bondkatt, hittekatt, innekatt, utekatt, vildkatt, min, Min, MIN, huskatt, Min Kattklubb -->
<BODY style="background-image:none;A.visited: color=#000099;" >
<script language="JavaScript" type="text/javascript">
<!--
// PHP Layers Menu 3.2.0-rc (C) 2001-2004 Marco Pratesi - http://www.marcopratesi.it/

DOM = (document.getElementById) ? 1 : 0;
NS4 = (document.layers) ? 1 : 0;
// We need to explicitly detect Konqueror
// because Konqueror 3 sets IE = 1 ... AAAAAAAAAARGHHH!!!
Konqueror = (navigator.userAgent.indexOf('Konqueror') > -1) ? 1 : 0;
// We need to detect Konqueror 2.2 as it does not handle the window.onresize event
Konqueror22 = (navigator.userAgent.indexOf('Konqueror 2.2') > -1 || navigator.userAgent.indexOf('Konqueror/2.2') > -1) ? 1 : 0;
Konqueror30 =
	(
		navigator.userAgent.indexOf('Konqueror 3.0') > -1
		|| navigator.userAgent.indexOf('Konqueror/3.0') > -1
		|| navigator.userAgent.indexOf('Konqueror 3;') > -1
		|| navigator.userAgent.indexOf('Konqueror/3;') > -1
		|| navigator.userAgent.indexOf('Konqueror 3)') > -1
		|| navigator.userAgent.indexOf('Konqueror/3)') > -1
	)
	? 1 : 0;
Konqueror31 = (navigator.userAgent.indexOf('Konqueror 3.1') > -1 || navigator.userAgent.indexOf('Konqueror/3.1') > -1) ? 1 : 0;
// We need to detect Konqueror 3.2 and 3.3 as they are affected by the see-through effect only for 2 form elements
Konqueror32 = (navigator.userAgent.indexOf('Konqueror 3.2') > -1 || navigator.userAgent.indexOf('Konqueror/3.2') > -1) ? 1 : 0;
Konqueror33 = (navigator.userAgent.indexOf('Konqueror 3.3') > -1 || navigator.userAgent.indexOf('Konqueror/3.3') > -1) ? 1 : 0;
Opera = (navigator.userAgent.indexOf('Opera') > -1) ? 1 : 0;
Opera5 = (navigator.userAgent.indexOf('Opera 5') > -1 || navigator.userAgent.indexOf('Opera/5') > -1) ? 1 : 0;
Opera6 = (navigator.userAgent.indexOf('Opera 6') > -1 || navigator.userAgent.indexOf('Opera/6') > -1) ? 1 : 0;
Opera56 = Opera5 || Opera6;
IE = (navigator.userAgent.indexOf('MSIE') > -1) ? 1 : 0;
IE = IE && !Opera;
IE5 = IE && DOM;
IE4 = (document.all) ? 1 : 0;
IE4 = IE4 && IE && !DOM;

// -->
</script>

<script language="JavaScript" type="text/javascript" src="skript/libjs/layersmenu-library.js"></script>
<script language="JavaScript" type="text/javascript" src="skript/libjs/layersmenu.js"></script>
<script language="JavaScript" type="text/javascript" src="skript/libjs/layerstreemenu-cookies.js"></script>
<div class="normal"> Inneh&aring;llsf&ouml;rteckning </div>
<br>
<script language="JavaScript" type="text/javascript">
<!--
// PHP Layers Menu 3.2.0-rc (C) 2001-2004 Marco Pratesi - http://www.marcopratesi.it/

function toggletreemenu2(nodeid)
{
	if ((!DOM || Opera56 || Konqueror22) && !IE4) {
		return;
	}
	layersMoved = 0;
	parseExpandString();
	parseCollapseString();
	if (!IE4) {
		sonLayer = document.getElementById('jt' + nodeid + 'son');
		nodeLayer = document.getElementById('jt' + nodeid + 'node');
		folderLayer = document.getElementById('jt' + nodeid + 'folder');
	} else {
		sonLayer = document.all('jt' + nodeid + 'son');
		nodeLayer = document.all('jt' + nodeid + 'node');
		folderLayer = document.all('jt' + nodeid + 'folder');
	}
	if (sonLayer.style.display == 'none') {
		sonLayer.style.display = 'block';
		if (nodeLayer.src.indexOf('./skript/menuimages/tree_expand.png') > -1) {
			nodeLayer.src = './skript/menuimages/tree_collapse.png';
		} else if (nodeLayer.src.indexOf('./skript/menuimages/tree_expand_first.png') > -1) {
			nodeLayer.src = './skript/menuimages/tree_collapse_first.png';
		} else if (nodeLayer.src.indexOf('./skript/menuimages/tree_expand_corner.png') > -1) {
			nodeLayer.src = './skript/menuimages/tree_collapse_corner.png';
		} else {
			nodeLayer.src = './skript/menuimages/tree_collapse_corner_first.png';
		}
		folderLayer.src = './skript/menuimages/tree_folder_open.png';
		phplm_expand[nodeid] = 1;
		phplm_collapse[nodeid] = 0;
	} else {
		sonLayer.style.display = 'none';
		if (nodeLayer.src.indexOf('./skript/menuimages/tree_collapse.png') > -1) {
			nodeLayer.src = './skript/menuimages/tree_expand.png';
		} else if (nodeLayer.src.indexOf('./skript/menuimages/tree_collapse_first.png') > -1) {
			nodeLayer.src = './skript/menuimages/tree_expand_first.png';
		} else if (nodeLayer.src.indexOf('./skript/menuimages/tree_collapse_corner.png') > -1) {
			nodeLayer.src = './skript/menuimages/tree_expand_corner.png';
		} else {
			nodeLayer.src = './skript/menuimages/tree_expand_corner_first.png';
		}
		folderLayer.src = './skript/menuimages/tree_folder_closed.png';
		phplm_expand[nodeid] = 0;
		phplm_collapse[nodeid] = 1;
	}
	saveExpandString();
	saveCollapseString();
}

// -->
</script>
<script language="JavaScript" type="text/javascript" src="skript/layersmenu.js"></script>

<table cellspacing="0" cellpadding="0" border="0" width=200>
<tr>
<td class="phplmnormal" nowrap>

      <div id="jt1" class="treemenudiv"> <img align="top" border="0" class="imgs" id="jt1node" src="skript/menuimages/tree_split_first.png" alt="|-" /> 
        <a href="base.php" title="Startsidan" target="main"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" /></a>&nbsp; 
        <a href="base.php" title="Startsidan" target="main" class="phplm">Startsidan</a> 
      </div>
      <div id="jt2" class="treemenudiv"> <a onmousedown="toggletreemenu2('2');"><img align="top" border="0" class="imgs" id="jt2node" src="skript/menuimages/tree_collapse.png" alt="--" /></a> 
        <img align="top" border="0" class="imgs" id="jt2folder" src="skript/menuimages/tree_folder_open.png" alt="->" />&nbsp;<a onmousedown="toggletreemenu2('2');">Klubben</a> 
      </div>
  <div id="jt2son" class="treemenudiv">
        <div id="jt4" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt4node" src="skript/menuimages/tree_split.png" alt="|-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="klubben/presentation.htm" target="main" class="phplm">Presentation</a> 
        </div>
        <div id="jt5" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt5node" src="skript/menuimages/tree_split.png" alt="|-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="klubben/betala.php" target="main" class="phplm">Bli medlem</a> 
        </div>
        <div id="jt6" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt6node" src="skript/menuimages/tree_corner.png" alt="`-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="klubben/stadgar/stadgar.htm" target="main" class="phplm">Stadgar</a> 
        </div>
  </div>
      <div id="jt7" class="treemenudiv"> <a onmousedown="toggletreemenu2('7');"><img align="top" border="0" class="imgs" id="jt7node" src="skript/menuimages/tree_collapse.png" alt="--" /></a> 
        <img align="top" border="0" class="imgs" id="jt7folder" src="skript/menuimages/tree_folder_open.png" alt="->" />&nbsp;<a onmousedown="toggletreemenu2('7');">Funktion&auml;rer</a> 
      </div>
  <div id="jt7son" class="treemenudiv">
        <div id="jt9" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt93node" src="skript/menuimages/tree_split.png" alt="|-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="funktionarer/styrelse/styrelse.php" target="main" class="phplm">Styrelsen</a> 
        </div>
        <div id="jt10" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt10node" src="skript/menuimages/tree_split.png" alt="|-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="funktionarer/redaktion/redaktion.php" target="main" class="phplm">Redaktionen</a> 
        </div>
        <div id="jt11" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt11node" src="skript/menuimages/tree_corner.png" alt="`-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="funktionarer/styrelse/ovrfunk.php" target="main" class="phplm">&Ouml;vriga</a> 
        </div>
  </div>
      <div id="jt12" class="treemenudiv"> <a onmousedown="toggletreemenu2('12');"><img align="top" border="0" class="imgs" id="jt12node" src="skript/menuimages/tree_collapse.png" alt="--" /></a> 
        <img align="top" border="0" class="imgs" id="jt12folder" src="skript/menuimages/tree_folder_open.png" alt="->" />&nbsp;<a onmousedown="toggletreemenu2('12');">Uppf&ouml;dare</a> 
      </div>
  <div id="jt12son" class="treemenudiv">
        <div id="jt14" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt14node" src="skript/menuimages/tree_split.png" alt="|-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="uppfodare/katterier/katteri.php" target="main" class="phplm">Stamnamn</a> 
        </div>
        <div id="jt15" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt15node" src="skript/menuimages/tree_split.png" alt="|-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="uppfodare/katterier/kullar.php" target="main" class="phplm">Kattungar</a> 
        </div>
        <div id="jt16" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt16node" src="skript/menuimages/tree_corner.png" alt="`-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="uppfodare/katterier/hane.php" target="main" class="phplm">Avelshanar</a> 
        </div>
  </div>
      <div id="jt17" class="treemenudiv"> <a onmousedown="toggletreemenu2('17');"><img align="top" border="0" class="imgs" id="jt17node" src="./skript/menuimages/tree_collapse.png" alt="--" /></a> 
        <img align="top" border="0" class="imgs" id="jt17folder" src="skript/menuimages/tree_folder_open.png" alt="->" />&nbsp;<a onmousedown="toggletreemenu2('17');">Aktiviteter</a> 
      </div>
  <div id="jt17son" class="treemenudiv">
        <div id="jt19" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt19node" src="skript/menuimages/tree_split.png" alt="|-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="aktiviteter/aktivitet.php" target="main" class="phplm">Aktuella</a> 
        </div>
        <div id="jt20" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt20node" src="skript/menuimages/tree_corner.png" alt="`-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="aktiviteter/historik.php" target="main" class="phplm">Tidigare</a> 
        </div>
    </div>
      <div id="jt21" class="treemenudiv"> <img align="top" border="0" class="imgs" id="jt21node" src="skript/menuimages/tree_split.png" alt="|-" />&nbsp; 
        <a href="galleri/bild.php" target="main" class="phplm">Galleri</a> </div>
      <div id="jt22" class="treemenudiv"> <a onmousedown="toggletreemenu2('22');"><img align="top" border="0" class="imgs" id="jt22node" src="skript/menuimages/tree_collapse.png" alt="--" /></a> 
        <img align="top" border="0" class="imgs" id="jt22folder" src="skript/menuimages/tree_folder_open.png" alt="->" />&nbsp;<a onmousedown="toggletreemenu2('22');">L&auml;sv&auml;rt</a> 
      </div>
  <div id="jt22son" class="treemenudiv">
       <div id="jt24" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt24node" src="skript/menuimages/tree_split.png" alt="|-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="lasvart/artiklar/index.php" target="main" class="phplm">Artiklar</a> 
        </div>
        <div id="jt25" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt25node" src="skript/menuimages/tree_corner.png" alt="`-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="nyheter/nyttimedia.htm" target="main" class="phplm">Press & 
          Media</a> </div>
    </div>
      <div id="jt27" class="treemenudiv"> <img align="top" border="0" class="imgs" id="jt27node" src="skript/menuimages/tree_split.png" alt="|-" />&nbsp; 
        <a href="lasvart/kuriosa/index.htm" target="main" class="phplm">Kuriosa</a> 
      </div>
      <div id="jt28" class="treemenudiv"> <a onmousedown="toggletreemenu2('28');">
	    <img align="top" border="0" class="imgs" id="jt28node" src="skript/menuimages/tree_collapse.png" alt="--" /></a> 
        <img align="top" border="0" class="imgs" id="jt28folder" src="skript/menuimages/tree_folder_open.png" alt="->" />&nbsp;
		<a onmousedown="toggletreemenu2('28');">Utst&auml;llningar</a> 
      </div>
  <div id="jt28son" class="treemenudiv">
        <div id="jt30" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt30node" src="skript/menuimages/tree_split.png" alt="|-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="utst/index.htm" target="main" class="phplm">Egna</a> </div>
        <div id="jt31" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt31node" src="skript/menuimages/tree_split.png" alt="`-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          <a href="http://www.sverak.se/nya/eng/engine.php?page=komut" target="_blank" class="phplm">&Ouml;vriga</a> 
        </div>
        <div id="jt29" class="treemenudiv"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_vertline.png" alt="| " /> 
          <img align="top" border="0" class="imgs" id="jt29node" src="skript/menuimages/tree_corner.png" alt="`-" /> 
          <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
          &Aring;rets Katt</div>
  </div>
      <div id="jt32" class="treemenudiv"> <img align="top" border="0" class="imgs" id="jt32node" src="skript/menuimages/tree_split.png" alt="|-" />&nbsp; 
        <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
        <a href="lankar/lankar.htm" title="Länkar" target="main" class="phplm">L&auml;nkar</a> 
      </div> 
      <div id="jt37" class="treemenudiv"> <img align="top" border="0" class="imgs" id="jt37node" src="skript/menuimages/tree_split.png" alt="|-" />&nbsp; 
        <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
        <a href="shop/index.htm" title="Länkar" target="main" class="phplm">Shoppen</a> 
      </div> 
      <div id="jt34" class="treemenudiv"> <img align="top" border="0" class="imgs" id="jt27node" src="skript/menuimages/tree_split.png" alt="|-" />&nbsp; 
        <a href="base.php" title="Startsidan" target="main"> <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" /></a>&nbsp; 
        <a href="downloads/index.htm" title="Ladda hem" target="main" class="phplm">Att 
        ladda hem</a> </div>
      <div id="jt36" class="treemenudiv"> <img align="top" border="0" class="imgs" id="jt27node" src="skript/menuimages/tree_corner.png" alt="`-" />&nbsp; 
        <img align="top" border="0" class="imgs" src="skript/menuimages/tree_leaf.png" alt="->" />&nbsp; 
        <a href="skript/settings.php" title="Inställningar" target="main" class="phplm">Inst&auml;llningar</a> 
      </div>
</td>
</tr>
</table>
<!--if (phplm_collapse[yy] == 1) toggletreemenu2('yy');
if (phplm_expand[xx] != 1) toggletreemenu2('xx');-->
<script language="JavaScript" type="text/javascript">
<!--
if ((DOM && !Opera56 && !Konqueror22) || IE4) {
if (phplm_expand[2]  != 1) toggletreemenu2('2');
if (phplm_expand[7]  != 1) toggletreemenu2('7');
if (phplm_expand[12] != 1) toggletreemenu2('12');
if (phplm_expand[17] != 1) toggletreemenu2('17');
if (phplm_expand[22] != 1) toggletreemenu2('22');
if (phplm_expand[28] != 1) toggletreemenu2('28');
}
if (NS4) alert("Only the accessibility is provided to Netscape 4 on the JavaScript Tree Menu.\nWe *strongly* suggest you to upgrade your browser.");
// -->
</script>
<p><a href="uppfodare/katterier/katteri.php" target="main"><img src="bilder/diplom.gif" width=30 height=46 border="0"></a><b> 
  : 
  <?
$sql = "SELECT count(diplom) a
FROM `medlem` 
WHERE `diplom` = 1
and `aktiv` = 1";
$result = mysql_db_query($db, $sql, $link);
$num_rows = mysql_num_rows($result);
if ("$num_rows" != 0) {
  while ($row = mysql_fetch_array($result)) {
    print ("$row[a]");
  }
}  
?>
  </b></p>
</BODY>
</HTML>
