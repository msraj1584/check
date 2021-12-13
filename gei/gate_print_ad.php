<?php
session_start();
if($_SESSION['user']!='Gate'){
	header("location:index.php");
}
$no=$_GET['no'];
include("dbconnect.php");
extract($_REQUEST);
$rdate=date("d-m-Y");

$q1=mysql_query("select * from students where id=$no");
$r1=mysql_fetch_array($q1);
$sname=$r1['sname'];
$adminno=$r1['adminno'];


?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <link href="style.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
    .style1 {
        font-size: 36px
    }

    .style2 {
        font-size: 24px;
        font-weight: bold;
    }

    .box {
        height: 15px;
        width: 190px;
       border-bottom:2px solid black
    }
    </style>
</head>

<body>

    <button id="printpagebutton" onclick="myFunction()">Print this page</button>
    <button id="back" onclick="window.close()">back</button>
    <script>
    window.onload = function() {
        myFunction();
        //document.getElementById("printpagebutton").click();
    };

    function myFunction() {
        var printButton = document.getElementById("printpagebutton");
        var back = document.getElementById("back");
        printButton.style.display = 'none';
        back.style.display = 'none';
        //Print the page content
        window.print()
        printButton.style.display = 'block';
        back.style.display = 'block';

    }
    </script>
    <form autocomplete="off"  style="width:303px !important;height:303px !important;border:1px solid grey;" action="" method="post"
        enctype="multipart/form-data" name="form1" id="form1">
        <table>
            <tr>
                <td  align="left">
                    <p align="center">Gnanamani Educational Institutions <br>
                        Admission Pass
                        </br>
                        Gate Pass No: <?php echo $r1['gpass']; ?></br>
                        Enquiry No: <?php echo $r1['eno']; ?></p>
                        <hr>
    
                        <pre>Visitor Name : <?php echo $r1['sname']; ?></br>
Phone No     : <?php echo $r1['mobile']; ?></br>
Prpose       : <?php echo $r1['utype']; ?></br>
Date         : <?php echo $r1['dtime']; ?></br>
To Meet      : <?php echo $r1['ref_name']; ?></br>
Signature    :<p style="float:right" class="box"></p>
</pre>

                </td>


            </tr>

            </tr>


        </table>
        <p>&nbsp;</p>
    </form>
</body>

</html>