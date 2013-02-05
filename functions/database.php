
<?php
/*
IMPORTANT !!! Copy this code after each mysql_query(...)

	or die('<div class="error"> ERROR <br>'.mysql_error().'</div>')

*/
function connectdb()
{
/*
  Connects to MySql server, uses the database, returns the dblink
*/

  $hostname = "localhost";
  $database = "Haatbazar";
  $username = "root";
  $password = "nepalwireless2064";
  $dbcon=mysql_connect($hostname,$username,$password);
  mysql_query("USE ".$database,$dbcon) 		
  	or// die('<div class="error"> ERROR <br>'.mysql_error().'</div>');
  die($sql." could not be executed");
  return $dbcon;
}
function changepassword($user,$password,$con)
{
/*
Updates the ccinfo table to change password gien the username.Implemented for cc
$sql="UPDATE  'ccinfo' SET password=.$password" where ccid=.$user";
mysql_query($sql,$con);
$result=mysql_query($sql,$con)
or die('<div class="error"> ERROR, while changing password <br>'.mysql_error().'</div>');
	$row=mysql_fetch_array($result);
	return $row[0];
*/
}
function addcategory($newcategory,$con)
{
//conntecdb();

	//Adds given string as new category in the CATEGORY table
	//and returns the ID it got (automatically) to the caller. 
	
	//If the given category already exists, returns its ID. 

	//TODO check if category already exists. 

	//add category
  	$sql="INSERT INTO category ( category ) VALUES ( '$newcategory')";
	mysql_query($sql,$con)
		or die('<div class="error"> ERROR, while adding new Category <br>'.mysql_error().'</div>');

	//get id of this new added category and return 
	$sql="SELECT id FROM category WHERE category='$newcategory'";
	$result=mysql_query($sql,$con)
		or die('<div class="error"> ERROR, while getting ID <br>'.mysql_error().'</div>');
	$row=mysql_fetch_array($result);
	return $row[0];


}
function additem($name, $description, $catid, $price, $pathofphoto, $contact, $ccid, $dbconnection)
{
/*
1. To add item.
Parameters: 	
		Name, 
		Description, 
		CategoryID, 
		Price,
		pathofphoto,
		contact,       <-----owner of the item 
		CCID=Control center who added item,
		DatabaseConnector

Assumed:	Date=Today
NOTE: 
  id : autoincremented
*/

$result="Parameters Missing(डाटा दिनुहोस्)";
  $today=date("Y-m-d");
if(!($description=="")||(!($catid==""))||(!($price==""))||(!($contact==""))||(!($ccid==""))) //if condition added by Ramesh
{
 $sql=	"INSERT INTO `item` ( `name` , `description` , `categoryid` , `price` ,
  							  `picture`, `contact`, `ccid` , `date` )
		 VALUES ( '".$name
		."' , '".$description
		."' , '".$catid
		."' , '".$price
		."' , '".$pathofphoto
		."' , '".$contact	
		."' , '".$ccid
		."' , '".$today
		."' ) ";
	$result=mysql_query($sql,$dbconnection) 
		or die('<div class="error"> ERROR, while adding new Item <br>'.mysql_error().'</div>');
}	
return $result;
}
/*
//TEST
$con=mysql_connect("localhost","root","");
mysql_query("use haatbazar",$con);
additem('Goat','3 Years old 15 kg','3','500','1',$con);
*/


function requestitem($itemid,$ccid,$dbconnection)
{
/*
 To add a request
Parameters: 	itemid:  to request, 
		ccid: Control Center who requested, 
		date=today
*/


//TODO : Check if item exists
  $today=date("Y-m-d");
  $sql= "INSERT INTO `itemrequest` ( `itemid` , `ccid` , `date` )  
		VALUES ( '".$itemid
		."' , '".$ccid
		."' , '".$today
		."' ); ";
	mysql_query($sql,$dbconnection) 
		or die('<div class="error"> ERROR, while adding request <br>'.mysql_error().'</div>');
}

/*
//TEST
$con=mysql_connect("localhost","root","");
mysql_query("use haatbazar",$con);
requestitem('1','5',$con);
*/


/*
 Remove Item ---> not remove from dbase but make status=sold. so not to display in the bazar.
Parameters: itemid: to remove

implemented in controlcenter/removeitem.php -->> make it function
*/



/*
   SEARCH ITEM 
  		Search item(s) such that, 
			- given string matches with item.name OR item.description
			- is categorized as `category`
			- is available at given place (ccid.address)
  PARAMETERS
	$value: value to be searched on item.NAME and item.DESCRIPTION. 
	$categoryid: id of category to search on. SPECIAL : ALL <-- to search on all types/cat`s. 
	$place : string to be searched on ccinfo.ADDRESS  : ALL <-- to search on all locations. 
  RETURNS
  	the result identifier (from the mysql_query())
*/

function search($value, $categoryid, $place)
{    
echo "<br>function>>database.php>>search";
	$con=connectdb();

	if($place=='ALL') {
		$ccinfo_address='%';
		echo 'place = all';
	}
	else{ 
		$ccinfo_address=$place;
		echo 'place != all';
	}
	
	if($categoryid=='ALL') 
	{
		$sql="SELECT item.id
			  FROM `item` INNER JOIN `ccinfo`
			  ON item.ccid=ccinfo.ccid
			  WHERE (
			  		  ((item.name LIKE '%".$value."%' ) OR (item.description LIKE '%".$value."%' ))
					  AND ( ccinfo.address LIKE '%".$ccinfo_address."%' )
					  AND ( item.status != 'Sold' )
					 )";
			echo 'category = all';
	}
	else
	{
	echo "<br>jasdfksfhasdkfjkasd category != all";
		$sql="SELECT item.id
			  FROM `item` INNER JOIN `ccinfo`
			  ON item.ccid=ccinfo.ccid
			  WHERE (
			  		  ((item.name LIKE '%".$value."%' ) OR (item.description LIKE '%".$value."%' ))
					  AND ( item.categoryid='".$categoryid."' )
					  AND ( ccinfo.address LIKE '%".$ccinfo_address."%' )
					  AND ( item.status != 'Sold' )
					 )";
	}

	$result=mysql_query($sql,$con)
		or //die($sql.' <div class="error"> ERROR gsdfgsdgwhile searching in database<br>'.mysql_error().'</div>');
	die($sql." cannot be executed");
	
	echo 'result = '.$result;
	return $result;
}

?>
