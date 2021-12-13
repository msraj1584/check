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
	   <li><a href="gate_home.php" onMouseOver="mopen('m1')" onMouseOut="mclosetime()">HOME</a></li>
	     
	    <!-----<div id="m1" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a href="add_chair.php">Chairman</a>
		</div>---------->
      </li>
	  
	   <li><a href="view_gate.php" onMouseOver="mopen('m2')" onMouseOut="mclosetime()">VISITOR</a>
	  <!-- <div id="m2" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
			<a href="add_dept.php">ADD NEW</a>
		</div>-->
	   </li>
	   <li><a href="view_gate2.php" onMouseOver="mopen('m2')" onMouseOut="mclosetime()">NEW ENTRIES</a>
	    <li><a href="allgate_entry.php" onMouseOver="mopen('m2')" onMouseOut="mclosetime()">ALL ENTRIES</a>
	  <li><a href="searchgate_entry.php" onMouseOver="mopen('m2')" onMouseOut="mclosetime()">Search ENTRIES</a>

	  <!-- <div id="m2" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
	  
			<a href="add_dept.php">ADD NEW</a>
		</div>-->
	   </li>
	    <li><a href="logout.php" onMouseOver="mopen('m3')" onMouseOut="mclosetime()">LOGOUT</a>
	   <!--<div id="m3" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a href="add_staff.php">ADD NEW</a>
		</div>-->
	   </li>
	</ul>
</div>