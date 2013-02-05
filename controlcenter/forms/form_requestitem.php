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
<form action="requestitem.php?mode=submit" method="post" name="form_request" id="form_request">
	<table width="518">
	  <!--DWLayoutTable-->
	<tr>
		<td width="141" height="42">&nbsp;</td>
	  <td width="154">&nbsp;</td>
	</tr>
	<tr>
	<td><font size="3">ओगट्नेको नाम</font>(Requestee Name)</td><td><input type="text" name="requesteename"></td>
	</tr>
	<tr>
	<td><font size="3">उपलब्ध ठेगाना(Address)</font></td>	
<td><select name="address"id="address"onChange='if(form_request.address.value=="none"){ form_request.requesteeaddress.size="30"; form_request.requesteeaddress.value="नयाँ ठेगाना लेख्नुहोस्";} else form_request.requesteeaddress.size="1";'>
<option value="none">----</option>
<?php
	$con=connectdb();
$queryvillage="select * from village order by address";
$villageresult=@mysql_query($queryvillage) or die(mysql_error());
$num=mysql_num_rows($villageresult);
echo"ssssssss$num ssssssssss";
while($rowvillage=@mysql_fetch_array($villageresult))
{
echo"<option value=$rowvillage[address]>$rowvillage[address]</option>";
}
?>
<option value="none" ><font size="5">&#2344;&#2351;&#2366; &#2346;&#2381;&#2352;&#2325;&#2366;&#2352;</font></option>
</select></td>
<td><font size="3">ओगट्नेको ठेगाना</font>(Requestee Address)</td><td><input type="text" name="requesteeaddress" id="requesteeaddress" onFocus='form_request.requesteeaddress.value=""; form_request.requesteeaddress.size="30"; form_request.address.value="none"' value="&#2344;&#2351;&#2366; &#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; &#2346;&#2381;&#2352;&#2325;&#2366;&#2352; &#2351;&#2361;&#2366; &#2354;&#2375;&#2326;&#2381;&#2344;&#2369;&#2361;&#2379;&#2360;&#2381;" size="1"></td>

</tr>
	<tr><td>Select the item</td>
	<td width="201" valign="top" bgcolor="#99CC00"><p>
	  <select name="itemlist" id="itemlist" onChange="form_request.itemid.value=form_request.itemlist.value" >
        <option value="value" selected>----</option>
        
        <?php
		//add all items to the list
	   
	   	$result=mysql_query("SELECT `id`,`name` FROM `item` WHERE status = 'Available' ORDER BY `name` ASC ",$con)
				or die('<div class="error"> ERROR while getting item list. <br>'.mysql_error().'</div>');;
	   	while($row=mysql_fetch_array($result))
	   	{   echo '<option value="'.$row["id"].'">'.$row["name"].', '.$row["id"].'</option>';  }
		echo 'alert('.$result.');';
	  ?>
          </select>
	</p>
	  </td>
	</tr>
	<tr><td></td><td>-------------------------</td></tr>
	<tr>
	  
	  <td height="52" valign="top"> <font size="5">ओगट्ने सामानको</font>ID </td>
	  <td > 
	    <input name="itemid" type="text" id="itemid2" size="10" readonly="true">	    
        </td>
	</tr>
	<tr>
	  <td height="2"></td>
	  <td></td>
	</tr>
	<tr>
	  <td height="57">
	  <td valign="top"> <p>
	    <input name="Submit" type="submit"  value="ओगट्नुहोस्">        
	  </p></td>      </td>
	</tr>
	<tr>
	  <td height="100"></td>
	  <td bgcolor="#99cc00"><p class="style2">
<font-size>
<a href="cancelreservation.php"><font size="5">सामान नओगटने</font></a></p>      </td>
	  </tr>
<font>  
</table>
</form>
