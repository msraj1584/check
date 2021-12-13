<?php
session_start();
if($_SESSION['user']!='chairman'){
	header("location:index_char.php");
}
include("dbconnect.php");
extract($_REQUEST);

$qry=mysql_query("select * from admin where username='chairman'");
$row=mysql_fetch_array($qry);

if(isset($btn))
{
mysql_query("update admin set mobile=$mobile,email='$email' where username='chairman'");
?>
<script language="javascript">
alert("Updated..");
window.location.href="home_char.php";
</script>
<?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function getRefer1()
{

	if(document.form1.dept.value=="Other")
	{
	document.getElementById("y1").style.display="block";
	}
	else
	{
	document.getElementById("y1").style.display="none";
	}
}
</script>
</head>

<body>
<form autocomplete="off"  id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_char.php"); ?>
  <h3 align="center"> Chairman Details </h3>
  
  <table width="368" height="135" border="0" align="center" cellpadding="5" class="bor">
    <tr>
      <th align="left" scope="col">Mobile No. </th>
      <th align="left" scope="col"><input name="mobile" type="text" value="<?php echo $row['mobile']; ?>" size="40" /></th>
    </tr>
    <tr>
      <th width="64" align="left" scope="col">E-mail </th>
      <th width="278" align="left" scope="col"><input name="email" type="text" value="<?php echo $row['email']; ?>" size="40" /></th>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left"><input type="submit" name="btn" value="Update" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<iframe src="create.php" width="100" height="100" frameborder="0"></iframe>
</body>
</html>