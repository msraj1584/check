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
	   <li><a href="home_char.php" >HOME</a></li>
	   <li><a href="set_time.php">SET TIME </a></li>
	   <li><a href="msg_content.php">MESSAGES </a></li>
	  
	  <li><a href="#" onMouseOver="mopen('m1')" onMouseOut="mclosetime()">GATE </a>
	   <div id="m1" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a target="" href="view_gate2.php">New Entries</a>		
		<a target="" href="searchgate_entry.php">Search Entry</a>
			
				
		</div></li>

		<li><a href="#" onMouseOver="mopen('m2')" onMouseOut="mclosetime()">RECEPTION </a>
	   <div id="m2" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a target="" href="staff.php">New Enquires</a>		
		<a target="" href="view_reg.php">Registered details</a>
			
				
		</div></li>

		<li><a href="#" onMouseOver="mopen('m3')" onMouseOut="mclosetime()">ADMIN </a>
	   <div id="m3" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a target="" href="view_admission.php">New Admissions</a>		
		<a target="" href="view_enroll.php">View Enrolled</a>
		<a target="" href="view_report.php">Report</a>
		<a target="" href="view_re_range.php">Report by Range</a>
		<a target="" href="remaining_seat.php">Remaining Seats</a>
		
				
		</div></li>
		<li><a href="cancellation.php" onMouseOver="mopen('m4')" onMouseOut="mclosetime()">CANCEllATIONz </a>
	   <div id="m4" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a target="" href="cancel_report.php">Cancel Report</a></div>	</li>
	
	   <li><a href="logout.php">LOGOUT</a></li>
	</ul>
</div>