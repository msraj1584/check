<?php
session_start();
if($_SESSION['user']=='Admin' || $_SESSION['user']=='chairman'){

include("dbconnect.php");
extract($_REQUEST);

if($rdate=="")
{
$rdate=date("d-m-Y");
}

$q11=mysql_query("select * from admin where username='chairman'");
$r11=mysql_fetch_array($q11);


$q21=mysql_query("select * from msg_cnt where name='Report'");
$r21=mysql_fetch_array($q21);

$mobile=$r11['mobile'];

if(isset($btn2))
{
echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$mess.'&number=91'.$mobile.'" style="display:none"></iframe>';
?>
<script language="javascript">
alert("Sent Successfully");
window.location.href="view_report.php";
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

.style1 {font-size: 36px}
td{
	
}
</style>
<link rel="stylesheet" href="date_picker/jquery-ui.css">
	<script src="date_picker/jquery-1.12.4.js"></script>
  <script src="date_picker/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#rdate" ).datepicker({ changeMonth: true, changeYear: true, yearRange: "1970:+nn" });
  } );
  
  
  </script>
</head>

<body>
<form autocomplete="off"  id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php if($_SESSION['user']=='chairman'){
include("link_char.php");
        }else{include("link_admin.php");} ?>
  <h3 align="center">Report</h3>
 
  <?php
 
  	
		$q=" && status='5'";
	
  $q1=mysql_query("select * from students where utype='Admission'  $q");
	$n1=mysql_num_rows($q1);
	if($n1>0)
	{
  ?>
  <table width="1400" border="1" align="center">
    <tr>
      <th scope="col">S.No</th>
      <th width="67" scope="col">Type</th>
      <th scope="col">Admission No</th>
      <th scope="col">Gate Pass No </th>
      <th scope="col">Name</th>
	  <th scope="col">Degree</th>
	  <th scope="col">Department</th>
	  <th scope="col">Year</th>
	  <th scope="col">Course Type</th>
	  <th scope="col">Quota</th>
	  <th scope="col">Parent Mobile No</th>
      <th scope="col">Reference</th>
      <th scope="col">Date</th>
			<th scope="col">Pay Details </th>
			<th scope="col">Approved By</th>
			<th scope="col">Reason</th>
      <th scope="col">View</th>
    </tr>
	<?php
	$i=0;
	$tot=0;
	while($r1=mysql_fetch_array($q1))
	{
	$i++;
	?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $r1['utype']; ?></td>
      <td><?php echo $r1['adminno']; ?></td>
      <td><?php echo $r1['gpass'];?></td>
      <td><?php echo $r1['sname']; ?></td>
	  <td><?php echo $r1['degree']; ?></td>
	  <td><?php echo $r1['dept']; ?></td>
	  <td><?php echo $r1['branch']; ?></td>
	  <td><?php echo $r1['entry']; ?></td>
	  <td><?php echo $r1['govt']; ?></td>
	  <td><?php echo $r1['phone']; ?></td> 
      <td><?php echo $r1['refer']." - ".$r1['ref_name']; ?></td>
      <td><?php echo $r1['adate']; 
	  
	  $dt=explode(" ",$r1['dtime']);
	  echo " ".$dt[1];
	  ?></td>
      <td><?php
	  if($r1['utype']=="Admission")
	  {
	  		if($r1['status']=="2")
			{
	 echo "Total Fees: Rs.".$r1['total'];
	  echo "<br>Cutoff Reduction: Rs.".$r1['camount'];
	   echo "<br>Merit Reduction: Rs.".$r1['reduce1'];
	    echo "<br>Special Reduction: Rs.".$r1['reduce2'];
	  echo "<br>Deduction: Rs.".$r1['deduction'];
	  echo "<br>Paid: Rs.".$r1['paid'];
	  echo "<br>Balance: Rs.".$r1['balance'];
	  echo "<br>Year for Deduction:".$r1['dyear'];
	  $tot+=$r1['paid'];
	  		}
			elseif($r1['status']=="5")
			{echo "Cancelled";}else
			{
			echo "Not Enrolled";
			}
	  }
		?></td>
		  <td><?php echo $r1['approved_by']; ?></td>
	  <td><?php echo $r1['reason']; ?></td> 
      <td>
	  <?php
	  if($r1['utype']=="Admission")
	  {
	  ?>
	  <a href="print2.php?id=<?php echo $r1['id']; ?>" target="_blank">View</a>
	  <?php
	  }
		?></td>
		
    </tr>
	<?php
	}
	?>
  </table>
  <h3 align="center">Total Admission Amount Collected: Rs. <?php echo $tot; ?></h3>
  <?php
  $mgg="";
  $q5=mysql_query("select * from students where adate='$rdate' group by degree");
  while($r5=mysql_fetch_array($q5))
  {
  $deg=$r5['degree'];
  		$q51=mysql_query("select * from students where adate='$rdate' && degree='$deg' group by dept");
		while($r51=mysql_fetch_array($q51))
		{
		$dep=$r51['dept'];
			$q52=mysql_query("select * from students where adate='$rdate' && degree='$deg' && dept='$dep' && govt='Government'");
			$n52=mysql_num_rows($q52);
			$qut1=$n52;
			$q53=mysql_query("select * from students where adate='$rdate' && degree='$deg' && dept='$dep' && govt='Management'");
			$n53=mysql_num_rows($q53);
			$qut2=$n53;
				if($qut1>0)
				{
			$mgg.="$deg $dep ->Govt=$qut1 ";
				}
				if($qut2>0)
				{
			$mgg.="$deg $dep ->Mgmt=$qut2 ";
				}
		}
	}
	$vars = array(
		'{$rdate}'       => $rdate,
		'{$mgg}'        => $mgg
	);
	$message= strtr($r21['header'], $vars);
	
	//var_dump($message);
  ?>
  <p align="center"><a href="printview.php?rdate=<?php echo $rdate; ?>" target="_blank">Print View</a></p>
  <?php
  }
  else
  {
  ?><h4 align="center" style="color:#FF9900">No New Entries..</h4><?php
  }
  
  
  ?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<iframe src="create.php" width="100" height="100" frameborder="0"></iframe>
</body>
</html>
<?PHP
}
else{
  header("location:index_admin.php");

}
?>