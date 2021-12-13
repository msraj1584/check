<?php
session_start();
if($_SESSION['user']!='Gate'){
	header("location:index.php");
}
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
if(isset($btn))
{
	$mq=mysql_query("select max(id) from students");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;

	
	
	$adate=date("d-m-Y");
	$mm=date('m');
	$yy=date('y');
	$year=date("Y");
	
	
	$q1=mysql_query("select * from students where adate='$adate'");
	$n1=mysql_num_rows($q1);
	$gpas=$n1+1;
	$gpass="G".$gpas;
	
	mysql_query("insert into students(id,utype,entryby,gpass,sname,mobile,ref_name,adate,month,year,reason) values($id,'Visitor','$uname','$gpass','$name','$mobile','$visit_to','$adate','$mm','$year','$reason')");
	$ec= mysql_query("SELECT id FROM students ORDER BY id DESC LIMIT 1");
	$no1=mysql_fetch_array($ec);
	$no=$no1['id'];
	?>
	<script language="javascript">
	alert("Your entry has added..");
	window.open("gate_print_vi.php?no=<?php echo $no?>", "_blank");
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
<style type="text/css">
<!--
.style1 {font-size: 36px};
</style>
<script language="javascript">
function getRefer()
{
	if(document.form1.refer.value=="Student")
	{
	document.getElementById("x1").style.display="block";
	document.getElementById("x2").style.display="none";
	document.getElementById("x3").style.display="none";
	document.getElementById("x4").style.display="none";
	}
	if(document.form1.refer.value=="Staff")
	{
	document.getElementById("x1").style.display="none";
	document.getElementById("x2").style.display="block";
	document.getElementById("x3").style.display="none";
	document.getElementById("x4").style.display="none";
	}
	if(document.form1.refer.value=="Consultancy")
	{
	document.getElementById("x1").style.display="none";
	document.getElementById("x2").style.display="none";
	document.getElementById("x3").style.display="block";
	document.getElementById("x4").style.display="none";
	}
	if(document.form1.refer.value=="Other")
	{
	document.getElementById("x1").style.display="none";
	document.getElementById("x2").style.display="none";
	document.getElementById("x3").style.display="none";
	document.getElementById("x4").style.display="block";
	}
}
function getRefer1()
{

	if(document.form1.refer1.value=="Other")
	{
	
	document.getElementById("y1").style.display="block";
	document.getElementById("y2").style.display="none";
	document.getElementById("y3").style.display="none";
	document.getElementById("y4").style.display="none";
	}
}
function getRefer2()
{
	if(document.form1.refer2.value=="Other")
	{
	document.getElementById("y1").style.display="none";
	document.getElementById("y2").style.display="block";
	document.getElementById("y3").style.display="none";
	document.getElementById("y4").style.display="none";
	}
}
function getRefer3()
{
	if(document.form1.refer3.value=="Other")
	{
	document.getElementById("y1").style.display="none";
	document.getElementById("y2").style.display="none";
	document.getElementById("y3").style.display="block";
	document.getElementById("y4").style.display="none";
	}
}
function getRefer4()
{
	if(document.form1.refer4.value=="Other")
	{
	document.getElementById("y1").style.display="none";
	document.getElementById("y2").style.display="none";
	document.getElementById("y3").style.display="none";
	document.getElementById("y4").style.display="block";
	}
}
</script>
</head>

<body>
<form autocomplete="off"  id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_gate.php"); ?>
  <h3 align="center">Visitor Form </h3>
  <table width="589" border="0" align="center" cellpadding="5" cellspacing="5" class="bor">
    <tr>
      <th width="113" align="left" scope="col">Visitor Name</th>
      <th width="441" align="left" scope="col"><input type="text" name="name" /></th>
    </tr>
    <tr>
      <th align="left" scope="row">Visit To </th>
      <td align="left"><input type="text" name="visit_to" /></td>
	</tr>
	<tr>
      <th align="left" scope="row">Mobile  </th>
      <td align="left"><input type="text" name="mobile" /></td>
	</tr>
	<tr>
      <th align="left" scope="row">Purpose  </th>
      <td align="left"><input type="text" name="reason" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left"><input type="submit" name="btn" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<iframe src="create.php" width="100" height="100" frameborder="0"></iframe>
</body>
</html>