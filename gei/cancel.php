<?php
session_start();
if($_SESSION['user']=='Admin' || $_SESSION['user']=='chairman'){

include("dbconnect.php");
extract($_REQUEST);
$rdate=date("d-m-Y");
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
<?php
$q1=mysql_query("select * from students where status='2' && utype='Admission'");
$row=mysql_fetch_array($q1);

	
if(isset($btn))
{
    $degr =$row['degree'];
 $dep=$row['dept'];
 $govt=$row['govt'];
    mysql_query("update students set
 approved_by='$approved_by',
 reason='$reason',
 dtime='$rdate',
 status='5'
  where id=$id");
  if($govt=="Management"){
    mysql_query("update dept set
     fill_mq=fill_mq -1
     where degree='$degr' && dept='$dep'");
    }
    if($govt=="Government"){
      mysql_query("update dept set
       fill_gq=fill_gq -1
       where degree='$degr' && dept='$dep'");
      }
      
  ?>
<script>
  alert("Cancelled Successfully");
    window.location.href="cancellation.php";
    </script>
    <?php
}
?>
<form autocomplete="off"  id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php if($_SESSION['user']=='chairman'){
include("link_char.php");
        }else{include("link_admin.php"); }?>
  <h3 align="center"> Cancel This Admission </h3>
  
  <table width="393" height="135" border="0" align="center" cellpadding="5" class="bor">
    <tr>
      <th align="left" scope="col">Name </th>
      <th align="left" scope="col"><input name="sname" type="text" value="<?php echo $row['sname']; ?>" size="40" / readonly></th>
    </tr>
    <tr>
      <th align="left" scope="col">Department </th>
      <th align="left" scope="col"><input name="dept" type="text" value="<?php echo $row['dept']; ?>" size="40" / readonly></th>
    </tr>
    <tr>
      <th align="left" scope="col">Degree </th>
      <th align="left" scope="col"><input name="degree" type="text" value="<?php echo $row['degree']; ?>" size="40" / readonly></th>
    </tr>
    <tr>
      <th align="left" scope="col">Mobile </th>
      <th align="left" scope="col"><input name="mobile" type="text" value="<?php echo $row['mobile']; ?>" size="40" / readonly></th>
    </tr>
    <tr>
      <th align="left" scope="col">Approved by </th>
      <th align="left" scope="col"><input name="approved_by" type="text"  size="40" required/></th>
    </tr>
    <tr>
      <th align="left" scope="col">Reason </th>
      <th align="left" scope="col"><textarea name="reason" type="text" rows=5 cols=20 size="40" required></textarea></th>
    </tr>

      <th align="left" scope="row">&nbsp;</th>
      <td align="left"><input type="submit" name="btn" value="Update" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>

</body>

</html>
<?php
}
else{
  header("location:index_admin.php");

}
?>