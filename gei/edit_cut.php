<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

$qry=mysql_query("select * from cutoff where id=$id");
$row=mysql_fetch_array($qry);

if(isset($btn))
{
mysql_query("update cutoff set cutoff=$cutoff,amount=$amount,amount2=$amount2 where id=$id");
?>
<script language="javascript">
window.location.href="add_cutoff.php";
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
  <h3 align="center"> Cutoff Information </h3>
  
  <table width="764" height="135" border="0" align="center" cellpadding="5" class="bor">
   <tr>
      <th align="left" scope="col">Degree</th>
      <th align="left" scope="col"><input type="text" name="Degree" value="<?php echo $row['Degree']; ?>" /></th>
    </tr>
	<tr>
      <th align="left" scope="col">Department</th>
      <th align="left" scope="col"><input type="text" name="Dept" value="<?php echo $row['Dept']; ?>" /></th>
    </tr>
	<tr>
      <th align="left" scope="col">Cutoff</th>
      <th align="left" scope="col"><input type="text" name="cutoff" value="<?php echo $row['cutoff']; ?>" /></th>
    </tr>
    <tr>
      <th width="88" align="left" scope="col">Amount (FG) </th>
      <th width="650" align="left" scope="col"><input type="text" name="amount" value="<?php echo $row['amount']; ?>" /></th>
    </tr><script>
  function clickAlert() {
    alert("Merit Concession Updated Successfully");
}
</script>
    <tr>
      <th align="left" scope="col">Amount (NFG) </th>
      <th align="left" scope="col"><input type="text" name="amount2" value="<?php echo $row['amount2']; ?>" /></th>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left"><input type="submit" name="btn" value="Update Merit Cut-Off" onclick="clickAlert()"/></td>
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