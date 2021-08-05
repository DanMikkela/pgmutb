<?php
error_reporting(0);
session_start();
include("../skript/common.php");
# Inloggad?
if (!$HTTP_SESSION_VARS['admin']) { exit; }
$user =$HTTP_SESSION_VARS['user'];
$link = mysql_connect("localhost",$db,$dbpw);  # anslut till databasen
# hämta nästa bildnr
$query = "select max(id)+1 next from bildinfo";
$result = mysql_db_query($db, $query, $link);
while ($row = mysql_fetch_array($result)) {
  $nextid = "$row[next]";
	}
?>
<HTML>
<HEAD>
 <TITLE>Min Kattklubb - ladda upp bilder</TITLE>
<LINK rel="stylesheet" href="../min.css" type="text/css">
</HEAD>

<BODY>
<?php
if ($upp==1){
  if (isset($flname)) {
    if (filesize($flname) > 10240) {
		  unlink ($flname);
			print("Lilla bilden var större än 10 kB, ej accepterad<br>");
		} else {
	  	$size = getimagesize ("$flname");
	    if (($size[0] > 150) OR ($size[1] > 150)) {
			  print("Lilla bilden för stor, ej accepterad<br>");
	    } else {
    		$size = getimagesize ("$fsname");
    	  if ($size[0] > 600 OR $size[1] > 600) {
		      unlink ($fsname);
	    		print("Stora bilden var för stor, ej accepterad<br>");
	    	} else {
				  copy($fsname, "images/$nextid.jpg");
  	  	  copy($flname, "images/tn/$nextid.jpg");
		  		$query = "insert into bildinfo(text,bildnamn,medlem,namn)
					          values (\"$bildtext\",\"$nextid.jpg\",\"$admin\",\"$user\")";
          $result = mysql_db_query($db, $query, $link);
					}
			}
		}
  }
}
?>
<H3>Ladda upp dina bilder till Min's galleri, <?echo $user ?> !</H3>
<FORM action="upload.php?upp=1"  method="post" enctype="multipart/form-data">
  <FONT size="3">Ange sökväg till bilden i litet format<BR>
  (max 150x150 px, <B>10 kB</B>, jpg-format)</FONT><BR>
<INPUT type="file" name="flname"><BR>
  <FONT size="3">Ange sökväg till bilden i stort format<BR>
  (max 600x600 px, <B>80 kB</B>, jpg-format)</FONT><BR>
<INPUT type="file" name="fsname"><BR>
  <FONT size="3">Skriv in din bildtext<BR>
  OBS! DU är själv ansvarig för det som skrivs! OBS!</FONT><BR>
<TEXTAREA name="bildtext" ROWS=5 COLS=40></TEXTAREA><BR>
<INPUT type="submit" value="Ladda upp bilderna!">
</FORM>
</BODY>
</HTML>