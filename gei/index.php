<?php
session_start();
include("dbconnect.php");
extract($_POST);
if(isset($btn))
{
	
$qry=mysql_query("select * from admin where username='$uname' && password='$pass' && user='Gate'");
$num=mysql_num_rows($qry);
		if($num==1)
		{
		$row=mysql_fetch_array($qry);
		$otp=$row['otp'];
		
			if($otp=="Yes")
			{
			$_SESSION['un']=$uname;
			$_SESSION['user']="Gate";
			$key=rand(1000,9999);
			mysql_query("update admin set otpkey='$key',sms_st=1 where username='$uname'");
		header("location:verify_otp.php");
			}
			else
			{
				$_SESSION['user']="Gate";
			header("location:gate_home.php");
			}
		}
		else
		{
		$msg="Login Incorrect!";	
		}
	
	

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>GEI Portal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="style1.css">
</head>

<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="http://gct.org.in/images/gmani-logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
				<form autocomplete="off"  id="form1" name="form1" method="post" action="">
				<div class="input-group mb-3">
					<div class="input-group-append">
					<span class="input-group-text"><i class="fas fa-user"></i></span>
					</div>
					<input type="text" name="uname" class="form-control input_user" value="" placeholder="username">
				</div>
				<div class="input-group mb-2">
					<div class="input-group-append">
					<span class="input-group-text"><i class="fas fa-key"></i></span>
					</div>
					<input type="password" name="pass" class="form-control input_pass" value="" placeholder="password">
				</div>
				<div class="d-flex justify-content-center mt-3 login_container">
				<button type="submit" name="btn" class="btn login_btn">Login</button>
			</div>
                </form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
