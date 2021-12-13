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
		$ref_add=$refer12;
		$ref_cellno=$refer13;
		$ref_email=$refer14;
		$mq1=mysql_query("select max(id) from refer1");
		$mr1=mysql_fetch_array($mq1);
		$id1=$mr1['max(id)']+1;
		mysql_query("insert into refer1(id,name,address,cellno,email) values($id1,'$ref_name','$ref_add','$ref_cellno','$ref_email')");
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
		$ref_add=$refer23;
		$ref_cellno=$refer24;
		$ref_email=$refer25;
		
		$mq2=mysql_query("select max(id) from refer2");
		$mr2=mysql_fetch_array($mq2);
		$id2=$mr2['max(id)']+1;
		mysql_query("insert into refer2(id,name,address,cellno,email) values($id2,'$ref_name','$ref_add','$ref_cellno','$ref_email')");
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
		$ref_add=$refer34;
		$ref_cell=$refer35;
		$ref_email=$refer36;
		$mq3=mysql_query("select max(id) from refer3");
		$mr3=mysql_fetch_array($mq3);
		$id3=$mr3['max(id)']+1;
		mysql_query("insert into refer3(id,name,address,cellno,email) values($id3,'$ref_name','$ref_add','$ref_cell','$ref_email')");
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
		$ref_add=$refer45;
		$ref_cell=$refer46;
		$ref_email=$refer47;
		$mq4=mysql_query("select max(id) from refer4");
		$mr4=mysql_fetch_array($mq4);
		$id4=$mr4['max(id)']+1;
		mysql_query("insert into refer4(id,name,address,cellno,email) values($id4,'$ref_name','$ref_add','$ref_cell','$ref_email')");
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
	$mq12=mysql_query("select * from students where sname='$name'  && fname='$fname'  && dob='$dob' ");
$mn2=mysql_num_rows($mq2);
$rq1=mysql_fetch_array($mq12);
$id2=$mn2+1;
	
	$eno="E".$id2;
	$str=str_pad($id2,3,"0",STR_PAD_LEFT);
	$adminno="A".$mm.$yy.$str;
	
	$q1=mysql_query("select * from students where adate='$adate'");
	$n1=mysql_num_rows($q1);
	$gpas=$n1+1;
	$gpass="G".$gpas;
	//var_dump($rq1['dob']);
	
if($rq1['sname']==$name && $rq1['fname']==$fname && $rq1['dob']==$dob){
?>
	<script language="javascript">
	alert("Already exists");
	window.location.href="gate.php";
	</script>
<?php
}else{
	mysql_query("insert into students(id,utype,entryby,eno,mobile,gpass,sname,fname,dob,refer,ref_name,adate,month,year) 
	                         values($id,'Admission','$uname','$eno','$mobile','$gpass','$name','$fname','$dob','$refer','$ref_name','$adate','$mm','$year')");
	$ec= mysql_query("SELECT id FROM students ORDER BY id DESC LIMIT 1");
	$no1=mysql_fetch_array($ec);
	$no=$no1['id'];
	?>
	<script language="javascript">
	alert("Your entry has added..");
window.open("gate_print_ad.php?no=<?php echo $no?>", "_blank");
	</script>
	<?php

}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">

.style1 {font-size: 36px}

</style> 
<link rel="stylesheet" href="date_picker/jquery-ui.css">
	<script src="date_picker/jquery-1.12.4.js"></script>
  <script src="date_picker/jquery-ui.js"></script><script>
	
$( function() {
    $( "#dob" ).datepicker({ changeMonth: true, changeYear: true, yearRange: "1970:+nn" });
  } );
  </script>
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
	document.getElementById("y11").style.display="block";
	document.getElementById("y111").style.display="block";
	document.getElementById("y1111").style.display="block";
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
}
function getRefer2()
{
	if(document.form1.refer2.value=="Other")
	{
	document.getElementById("y1").style.display="none";
	document.getElementById("y2").style.display="block";
	document.getElementById("y22").style.display="block";
	document.getElementById("y222").style.display="block";
	document.getElementById("y2222").style.display="block";
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
	document.getElementById("y33").style.display="block";
	document.getElementById("y333").style.display="block";
	document.getElementById("y3333").style.display="block";
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
	document.getElementById("y44").style.display="block";
	document.getElementById("y444").style.display="block";
	document.getElementById("y4444").style.display="block";
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
<form autocomplete="off"  autocomplete="off" id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_gate.php"); ?>
  <h3 align="center">Entry Form </h3>
  <table width="589" border="0" align="center" cellpadding="5" cellspacing="5" class="bor">
    <tr>
      <th width="113" align="left" scope="col">Student Name</th>
      <th width="441" align="left" scope="col"><input type="text" name="name" required /></th>
		</tr>
		<tr>
      <th width="113" align="left" scope="col">Father Name</th>
      <th width="441" align="left" scope="col"><input type="text" name="fname" required /></th>
		</tr>
		<tr>
      <th width="113" align="left" scope="col">Mobile</th>
      <th width="441" align="left" scope="col"><input  type="text" name="mobile" required /></th>
		</tr>
		<tr>
      <th width="113" align="left" scope="col">Visit To</th>
      <th width="441" align="left" scope="col"><input  type="text" name="referal" required /></th>
    </tr>
		<tr>
      <th width="113" align="left" scope="col">DOB</th>
      <th width="441" align="left" scope="col"><input id="dob" type="text" name="dob" required /></th>
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
	  <span id="y1" style="display:none"><input type="text" name="refer11" Placeholder="Enter Name with Roll No"  /></span>
	  <span id="y11" style="display:none"><input type="text" name="refer12"  Placeholder="Enter Year & Dept"/></span>
	   <span id="y111" style="display:none"><input type="text" name="refer13"  Placeholder="Enter Mobile No"/></span>
	    <span id="y1111" style="display:none"><input type="text" name="refer14" Placeholder="Enter Email" /></span>
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
	  <span id="y2" style="display:none"><input type="text" name="refer22" Placeholder="Enter Name with Staff Code"  /></span>
	  <span id="y22" style="display:none"><input type="text" name="refer23" Placeholder="Enter Designation & Dept"/></span>
	  <span id="y222" style="display:none"><input type="text" name="refer24" maxlength="10" Placeholder="Enter Mobile No"/></span>
	  <span id="y2222" style="display:none"><input type="email" name="refer25" Placeholder="Enter Email"/></span>
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
	  <span id="y3" style="display:none"><input type="text" name="refer33" Placeholder="Enter Name"   /></span>
	   <span id="y33" style="display:none"><input type="text" name="refer34" Placeholder="Enter Address" /></span>
	   <span id="y333" style="display:none"><input type="text" name="refer35" maxlength="10"  Placeholder="Enter Mobile No" /></span>
	   <span id="y3333" style="display:none"><input type="email" name="refer36" Placeholder="Entel Email"    /></span>
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
	  <span id="y4" style="display:none"><input type="text" name="refer44"   Placeholder="Enter Name"/></span>
	  <span id="y44" style="display:none"><input type="text" name="refer45" Placeholder="Enter Address"  /></span>
	  <span id="y444" style="display:none"><input type="tel" name="refer46" maxlength="10" Placeholder="Enter Mobile No"   /></span>
	  <span id="y4444" style="display:none"><input type="email" name="refer47" Placeholder="Entel Email" /></span>
	  
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
