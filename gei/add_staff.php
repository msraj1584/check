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
	$uname=$uname;
	$pass=$pass;
	$user=$user;
	$otp=$otp;
	$mobile=$mobile;
	$email=$email;
mysql_query("insert into admin(username,password,user,otp,mobile,email)values ('$uname','$pass','$user','$otp','$mobile','$email')");
?>
<script language="javascript">
alert("New User Account Created Successfully");
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
  <h3 align="center"> Login User Information </h3>
  
  <table width="432" height="135" border="0" align="center" cellpadding="5" class="bor">
    <tr>
      <th align="left" scope="col">Type</th>
      <th align="left" scope="col"><select name="user">
        <option>Gate</option>
        <option>Reception</option>
		<option>Admin</option>
		<option>Certificate</option>
	
      </select>
      </th>
    </tr>
    <tr>
      <th width="132" align="left" scope="col">Username</th>
      <th width="210" align="left" scope="col"><input type="text" name="uname" /></th>
    </tr>
    <tr>
      <th align="left" scope="row">Password</th>
      <td align="left"><input type="text" name="pass" /></td>
    </tr>
	 <tr>
      <th align="left" scope="row">Mobile No</th>
      <td align="left"><input type="text" name="mobile" /></td>
    </tr>
	 <tr>
      <th align="left" scope="row">E-Mail</th>
      <td align="left"><input type="text" name="email" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">OTP Require? </th>
      <td align="left"><input name="otp" type="radio" value="Yes" />
      Yes
      <input name="otp" type="radio" value="No" checked="checked" />
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
<iframe src="create.php" width="100" height="100" frameborder="0"></iframe>
</body>
</html>