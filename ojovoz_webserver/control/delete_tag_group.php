<?
include_once("./../includes/channel_vars.php");
include_once("./../includes/init_database.php");
$dbh = initDB();

if (isset($_POST['yes'])) {
	$id = $_POST['id'];
	$query="UPDATE tag SET tag_group_id = -1 WHERE tag_group_id=$id";
	$result = mysql_query($query, $dbh);
	$query="DELETE FROM tag_group WHERE tag_group_id=$id";
	$result = mysql_query($query, $dbh);
	header("Location: tag_groups.php");
} else if (isset($_POST['no'])) {
	header("Location: tag_groups.php");
} else {
	$id = $_GET['id'];
	$query="SELECT tag_group_name FROM tag_group WHERE tag_group_id=$id";
	$result = mysql_query($query, $dbh);
	$row = mysql_fetch_array($result, MYSQL_NUM);
?>
<html>
<head>
<title><? echo($global_channel_name); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p><font size="2" face="Courier New, Courier, mono"><strong>Delete tag group: <? echo($row[0]); ?> 
  ?</strong></font></p>
<form name="form1" method="post" action="">
  <input name="yes" type="submit" id="yes" value="yes">
  <input name="no" type="submit" id="no" value="no">
  <input name="id" type="hidden" id="id" value="<? echo($id); ?>">
</form>
<p>&nbsp; </p>
</body>
</html>
<?
}
?>