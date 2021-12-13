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
	   <li><a href="index.php" onMouseOver="mopen('m1')" onMouseOut="mclosetime()">HOME</a></li>
	     
	     <!--<div id="m1" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a href="add_cal.php">CALENDER</a>
		<a href="add_table.php">TIME TABLE</a>
		<a href="add_fees.php">FEES</a>
		<a href="add_events.php">EVENTS</a>
		</div>-->
      </li>
	   <li><a href="login.php" onMouseOver="mopen('m2')" onMouseOut="mclosetime()">RECEPTION</a>
	  <!-- <div id="m2" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
			<a href="add_dept.php">ADD NEW</a>
		</div>-->
	   </li>
	    <li><a href="index_admin.php" onMouseOver="mopen('m3')" onMouseOut="mclosetime()">ADMIN</a>
	   <!--<div id="m3" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a href="add_staff.php">ADD NEW</a>
		</div>-->
		</li>
		<li><a href="index_char.php" onMouseOver="mopen('m3')" onMouseOut="mclosetime()">CHAIRMAN</a>
	   <!--<div id="m3" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a href="add_staff.php">ADD NEW</a>
		</div>-->
	   </li>
	   <li><a href="index_cer.php" onMouseOver="mopen('m3')" onMouseOut="mclosetime()">CERTIFICATE</a>
	   <!--<div id="m3" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a href="add_staff.php">ADD NEW</a>
		</div>-->
	   </li>
	</ul>
</div>