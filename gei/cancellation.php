<?php
session_start();
if($_SESSION['user']=='Admin' || $_SESSION['user']=='chairman'){

include("dbconnect.php");
extract($_REQUEST);

$cmon=date("m");
$cyr=date("Y");

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title><?php include("title.php"); ?></title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    .style1 {
        font-size: 36px
    }
    </style>

</head>

<body>
    <form autocomplete="off"  id="form1" name="form1" method="post" action="">
        <div class="hd" align="center"><?php include("title.php"); ?></div>
        <?php if($_SESSION['user']=='chairman'){
include("link_char.php");
        }else{include("link_admin.php"); }?>
        <h3 align="center">Enrollment</h3>
   <?php
  $q1=mysql_query("select * from students where status='2' && utype='Admission'");
	$n1=mysql_num_rows($q1);

	

	$q12=mysql_query("select * from dept");
	$q121=mysql_query("select * from dept");
	$n12=mysql_num_rows($q12);
	$X=$n12;
	?>




      


        <?php if($n1>0)
	{
  ?>
        <table width="1300" border="1" align="center">
            <tr>
                <th scope="col">S.No</th>
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
                <th scope="col">Action </th>
            </tr>
            <?php
	$i=0;
	while($r1=mysql_fetch_array($q1))
	{
	$i++;
	?>
            <tr>
                <th scope="row"><?php echo $i; ?></th>
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
                <td><?php echo $r1['adate']; ?></td>
                <td><?php
	  if($r1['utype']=="Admission")
	  {
	  echo "Total Fees: Rs.".$r1['total'];
	   echo "<br>Cutoff Reduction: Rs.".$r1['camount'];
	   echo "<br>Merit Reduction: Rs.".$r1['reduce1'];
	    echo "<br>Special Reduction: Rs.".$r1['reduce2'];
	  echo "<br>Deduction: Rs.".$r1['deduction'];
	  echo "<br>Paid: Rs.".$r1['paid'];
	  echo "<br>Balance: Rs.".$r1['balance'];
	  echo "<br>Year for Deduction:".$r1['dyear'];
	  }
      ?></td>
      <td><a href="cancel.php?id=<?php echo $r1['id']?>">Cancel Admission</td>
            </tr>
            <?php
	}
	?>
        </table>

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