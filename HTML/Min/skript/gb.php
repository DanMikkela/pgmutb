<html>
<head>
<title>Min Kattklubb - Test insert</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
error_reporting(10);
include("common.php");
$link = mysql_connect("localhost",$db,$dbpw);

if (isset($_POST['submit'])) {

if(empty($_POST['fnamn'])) {
die("Fill in the first name field.");
}

if(empty($_POST['enamn'])) {
die("Fill in the last name field.");
}

// $fnamn = mysqli_real_escape_string($link,trim($_POST['fnamn']));
// $enamn = mysqli_real_escape_string($link,trim($_POST['enamn']));
$fnamn = $_POST['fnamn'];
$enamn = $_POST['enamn'];

$sqlinsert = "INSERT INTO `test` (`fnamn`, `enamn`) VALUES (" . '"'."$fnamn"\" . '","' . "$enamn" . ")";

print("$sqlinsert&nbsp;&nbsp;");

$result = mysql_db_query($db, $sqlinsert, $link);

    if (!$result) { die('error inserting new record'); } 

        echo "1 record added to the database";


} // end of the main if statement
?>

<hl>Insert Data into DB</hl>

<form method="post" action="">
<fieldset>
    <legend>New People</legend>
    <label>First Name:<input type="text" name="fnamn" /></label>
    <label>Last Name:<input type="text" name="enamn" /></label>
</fieldset>
<br />
<input type="submit" name="submit" value="add new person" />
</form>
<?php
echo $newrecord;
?>

</body>
</html>
