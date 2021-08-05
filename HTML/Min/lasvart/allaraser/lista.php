<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF" text="#000000">

<?

if ($dir = @opendir("beskr/")) {
  while (($file = readdir($dir)) !== false) {
  	echo "insert into ras (namn,enamn,ems,fifestd,cfastd,ticastd,idpstd,beskr,bild) values (\"";
	echo "$file\n";
	echo '","","","","","","","",\"';
	echo "$file\");<br>";
  }  
  closedir($dir);
  echo "slut";
}

?>

</body>
</html>