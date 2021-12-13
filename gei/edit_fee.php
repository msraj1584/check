<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

$qry=mysql_query("select * from dept where id=$id");
$row=mysql_fetch_array($qry);

if(isset($btn))
{
mysql_query("update dept set degree='$degree',dept='$dept',code='$code',course_type='$course_type',community='$community',gq='$gq',gqfees='$gqfees',mq='$mq',mqfees=$mqfees where id=$id");
?>
<script language="javascript">
window.location.href="add_fees.php";
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
  <?php include("link_admin.php"); ?>
  <h3 align="center"> Fees Information </h3>
  
  <table width="764" height="135" border="0" align="center" cellpadding="5" class="bor">
    <tr>
      <th align="left" scope="col">Degree</th>
      <th align="left" scope="col"><input type="text" name="degree" value="<?php echo $row['degree']; ?>" /></th>
    </tr>
    <tr>
      <th width="88" align="left" scope="col">Dept</th>
      <th width="650" align="left" scope="col">
      <input type="text" name="dept" value="<?php echo $row['dept']; ?>" /></th>
    </tr>
    <tr>
      <th align="left" scope="row">Course Type</th>
      <td align="left"><input type="text" name="course_type" value="<?php echo $course_type; ?>" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">Community</th>
      <td align="left"><input type="text" name="community" value="<?php echo $community; ?>" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">Code</th>
      <td align="left"><input type="text" name="code" value="<?php echo $row['code']; ?>" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">Seats in GQ</th>
      <td align="left"><input type="text" name="gq" value="<?php echo $row['gq'];?>" /></td>
    </tr>
	<tr>
      <th align="left" scope="row">GQ Fees</th>
      <td align="left"><input type="text" name="gqfees" value="<?php echo $row['gqfees']; ?>" /></td>
    </tr>
	<tr>
      <th align="left" scope="row">Seats in MQ</th>
      <td align="left"><input type="text" name="mq" value="<?php echo $row['mq']; ?>" /></td>
    </tr>
	<tr>
      <th align="left" scope="row">MQ Fees</th>
      <td align="left"><input type="text" name="mqfees" value="<?php echo $row['mqfees']; ?>" /></td>
    </tr>
	
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left">&nbsp;</td>
    </tr>
	<script>
  function clickAlert() {
    alert("Fees Updated Successfully");
}
</script>

    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left"><input type="submit" name="btn" value="Update" onclick="clickAlert()" /></td>
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