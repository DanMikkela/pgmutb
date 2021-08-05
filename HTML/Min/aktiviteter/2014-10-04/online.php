<html>
<head>
<title>MIN - On-line anm&auml;lan</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../../min.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<p>Pilotverksamhet - Webanm&auml;lan till SVERAK-utst&auml;llningar!</p>
<p>Utveckling p&aring;g&aring;r f&ouml;r att SVERAK-anslutna ska ha m&ouml;jlighet 
  att kunna anm&auml;la sina katter on-line till de klubbar som s&aring; &ouml;nskar.<br>
  Det &auml;r nu dags att testa f&ouml;rsta delen av denna utveckling p&aring; 
  en utst&auml;llning!<br>
</p>
<p>I samband med att m&ouml;jlighet f&ouml;r on-lineanm&auml;lan &ouml;ppnas testas 
  &auml;ven &quot;Mina Katter&quot;.<br>
  Detta &auml;r en web-baserad hantering av de egna katterna som finns registrerade 
  p&aring; den inloggade personen. <br>
</p>
<p>Testverksamheten inneb&auml;r att:<br>
<li>Det sker under en begr&auml;nsad period f&ouml;r att sedan utv&auml;rderas.</li> 
<li>Endast ett f&aring;tal utst&auml;llningar &auml;r anslutna.</li> 
<li>Anm&auml;lan m&aring;ste &auml;ven skickas in &quot;manuellt&quot; p&aring;  
  vanligt s&auml;tt - detta f&ouml;r att kontroll sker att allt kommer in som 
  det ska.</li>
<li>Endast katter som &auml;r registrerade i SVERAK kan anm&auml;las on-line. </li> 
<li>Katter som &auml;r &quot;under reg&quot; eller registrerade i annat f&ouml;rbund 
  anm&auml;ls som tidigare.</li> 

<p>T&auml;nk p&aring; att:
<li>I &quot;Mina Katter&quot; kommer du att se katter som du inte l&auml;ngre 
  har kvar - detta beror p&aring; att de antingen &auml;r avlidna eller att &auml;gar&auml;ndring 
  inte har gjorts. </li>
<li>Om du inte ser katter som du &auml;ger beror det p&aring; att de inte &auml;r 
  &auml;gar&auml;ndrade till dig. Detta g&auml;ller &auml;ven katter som du sj&auml;lv 
  har f&ouml;tt upp som du inte &auml;gar&auml;ndrat till dig sj&auml;lv.</li>
<p>Vi ber er att:
<li>Ha &ouml;verseende med att on-line anm&auml;lan och &quot;Mina Katter&quot; 
  kan vara instabilt under testperioden.</li>
<li>G&auml;rna notera &auml;ndringar som ska g&ouml;ras g&auml;llande &auml;gande 
  av katter, men v&auml;nta g&auml;rna med att skicka in detta till SVERAKs kansli 
  tills testperioden &auml;r &ouml;ver. Detta g&auml;ller endast &quot;gamla&quot; 
  &auml;ndringar som inte &auml;r gjorda. Naturligtvis ska katter som byter &auml;gare 
  under testperioden &auml;ndras som vanligt.</li>
  
<p><b><i><u>Detta &auml;r ett f&ouml;rsta test och en &quot;beta-version&quot; 
  - Utveckling p&aring;g&aring;r med b&aring;de funktionalitet och layout!</u></i></b><br>
</p>
<p>Vi kommer att samla ihop synpunkter fr&aring;n anv&auml;ndare - skicka g&auml;rna 
  dessa till Malin Sundqvist via mail <a href="mailto:malin@arzish.se">malin@arzish.se</a>. 
  <br>
  Det kommer dock <b><font color="#FF0000" size="4">INTE</font></b> att finnas 
  m&ouml;jlighet till support.<br>
</p>
<p>Fr&aring;gor g&auml;llande aktuell utst&auml;llning skickas till angiven kontaktperson 
  enligt inbjudan. </p>
<hr>
<p><font size="5">F&ouml;r att forts&auml;tta :<a href="HandledningOnline.pdf" target="_blank"> 
  Handledning finns H&Auml;R.</a></font></p>
<?
if ($fd = fopen("count.txt","r") ) { $count = fgets($fd, 10); fclose ($fd); }
print ("$count");
$fh = fopen("count.txt","w"); fwrite($fh, ++$count); fclose($fh);
?>
</body>
</html>
