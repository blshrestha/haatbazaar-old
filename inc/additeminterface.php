<body>
<h1 align="center">&#2344;&#2351;&#2366; &#2360;&#2366;&#2350;&#2366;&#2344;  &#2341;&#2346;&#2381;&#2344;&#2375; </h1>
<form name="form1" method="post" action="additem.php?submit=additem">
  <table width="500" height="283"  border="0" cellpadding="2" cellspacing="2" align="center">
    <tr>
      <td width="150">&#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; &#2344;&#2366;&#2350;</td>
      <td ><input name="name" type="text" id="name" size="35"></td>
    </tr>
    <tr>
      <td>&#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379;  &#2348;&#2366;&#2352;&#2375;&#2350;&#2366;</td>
      <td><textarea name="description" cols="35" id="description"></textarea></td>
    </tr>
    <tr>
      <td>&#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; &#2346;&#2381;&#2352;&#2325;&#2366;&#2352;</td>
      <td>
	  <select name="category" id="category">
	  <?php
	   $con=connectdb();
	   $result=mysql_query("SELECT * FROM `category` ORDER BY `id` ASC ",$con);
	   while($row=mysql_fetch_array($result))
	   {   echo '<option value="'.$row["id"].'">'.$row["category"].'</option>';  }
	  ?>
        
      </select></td>
    </tr>
    <tr>
      <td>&#2350;&#2369;&#2354;&#2381;&#2351;(&#2352;&#2369;)</td>
      <td>      <input name="price" type="text" id="price"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="49">&nbsp;</td>
      <td><input type="submit" name="Submit" value="????????"></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</body>