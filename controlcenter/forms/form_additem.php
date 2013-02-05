<form action="additem.php?mode=submit" method="post" name="form_additem" id="form_additem" enctype="multipart/form-data"  >
  <table width="100%"  border="0" cellspacing="3" cellpadding="0">
    <tr>
      <td width="25%"><font size="5">&#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; &#2344;&#2366;&#2350;</font></td>
      <td><input name="name" type="text" id="name" size="30" ></td>
    </tr>
    <tr>
      <td><font size="5">&#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; &#2348;&#2366;&#2352;&#2375;&#2350;&#2366;</font></td>
      <td><textarea name="description" cols="40" rows="4" id="description" onFocus="if(form_additem.name.value=='') { alert('&#2346;&#2361;&#2367;&#2354;&#2375; &#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; &#2344;&#2366;&#2350; &#2342;&#2367;&#2344;&#2369;&#2361;&#2379;&#2360;&#2381;  Give Item Name First'); } "></textarea>
      </td>
    </tr>
    <tr>
      <td><font size="5">&#2350;&#2369;&#2354;&#2381;&#2351; (&#2352;&#2369;)</font></td>
      <td><input name="price" type="text" id="price" size="10" onFocus="if(form_additem.description.value==''){ alert(' &#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; &#2348;&#2366;&#2352;&#2375;&#2350;&#2366; &#2354;&#2375;&#2326;&#2381;&#2344;&#2369;&#2361;&#2379;&#2360;&#2381; Write Short Description about the Item');}">
       </td>
    </tr>
    <tr>
      <td><font size="5">&#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; &#2346;&#2381;&#2352;&#2325;&#2366;&#2352;</font></td>
      <td>
        <select  name="category" id="category" onChange='if(form_additem.category.value=="none"){ form_additem.newcategory.size="30"; form_additem.newcategory.value="&#2344;&#2351;&#2366; &#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; &#2346;&#2381;&#2352;&#2325;&#2366;&#2352; &#2351;&#2361;&#2366; &#2354;&#2375;&#2326;&#2381;&#2344;&#2369;&#2361;&#2379;&#2360;&#2381;";} else form_additem.newcategory.size="1"' >
          <option  value="none">-----</option>
          <?php
		//add categories to the list
	   	$con=connectdb();
	   	$result=mysql_query("SELECT * FROM `category` ORDER BY `category` ASC ",$con)
				or die('<div class="error"> ERROR while getting category list. <br>'.mysql_error().'</div>');;
	   	while($row=mysql_fetch_array($result))
	   	{   echo '<option value="'.$row["id"].'">'.$row["category"].'</option>';  }
	  ?>
          <option  value="none">-----</option>
          <option value="none" ><font size="5">&#2344;&#2351;&#2366; &#2346;&#2381;&#2352;&#2325;&#2366;&#2352;</font></option>
        </select>        
        <input  name="newcategory" type="text" id="newcategory" onFocus='form_additem.newcategory.value=""; form_additem.newcategory.size="30"; form_additem.category.value="none"' value="&#2344;&#2351;&#2366; &#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; &#2346;&#2381;&#2352;&#2325;&#2366;&#2352; &#2351;&#2361;&#2366; &#2354;&#2375;&#2326;&#2381;&#2344;&#2369;&#2361;&#2379;&#2360;&#2381;" size="1" >
	  </td>		
    </tr>
    <tr>
      <td><font size="5">&#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; &#2347;&#2379;&#2337;&#2379;</font></td>
      <td><input name="picture" type="file" id="picture"  >      </td>
    </tr>
    <tr>
      <td><font size="5">&#2360;&#2366;&#2350;&#2366;&#2344; &#2348;&#2375;&#2330;&#2381;&#2344;&#2375; &#2357;&#2381;&#2351;&#2325;&#2381;&#2340;&#2367;&#2325;&#2379; &#2357;&#2367;&#2357;&#2352;&#2339;</font></td>
      <td><textarea name="contact" cols="40" rows="4" id="contact"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="&#2341;&#2346;&#2381;&#2344;&#2369;&#2361;&#2379;&#2360;&#2381;">
      </td>
    </tr>
  </table>
</form>
