<?
include("search_class.php");
include("./functions/database.php");
$paging=new paging(9,9);
if(!($_POST['value']==''))
{
if(!(isset($_SESSION['test'])))
{
$test="test";
session_start();			//start session and initialize the variable if not already done!
$_SESSION['test']=1;
session_register($test);
//use_cookies();
//setcookie('haat');
//session.cookie_lifetime(0);
//echo"using cookies and sessions";
//echo"$_COOKIE[haat]";


}}
else
{
//setcookie('haat'); //to destroy cookie
//die("session already set");
}

$paging->db("localhost","root","","haatbazar");
		//storing the value of name entered in the search bar
$value=@$_POST["value"];
		if(!$value=='') $value=@$_GET["value"];
	
	$categoryid=@$_POST["categoryid"];
		if(!$categoryid=='') $categoryid=@$_GET["categoryid"];
			if($categoryid=='') $categoryid='ALL';
		
 	$place=@$_POST["place"];
		if(!$place=='') $place=@$_GET["place"];
			if($place=='') $place='ALL';
//$query="select * from item where name='$value'";
$testforall=null;
if(!($value==''))
{
			//$paging->query("select * from item where name='$value'");
			//$paging->query("Select * FROM paging ORDER BY MY_FIELD ASC");
			//AND ( ccinfo.address LIKE '%".$ccinfo_address."%' )
			if((($value=='%')or($value=='all')or($value=='ALL')))
			{
			$testforall=1;
			//echo"value is set for all1";
			echo"inside1";
			$paging->query("select * from item ");
			
			/*$paging->query("SELECT item.id
			  FROM `item` INNER JOIN `ccinfo`
			  ON item.ccid=ccinfo.ccid
			  WHERE (
			  		  ((item.name LIKE '%".$value."%' ) OR (item.description LIKE '%".$value."%' ))
					  AND ( item.categoryid='".$categoryid."' )
					  AND ( ccinfo.address LIKE '%".$ccinfo_address."%' )
					  AND ( item.status != 'Sold' )
					 )");*/
			
			
			//setcookie();
			}
			else
			{
			$testforall=1;
			echo"Search for:$value";
			//echo"value is set for someitem";
			$paging->query("select *from item where name='$value'");
			
			//testing the new query//
			
			/*$paging->query("SELECT item.id
			  FROM `item` INNER JOIN `ccinfo`
			  ON item.ccid=ccinfo.ccid
			  WHERE (
			  		  ((item.name LIKE '%".$value."%' ) OR (item.description LIKE '%".$value."%' ))
					  AND ( item.categoryid='".$categoryid."' )
					  AND ( ccinfo.address LIKE '%".$ccinfo_address."%' )
					  AND ( item.status != 'Sold' )
					 )");*/
			
			
			
			//setcookie('haat'); //to destroy cookie
			}
}
else
{

			if(isset($_SESSION['test'])&&($value==''))
			{
			echo"inside2<br />";
			$testforall=1;
			$paging->query("select *from item");
			/*$paging->query("SELECT item.id
			  FROM `item` INNER JOIN `ccinfo`
			  ON item.ccid=ccinfo.ccid
			  WHERE (
			  		  ((item.name LIKE '%".$value."%' ) OR (item.description LIKE '%".$value."%' ))
					  AND ( item.categoryid='".$categoryid."' )
					  AND ( ccinfo.address LIKE '%".$ccinfo_address."%' )
					  AND ( item.status != 'Sold' )
					 )");*/
			
			
			
			echo"$_SESSION[test]<br />";
			
			//header("Location:forms/form_search.php");
			
			//place here the searchitem.php that allows parameters for search @ramesh
			}
			else
			{
			$paging->query("select *from item");
			/*$paging->query("SELECT item.id
			  FROM `item` INNER JOIN `ccinfo`
			  ON item.ccid=ccinfo.ccid
			  WHERE (
			  		  ((item.name LIKE '%".$value."%' ) OR (item.description LIKE '%".$value."%' ))
					  AND ( item.categoryid='".$categoryid."' )
					  AND ( ccinfo.address LIKE '%".$ccinfo_address."%' )
					  AND ( item.status != 'Sold' )
					 )");*/
			
			//setcookie();
			//header("Location:forms/form_search.php");
			//echo"we are missing search parameters<br />";
			
			}

}


//////////////////////////////////////////////////////
//this portion is under test for thumbnails/////////
/////////////////////////////////////
// $im is now 'Image Resource', which can be used
// with the other image functions
/////////////////////////
//thumbnails test##########
//////////////////////////////
$page=$paging->print_info();
echo "Data $page[start] - $page[end] of $page[total] [Total $page[total_pages] Pages]<hr>\n";
$imagedir='images/itemimages/';
echo"inside test2";
echo "<table border=0>";
echo "<tr width=100% height=30%>";
$count=1;
while ($result=$paging->result_assoc()) {
echo "<td>";
$image=$result["picture"];
//echo"$imagedir";
echo "<table border=1>";
echo "<tr><td valign=top width='100%' height=10 align=center class=display1><b>$result[name]</b></td></tr>";
echo "<tr><td valign=top height=200 align=center class=display1><img width=200 height=200 src='$imagedir/$image' alt=$result[description]></td></tr>";
echo "<tr><td align=center class=display2>$result[price]</td></tr>";
echo "<tr><td align=center class=display2>$result[status]</td></tr>";
echo "<tr><td align=center class=display2>$result[ccid]</td></tr>";
echo "</table>";
echo "</td>";
if(($count%3)==0){
	echo "</tr></table><br>";	
	echo "<table border=0>";
	echo "<tr width=100% height=30%>";
}
$count++;
}
echo"inside test3";
echo "</tr></table>";
echo "<hr>".$paging->print_link();

?> 