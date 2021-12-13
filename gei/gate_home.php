<?php
session_start();
if($_SESSION['user']!='Gate'){
	header("location:index.php");
}
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
		$mq1=mysql_query("select max(id) from refer1");
		$mr1=mysql_fetch_array($mq1);
		$id1=$mr1['max(id)']+1;
		mysql_query("insert into refer1(id,name) values($id1,'$ref_name')");
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
	else  if($refer=="Consultancy")
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
	$str=str_pad($id,3,"0",STR_PAD_LEFT);
	$adminno="A".$mm.$yy.$str;
	
	$q1=mysql_query("select * from students where adate='$adate'");
	$n1=mysql_num_rows($q1);
	$gpas=$n1+1;
	$gpass="G".$gpas;
	
	mysql_query("insert into students(id,adminno,gpass,sname,refer,ref_name,adate) values($id,'$adminno','$gpass','$name','$refer','$ref_name','$adate')");
	?>
	<script language="javascript">
	alert("Your entry has added..");
	window.location.href="view_gate.php";
	</script>
	<?php

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>GEI Gate</title>
	<link rel="stylesheet" href="gate_style.css">
  </head>
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
 <div class="container">
	 koklo
 </div>
</form>
</body>
</html>