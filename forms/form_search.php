<form action="search.php" method="post" name="form_search" id="form_search">
  <table width="100%" border="0">
    <tr>
      <td align="center">Search 
        <input name="value" type="text" id="value" onFocus="form_search.value.value=''" <?php echo 'value='.@$value;?>>
        in
        <select name="categoryid" id="categoryid" >
          <option value="ALL" selected>All Categories</option>
    	  <?php
			//add categories to the list
	   		$con=connectdb();
	   		$result=mysql_query("SELECT * FROM `category` ORDER BY `category` ASC ",$con)
				or die('<div class="error"> ERROR while getting category list. <br>'.mysql_error().'</div>');
	   		while($row=mysql_fetch_array($result))
	   		{   echo '<option value="'.$row["id"].'">'.$row["category"].'</option>';  }
		  ?>
        </select>
        from
        <select name="place" id="place" >
          <option value="ALL" selected>All Places</option>
          <?php
			//add categories to the list
	   		$con=connectdb();
	   		$result=mysql_query("SELECT * FROM `village` ORDER BY `address` ASC ",$con)
				or die('<div class="error"> ERROR while getting village list. <br>'.mysql_error().'</div>');
	   		while($row=mysql_fetch_array($result))
	   		{   echo '<option value="'.$row["id"].'">'.$row["address"].'</option>';  }
		  ?>
        </select> 
        <input type="submit" name="Submit" value="Search"></td>
    </tr>
  </table>
</form>
