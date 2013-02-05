<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/controlcenter.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Control Center</title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../default.css" rel="stylesheet" type="text/css">
<?php
	include("../functions/auth.php");
	checklogin();
?>

<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
}
-->
</style></head>

<body onLoad="MM_preloadImages('../images/item1_hover.png','../images/item2_hover.png','../images/item3_hover.png','../images/item4_hover.png')">

<table width="612" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="50" colspan="9" valign="top"><h1 align="center">Control Center Tasks</h1></td>
  <td width="112"></td>
  </tr>
  <tr>
    <td width="43" height="35">&nbsp;</td>
  <td width="110" valign="top"><a href="additem.php" onMouseOver="MM_swapImage('Image1','','../images/item1_hover.png',1)" onMouseOut="MM_swapImgRestore()"><img src="../images/item1.png" name="Image1" width="110" height="35" border="0" id="Image1"></a></td>
    <td width="4">&nbsp;</td>
    <td width="110" valign="top"><a href="requestitem.php" onMouseOver="MM_swapImage('Image2','','../images/item2_hover.png',1)" onMouseOut="MM_swapImgRestore()"><img src="../images/item2.png" name="Image2" width="110" height="35" border="0" id="Image2"></a></td>
    <td width="4">&nbsp;</td>
    <td width="111" valign="top"><a href="removeitem.php" onMouseOver="MM_swapImage('Image3','','../images/item3_hover.png',1)" onMouseOut="MM_swapImgRestore()"><img src="../images/item3.png" name="Image3" width="110" height="35" border="0" id="Image3"></a></td>
    <td width="4">&nbsp;</td>
  <td width="110" valign="top"><a href="settings.php" onMouseOver="MM_swapImage('Image4','','../images/item4_hover.png',1)" onMouseOut="MM_swapImgRestore()"><img src="../images/item4.png" name="Image4" width="110" height="35" border="0" id="Image4"></a></td>
  <td width="4">&nbsp;</td>
  
  <td width="110"><a href="seerequestitem.php" onMouseOver="MM_swapImage('Image5','','../images/item5_hover.png',1)" onMouseOut="MM_swapImgRestore()"><img src="../images/item5.png" name="Image5" width="110" height="35" border="0" id="Image5"></a></td>
  <td width="4">&nbsp;</td>
  <td valign="middle" align="center">
  <?php 
//    echo $_SESSION["login"];
//	echo '<a href="seerequestitem.php"> <img border="0" src="../images/reservedimage.png" height="30" width="75" alt="seerequesteditem"></a>';
  echo '<a href="logout.php"> <img border="0" src="../images/logout.png" height="30" width="75" alt="Logout"></a>';
 
  ?>
  </td>
  </tr>
  <tr>
    <td height="0"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
<!-- InstanceBeginEditable name="itemcontent" -->
<table border="0" cellpadding="6" cellspacing="0"> 
<tr>
<td valign="top" height="300" width="600" class="item2"><font size="6">सामान ओगट्नुहोस्</font><br></br><a href="../help/additem.htm"><img src="../images/help.gif" width="120" height="44" border="0"></a>
<?php
	include("../functions/database.php");
	$mode=@$_GET["mode"];
	
	if($mode=="submit")
	{
	 $itemid=$_POST["itemid"];
	 $requesteename=@$_POST["requesteename"];
	 if(@$_POST["address"]=="none")
	 {
	 $requesteeaddress=@$_POST["requesteeaddress"];
	 }
	 else
	 $requesteeaddress=@$_POST["address"];
	 $sql="SELECT 	`id`, `name`, `description`, `price`, 
	 				`categoryid`, `picture`, `date`, 
					`ccid`, `contact`, `status`
			FROM `item` WHERE `id`='".$itemid."' ";
	  $con=connectdb();
	  $result=mysql_query($sql,$con)
	  	or die('<div class="error"> ERROR, while getting item Detail <br>'.mysql_error().'</div>');
	  $row=mysql_fetch_array($result);
	  if(!$row)
	  {
	   die('<div class="error"> ERROR<br> Item doesnot exist with ItemID='
	   			.$itemid.'</div>
				<br><a href="requestitem.php">Try Again</a>');
	  }
	  echo '<div align="center"> Are you sure to Reserve this item?<font size="5">(सामान ओगट्ने पक्का हो?)</font><p>';?>
	  <table width="100%" border="0">
  <tr>
    <td width="21%" height="21">&nbsp;</td>
    <td width="19%"><span class="style1">Name</span></td>
    <td width="6%">:</td>
    <td width="21%"><?php echo "<font color = 'white'>$row[1]</font>"?></td>
    <td width="33%" rowspan="10" valign="top"><img src="<?php if($row[5]=="nophoto.png"){echo "../images/itemimages/nophoto.png";}else{echo "../images/itemimages/$row[5]";}?>" width="150" height="150"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style1">Description</span></td>
    <td>:</td>
    <td><?php echo "<font color = 'white'>$row[2]</font>"?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style1">Price</span></td>
    <td>:</td>
    <td><?php echo "<font color = 'white'>$row[3]</font>"?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style1">Contact</span></td>
    <td>:</td>
    <td><?php echo "<font color = 'white'>$row[8]</font>"?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style1">Status</span></td>
    <td>:</td>
    <td><?php echo "<font color = 'white'>$row[9]</font>"?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style1">ओगट्ने</span></td>
    <td>:</td>
    <td><?php echo "<font color = 'white'>$requesteename</font>"?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style1">ठेगाना</span></td>
    <td>:</td>
    <td><?php echo "<font color = 'white'>$requesteeaddress</font>"?></td>
  </tr>
 
</table>
<?php 
	 /* //echo $row["id"]."<br>";
	  echo $row["name"]."<br>";
	  echo $row["description"]."<br>";
	  echo $row["price"]."<br>";
	  //echo $row["categoryid"]."<br>";
	  //echo $row["picture"]."<br>";
	  //echo $row["date"]."<br>";
	  //echo $row["ccid"]."<br>";
	  echo $row["contact"]."<br>";
	  echo $row["status"]."<br>";*/
	  //echo "ओगट्ने:$requesteename <br>";
	  //echo "ठेगाना:$requesteeaddress <br>";
	  
	  
	  echo '<a href="requestitem.php?mode=confirm&itemid='.$itemid.'& ccid='.$row['ccid'].'& rname='.$requesteename.'& raddr='.$requesteeaddress.'">Yes(हो)</a>||<a href="requestitem.php">Cancel(होइन)</a>';
	  echo  '</div>';
	}
	else if($mode=="confirm")
	{
	 $date=Date('Y-m-d');
	 $itemid=$_GET["itemid"];
	 $ccid=$_GET["ccid"];
	 $requesteename=@$_GET["rname"];
	 $requesteeaddress=@$_GET["raddr"];
	 
	 $sql="UPDATE `item` SET status='Requested' WHERE `id`='".$itemid."'";
	 $sql1="insert into itemrequest(itemid,ccid,requesteename,requesteeaddress,date) values('".$itemid."','".$ccid."','".$requesteename."','".$requesteeaddress."','".$date."')";
	 $con=connectdb();
	 mysql_query($sql,$con)
	 	or die('<div class="error">ERROR, While setting status of ITEM==Reserve.(त्रुटि भएको छ)<br>'.mysql_error().'</div>');
	 mysql_query($sql1)
	 	or die('<div class="error">ERROR, While setting status of ITEM==Reserve.(त्रुटि भएको छ)<br>'.mysql_error().'</div>');
	  echo"Reservation of the item was successfull($requesteename,$requesteeaddress को नाममा $ccid बाट सामान ओगटिएको छ) ";
	}
	else
	{
	 include("forms/form_requestitem.php");
	}
?>
</td>
</tr>
</table>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
