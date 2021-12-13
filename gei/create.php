<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

if($rdate=="")
{
$rdate=date("d-m-Y");
}
 $q5=mysql_query("select * from students where govt='Government' && utype='Admission' && adate='$rdate' && status=2");
 $cnt_gov=mysql_num_rows($q5);
 $q6=mysql_query("select * from students where govt='Management' && utype='Admission' && adate='$rdate' && status=2");
 $cnt_mgm=mysql_num_rows($q6);
?>


  <?php
$ss1="Enquiry Details $rdate \n\n";  
  $q1=mysql_query("select * from students where utype='Admission' && adate='$rdate' && status=1");
	$n1=mysql_num_rows($q1);
	if($n1>0)
	{

	$i=0;
	$tot=0;
	while($r1=mysql_fetch_array($q1))
	{
	$i++;
	$tot+=$r1['paid'];
	$ss="Enquiry No.:".$r1['eno']."\nGate Pass:".$r1['gpass']."\nName:".$r1['sname']."\nRefer by: ".$r1['refer']." - ".$r1['ref_name']."\nDate:".$r1['adate'];
	$ss2="\nPayment:";
	if($r1['utype']=="Admission")
	  {
	  		if($r1['status']=="2")
			{
	  $ss3=" Total Fees: Rs.".$r1['total'].", Deduction: Rs.".$r1['deduction'].", Fees: Rs.".$r1['fees'].", Paid: Rs.".$r1['paid'].", Year for Deduction:".$r1['dyear'];
	   		}
			else
			{
			$ss3="Not Enrolled";
			}
		}	
	$ss4="\n\n";
	$ss_a[]=$ss.$ss2.$ss3.$ss4;
	}

  $ss5="\n\nTotal Admission Amount Collected: Rs.$tot";
  }
  else
  {
  }
  
///////////////////
$fp=@fopen("reports/daily_report.rtf","w");
$dd=@implode("",$ss_a);
$data=$ss1.$dd.$ss5;
@fwrite($fp,$data);
//$fp2=fopen("reports/daily_report.rtf","a");
//fwrite($fp2,$ss5);
/////////////////////////////////////////////////////////////////////////////////////////////////
$ass1="Admission Details $rdate \n\n";  
  $q12=mysql_query("select * from students where utype='Admission' && adate='$rdate' && status=2");
	$n12=mysql_num_rows($q12);
	if($n12>0)
	{

	$i1=0;
	$tot1=0;
	while($r12=mysql_fetch_array($q12))
	{
	$i1++;
	$tot1+=$r12['paid'];
	$ass="Admission No.:".$r12['adminno']."\nGate Pass:".$r12['gpass']."\nName:".$r12['sname']."\nRefer by: ".$r12['refer']." - ".$r12['ref_name']."\nDate:".$r12['adate'];
	$ass2="\nPayment:";
	if($r12['utype']=="Admission")
	  {
	  		if($r12['status']=="2")
			{
	  $ass3=" Total Fees: Rs.".$r12['total'].", Deduction: Rs.".$r12['deduction'].", Fees: Rs.".$r12['fees'].", Paid: Rs.".$r12['paid'].", Year for Deduction:".$r12['dyear'];
	   		}
			else
			{
			$ass3="Not Enrolled";
			}
		}	
	$ass4="\n\n";
	$ass_a[]=$ass.$ass2.$ass3.$ass4;
	}

  $ass5="\n\nTotal Admission Amount Collected: Rs.$tot1";
  }
  else
  {
  }
  
///////////////////
$fp2=@fopen("reports/daily_report2.rtf","w");
$dd2=@implode("",$ass_a);
$data2=$ass1.$dd2.$ass5;
@fwrite($fp2,$data2);
//////////////////
date_default_timezone_set("Asia/Calcutta");
$hh=date("H");



$qry13=mysql_query("select * from admin where user='Admin'");
$row13=mysql_fetch_array($qry13);
$dhh=$row13['hour'];
$dmm=$row13['minute'];

if($hh>=$dhh && $mm>=$dmm)
{
$curdt=date("d-m-Y");
$qry1=mysql_query("select * from admin where user='Admin'");
$row1=mysql_fetch_array($qry1);
$email=$row1['email'];

	if($row1['cdate']!=$curdt)
	{
	mysql_query("update admin set cdate='$curdt' where user='Admin'");
	require_once("email.php");	
$objEmail	=	new CI_Email();
		$objEmail->from('report@gmail.com', "Daily Report");
		$objEmail->to("$email");//k.vetrivelmca1997@gmail.com
		
		$objEmail->subject("Enquiry Details on $curdt");
		$name=$row_enq['name'];
		$objEmail->message("Enquiry Details");
		//send mail
			if(file_exists("reports/daily_report.rtf"))
			{
				$objEmail->attach("reports/daily_report.rtf");
			}
			if ($objEmail->send())
			{	
			}
			else
			{	
			}
$objEmail2	=	new CI_Email();
		$objEmail2->from('report@gmail.com', "Daily Report");
		$objEmail2->to("$email");//k.vetrivelmca1997@gmail.com
		
		$objEmail2->subject("Admission Details on $curdt");
		$name=$row_enq['name'];
		$objEmail2->message("Admission Details, Government Quota:$cnt_gov, Management Quota:$cnt_mgm ");
		//send mail
			if(file_exists("reports/daily_report2.rtf"))
			{
				$objEmail2->attach("reports/daily_report2.rtf");
			}
			if ($objEmail2->send())
			{	
			}
			else
			{	
			}			
	}
}
	

  ?>
<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
//   //Redirect with JavaScript
   window.location.href= 'create.php';
}, 20000);
</script>