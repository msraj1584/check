<?php

session_start();
 $id = $_SESSION['id']; 
include("dbconnect.php");
extract($_REQUEST);
$rdate=date("d-m-Y");
$yr=date("Y");
$yr2=date("y");
$q1=mysql_query("select * from students where id=$id");
$r1=mysql_fetch_array($q1);
$sname=$r1['sname'];
$eno=$r1['eno'];
$mobile=$r1['mobile'];
//var_dump($sname);
$q2=mysql_query("select * from msg_cnt where name='Reception'");
$r21=mysql_fetch_array($q2);
$vars = array(
  '{$sname}'       => $sname,
  '{$eno}'        => $eno
);
$message= strtr($r21['header'], $vars);


?>
<iframe id="deeptarget" name="deeptarget" style="display:none" src="about:blank" width="100%">
</iframe>
<script>
iframe = document.getElementById('deeptarget');
//TODO: Depends on each providers structure and
iframe.src = "http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message=<?php echo $message?>&number=91<?php echo $mobile?>";
iframe.onload = function (){

 // window.location.replace('view_reg.php')
};
</script>

