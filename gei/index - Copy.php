<?php
session_start();
include("dbconnect.php");
extract($_POST);
$rdate=date("d-m-Y");
if(isset($btn))
{
$mq=mysql_query("select max(id) from students");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;

$skey=rand(1000,9999);

echo ("insert into students(id,adminno,gpass,adate,degree,branch,branc,sname,gender,fname,dob,community,income,phone,district,mobile,state,sslcmark,pincode,category,boardplace,hqualifi,regno,cname,medium,caddress,maths,physics,chemistry,pcm,cutoff,subj,tmark,pmark,degree1,dsubj,dtmarks,dpmarks) values($id,'$adminno','$gpass','$adate','$degree','$branch','$branc','$sname','$gender','$fname','$dob','$community','$income','$phone','$district','$mobile','$state','$sslcmark','$pincode','$category','$boardplace','$hqualifi','$regno','$cname','$medium','$caddress','$maths','$physics','$chemistry','$pcm','$cutoff','$subj','$tmark','$pmark','$degree1','$dsubj','$dtmarks','$dpmarks')");
	 $qry=mysql_query("insert into students(id,adminno,gpass,adate,degree,branch,branc,sname,gender,fname,dob,community,income,phone,district,mobile,state,sslcmark,pincode,category,boardplace,hqualifi,regno,cname,medium,caddress,maths,physics,chemistry,pcm,cutoff,subj,tmark,pmark,degree1,dsubj,dtmarks,dpmarks) values($id,'$adminno','$gpass','$adate','$degree','$branch','$branc','$sname','$gender','$fname','$dob','$community','$income','$phone','$district','$mobile','$state','$sslcmark','$pincode','$category','$boardplace','$hqualifi','$regno','$cname','$medium','$caddress','$maths','$physics','$chemistry','$pcm','$cutoff','$subj','$tmark','$pmark','$degree1','$dsubj','$dtmarks','$dpmarks')");
if($qry)
{
header("location:add_student.php");
}


}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />



<style type="text/css">
<!--
.style1 {font-size: 36px}
-->
</style>
</head>

<body>
<form autocomplete="off"  action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_staff.php"); ?>
  <p>&nbsp;</p>
  <table width="917" height="997" border="1" align="center">
    <tr>
      <td width="601" height="46" rowspan="3"><p>&nbsp;</p>
      <p align="center" class="style1">Gnanamani Educational Institutions </p>
      <p align="center" class="style1">Admission Form </p>
      <p class="style1">&nbsp;</p>
      <p>&nbsp;</p></td>
      <td width="150" height="75">Admin No : </td>
      <td width="144"><label>
        <input type="text" name="adminno" />
      </label></td>
    </tr>
    <tr>
      <td height="91">Gate Pass No : </td>
      <td height="91"><label>
        <input type="text" name="gpass" />
      </label></td>
    </tr>
    <tr>
      <td height="74">Date : </td>
      <td><label>
        <input type="text" name="adate" />
      </label></td>
    </tr>
    <tr>
      <td height="745" colspan="3"><table width="911" height="685" border="1" align="center">
        <tr>
          <td height="23" colspan="2">Degree</td>
          <td colspan="5"><label>
            <input type="checkbox" name="degree" value="B.E" />
            B.E.
            <input type="checkbox" name="degree" value="M.E" />
            M.E.
            <input type="checkbox" name="degree" value="M.B.A" />
            M.B.A.
            <input type="checkbox" name="degree" value="M.C.A" />
            M.C.A.
            <input type="checkbox" name="degree" value="B.Ed" />
            B.Ed.
            <input type="checkbox" name="degree" value="M.Ed" />
            M.Ed.
            <input type="checkbox" name="degree" value="B.Sc.,B.Ed" />
            B.Sc., B.Ed. </label></td>
        </tr>
        <tr>
          <td height="43" colspan="2">Year &amp; Branch </td>
          <td colspan="2"><label>
            <input type="checkbox" name="branch" value="I-Year" />
            </label>
            I-Year/
            <label>
              <input type="checkbox" name="branch" value="II-Year" />
              </label>
            II-Year, </td>
          <td colspan="3">Branch :
            <label></label>
              <input type="text" name="branc" /></td>
        </tr>
        <tr>
          <td colspan="2">Name of the Student </td>
          <td colspan="2"><label>
            <input type="text" name="sname" />
          </label></td>
          <td width="144">Sex</td>
          <td colspan="2"><label>
            <input name="gender" type="radio" value="male" />
            </label>
            Male
            <label>
              <input name="gender" type="radio" value="female" />
              </label>
            Female</td>
        </tr>
        <tr>
          <td colspan="2">Father/Guardian Name </td>
          <td colspan="2"><label>
            <input type="text" name="fname" />
          </label></td>
          <td>Date of Birth </td>
          <td colspan="2"><label>
            <input type="text" name="dob" />
          </label></td>
        </tr>
        <tr>
          <td colspan="2" rowspan="3">Address</td>
          <td colspan="2" rowspan="3"><label>
            <textarea name="address"></textarea>
          </label></td>
          <td>Community</td>
          <td colspan="2"><label>
            <input type="text" name="community" />
          </label></td>
        </tr>
        <tr>
          <td>Parent Annual Income </td>
          <td colspan="2"><label>
            <input type="text" name="income" />
          </label></td>
        </tr>
        <tr>
          <td>Phone No </td>
          <td colspan="2"><label>
            <input type="text" name="phone" />
          </label></td>
        </tr>
        <tr>
          <td colspan="2">District</td>
          <td colspan="2"><label>
            <input type="text" name="district" />
          </label></td>
          <td>Mobile No </td>
          <td colspan="2"><label>
            <input type="text" name="mobile" />
          </label></td>
        </tr>
        <tr>
          <td colspan="2">State            </td>
          <td colspan="2"><label>
            <input type="text" name="state" />
          </label></td>
          <td rowspan="2">SSLC Marks </td>
          <td colspan="2" rowspan="2"><label>
            <input type="text" name="sslcmark" />
          </label></td>
        </tr>
        <tr>
          <td height="26" colspan="2">Pincode</td>
          <td colspan="2"><input type="text" name="pincode" /></td>
        </tr>
        <tr>
          <td colspan="2">Category</td>
          <td colspan="5"><label>
            <input type="checkbox" name="category" value="Dayscholar" />
            </label>
            Dayscholar    
            <label></label> 
            Boarding Place:
            <label></label>
            <label>
            <input type="text" name="boardplace" />
            </label>
            <label>
            <input type="checkbox" name="category" value="Hostel" />
              </label>
            Hostel</td>
          </tr>
        <tr>
          <td colspan="2">Highest Qualification </td>
          <td colspan="2"><label>
            <input type="checkbox" name="hqualifi" value="H.S.C" />
            </label>
            H.S.C
            <label>
              <input type="checkbox" name="hqualifi" value="Diploma" />
              </label>
            Diploma
            <label>
              <input type="checkbox" name="hqualifi" value="Degree" />
              </label>
            Degree(UG)</td>
          <td colspan="3">Exam Reg No :
            <label>
              <input type="text" name="regno" />
            </label></td>
        </tr>
        <tr>
          <td width="92" rowspan="2">School/College</td>
          <td width="53">Name</td>
          <td colspan="2"><label>
            <input type="text" name="cname" />
          </label></td>
          <td>Medium of Study </td>
          <td colspan="2"><label>
            <input type="text" name="medium" />
          </label></td>
        </tr>
        <tr>
          <td>Address</td>
          <td colspan="5"><label>
            <textarea name="caddress"></textarea>
          </label></td>
        </tr>
        <tr>
          <td rowspan="2">HSC</td>
          <td>Subject</td>
          <td width="144">Maths</td>
          <td width="144">Physics/Voc Theory </td>
          <td>Chemistry/Voc Practical </td>
          <td width="144">PCM % </td>
          <td width="144">Cut of Mark out of 200 </td>
        </tr>
        <tr>
          <td>Marks</td>
          <td><label>
            <input type="text" name="maths" />
            /200 </label></td>
          <td><label>
            <input type="text" name="physics" />
            </label>
            /200</td>
          <td><label>
            <input type="text" name="chemistry" />
            </label>
            /200</td>
          <td><label>
            <input type="text" name="pcm" />
          </label></td>
          <td><label>
            <input type="text" name="cutoff" />
          </label></td>
        </tr>
        <tr>
          <td colspan="2">Diploma</td>
          <td colspan="5">Subject
            <label>
              <input type="text" name="subj" />
              </label>
            Total Marks
            <label>
              <input type="text" name="tmark" />
              </label>
            % of Marks
            <label>
              <input type="text" name="pmark" />
            </label></td>
        </tr>
        <tr>
          <td colspan="7">Degree
            <label>
              <input type="text" name="degree1" />
              </label>
            Subject
            <label>
              <input type="text" name="dsubj" />
              </label>
            Total Marks
            <label>
              <input type="text" name="dtmarks" />
              </label>
            % of Marks
            <label>
              <input type="text" name="dpmarks" />
            </label></td>
        </tr>
      </table>
      <p align="center">
        <input type="submit" name="btn" value="Save" />
      </p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
