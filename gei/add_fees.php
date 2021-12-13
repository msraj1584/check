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
	if($dept=="Other")
	{
	$dept=$dept11;
	}
		$mq1=mysql_query("select max(id) from dept");
		$mr1=mysql_fetch_array($mq1);
		$id1=$mr1['max(id)']+1;
		mysql_query("insert into dept(id,dept,degree,code,course_type,community,gq,gqfees,mq,mqfees) values($id1,'$dept','$degree','$code','$course_type','$community','$gq','$gqfees','$mq',$mqfees)");
?>
<script language="javascript">
window.location.href="add_fees.php?act=success";
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
      <th align="left" scope="col"><input type="radio" name="degree" value="B.E" onClick="this.form.submit()" <?php if($degree=="B.E") echo "checked"; ?> />
B.E.
  <input type="radio" name="degree" value="M.E" onClick="this.form.submit()" <?php if($degree=="M.E") echo "checked"; ?> />
M.E.
<input type="radio" name="degree" value="M.B.A" onClick="this.form.submit()" <?php if($degree=="M.B.A") echo "checked"; ?> />
M.B.A.
<input type="radio" name="degree" value="M.C.A" onClick="this.form.submit()" <?php if($degree=="M.C.A") echo "checked"; ?> />
M.C.A.
<input type="radio" name="degree" value="B.Ed" onClick="this.form.submit()" <?php if($degree=="B.Ed") echo "checked"; ?> />
B.Ed.
<input type="radio" name="degree" value="M.Ed" onClick="this.form.submit()" <?php if($degree=="M.Ed") echo "checked"; ?> />
M.Ed.
<input type="radio" name="degree" value="B.Sc.,B.Ed" onClick="this.form.submit()" <?php if($degree=="B.Sc.,B.Ed") echo "checked"; ?> />
B.Sc., B.Ed. </th>
    </tr>
    <tr>
      <th width="88" align="left" scope="col">Dept</th>
      <th width="650" align="left" scope="col"><div id="x1" style="display:block">
	  <select name="dept" onChange="getRefer1()">
	  <option value="">-Department-</option>
	  <?php
	  $fq1=mysql_query("select * from dept where degree='$degree'");
	  while($fr1=mysql_fetch_array($fq1))
	  {
	  ?>
	  <option value="<?php echo $fr1['dept']; ?>" <?php if($dept==$fr1['dept']) echo "selected"; ?>><?php echo $fr1['dept']; ?></option>
	  <?php
	  }
	  ?>
	  <option value="Other">Other</option>
      </select>
	  <span id="y1" style="display:none"><input type="text" name="dept11" value="<?php echo $dept11; ?>" /></span>
	  </div></th>
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
      <td align="left"><input type="text" name="code" value="<?php echo $code; ?>" /></td>
    </tr>
    
	<tr>
      <th align="left" scope="row">Seats in GQ</th>
      <td align="left"><input type="text" name="gq" value="<?php echo $gq; ?>" /></td>
    </tr>
	<tr>
      <th align="left" scope="row">GQ Fees</th>
      <td align="left"><input type="text" name="gqfees" value="<?php echo $gqfees; ?>" /></td>
    </tr>
	<tr>
      <th align="left" scope="row">Seats in MQ</th>
      <td align="left"><input type="text" name="mq" value="<?php echo $mq; ?>" /></td>
    </tr>
	<tr>
      <th align="left" scope="row">MQ Fees</th>
      <td align="left"><input type="text" name="mqfees" value="<?php echo $mqfees; ?>" /></td>
    </tr>
    
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left">&nbsp;</td>
    </tr><script>
  function clickAlert() {
    alert("Fees Added Successfully");
}
</script>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left"><input type="submit" name="btn" value="Add Fees" onclick="clickAlert()"/></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p align="center">
    <?php
  $q1=mysql_query("select * from dept");
	$n1=mysql_num_rows($q1);
	if($n1>0)
	{
  ?>
</p>
  <table width="926" border="1" align="center">
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Degree</th>
      <th scope="col">Department</th>
      <th scope="col">Code</th>
      <th scope="col">Course_type</th>
      <th scope="col">Community</th>
      <th scope="col">Seats in GQ</th>
	  <th scope="col">GQ Fees</th>
	  <th scope="col">Seats in MQ</th>
	  <th scope="col">MQ Fees</th>
      <th scope="col">Update Fees</th>
    </tr>
    <?php
	$i=0;
	while($r1=mysql_fetch_array($q1))
	{
	$i++;
	?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $r1['degree']; ?></td>
      <td><?php echo $r1['dept'];?></td>
      <td><?php echo $r1['code']; ?></td>
      <td><?php echo $r1['course_type']; ?></td>
      <td><?php echo $r1['community']; ?></td>
	  <td><?php echo $r1['gq']; ?></td>
	  <td><?php echo $r1['gqfees']; ?></td>
      <td><?php echo $r1['mq']; ?></td>
	  <td><?php echo $r1['mqfees']; ?></td>
      <td><?php echo '<a href="edit_fee.php?id='.$r1['id'].'">Edit</a>'; ?></td>
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