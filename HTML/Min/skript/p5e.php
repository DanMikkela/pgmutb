<HTML>
<HEAD>
 <TITLE>Projektuppgift 5e - Webbprogrammering</TITLE>
<?
# st�ng av felmeddelanden
 error_reporting(0);
# testa om 1:a g�ngen
if ($steg) {
switch ($steg) {
  default:
    break;
  case "2":
    # skapa kod f�r steg 2
    print("<FORM method=post>Ange l&auml;net du bor i :<SELECT name=lan><br>");
    print("<OPTION value=Sk�ne><br>Sk&aring;ne");
    print("<OPTION value=Halland>Halland<br>");
    print("<INPUT type=hidden name=fnamn value=$fnamn><br>");
    print("<INPUT type=hidden name=enamn value=$enamn><br>");
    print("<INPUT type=hidden name=steg value=3><br>");
    print("<INPUT type=submit action=p5e.php><br></FORM>");
    break;
  case "3":
  # skapa kod f�r steg 3
    # skapa kod f�r val av ort inom l�n
    print("<FORM method=post>Ange orten du bor i :<SELECT name=ort><br>");
    if ($lan == "Sk�ne") {
      print("<OPTION value=Lomma>Lomma<br>");
      print("<OPTION value=Vellinge>Vellinge<br>");
    } else {
      print("<OPTION value=Halmstad>Halmstad<br>");
      print("<OPTION value=Varberg>Varberg</SELECT><br>");
    }
    print("<INPUT type=hidden name=lan value=$lan><br>");
    print("<INPUT type=hidden name=fnamn value=$fnamn><br>");
    print("<INPUT type=hidden name=enamn value=$enamn><br>");
    print("<INPUT type=hidden name=steg value=4><br>");
    print("<INPUT type=submit action=p5e.php><br></FORM>");
    break;
  case "4":
      print("Du har matat in :<br>");
      echo "F&ouml;rnamn : $fnamn <br>";
      echo "Efternamn : $enamn <br>";
      echo "L&auml;n : $lan <br>";
      echo "Ort : $ort";
  }
} else {
    # skapa kod f�r steg 1
    print("<FORM method=post>Ange ditt f&ouml;rnamn : ");
    print("<INPUT type=text name=fnamn><br>");
    print("Ange ditt efternamn : <INPUT type=text name=enamn><br>");
    print("<INPUT type=hidden name=steg value=2><br>");
    print("<INPUT type=submit action=p5e.php><br></FORM>");
}

?>
</HEAD>

<BODY>
</BODY>
</HTML>
