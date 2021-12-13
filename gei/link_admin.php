<script language="javascript">
// JavaScript Document
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
</script>

<div class="subhead">
	<ul id="menu">
      <li><a href="admin.php" onMouseOver="mopen('m1')" onMouseOut="mclosetime()">HOME</a>
	  	<div id="m1" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a href="add_staff.php">Add Staff</a>		
		<a href="add_fees.php">Course Fees</a>
		<a href="add_cutoff.php">Cutoff</a>		
				
		</div>
	   </li>
	  </li>
	  
	  
	  
      <li><a href="view_visitor.php" onMouseOver="mopen('m2')" onMouseOut="mclosetime()">ENTRIES</a>
	   
	   <div id="m2" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a href="view_admission.php">Admission</a>		
		<a href="view_visitor.php">Visitor</a>
		
		</div>
	   </li>
	    <li><a href="view_enroll.php">ENROLLMENT</a></li>
		  
		<li><a href="view_visitor.php" onMouseOver="mopen('m3')" onMouseOut="mclosetime()">REPORT</a>
	   
	   <div id="m3" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a href="view_report.php">All Work</a>		
		<a href="view_re_range.php">Search By Range</a>
		<a href="remaining_seat.php">Remaining Seats</a>	
		
		</div>
	   
	   
	   </li>
	   <li><a href="cancellation.php" onMouseOver="mopen('m4')" onMouseOut="mclosetime()">CANCELLATION</a>
	   
	   <div id="m4" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a href="cancel_report.php">Cancel report</a>		
		
		
		</div>
	   
	   
	   </li>
	   <li><a href="logout.php">LOGOUT</a></li>
	</ul>
</div>