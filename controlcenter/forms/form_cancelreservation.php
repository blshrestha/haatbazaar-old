<style type="text/css">
<!--
.style2 {
	color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
.style3 {font-size: 24px}
.style4 {color: #FF0000; font-weight: bold; font-size: 24px; }
-->
</style>
<form action="cancelreservation.php?mode=submit" method="post" name="form_cancelreservation" id="form_cancelreservation">
	<table width="518">
	  <!--DWLayoutTable-->
	<tr>
		<td width="141" height="42"><strong>Select Item</strong> </td>
	  <td width="154"><select name="itemlist" id="itemlist" onchange="form_cancelreservation.itemid.value=form_cancelreservation.itemlist.value" >
        <option value="value" selected="selected">----</option>
        
        <?php
		//add all items to the list
	   	$con=connectdb();
	   	$result=mysql_query("SELECT `id`,`name` FROM `item` WHERE status = 'Requested' ORDER BY `name` ASC ",$con)
				or die('<div class="error"> ERROR while getting item list. <br>'.mysql_error().'</div>');;
	   	while($row=mysql_fetch_array($result))
	   	{   echo '<option value="'.$row["id"].'">'.$row["name"].', '.$row["id"].'</option>';  }
		echo 'alert('.$result.');';
	  ?>
      </select></td>	
	</tr>
	<tr>
	  <td height="52" valign="top"> <p>नओगट्ने सामानको<span class="style4"> ID </span></p></td>
	  <td valign="top"> 
	      <input name="itemid" type="text" id="itemid2">	    
        </td>
	</tr>
	<tr>
	  <td height="2"></td>
	  <td></td>
	</tr>
	<tr>
	  <td height="26"></td>
	  <td valign="top"> <input type="submit" name="Submit"  value="नओगट्नुहोस्;">      </td>
	</tr>
	<tr>
	  <td height="76"></td>
	  <td><p class="style2">
<font-size>
<a href="cancelreservation.php">सामान नओगट्नुहोस्<span class="style3"></span></a><a href="%22cancelreservation.php%22"cancelreservation.php""> </a></p>      </td>
	  </tr>
<font>  
</table>
</form>
