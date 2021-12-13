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
<style>
    .w3-input {
        width: 90px;
    }
    

.notification {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 7px 12px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 4px 2px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
    </style>
<div class="subhead">
	<ul id="menu">
	   <li><a href="staff.php" onMouseOver="mopen('m1')" onMouseOut="mclosetime()">HOME</a></li>
	   
     <li><a href="view_reg.php">DETAILS </a></li>
     
	   <li><a href="logout.php">LOGOUT</a></li>
	   <a style="float:right;margin-right:10%" href="#" class="notification">
  <span>&#128276;</span>
  <span class="badge"><?php echo $n2;?></span>
</a>
	</ul>
	
</div>