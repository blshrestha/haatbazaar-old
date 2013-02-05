<? ###################################-SCRIPTS and CSS for zoom-########################################?>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dimension.js"></script>
<script type="text/javascript" src="js/jquery.shadow.js"></script>
<script type="text/javascript" src="js/jquery.fancyzoom-min.js"></script>
<script type="text/javascript" src="js/jquery.ifixpng.js"></script>

<link rel="stylesheet" href="css/jqzoom.css" type="text/css" media="screen" />
<script type="text/javascript" language="javascript">
	$(function(){	
		$('#zoomIt > a:first').fancyzoom({Speed:400,showoverlay:false});
		$('#nooverlay').fancyzoom({Speed:0,showoverlay:true,overlay:4/10});
	});
</script>

<?
include("search_class.php");
include("./functions/database.php");
include("./forms/form_search1.php");
$paging=new paging(9,9);
$paging1=new paging(9,9);
@session_start();
$value=@$_REQUEST['value'];
$place=@$_REQUEST['place'];
$category=@$_REQUEST['categoryid'];
//To restart a new session when the new entry has been added to the fields for searching//
if((!(@$_REQUEST['value']==""))||(!(@$_REQUEST['place']==""))||(!(@$_REQUEST['categoryid']=="")))
{
session_unregister('test');//unregistering the already registered session
session_unregister('place');
session_unregister('category');
}

if(!(isset($_SESSION['test'])))
{
$_SESSION['test']=@$value;
$_SESSION['place']=@$place;
$_SESSION['category']=@$category;
}
if(!(session_is_registered('test')))
{
session_register('test');
session_register('place');
session_register('category');
$test="test";
session_start();	//start session and initialize the variable if not already done!
$_SESSION['test']=@$value;//setting value of session instead of only value
$_SESSION['place']=@$place;
$_SESSION['category']=@$category;
//session_register($test);
//echo"session not set1";

//echo"$_SESSION[test]";
}
else
{
echo"Search for";
$t=$_SESSION['test'];
echo"  $t<br>";
$s=$_SESSION['place'];
//echo"<br>Posted from: $s</br>";
$cat=$_SESSION['category'];
//echo"For the category:$cat<br>";
}
$paging->db("localhost","root","nepalwireless2064","Haatbazar");
//$paging->query("select *from item where name='$t'");
//TODO:a separate query if catgory and places are not set to all:Ramesh
$paging->query("select item.id,item.name,item.price,item.description,item.status,item.picture,item.contact, ccinfo.address from item,ccinfo where item.name like'%$t%' and item.ccid=ccinfo.ccid and item.status!='Sold' order by item.id desc");

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
$thumbdir = 'images/itemimages/';
$realdir  = 'images/realImages/';

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
echo "<tr><td valign=top width='100%' height=10 align=center class=display1><b>$result[name]</b></td></tr>";?>
<tr>
		<td valign=top height="200" align="center" class="display1">
			<div id="zoomIt">
				<a href="<?=$realdir?><?=$image?>" id="1">
					<img height="200" width="200" src="<?=$thumbdir?><?=$image?>" alt="<?=$result[description]?>" style="border:0;">
				</a>
			<div>
		</td>
	</tr><?
echo "<tr><td align=center class=display2>ID:$result[id]</td></tr>";
echo "<tr><td align=center class=display2>Rs.$result[price]</td></tr>";
echo "<tr><td align=center class=display2>Status:$result[status]</td></tr>";
echo "<tr><td align=center class=display2>Location:$result[address]</td></tr>";
echo "<tr><td width=200 align=center class=display2>Seller:$result[contact]</td></tr>";//added by shakeel
echo "<tr><td width=200 align=center class=display2>$result[description]</td></tr>";//added by shakeel

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
