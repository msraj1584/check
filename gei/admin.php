<?php
session_start();
if($_SESSION['user']!='Admin'){
	header("location:index_admin.php");
}
include("dbconnect.php");
extract($_REQUEST);
if($act=="ok")
{
$qry1=mysql_query("select * from admin where username='$un'");
$row1=mysql_fetch_array($qry1);
$pw=$row1['password'];
?>
<script language="javascript">
alert("Password: <?php echo $pw; ?>");
window.location.href="admin.php";
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
</head>

<body>
<form autocomplete="off"  id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_admin.php"); ?>
  <h3 align="center">Login User Information </h3>
  
  <?php
  $qry=mysql_query("select * from admin");
  $num=mysql_num_rows($qry);
  if($num>0)
  {
  ?>
  <table width="931" border="1" align="center">
    <tr>
      <th width="29" scope="col">S.No</th>
      <th width="92" scope="col">UserType</th>
      <th width="139" scope="col">Username</th>
      <th width="122" scope="col">Mobile No. </th>
	  <th width="84" scope="col">OTP</th>
	  <th width="207" scope="col">E-Mail</th>
                  <th width="205" scope="col">Action</th>
    </tr>
	<?php
	$i=0;
	while($row=mysql_fetch_array($qry))
	{
	$i++;
	?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['user']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['mobile']; ?></td>
	  <td><?php echo $row['otp']; ?></td>
	  <td><?php echo $row['email']; ?></td>
         
      <td><a href="edit.php?un=<?php echo $row['username']; ?>">Edit</a> | <a href="admin.php?act=ok&un=<?php echo $row['username']; ?>">Show Password</a></td>
    </tr>
	<?php
	}
	?>
  </table>
  <?php
  
  }
  else
  {
  ?><h3 align="center" style="color:#990000">No Users Found!</h3><?php
  }
  ?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>