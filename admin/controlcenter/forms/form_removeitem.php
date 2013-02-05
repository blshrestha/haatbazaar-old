<form action="removeitem.php?mode=submit" method="post" name="form_remove" id="form_remove">
	<table width="518">
	  <!--DWLayoutTable-->
	<tr>
		<td width="141" height="42">&nbsp;</td>
	  <td width="154">&nbsp;</td>
	<td width="201" rowspan="5" valign="top" bgcolor="#99FFCC"><p>
	  <select name="itemlist" id="itemlist" onChange="form_remove.itemid.value=form_remove.itemlist.value" >
        <option value="value" selected>tst</option>
        <option value="u">khn</option>
        <?php
		//add all items to the list
	   	$con=connectdb();
	   	$result=mysql_query("SELECT `id`,`name` FROM `item` WHERE status != 'Sold' ORDER BY `name` ASC ",$con)
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
	  <td height="30" valign="top"> <p>&#2361;&#2340;&#2366;&#2313;&#2344;&#2375; &#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; ID </p></td>
	  <td valign="top"> <input name="itemid" type="text" id="itemid2">	    </td>
	</tr>
	<tr>
	  <td height="2"></td>
	  <td></td>
	</tr>
	<tr>
	  <td height="26"></td>
	  <td valign="top"> <input type="submit" name="Submit"  value="&#2361;&#2340;&#2366;&#2313;&#2344;&#2369;&#2361;&#2379;&#2360;&#2381;">      </td>
	</tr>
	<tr>
	  <td height="66"></td>
	  <td><!--DWLayoutEmptyCell-->&nbsp;</td>
	  </tr>
  </table>
	</form>
