<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

$qry=mysql_query("select * from admin where username='admin'");
$row=mysql_fetch_array($qry);

if(isset($btn))
{
	
		mysql_query("update admin set hour='$hour',minute='$minute' where username='admin'");
?>
<script language="javascript">
alert("Updated..");
window.location.href="add_time.php";
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
<script language="javascript">
function getRefer1()
{

	if(document.form1.dept.value=="Other")
	{
	document.getElementById("y1").style.display="block";
	}
	else
	{
	document.getElementById("y1").style.display="none";
	}
}
</script>
</head>

<body>
<form autocomplete="off"  id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_admin.php"); ?>
  <h3 align="center"> E-mail Time </h3>
  
  <table width="543" height="135" border="0" align="center" cellpadding="5" class="bor">
    <tr>
      <th width="299" align="left" scope="row">Time</th>
      <td width="439" align="left"><select name="hour">
        <option value="">-Hour-</option>
		<option <?php if($row['hour']=="0") echo "selected"; ?>>0</option>
        <option <?php if($row['hour']=="1") echo "selected"; ?>>1</option>
        <option <?php if($row['hour']=="2") echo "selected"; ?>>2</option>
        <option <?php if($row['hour']=="3") echo "selected"; ?>>3</option>
        <option <?php if($row['hour']=="4") echo "selected"; ?>>4</option>
        <option <?php if($row['hour']=="5") echo "selected"; ?>>5</option>
        <option <?php if($row['hour']=="6") echo "selected"; ?>>6</option>
        <option <?php if($row['hour']=="7") echo "selected"; ?>>7</option>
        <option <?php if($row['hour']=="8") echo "selected"; ?>>8</option>
        <option <?php if($row['hour']=="9") echo "selected"; ?>>9</option>
        <option <?php if($row['hour']=="10") echo "selected"; ?>>10</option>
        <option <?php if($row['hour']=="11") echo "selected"; ?>>11</option>
        <option <?php if($row['hour']=="12") echo "selected"; ?>>12</option>
        <option <?php if($row['hour']=="13") echo "selected"; ?>>13</option>
        <option <?php if($row['hour']=="14") echo "selected"; ?>>14</option>
        <option <?php if($row['hour']=="15") echo "selected"; ?>>15</option>
        <option <?php if($row['hour']=="16") echo "selected"; ?>>16</option>
        <option <?php if($row['hour']=="17") echo "selected"; ?>>17</option>
        <option <?php if($row['hour']=="18") echo "selected"; ?>>18</option>
        <option <?php if($row['hour']=="19") echo "selected"; ?>>19</option>
        <option <?php if($row['hour']=="20") echo "selected"; ?>>20</option>
        <option <?php if($row['hour']=="21") echo "selected"; ?>>21</option>
        <option <?php if($row['hour']=="22") echo "selected"; ?>>22</option>
        <option <?php if($row['hour']=="23") echo "selected"; ?>>23</option>
      </select>
        <select name="minute">
          <option value="">-Minute-</option>
          <option <?php if($row['minute']=="0") echo "selected"; ?>>0</option>
          <option <?php if($row['minute']=="5") echo "selected"; ?>>5</option>
          <option <?php if($row['minute']=="10") echo "selected"; ?>>10</option>
          <option <?php if($row['minute']=="15") echo "selected"; ?>>15</option>
          <option <?php if($row['minute']=="20") echo "selected"; ?>>20</option>
          <option <?php if($row['minute']=="25") echo "selected"; ?>>25</option>
          <option <?php if($row['minute']=="30") echo "selected"; ?>>30</option>
          <option <?php if($row['minute']=="35") echo "selected"; ?>>35</option>
          <option <?php if($row['minute']=="40") echo "selected"; ?>>40</option>
          <option <?php if($row['minute']=="45") echo "selected"; ?>>45</option>
          <option <?php if($row['minute']=="50") echo "selected"; ?>>50</option>
          <option <?php if($row['minute']=="55") echo "selected"; ?>>55</option>
                </select>      </td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left"><input type="submit" name="btn" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p align="center">&nbsp;</p>
</form>
</body>
</html>