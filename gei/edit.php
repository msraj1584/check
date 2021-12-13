<?php
session_start();
if($_SESSION['user']!='Reception'){
	header("location:index_admin.php");
}
include("dbconnect.php");
extract($_REQUEST);

$qry=mysql_query("select * from admin where username='$un'");
$row=mysql_fetch_array($qry);

if(isset($btn))
{
mysql_query("update admin set password='$pass',otp='$otp',email='$email',mobile='$mobile' where username='$un'");
?>
<script language="javascript">
window.location.href="admin.php?act=success";
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
  <h3 align="center">Update Login User Information </h3>
  
  <table width="432" height="135" border="0" align="center" cellpadding="5" class="bor">
    <tr>
      <th width="132" align="left" scope="col">Username</th>
      <th width="210" align="left" scope="col"><?php echo $row['username']; ?></th>
    </tr>
    <tr>
      <th align="left" scope="row">Password</th>
      <td align="left"><input type="password" name="pass" value="<?php echo $row['password']; ?>" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">E-mail</th>
      <td align="left"><input type="text" name="email" value="<?php echo $row['email']; ?>" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">Mobile No. </th>
      <td align="left"><input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">OTP Require? </th>
      <td align="left"><input name="otp" type="radio" value="Yes" <?php if($row['otp']=="Yes") echo "checked"; ?> />
      Yes
      <input name="otp" type="radio" value="No"  <?php if($row['otp']=="No" || $row['otp']=="") echo "checked"; ?> />
      No</td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left"><input type="submit" name="btn" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>