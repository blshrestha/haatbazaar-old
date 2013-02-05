<form action="search1.php" method="post" name="form_search1" id="form_search1">
  <table width="100%" border="0">
    <tr>
      <td align="center">Search 
        <input name="value" type="text" id="value" onFocus="form_search1.value.value=''" <?php echo 'value='.@$value;?>>
   
        <select name="categoryid" id="categoryid" >
          <option value="ALL" >All Categories</option>
    	  <?php
			//add categories to the list
	   		$con=connectdb();
	   		$result=mysql_query("SELECT * FROM `category` ORDER BY `category` ASC ",$con)
				or die('<div class="error"> ERROR while getting category list. <br>'.mysql_error().'</div>');
	   		while($row=mysql_fetch_array($result))
	   		{   echo '<option value="'.$row["category"].'">'.$row["category"].'</option>';  }
		  ?>
        </select>
        from
        <select name="place" id="place" >
          <option value="ALL">All Places</option>
          <?php
			//add places to the list
	   		$con=connectdb();
	   		$result=mysql_query("SELECT * FROM `village` ORDER BY `address` ASC ",$con)
				or die('<div class="error"> ERROR while getting village list. <br>'.mysql_error().'</div>');
	   		while($row=mysql_fetch_array($result))
	   		{   echo '<option value="'.$row["address"].'">'.$row["address"].'</option>';  }
		  
		  ?>
        </select> 
        <input type="submit" name="Submit" value="Search"></td>
    </tr>
  </table>
</form>
