<?php
session_start();
if($_SESSION['user']!='Admin'){
	header("location:index_admin.php");
}
include("dbconnect.php");
extract($_REQUEST);

$qry=mysql_query("select * from admin where username='$un'");
$row=mysql_fetch_array($qry);

if(isset($btn))
{
	
		$mq1=mysql_query("select max(id) from cutoff");
		$mr1=mysql_fetch_array($mq1);
		$id1=$mr1['max(id)']+1;
		mysql_query("insert into cutoff(id,Degree,Dept,cutoff,amount,amount2) values($id1,'$Degree','$Dept','$cutoff','$amount','$amount2')");
?>
<script language="javascript">
window.location.href="add_cutoff.php?act=success";
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
  <h3 align="center"> Cut-off Information </h3>
  
  <table width="543" height="135" border="0" align="center" cellpadding="5" class="bor">
  <tr>
      <th width="299" align="left" scope="row">Degree </th>
      <td width="439" align="left"><select name="Degree" value="<?php echo $Degree; ?>" />
    <option value="B.E">B.E</option>
	<option value="M.E<">M.E</option>
	<option value="M.B.A">M.B.A</option>
	<option value="M.C.A">M.C.A</option>
	</select>
	</tr>
	<tr>
      <th width="299" align="left" scope="row">Department </th>
      <td width="439" align="left"><select name="Dept" value="<?php echo $Dept; ?>" />
	  <option value="">--Department--</option>
	  <option value="CSE">CSE</option>
	  <option value="EEE">EEE</option>
	  <option value="ECE">ECE</option>
	  <option value="MECHANICAL">MECHANICAL</option>
	  <option value="CIVIL">CIVIL</option>
	  <option value="BIO MEDICAL ENGINEERING">BIO MEDICAL ENGINEERING</option>
	  	  <option value="CHEMICAL ENGINEERING">CHEMICAL ENGINEERING</option>
		  	  <option value="FOOD TECHNOLOGY">FOOD TECHNOLOGY</option>
	  </select>
	  </td>
    </tr>
    <tr>
      <th width="299" align="left" scope="row">Cut-off Above </th>
      <td width="439" align="left"><input type="text" name="cutoff" value="<?php echo $cutoff; ?>" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">Reduction Amount (FG) </th>
      <td align="left"><input type="text" name="amount" value="<?php echo $amount; ?>" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">Reduction Amount (NFG) </th>
      <td align="left"><input type="text" name="amount2" value="<?php echo $amount2; ?>" /></td>
    </tr><script>
  function clickAlert() {
    alert("Merit Concession Added Successfully");
}
</script>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left"><input type="submit" name="btn" value="Add Merit Cut-Off" onclick="clickAlert()"/></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p align="center">
    <?php
  $q1=mysql_query("select * from cutoff order by cutoff");
	$n1=mysql_num_rows($q1);
	if($n1>0)
	{
  ?>
</p>
  <table width="926" border="1" align="center">
    <tr>
      <th width="139" scope="col">S.No</th>
	  <th width="219" scope="col">Degree</th>
	  <th width="219" scope="col">Department</th>
      <th width="219" scope="col">Cut-off</th>
      <th width="168" scope="col">Amount(FG)</th>
      <th width="139" scope="col">Amount(NFG)</th>
      <th width="227" scope="col">Action</th>
    </tr>
    <?php
	$i=0;
	while($r1=mysql_fetch_array($q1))
	{
	$i++;
	?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
	  <td> <b><?php echo $r1['Degree']; ?></td>
	  <td> <b><?php echo $r1['Dept']; ?></td>
      <td> <b><?php echo $r1['cutoff']; ?></td>
      <td> <b><?php echo $r1['amount']; ?></td>
      <td> <b><?php echo $r1['amount2']; ?></td></b>
      <td> <b><?php echo '<a href="edit_cut.php?id='.$r1['id'].'">Edit</a>'; ?></td>
    </tr>
    <?php
	}
	?>
  </table>
  <?php
  }
  
  ?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>