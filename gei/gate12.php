<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

if(isset($btn))
{
	$mq=mysql_query("select max(id) from students");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;

	if($refer=="Student")
	{
		if($refer1=="Other")
		{
		$ref_name=$refer11;
		$ref_address=$refer12;
		$ref_cellno=$refer13;
		$ref_email=$refer14;
		$mq1=mysql_query("select max(id) from refer1");
		$mr1=mysql_fetch_array($mq1);
		$id1=$mr1['max(id)']+1;
		mysql_query("insert into refer1(id,name,address,cellno,email) values($id1,'$ref_name','$ref_address','$ref_cellno','$ref_email')");
		}
		else
		{
		$ref_name=$refer1;
		}
	}
	else  if($refer=="Staff")
	{
		if($refer2=="Other")
		{
		$ref_name=$refer22;
		$mq2=mysql_query("select max(id) from refer2");
		$mr2=mysql_fetch_array($mq2);
		$id2=$mr2['max(id)']+1;
		mysql_query("insert into refer2(id,name) values($id2,'$ref_name')");
		}
		else
		{
		$ref_name=$refer2;
		}
	}
	else if($refer=="Consultancy")
	{
		if($refer3=="Other")
		{
		$ref_name=$refer33;
		$mq3=mysql_query("select max(id) from refer3");
		$mr3=mysql_fetch_array($mq3);
		$id3=$mr3['max(id)']+1;
		mysql_query("insert into refer3(id,name) values($id3,'$ref_name')");
		}
		else
		{
		$ref_name=$refer3;
		}
	}
	else if($refer=="Other")
	{
		if($refer4=="Other")
		{
		$ref_name=$refer44;
		$mq4=mysql_query("select max(id) from refer4");
		$mr4=mysql_fetch_array($mq4);
		$id4=$mr4['max(id)']+1;
		mysql_query("insert into refer4(id,name) values($id4,'$ref_name')");
		}
		else
		{
		$ref_name=$refer4;
		}
	}
	
	
	$adate=date("d-m-Y");
	$mm=date('m');
	$yy=date('y');
	$year=date("Y");
	
	$mq2=mysql_query("select * from students where utype='Admission'");
$mn2=mysql_num_rows($mq2);
$id2=$mn2+1;
	
	$eno="E".$id2;
	$str=str_pad($id2,3,"0",STR_PAD_LEFT);
	$adminno="A".$mm.$yy.$str;
	
	$q1=mysql_query("select * from students where adate='$adate'");
	$n1=mysql_num_rows($q1);
	$gpas=$n1+1;
	$gpass="G".$gpas;
	
	mysql_query("insert into students(id,utype,entryby,eno,adminno,gpass,sname,refer,ref_name,adate,month,year) values($id,'Admission','$uname','$eno','','$gpass','$name','$refer','$ref_name','$adate','$mm','$year')");
	?>
	<script language="javascript">
	alert("Your entry has added..");
	window.location.href="view_gate2.php";
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
.style1 {font-size: 36px}
-->
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
	
	document.getElementById("y10").style.display="block";
	document.getElementById("y11").style.display="block";
	document.getElementById("y12").style.display="block";
	document.getElementById("y13").style.display="block";
	document.getElementById("y2").style.display="none";
	document.getElementById("y3").style.display="none";
	document.getElementById("y4").style.display="none";
	}
	else
	{
	document.getElementById("y1").style.display="none";
	document.getElementById("y2").style.display="none";
	document.getElementById("y3").style.display="none";
	document.getElementById("y4").style.display="none";
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
	else
	{
	document.getElementById("y1").style.display="none";
	document.getElementById("y2").style.display="none";
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
	else
	{
	document.getElementById("y1").style.display="none";
	document.getElementById("y2").style.display="none";
	document.getElementById("y3").style.display="none";
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
	else
	{
	document.getElementById("y1").style.display="none";
	document.getElementById("y2").style.display="none";
	document.getElementById("y3").style.display="none";
	document.getElementById("y4").style.display="none";
	}
}
</script>
</head>

<body>
<form autocomplete="off"  id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_gate.php"); ?>
  <h3 align="center">Entry Form </h3>
  <table width="589" border="0" align="center" cellpadding="5" cellspacing="5" class="bor">
    <tr>
      <th width="113" align="left" scope="col">Student Name</th>
      <th width="441" align="left" scope="col"><input type="text" name="name" /></th>
    </tr>
    <tr>
      <th align="left" scope="row">Reference</th>
      <td align="left"><input name="refer" type="radio" value="Student" onClick="getRefer()" />
        Student 
        <input name="refer" type="radio" value="Staff" onClick="getRefer()" />
        Staff 
        <input name="refer" type="radio" value="Consultancy" onClick="getRefer()" />
        Consultancy
        <input name="refer" type="radio" value="Other" onClick="getRefer()" />
        Others</td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left">
	  <div id="x1" style="display:none">
	  <select name="refer1" onChange="getRefer1()">
	  <option value="">-Select-</option>
	  <?php
	  $fq1=mysql_query("select * from refer1");
	  while($fr1=mysql_fetch_array($fq1))
	  {
	  ?>
	  <option value="<?php echo $fr1['name']; ?>"><?php echo $fr1['name']; ?></option>
	  <?php
	  }
	  ?>
	  <option value="Other">Other</option>
      </select>
	  <span id="y1" style="display:none"><input type="text" name="refer11" /></span>
	  </div>
	  
	  <div id="x2" style="display:none">
	  <select name="refer2" onChange="getRefer2()">
	  <option value="">-Select-</option>
	  <?php
	  $fq2=mysql_query("select * from refer2");
	  while($fr2=mysql_fetch_array($fq2))
	  {
	  ?>
	  <option value="<?php echo $fr2['name']; ?>"><?php echo $fr2['name']; ?></option>
	  <?php
	  }
	  ?>
	  <option value="Other">Other</option>
      </select>
	  <span id="y2" style="display:none"><input type="text" name="refer22" /></span>
	  </div>
	  
	  
	  <div id="x3" style="display:none">
	  <select name="refer3" onChange="getRefer3()">
	  <option value="">-Select-</option>
	  <?php
	  $fq3=mysql_query("select * from refer3");
	  while($fr3=mysql_fetch_array($fq3))
	  {
	  ?>
	  <option value="<?php echo $fr3['name']; ?>"><?php echo $fr3['name']; ?></option>
	  <?php
	  }
	  ?>
	  <option value="Other">Other</option>
      </select>
	  <span id="y3" style="display:none"><input type="text" name="refer33" /></span>
	  </div>
	  
	   <div id="x4" style="display:none">
	  <select name="refer4" onChange="getRefer4()">
	  <option value="">-Select-</option>
	  <?php
	  $fq4=mysql_query("select * from refer4");
	  while($fr4=mysql_fetch_array($fq4))
	  {
	  ?>
	  <option value="<?php echo $fr4['name']; ?>"><?php echo $fr4['name']; ?></option>
	  <?php
	  }
	  ?>
	  <option value="Other">Other</option>
      </select>
	  <span id="y4" style="display:none"><input type="text" name="refer44" /></span>
	  </div>
      </td>
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
</body>
</html>