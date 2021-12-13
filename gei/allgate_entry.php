<?php
session_start();
if($_SESSION['user']!='Gate'){
	header("location:index.php");
}
include("dbconnect.php");
extract($_REQUEST);
$adate=date("d-m-Y");

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

</head>

<body>
<form autocomplete="off"  id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_gate.php"); ?>
  <h3 align="center">Admission Details </h3>
  <?php
  $q1=mysql_query("select * from students where utype='Admission'");
	$n1=mysql_num_rows($q1);
	if($n1>0)
	{
  ?>
  <table width="708" border="1" align="center">
    <tr>
      <th width="50" scope="col">S.No</th>
      <th width="113" scope="col">Enquiry No. </th>
      <th width="137" scope="col">Gate Pass </th>
      <th width="78" scope="col">Name</th>
      <th width="221" scope="col">Reference</th>
      <th width="69" scope="col">Date</th>
    </tr>
	<?php
	$i=0;
	while($r1=mysql_fetch_array($q1))
	{
	$i++;
	?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $r1['eno']; ?></td>
      <td><?php echo $r1['gpass'];?></td>
      <td><?php echo $r1['sname']; ?></td>
      <td><?php 
	  if($r1['utype']=="Visitor")
	  {
	  echo "-";
	  }
	  else
	  {
	  echo $r1['refer']." - ".$r1['ref_name']; 
	  }
	  ?></td>
      <td><?php echo $r1['adate']; ?></td>
    </tr>
	<?php
	}
	?>
  </table>
  
    <?php
  }
  else
  {
  echo '<div align="center">No New Entries..</div>';
  }
  ?>
  
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<iframe src="create.php" width="100" height="100" frameborder="0"></iframe>
</body>
</html>