<?
session_start();	//start session and initialize the variable if not already done!
include("search_class.php");
include("./functions/database.php");
include("./forms/form_search1.php");
$paging=new paging(9,9);
$paging1=new paging(9,9);
session_start();
$value=@$_POST['value'];
$place=@$_POST['place'];
$category=@$_POST['categoryid'];
//To restart a new session when the new entry has been added to the fields for searching//
if((!(@$_POST['value']==""))||(!(@$_POST['place']==""))||(!(@$_POST['categoryid']=="")))
{
session_unregister('test');//unregistering the already registered session
session_unregister('place');
session_unregister('category');
}

if(!(isset($_SESSION['test']))||(!isset($_SESSION['place']))||(!isset($_SESSION['category'])))
{
$_SESSION['test']=@$value;
$_SESSION['place']=@$place;
$_SESSION['category']=@$category;
}
if(!(session_is_registered('test'))||(!(session_is_registered('place')))||(!(session_is_registered('category'))))
{
session_register('test');
session_register('place');
session_register('category');
$test="test";
//session_start();	//start session and initialize the variable if not already done!
$_SESSION['test']=@$value;//setting value of session instead of only value
$_SESSION['place']=@$place;
$_SESSION['category']=@$category;
//session_register($test);
echo"session not set1";
echo"$_SESSION[test]";

}
else
{
echo"Search for";
$t=$_SESSION['test'];
echo"  $t";
$s=$_SESSION['place'];
echo"<br>Posted from Place: $s</br>";
$cat=$_SESSION['category'];
echo"For the category:$cat<br>";
}
$paging->db("localhost","root","nepalwireless2064","haatbazar");
//$paging->query("select *from item where name='$t'");
//TODO:a separate query if catgory and places are not set to all:Ramesh
if(!($cat=="ALL")&&(!($s=="ALL")))
{
if(!$t==""){
$paging->query("select item.*,ccinfo.address from item,ccinfo,category where item.name like'%$t%'and item.ccid=ccinfo.ccid and ccinfo.address='$s' and item.status!='Sold' and item.categoryid=category.id order by item.id desc ");				 
//$paging->query("select *from item where name='$t'");	
}
else{
$paging->query("select item.*,ccinfo.address from item,ccinfo,category where item.ccid=ccinfo.ccid and ccinfo.address='$s' and item.categoryid=category.id and category.category='$cat' and item.status!='Sold' order by item.id desc ");				 
}
}

	
else if(!($cat=="ALL"))
{
if(($t=="")&&($s==""))
{
$paging->query("select item.*,ccinfo.address from item,ccinfo,category where category.id=item.categoryid and category.category='$cat' and item.status!='Sold' order by item.id desc");				 

}
else
{
$paging->query("select item.*,ccinfo.address from item,ccinfo,category where item.name like'%$t%'and item.ccid=ccinfo.ccid and  category.id=item.categoryid and category.category='$cat' and item.status!='Sold' order by item.id desc");				 
//$paging->query("select *from item where name='$t'");
}
}
else if(!($s=="ALL"))
{

//$paging->query("select *from item where name='$t'");
$paging->query("select item.*,ccinfo.address from item,ccinfo,category where item.name like'%$t%'and item.ccid=ccinfo.ccid and  category.id=item.categoryid and ccinfo.address='$s' and item.status!='Sold' order by item.id desc");				 

}
	/*else
	{
		$sql="SELECT item.id
			  FROM `item` INNER JOIN `ccinfo`
			  ON item.ccid=ccinfo.ccid
			  WHERE (
			  		  ((item.name LIKE '%".$value."%' ) OR (item.description LIKE '%".$value."%' ))
					  AND ( item.categoryid='".$categoryid."' )
					  AND ( ccinfo.address LIKE '%".$ccinfo_address."%' )
					  AND ( item.status != 'Sold' )
					 )";

	}*/
	else
	{
	
	//$paging->query("select *from item where name='$t'");
	$paging->query("select item.name,item.price,item.id,item.status,item.description,item.picture,item.contact, ccinfo.address from item,ccinfo where item.name like'%$t%'and item.ccid=ccinfo.ccid and item.status!='Sold' order by item.id desc");
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

echo "<table border=0 cellspacing=20>";
echo "<tr width=100% height=30>";
$count=1;
while ($result=$paging->result_assoc()) {
//query to get the location of the cc which posted the item//
$ccid=@$result[ccid];
$paging1->query("select *from ccinfo where ccid='$ccid '");
$result1=$paging1->result_assoc();
echo "<td>";
$image=$result["picture"];
//echo"$imagedir";
echo "<table border=1 >";
echo "<tr><td valign=top width='100%' height=10 align=center class=display1><b>$result[name]</b></td></tr>";
echo "<tr><td valign=top height=200 align=center class=display1><img width=200 height=200 src='$imagedir/$image' alt=$result[description]></td></tr>";
echo "<tr><td align=center class=display2>ID:$result[id]</td></tr>";
echo "<tr><td align=center class=display2>Rs.$result[price]</td></tr>";
echo "<tr><td align=center class=display2>Status:$result[status]</td></tr>";
echo "<tr><td align=center class=display2>Location:$result[address]</td></tr>";
echo "<tr><td width=200 align=center class=display2>Seller:$result[contact]</td></tr>";//added by shakeel and copied here by Prasanna
echo "<tr><td width=200 align=center class=display2>$result[description]</td></tr>";//added by shakeel and copied here by Prasanna
echo "</table>";
echo "</td>";
if(($count%3)==0){
	echo "</tr></table><br>";	
	echo "<table border=0 cellspacing=20>";
	echo "<tr width=100% height=30>";
//error_report('0');
}
$count++;
}
echo "</tr></table>";
echo "<hr>".$paging->print_link();

?> 
