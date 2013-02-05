<form action="removeitem.php?mode=submit" method="post" name="form_remove" id="form_remove">
	<table width="518">
	  <!--DWLayoutTable-->
	<tr>
		<td width="80%" height="30%"><font size="5"><b>हटाउने सामान रोज्नुहोस्</font></b></td>
	  
	  <td width="5" rowspan="0" valign="top" bgcolor="#FF9966"><p>
	  <select name="itemlist" id="itemlist" onChange="form_remove.itemid.value=form_remove.itemlist.value" >
        <option value="value" selected>----</option>
        
        <?php
		//add all items to the list
	   	$con=connectdb();
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
	<tr>
	  <td  height="10" ><font size="5">हटाउने सामानको</font>ID</td>
	  <td height="10"><input name="itemid" type="text" id="itemid2" readonly></td>
	</tr>	
	<tr>
	  <td height="26"></td>	 
	  <td valign="top"> <input type="submit" name="Submit"  value="हटाउनुहोस">      </td>
	</tr>
	<tr>
		<td align = "center"><a href="forms/form_cancelreservation.php"></a></td>
	</tr>
  </table>
	</form>
