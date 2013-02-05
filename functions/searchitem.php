<?php
function displayitem($itemid)
{
if($itemid=="")
{
die('<div class="warning">No items to be displayed !!');
}
 //include('database.php');
 else
 {
 $sql="SELECT item.id, item.name, item.price, item.picture, ccinfo.address, item.description, item.status
 		FROM item JOIN ccinfo 
		WHERE item.ccid=ccinfo.ccid AND item.id='$itemid' AND item.status != 'Sold' ";
		
 $result=mysql_query($sql,connectdb())
 	or die('<div class="error">'.mysql_error().'</div>');
	    //die($sql." cannot be executed");
 $row=mysql_fetch_array($result);
 $itemid=$row[0];
 $itemname=$row[1];
 $price=$row[2];
 $picture=$row[3];
 $place=$row[4];	
 $description=$row[5];
 $imagedir='images/itemimages/';
 
 $status=$row[6];
 if($status=='Available'){//added by shakeel
	$color='#ff0000';//red color
 }
 else if($status=='Requested'){ 
	$color='#009900';//green color
 }
 else{}
 
 echo '<table> 
  <tr>
   <td valign="top" width=200 height=10 align="center" class="display1"><b>'.$itemname.'</b></td>  
  </tr> 
  <tr>
   <td height="150" align="center" valign="middle" ><img width=200 src="'.$imagedir.$picture.'" alt="'.$description.'"></td>
  </tr>
  <tr>
   <td height="10" align="center" class="display2"><b>Rs.'.$price.'</b></td>
  </tr>
  <tr>
   <td align="center" class="display2"> Location: '.$place.'</td>
  </tr>
  <tr>
   <td align="center" class="display2"><font color='.$color.'><b>'.$status.'</b></font></td>
  </tr>
</table>
'; 
}
}
?>