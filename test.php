<table width="150" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td width="150" height="35" valign="top">item.name</td>
  </tr>
  <tr> 
    <td height="100" valign="top">item.picture</td>
  </tr>
  <tr> 
    <td height="35" valign="top">item.price</td>
  </tr>
  <tr> 
    <td height="60" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr> 
    <td height="39" valign="top">ccinfo.address, item.id</td>
  </tr>
</table>
<?php
require("functions/database.php");

$result=search("CD","ALL","ALL");
while($row=mysql_fetch_array($result))
{
 echo "<Br>".$row[0];
}

?>

<select name="itemlist" size="10" id="itemlist" onChange="form_remove.itemid.value=form_remove.itemlist.value" >
        <option value="value" selected>tst</option>
        <option value="u">khn</option>
        <?php
		//add all items to the list
	   	$con=connectdb();
	   	$result=mysql_query("SELECT `id`,`name` FROM `item` WHERE status != 'Sold' ORDER BY `name` ASC ",$con)
				or die('<div class="error"> ERROR while getting item list. <br>'.mysql_error().'</div>');;
	   	while($row=mysql_fetch_array($result))
	   	{   echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';  }
		echo 'alert('.$result.');';
	  ?>
                  </select>