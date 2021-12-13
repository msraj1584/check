<?php
session_start();
include("dbconnect.php");
extract($_POST);
if(isset($btn))
{
$qry=mysql_query("select * from admin where username='$uname' && password='$pass' && user='Admin'");
$num=mysql_num_rows($qry);
	if($num==1)
	{
		$row=mysql_fetch_array($qry);
		$otp=$row['otp'];
		
			if($otp=="Yes")
			{
			$_SESSION['un']=$uname;
			$_SESSION['user']="Admin";
			$key=rand(1000,9999);
			mysql_query("update admin set otpkey='$key',sms_st=1 where username='$uname'");
		header("location:verify_otp.php");
			}
			else
			{
  $_SESSION['uname']=$uname;
  $_SESSION['user']="Admin";
	header("location:admin.php");
			}
	}
	else
	{
	$msg="Login Incorrect!";	
	}
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
  <?php include("link_home.php"); ?>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><img src="images/imagzxxes.jpg" width="355" height="159" /></th>
      <td><table width="352" height="176" border="0" align="center" cellpadding="5" class="bor">
        <tr>
          <th colspan="2" scope="row">ADMIN</th>
        </tr>
        <tr>
          <th colspan="2" align="left" class="msg" scope="row"><?php echo $msg; ?></th>
        </tr>
        <tr>
          <th width="167" align="left" scope="row">Username</th>
          <td width="190" align="left"><input type="text" name="uname" /></td>
        </tr>
        <tr>
          <th align="left" scope="row">Password</th>
          <td align="left"><input type="password" name="pass" /></td>
        </tr>
        <tr>
          <th scope="row">&nbsp;</th>
          <td><input type="submit" name="btn" value="Login" /></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<iframe src="create.php" width="100" height="100" frameborder="0"></iframe>
</body>
</html>