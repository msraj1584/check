<?php
session_start();
if($_SESSION['user']!='Certificate'){
	header("location:index_cer.php");
}
include("dbconnect.php");
extract($_REQUEST);

$cmon=date("m");
$cyr=date("Y");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">

.style1 {font-size: 36px}
.w3-input {
        width: 70px;
        border: black;
    }
</style>
   <link rel="stylesheet" href="date_picker/jquery-ui.css">
    <script src="date_picker/jquery-1.12.4.js"></script>
    <script src="date_picker/jquery-ui.js"></script>
    <script>
    $(function() {
        $("#Date").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "1970:+nn"
        });
    });
    </script>
</head>

<body>
<form autocomplete="off"  id="form1" name="form1" method="post" action="" autocomplete="off">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_cer.php"); ?>
  <h3 align="center">Certificate Issued to Students</h3>
  <p align="center">
    <select name="month">
	<option value="">-Month-</option>
	<?php
	$cq=mysql_query("select distinct(month) from students order by month");
	while($cr=mysql_fetch_array($cq))
	{
	?>
	<option <?php if($month==$cr['month']) echo "selected"; ?>><?php echo $cr['month']; ?></option>
	<?php
	}
	?>
    </select>
    <select name="year">
	<option value="">-Year-</option>
	<?php
	$cq2=mysql_query("select distinct(year) from students order by month");
	while($cr2=mysql_fetch_array($cq2))
	{
	?>
	<option <?php if($year==$cr2['year']) echo "selected"; ?>><?php echo $cr2['year']; ?></option>
	<?php
	}
	?>
    </select>
    <input type="submit" name="btn" value="Submit" />
  </p>
  <?php
  if($month=="")
  {
  $month=$cmon;
  }
  if($year=="")
  {
  $year=$cyr;
  }
  $q1=mysql_query("select * from students where status='2' && utype='Admission' && month='$month' && year='$year'");
    $n1=mysql_num_rows($q1);?>
    
    <input style="float:right;margin-right:60px" type="button"
    onclick="tableToExcel('myTable', 'W3C Example Table')" value="Export to Excel">

<?php
if($n1>0)
{
?>
<table id="myTable" width="926" border="1" align="center">
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Adminno</th>
      <th scope="col">Gate Pass </th>
      <th scope="col">Name</th>
      <th scope="col">Branch</th>
      <th scope="col">Reference</th>
      <th scope="col">Certificate issued to student </th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
    
    <tr>
                    <td></td>

                    <td><input id="ano" class="w3-input" placeholder="&#128269;Admission no..."></td>
                    <td><input id="gpass" class="w3-input" placeholder="&#128269;Gate pass..."></td>
                    <td><input id="name" class="w3-input" placeholder="&#128269;name..."></td>
                 
                    <td><input id="year" class="w3-input" placeholder="&#128269;year..."></td>
              
                    <td><input id="Reference" class="w3-input" placeholder="&#128269;Reference..."></td>
                    
                    <td><input id="cert"  style="width:200px" class="w3-input" placeholder="&#128269;Certificate..."></td>
              
                    <td><input id="Date" class="w3-input" placeholder="&#128269;Date..."></td>

                    <td></td>

                </tr>
            </thead>
            <tbody>
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
      <td><?php echo $r1['branch']." ".$r1['entry']; ?></td>
      <td><?php echo $r1['refer']." - ".$r1['ref_name']; ?></td>
      <td><?php echo $r1['certificate_issue']; ?></td>
      <td><?php echo $r1['adate']; ?></td>
      <td><a href="print2.php?id=<?php echo $r1['id']; ?>" target="_blank">View</a> | <a href="cer_iss-edit.php?id=<?php echo $r1['id']; ?>">Edit</a> </td>
    </tr>
	<?php
	}
    ?>
            </tbody>
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
<script>
function performReset() {
    document.getElementById("ano").value = "";
    document.getElementById("gpas").value = "";
    document.getElementById("name").value = "";
  
    document.getElementById("year").value = "";
    
  
    document.getElementById("Reference").value = "";
    document.getElementById("cert").value = "";
    document.getElementById("Date").value = "";
    filterTable(event, 0);
}

function filterTable(event, index) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#myTable tbody").rows;
    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[1].textContent.toUpperCase();
        var secondCol = rows[i].cells[2].textContent.toUpperCase();
        var thirdCol = rows[i].cells[3].textContent.toUpperCase();
        var fourthCol = rows[i].cells[4].textContent.toUpperCase();
        var fiveCol = rows[i].cells[5].textContent.toUpperCase();
        var sixCol = rows[i].cells[6].textContent.toUpperCase();
        var sevenCol = rows[i].cells[7].textContent.toUpperCase();
      
        if ((firstCol.indexOf(filter) > -1 && index == 0) ||
            (secondCol.indexOf(filter) > -1 && index == 1) ||
            (thirdCol.indexOf(filter) > -1 && index == 2) ||
            (fourthCol.indexOf(filter) > -1 && index == 3) ||
            (fiveCol.indexOf(filter) > -1 && index == 4) ||
            (sixCol.indexOf(filter) > -1 && index == 5) ||
            (sevenCol.indexOf(filter) > -1 && index == 6)) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}

document.querySelectorAll('input.w3-input').forEach(function(el, idx) {
    el.addEventListener('keyup', function(e) {
        filterTable(e, idx);
    }, false);
});
</script>

<script type="text/javascript">
var tableToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,',
        template =
        '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64 = function(s) {
            return window.btoa(unescape(encodeURIComponent(s)))
        },
        format = function(s, c) {
            return s.replace(/{(\w+)}/g, function(m, p) {
                return c[p];
            })
        }
    return function(table, name) {
        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {
            worksheet: name || 'Worksheet',
            table: table.innerHTML
        }
        window.location.href = uri + base64(format(template, ctx))
    }
})()
</script>
</html>