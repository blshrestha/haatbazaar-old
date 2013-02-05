<?php

/*
  Connects to MySql server, uses the database, returns the dblink
*/
function connectdb()
{
  $hostname = "localhost";
  $database = "Haatbazar";
  $username = "root";
  $password = "nepalwireless2064";
  $dbcon=mysql_connect($hostname,$username,$password);
  mysql_query("USE ".$database);
  return $dbcon;
}

/*
1. To add item.
Parameters: 	Name, 
		Description, 
		CategoryID, 
		Price, 
		CCID=Control center who added item,
		DatabaseConnector
		Date=Today
NOTE: 
  id : autoincremented
*/

function additem($name, $description, $catid, $price, $ccid, $dbconnection)
{
  $today=date("Y-m-d");
  $sql=	"INSERT INTO `item` ( `name` , `description` , `categoryid` , `price` , `ccid` , `date` )
		 VALUES ( '".$name
		."' , '".$description
		."' , '".$catid
		."' , '".$price
		."' , '".$ccid
		."' , '".$today
		."' ); ";
	$result=mysql_query($sql,$dbconnection);
	return $result;
}
/*
//TEST
$con=mysql_connect("localhost","root","");
mysql_query("use haatbazar",$con);
additem('Goat','3 Years old 15 kg','3','500','1',$con);
*/


/*
2. To add a request
Parameters: 	itemid:  to request, 
		ccid: Control Center who requested, 
		date=today
*/
function requestitem($itemid,$ccid,$dbconnection)
{
//TODO : Check if item exists
  $today=date("Y-m-d");
  $sql= "INSERT INTO `itemrequest` ( `itemid` , `ccid` , `date` )  
		VALUES ( '".$itemid
		."' , '".$ccid
		."' , '".$today
		."' ); ";
	mysql_query($sql,$dbconnection) or die("<br>Could request item. Database Error");
}

/*
//TEST
$con=mysql_connect("localhost","root","");
mysql_query("use haatbazar",$con);
requestitem('1','5',$con);
*/


/*
3. Remove Item
Parameters: itemid: to remove
*/
?>
