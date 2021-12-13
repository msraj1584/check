<?php
session_start();
if($_SESSION['user']!='Certificate'){
	header("location:index_cer.php");
}
include("dbconnect.php");
extract($_REQUEST);
$q1=mysql_query("select * from students where id=$id");
$r1=mysql_fetch_array($q1);
$yr2=date("y");
$year=date("Y");
if(isset($btn))
{
		if($dept=="Other")
		{
			$q12=mysql_query("select * from dept where dept='$dept' && degree='$degree'");
			$n12=mysql_num_rows($q12);
			if($n12==0)
			{
		$dept=$dept11;
		$mq1=mysql_query("select max(id) from dept");
		$mr1=mysql_fetch_array($mq1);
		$id1=$mr1['max(id)']+1;
		mysql_query("insert into dept(id,dept,degree) values($id1,'$dept','$degree')");
			}
		}
		if($district=="Other")
		{
		$district=$district11;
		$mq11=mysql_query("select max(id) from district");
		$mr11=mysql_fetch_array($mq11);
		$id11=$mr11['max(id)']+1;
		mysql_query("insert into district(id,district) values($id11,'$district')");
		}
		if($state=="Other")
		{
		$state=$state11;
		$mq12=mysql_query("select max(id) from state");
		$mr12=mysql_fetch_array($mq12);
		$id12=$mr12['max(id)']+1;
		mysql_query("insert into state(id,state) values($id12,'$state')");
		}
$sslc_per=$sslcmark/5;

//////
	if($r1['degree']!=$degree)
	{
	
$q11=mysql_query("select * from dept where degree='".$degree."' && dept='".$dept."'");
$r11=mysql_fetch_array($q11);
$code=$r11['code'];

$q4=mysql_query("select * from students where year='$year' && degree='$degree' && dept='$dept'");
$n4=mysql_num_rows($q4);
$numb=$n4+1;

	if($college=="GCE")
	{
	$uc="U";
	}
	else
	{
	$uc="";
	}
	
	if($r1['entry']=="Lateral")
	{
	$lt="L";
	}
	else
	{
	$lt="";
	}

$str=str_pad($numb,3,"0",STR_PAD_LEFT);
$adminno=$yr2.$uc.$lt.$code.$str;
	}
	else
	{
	$adminno=$r1['adminno'];
	}
/////

			if($certificate1=="10th Marksheet")
			{
			$cert2[]=$certificate1.":".$sdate1;
			}
			if($certificate2=="12th Marksheet")
			{
			$cert2[]=$certificate2.":".$sdate2;
			}
			if($certificate3=="TC")
			{
			$cert2[]=$certificate3.":".$sdate3;
			}
			if($certificate4=="Degree")
			{
			$cert2[]=$certificate4.":".$sdate4;
			}
			if($certificate5=="Community")
			{
			$cert2[]=$certificate5.":".$sdate5;
			}
			if($certificate6=="Provisional")
			{
			$cert2[]=$certificate6.":".$sdate6;
			}
		


$cert=implode(",",$cert2);
//var_dump($cert);
$bal=$total-($reduce1+$reduce2+$deduction+$amount+$camount);
   $qry=mysql_query("update  students set adminno='$adminno',
   degree='$degree',entry='$entry',dept='$dept',
   pre_degree='$pre_degree',branch='$branch',
   gender='$gender',address='$address',fname='$fname',dob='$dob',community='$community',
   income='$income',phone='$phone',district='$district',
   mobile='$mobile',state='$state',sslcmark='$sslcmark',
   sslc_per='$sslc_per',pincode='$pincode',category='$category',
   boardplace='$boardplace',hqualifi='$hqualifi',regno='$regno',
   cname='$cname',medium='$medium',caddress='$caddress',
   tot_mark='$tot_mark',maths='$maths',physics='$physics',
   chemistry='$chemistry',pcm='$pcm',cutoff='$cutoff',
   subj='$subj',tmark='$tmark',pmark='$pmark',degree1='$degree1',
   dsubj='$dsubj',dtmarks='$dtmarks',dpmarks='$dpmarks',
   ref_name='$ref_name',total='$total',deduction='$deduction',
   fees='$fees',dyear='$dyear',paid='$amount',certificate='$cert',
   xerox='$xerox',merit='$merit',special='$special',govt='$govt',
   camount='$camount',college='$college',photo='$photo',
   dyear1='$dyear1',dyear2='$dyear2',
   reduce1='$reduce1',reduce2='$reduce2',balance='$bal',
   graduate='$graduate' where id=$id");
if($qry)
{

?>
	<script language="javascript">
	alert("Updated Successfully..");
	window.location.href="view_verify.php";
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
<script language="javascript">
function getDept()
{
	if(document.form1.degree.value=="B.E")
	{
	document.getElementById("x1").style.display="block";
	//document.getElementById("x2").style.display="block";
	}
	if(document.form1.degree.value=="M.E")
	{
	document.getElementById("x1").style.display="block";
	//document.getElementById("x2").style.display="block";
	}
	if(document.form1.degree.value=="M.B.A")
	{
	document.getElementById("x1").style.display="block";
	//document.getElementById("x2").style.display="block";
	}
	if(document.form1.degree.value=="M.C.A")
	{
	document.getElementById("x1").style.display="none";
	//document.getElementById("x2").style.display="block";
	}
	if(document.form1.degree.value=="B.Ed")
	{
	document.getElementById("x1").style.display="block";
	//document.getElementById("x2").style.display="none";
	}
	if(document.form1.degree.value=="M.Ed")
	{
	document.getElementById("x1").style.display="block";
	//document.getElementById("x2").style.display="block";
	}
	if(document.form1.degree.value=="B.Sc.,B.Ed")
	{
	document.getElementById("x1").style.display="block";
	//document.getElementById("x2").style.display="none";
	}
}
function getLateral()
{
	if(document.form1.entry.value=="Lateral")
	{
	document.getElementById("x2").style.display="block";
	}
	else 
	{
	document.getElementById("x2").style.display="none";
	}
}
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
function getDist()
{

	if(document.form1.district.value=="Other")
	{
	document.getElementById("yd1").style.display="block";
	}
	else
	{
	document.getElementById("yd1").style.display="none";
	}
}
function getStat()
{

	if(document.form1.state.value=="Other")
	{
	document.getElementById("ys1").style.display="block";
	}
	else
	{
	document.getElementById("ys1").style.display="none";
	}
}
//////
function getMark()
{
var a=document.form1.sslcmark.value;
var b=parseFloat(a)/5;
var c=b+"%";
document.getElementById("mm").innerHTML=c;
}
function getCutoff()
{
var tm=document.form1.tot_mark.value;
var pcm=parseInt(tm)/6;
document.form1.pcm.value=pcm;

var m=document.form1.maths.value;
var p=document.form1.physics.value;
var c=document.form1.chemistry.value;

var p1=parseInt(p)/2;
var c1=parseInt(c)/2;
var co=parseInt(m)+p1+c1;
document.form1.cutoff.value=co;

}
</script>
<script language="javascript">
function getBal()
{
var r1=0,r2=0,ded=0;
	if(document.form1.merit.value=="1")
	{
	r1=parseInt(document.form1.reduce1.value);
	}
	
	if(document.form1.special.value=="1")
	{
	r2=parseInt(document.form1.reduce2.value);
	}
	ded=parseInt(document.form1.deduction.value);
	
var s=r1+r2+ded;
var t=parseInt(document.form1.total.value);
var bal=t-s;
document.form1.bal.value=bal;
document.getElementById("b1").innerHTML=bal;
}
</script>
<style type="text/css">

.style1 {font-size: 36px}

</style>
<link rel="stylesheet" href="date_picker/jquery-ui.css">
	<script src="date_picker/jquery-1.12.4.js"></script>
  <script src="date_picker/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#dob" ).datepicker({ changeMonth: true, changeYear: true, yearRange: "1970:+nn" });
  } );
  
    $( function() {
    $( "#sdate1" ).datepicker({ changeMonth: true, changeYear: true, yearRange: "1970:+nn" });
  } );
  
  $( function() {
    $( "#sdate2" ).datepicker({ changeMonth: true, changeYear: true, yearRange: "1970:+nn" });
  } );
  
  $( function() {
    $( "#sdate3" ).datepicker({ changeMonth: true, changeYear: true, yearRange: "1970:+nn" });
  } );
  
  $( function() {
    $( "#sdate4" ).datepicker({ changeMonth: true, changeYear: true, yearRange: "1970:+nn" });
  } );
  
  $( function() {
    $( "#sdate5" ).datepicker({ changeMonth: true, changeYear: true, yearRange: "1970:+nn" });
  } );
  
  $( function() {
    $( "#sdate6" ).datepicker({ changeMonth: true, changeYear: true, yearRange: "1970:+nn" });
  } );
  
  </script>
</head>
<script>
  window.onload=function(){
  document.getElementByNmae("").click();
};
  </script>
<body>
<form autocomplete="off"  id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_cer.php"); ?>
  <h3 align="center">Edit Information </h3>
  <table width="760" height="72" border="1" align="center">
    <tr>
      <td align="left" scope="col">Degree</td>
      <td colspan="3" align="left" scope="col"><input type="radio" name="degree" value="B.E" onClick="this.form.submit()" <?php if($degree=="") { if($r1['degree']=="B.E") echo "checked"; } else { if($degree=="B.E") echo "checked"; } ?> />
B.E.
  <input type="radio" name="degree" value="M.E" onClick="this.form.submit()" <?php if($degree=="") { if($r1['degree']=="M.E") echo "checked"; } else { if($degree=="M.E") echo "checked"; } ?> />
M.E.
<input type="radio" name="degree" value="M.B.A" onClick="this.form.submit()" <?php if($degree=="") { if($r1['degree']=="M.B.A") echo "checked"; } else { if($degree=="M.B.A") echo "checked"; } ?> />
M.B.A.
<input type="radio" name="degree" value="M.C.A" onClick="this.form.submit()" <?php if($degree=="") { if($r1['degree']=="M.C.A") echo "checked"; } else { if($degree=="M.C.A") echo "checked"; } ?> />
M.C.A.
<input type="radio" name="degree" value="B.Ed" onClick="this.form.submit()" <?php if($degree=="") { if($r1['degree']=="B.Ed") echo "checked"; } else { if($degree=="B.Ed") echo "checked"; } ?> />
B.Ed.
<input type="radio" name="degree" value="M.Ed" onClick="this.form.submit()" <?php if($degree=="") { if($r1['degree']=="M.Ed") echo "checked"; } else { if($degree=="M.Ed") echo "checked"; } ?> />
M.Ed.
<input type="radio" name="degree" value="B.Sc.,B.Ed" onClick="this.form.submit()" <?php if($degree=="") { if($r1['degree']=="B.Sc.,B.Ed") echo "checked";} else { if($degree=="B.Sc.,B.Ed") echo "checked"; } ?> />
B.Sc., B.Ed. </td>
    </tr>
    <tr>
      <td align="left" scope="row">Department</td>
      <td colspan="3" align="left"><div id="x1" style="display:block">
        <select name="dept" onChange="getRefer1()">
          <option value="">-Department-</option>
          <?php
	  $fq1=mysql_query("select * from dept where degree='$degree'");
	  while($fr1=mysql_fetch_array($fq1))
	  {
	  ?>
          <option value="<?php echo $fr1['dept']; ?>" <?php if($dept=="") { if($r1['dept']==$fr1['dept']) echo "selected"; } else { if($dept==$fr1['dept']) echo "selected"; } ?>><?php echo $fr1['dept']; ?></option>
          <?php
	  }
	  ?>
          <option value="Other" <?php if($dept=="") { if($r1['dept']==$fr1['dept']) echo "selected"; } else { if($dept=="Other") echo "selected"; } ?>>Other</option>
        </select>
        <span id="y1" style="display:none">
          <input type="text" name="dept11" value="<?php echo $dept11; ?>" />
      </span> </div></td>
    </tr>
    <tr>
      <td align="left" scope="row">Year &amp; Branch </td>
      <td align="left"><select name="branch">
        <option <?php if($r1['branch']=="First Year") echo "selected"; ?>>First Year</option>
        <option <?php if($r1['branch']=="Second Year") echo "selected"; ?>>Second Year</option>
        <option <?php if($r1['branch']=="Third Year") echo "selected"; ?>>Third Year</option>
        <option <?php if($r1['branch']=="Final Year") echo "selected"; ?>>Final Year</option>
      </select></td>
      <td align="left">Branch</td>
      <td align="left"><select name="entry">
        <!-- onchange="getLateral()"-->
        <option value="">-Select-</option>
        <option value="Regular" <?php if($r1['entry']=="Regular") echo "selected"; ?>>Regular</option>
        <option value="Lateral" <?php if($r1['entry']=="Lateral") echo "selected"; ?>>Lateral</option>
      </select>      </td>
    </tr>
    <tr>
      <td align="left" scope="row">School/College - Degree </td>
      <td align="left"><input type="text" name="pre_degree" value="<?php echo $r1['pre_degree']; ?>" /></td>
      <td align="left">Name</td>
      <td align="left"><input type="text" name="cname" value="<?php echo $r1['cname']; ?>" /></td>
    </tr>
    <tr>
      <td align="right" scope="row">Address</td>
      <td align="left"><textarea name="caddress"><?php echo $r1['caddress']; ?></textarea></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" scope="row">Name of the Student </td>
      <td align="left"><input type="text" name="sname" value="<?php echo $r1['sname']; ?>" /></td>
      <td align="left">Sex</td>
      <td align="left"><label>
        <input name="gender" type="radio" value="Male" <?php if($r1['gender']=="Male") echo "checked"; ?> />
      </label>
Male
<label>
<input name="gender" type="radio" value="Female" <?php if($r1['gender']=="Female") echo "checked"; ?> />
</label>
Female</td>
    </tr>
    <tr>
      <td align="left" scope="row">Father/Guardian Name </td>
      <td align="left"><input type="text" name="fname" value="<?php echo $r1['fname']; ?>" /></td>
      <td align="left">Date of Birth </td>
      <td align="left"><input type="text" name="dob" id="dob" value="<?php echo $r1['dob']; ?>" /></td>
    </tr>
    <tr>
      <td rowspan="3" align="left" scope="row">Address</td>
      <td rowspan="3" align="left"><textarea name="address"><?php echo $r1['address']; ?></textarea></td>
      <td align="left">Community</td>
      <td align="left"><select name="community">
        <option <?php if($r1['community']=="SC") echo "selected"; ?>>SC</option>
        <option <?php if($r1['community']=="ST") echo "selected"; ?>>ST</option>
        <option <?php if($r1['community']=="MBC") echo "selected"; ?>>MBC</option>
        <option <?php if($r1['community']=="BC") echo "selected"; ?>>BC</option>
        <option <?php if($r1['community']=="OC") echo "selected"; ?>>OC</option>
      </select></td>
    </tr>
    <tr>
      <td align="left">Parent Annual Income </td>
      <td align="left"><input type="text" name="income" value="<?php echo $r1['income']; ?>" /></td>
    </tr>
    <tr>
      <td align="left">Parent Mobile No. </td>
      <td align="left"><input type="text" name="phone" value="<?php echo $r1['phone']; ?>" /></td>
    </tr>
    <tr>
      <td align="left" scope="row">District</td>
      <td align="left"><select name="district" onChange="getDist()">
        <option value="">-District-</option>
        <?php
	  $fq11=mysql_query("select * from district");
	  while($fr11=mysql_fetch_array($fq11))
	  {
	  ?>
        <option value="<?php echo $fr11['district']; ?>" <?php if($fr11['district']==$r1['district']) echo "selected"; ?>><?php echo $fr11['district']; ?></option>
        <?php
	  }
	  ?>
        <option value="Other">Other</option>
      </select>
	  <span id="yd1" style="display:none"><input type="text" name="district11" value="<?php echo $r1['district11']; ?>" /></span></td>
      <td align="left">Student Mobile No </td>
      <td align="left"><input type="text" name="mobile" value="<?php echo $r1['mobile']; ?>" /></td>
    </tr>
    <tr>
      <td align="left" scope="row">State </td>
      <td align="left" scope="row"><select name="state" onChange="getStat()">
        <option value="">-State-</option>
        <?php
	  $fq12=mysql_query("select * from state");
	  while($fr12=mysql_fetch_array($fq12))
	  {
	  ?>
        <option value="<?php echo $fr12['state']; ?>" <?php if($fr12['state']==$r1['state']) echo "selected"; ?>><?php echo $fr12['state']; ?></option>
        <?php
	  }
	  ?>
        <option value="Other">Other</option>
      </select>
	  <span id="ys1" style="display:none"><input type="text" name="state11" value="<?php echo $r1['state11']; ?>" /></span></td>
      <td align="left" scope="row">SSLC Marks </td>
      <td align="left" scope="row"><input type="text" name="sslcmark" onBlur="getMark()" value="<?php echo $r1['sslcmark']; ?>" /></td>
    </tr>
    <tr>
      <td align="left" scope="row">Pincode</td>
      <td align="left"><input type="text" name="pincode" value="<?php echo $r1['pincode']; ?>" /></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" scope="row">Category</td>
      <td colspan="3" align="left"><label>
        <input type="checkbox" name="category" value="Dayscholar" <?php if($r1['category']=="Dayscholar") echo "checked"; ?> />
      </label>
Dayscholar
<label></label>
Boarding Place:
<label></label>
<label>
<input type="text" name="boardplace" value="<?php echo $r1['boardplace']; ?>" />
</label>
<label>
<input type="checkbox" name="category" value="Hostel" <?php if($r1['category']=="Hostel") echo "checked"; ?> />
</label>
Hostel</td>
    </tr>
    <tr>
      <td align="left" scope="row">Exam Reg No :
      <label></label></td>
      <td align="left"><input type="text" name="regno" value="<?php echo $r1['regno']; ?>" /></td>
      <td align="left">Medium of Study </td>
      <td align="left"><select name="medium">
        <option <?php if($r1['medium']=="Tamil") echo "selected"; ?>>Tamil</option>
        <option <?php if($r1['medium']=="English") echo "selected"; ?>>English</option>
      </select></td>
    </tr>
    <tr>
      <td align="left" scope="row">HSC - Total Mark </td>
      <td align="left"><input name="tot_mark" type="text" size="6" value="<?php echo $r1['tot_mark']; ?>" onBlur="getCutoff()" /></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" scope="row">Maths</td>
      <td align="left"><input type="text" name="maths" value="<?php echo $r1['maths']; ?>" onBlur="getCutoff()" /></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" scope="row">Physics/Voc Theory</td>
      <td align="left"><input type="text" name="physics" value="<?php echo $r1['physics']; ?>" onBlur="getCutoff()" /></td>
      <td align="left">PCM % </td>
      <td align="left">Cut of Mark out of 200</td>
    </tr>
    <tr>
      <td align="right" scope="row">Chemistry/Voc Practical </td>
      <td align="left"><input type="text" name="chemistry" value="<?php echo $r1['chemistry']; ?>" onBlur="getCutoff()" /></td>
      <td align="left"><input type="text" name="pcm" value="<?php echo $r1['pcm']; ?>" onFocus="getCutoff()" /></td>
      <td align="left"><input type="text" name="cutoff" value="<?php echo $r1['cutoff']; ?>" onFocus="getCutoff()" /></td>
    </tr>
    <tr>
      <td align="left" scope="row">Diploma</td>
      <td align="left">Subject</td>
      <td align="left">Total Marks</td>
      <td align="left">% of Marks</td>
    </tr>
    <tr>
      <td align="left" scope="row">&nbsp;</td>
      <td align="left"><input type="text" name="subj" value="<?php echo $r1['subj']; ?>" /></td>
      <td align="left"><input type="text" name="tmark" value="<?php echo $r1['tmark']; ?>" /></td>
      <td align="left"><input type="text" name="pmark" value="<?php echo $r1['pmark']; ?>" /></td>
    </tr>
    <tr>
      <td align="left" scope="row">Degree</td>
      <td align="left">Subject</td>
      <td align="left">Total Marks</td>
      <td align="left">% of Marks</td>
    </tr>
    <tr>
      <td align="left" scope="row"><input type="text" name="degree1" value="<?php echo $r1['degree1']; ?>" /></td>
      <td align="left"><input type="text" name="dsubj" value="<?php echo $r1['dsubj']; ?>" /></td>
      <td align="left"><input type="text" name="dtmarks" value="<?php echo $r1['dtmarks']; ?>" /></td>
      <td align="left"><input type="text" name="dpmarks" value="<?php echo $r1['dpmarks']; ?>" /></td>
    </tr>
    <tr>
      <td align="left" scope="row">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" scope="row">Reference</td>
      <td align="left"><input type="text" name="ref_name" value="<?php echo $r1['ref_name']; ?>" readonly/></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" scope="row">Merit Scholar </td>
      <td align="left"><input name="merit" type="radio" value="1" <?php if($r1['merit']=="1") echo "checked"; ?> />
Yes
  <input name="merit" type="radio" value="0" <?php if($r1['merit']=="0") echo "checked"; ?> />
No</td>
      <td align="left"><select name="dyear1">
        <option value="">-Select-</option>
        <option <?php if($r1['dyear1']=="Sem only") echo "selected"; ?>>Sem only</option>
        <option <?php if($r1['dyear1']=="One year only") echo "selected"; ?>>One year only</option>
        <option <?php if($r1['dyear1']=="All year") echo "selected"; ?>>All year</option>
      </select></td>
      <td align="left">Reduction
      <input type="text" name="reduce1" value="<?php echo $r1['reduce1']; ?>" /></td>
    </tr>
    <tr>
      <td align="left" scope="row">Special Scholar </td>
      <td align="left"><input name="special" type="radio" value="1" <?php if($r1['special']=="1") echo "checked"; ?> />
Yes
  <input name="special" type="radio" value="0" <?php if($r1['special']=="0") echo "checked"; ?> />
No </td>
      <td align="left"><select name="dyear2">
        <option value="">-Select-</option>
        <option <?php if($r1['dyear2']=="Sem only") echo "selected"; ?>>Sem only</option>
        <option <?php if($r1['dyear2']=="One year only") echo "selected"; ?>>One year only</option>
        <option <?php if($r1['dyear2']=="All year") echo "selected"; ?>>All year</option>
      </select></td>
      <td align="left">Reduction
      <input type="text" name="reduce2" value="<?php echo $r1['reduce2']; ?>" /></td>
    </tr>
    <tr>
      <td align="left" scope="row">Cutoff</td>
      <td align="left"><?php echo $r1['cutoff']; ?></td>
      <td align="left">Graduate</td>
      <td align="left"><input name="graduate" type="radio" value="First Graduate" onclick="this.form.submit()" <?php if($graduate=="") { if($r1['graduate']=="First Graduate") echo "checked";  } else { if($graduate=="First Graduate") echo "checked"; } ?> />
First Graduate
  <input name="graduate" type="radio" value="Non First Graduate" onclick="this.form.submit()" <?php if($graduate=="") { if($r1['graduate']=="Non First Graduate") echo "checked";  } else { if($graduate=="Non First Graduate") echo "checked"; } ?> />
Non First Graduate </td>
    </tr>
    <tr>
      <td align="left" scope="row"> Quota </td>
      <td align="left"><input name="govt" type="radio" value="Government" <?php if($r1['govt']=="Government") echo "checked"; ?> />
Government
  <input name="govt" type="radio" value="Management"  <?php if($r1['govt']=="Management") echo "checked"; ?> />
Management </td>
      <td align="left">Cutoff Reduction </td>
      <td align="left"><?php
	   if($r1['cutoff']!="")
	  {
		  $q4=mysql_query("select * from cutoff where cutoff<=".$r1['cutoff']." order by cutoff desc");
		  $n4=mysql_num_rows($q4);
		  if($n4>0)
		  {
		  $r4=mysql_fetch_array($q4);
		  	if($graduate=="First Graduate")
			{
		  $camount1=$r4['amount'];
		  	}
			else
			{
		$camount1=$r4['amount2'];	
			}
		  //echo " Reduction Rs.$camount";
		  }
		  else
		  {
		  $camount1=0;
		  }
	}
	else
	{
	$camount1=0;
	}	  
	  ?>
        <input type="text" name="camount" value="<?php if($camount=="") { echo $r1['camount']; } else { echo $camount1; } ?>" readonly/></td>
    </tr>
    <tr>
      <td align="left" scope="row">Total Fees</td>
      <td align="left"><input type="text" name="total" value="<?php echo $r1['total']; ?>" readonly/></td>
      <td align="left">Deduction</td>
      <td align="left"><input type="text" name="deduction" value="<?php echo $r1['deduction']; ?>" readonly /></td>
    </tr>
    <tr>
      <td align="left" scope="row">Year</td>
      <td align="left"><select name="dyear">
        <option <?php if($r1['dyear']=="One year only") echo "selected"; ?>>One year only</option>
        <option <?php if($r1['dyear']=="All year") echo "selected"; ?>>All year</option>
      </select></td>
      <td align="left">Paid Amount </td>
      <td align="left"><input type="text" name="amount" value="<?php echo $r1['paid']; ?>" readonly/></td>
    </tr>
    <tr>
      <td align="left" scope="row">Original Certificate Submitted</td>
      <td colspan="3" align="left" valign="top">
	  
	  <?php
	  
	  $pos=strpos($r1['certificate'],"10th Marksheet");
	  $pos2=strpos($r1['certificate'],"12th Marksheet");
	  $pos3=strpos($r1['certificate'],"TC");
	  $pos4=strpos($r1['certificate'],"Degree");
	  $pos5=strpos($r1['certificate'],"Community");
	  $pos6=strpos($r1['certificate'],"Provisional");

	  
	  
	  ?>
	  <table width="530" border="1">
  <tr>
    <th align="left" scope="col">Certificate</th>
    <th align="left" scope="col">Date of Submission </th>
  </tr>
  <tr>
    <td width="188" align="left" scope="col"><input type="checkbox" name="certificate1" value="10th Marksheet" <?php if($certificate1=="") { if($pos===false) { } else { $cdt=@explode("10th Marksheet",$r1['certificate']);  $sd1=substr($cdt[1],1,10);  echo "checked"; } } else { if($certificate1=="10th Marksheet") echo "checked"; } ?> />
      10th Marksheet </td>
    <td width="326" align="left" scope="col"><input type="text" name="sdate1" id="sdate1" value="<?php if($sdate1=="") { echo $sd1; } else { echo $sdate1; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" scope="row"><br />
        <input type="checkbox" name="certificate2" value="12th Marksheet" <?php if($certificate2=="") { if($pos2===false) { } else { $cdt=@explode("12th Marksheet",$r1['certificate']);  $sd2=substr($cdt[1],1,10); echo "checked"; } } else { if($certificate2=="12th Marksheet") echo "checked"; } ?> />
      12th Marksheet </td>
    <td align="left"><input type="text" name="sdate2" id="sdate2" value="<?php if($sdate2=="") { echo $sd2; } else { echo $sdate2; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" scope="row"><input type="checkbox" name="certificate3" value="TC" <?php if($certificate3=="") { if($pos3===false) { } else { $cdt=@explode("TC",$r1['certificate']);  $sd3=substr($cdt[1],1,10); echo "checked"; }  } else { if($certificate3=="TC") echo "checked"; } ?> />
      TC </td>
    <td align="left"><input type="text" name="sdate3" id="sdate3" value="<?php if($sdate3=="") { echo $sd3; } else { echo $sdate3; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" scope="row"><input type="checkbox" name="certificate4" value="Degree" <?php if($certificate4=="") { if($pos4===false) { } else { $cdt=@explode("Degree",$r1['certificate']);  $sd4=substr($cdt[1],1,10); echo "checked"; }  } else { if($certificate4=="Degree") echo "checked"; } ?>  />
      Degree </td>
    <td align="left"><input type="text" name="sdate4" id="sdate4" value="<?php if($sdate4=="") { echo $sd4; } else { echo $sdate4; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" scope="row"><input type="checkbox" name="certificate5" value="Community" <?php if($certificate5=="") { if($pos5===false) { } else { $cdt=@explode("Community",$r1['certificate']);  $sd5=substr($cdt[1],1,10); echo "checked"; }  } else { if($certificate5=="Community") echo "checked"; } ?> />
      Community </td>
    <td align="left"><input type="text" name="sdate5" id="sdate5" value="<?php if($sdate5=="") { echo $sd5; } else { echo $sdate5; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" scope="row"><input type="checkbox" name="certificate6" value="Provisional" <?php if($certificate6=="") { if($pos6===false) { } else { $cdt=@explode("Provisional",$r1['certificate']);  $sd6=substr($cdt[1],1,10); echo "checked"; }  } else { if($certificate6=="Provisional") echo "checked"; } ?> />
      Provisional </td>
    <td align="left"><input type="text" name="sdate6" id="sdate6" value="<?php if($sdate6=="") { echo $sd6; } else { echo $sdate6; } ?>" /></td>
  </tr>
</table></td>
    </tr>
    <tr>
      <td align="left" scope="row">No. of Xerox</td>
      <td align="left"><input name="xerox" type="text" value="<?php echo $r1['xerox']; ?>" /></td>
      <td align="left">Passport Size Photo </td>
      <td align="left"><input name="photo" type="text" value="<?php echo $r1['photo']; ?>" /></td>
    </tr>
    <tr>
      <td align="left" scope="row">College</td>
      <td align="left"><select name="college">
        <option <?php if($r1['college']=="GCT") echo "selected"; ?>>GCT</option>
        <option <?php if($r1['college']=="GCE") echo "selected"; ?>>GCE</option>
        <option <?php if($r1['college']=="GIMS") echo "selected"; ?>>GIMS</option>
        <option <?php if($r1['college']=="GCEd") echo "selected"; ?>>GCEd</option>
        <option <?php if($r1['college']=="GICEd") echo "selected"; ?>>GICEd</option>
      </select></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
  </table>
  <p align="center">
    <input type="submit" name="btn" value="Update" />
  </p>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
</form>
<iframe src="create.php" width="100" height="100" frameborder="0"></iframe>
</body>
</html>