
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/controlcenter.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Additem</title>
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
	//echo '<a href="seerequestitem.php"> <img border="0" src="../images/reservedimage.png" height="30" width="75" alt="seerequesteditem"></a>';
 
	echo '<a href="logout.php"><img border="0" src="../images/logout.png" height="30" width="75" alt="Logout"></a>';
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
<table border="0" cellpadding="10" cellspacing="0"> 
<tr>
<td valign="top" height="300" width="600" class="item1">
<h2 align="left"><font size="6">&#2344;&#2351;&#2366; 
        &#2360;&#2366;&#2350;&#2366;&#2344; &#2341;&#2346;&#2381;&#2344;</font></h2><a href="../help/additem.htm"><img src="../images/help.gif" width="120" height="44" border="0"></a>
      
      <?php 
  include("../functions/database.php");
  	$mode=@$_GET["mode"];

	if($mode=="submit") //if the data in form are submitted to add in dbase. 
	{
		$name=$_POST["name"]; 
		$description=$_POST["description"]; 
		$price=$_POST["price"];
		$category=$_POST["category"]; 
		$contact=$_POST["contact"];
		
		//upload image, if any
		//TODO: assigning unique names to all pictures?? Based upon assigned itemID (maybe)
		$thumbdir = "../images/itemimages/";
		$imagedir = "../images/realImages/";
		
		$random = (rand()%10000);
		//echo "$random<br>";
		//$imagefile=$imagedir.basename($_FILES['picture']['name']);
		$picture = $random.$_FILES['picture']['name'];
		$imgType = $_FILES['picture']['type'];		
		
		if(!$_FILES["picture"]['name']=="" && ($imgType=="image/jpeg"||
												$imgType=="image/jpg"||
												$imgType=="image/bmp"||
												$imgType=="image/png"||
												$imgType=="image/gif"||
												$imgType=="image/pjpeg")
							) 
		{
			$size		= getimagesize($_FILES['picture']['tmp_name']);
			$width	 	= $size[0];
		    $height	 	= $size[1];
		    $uploaddir 	= $imagedir.basename($picture);
			if(!move_uploaded_file($_FILES['picture']['tmp_name'],$imagedir.$picture))
			{
			  echo ("<div class='error'>Error while uploading file</div>");
			  
			}
			else
			{
				$picture = $random.$_FILES['picture']['name']; 
				thumbnail($width,$height,$picture,$uploaddir,$thumbdir,$imgType,200,200);
			}
		}
		else
		{ 
			$picture="nophoto.png"; 
			if($_FILES["picture"]['name']=="")
				echo "Photo not posted!<br>"; else echo "Your picture format is not supported!";
		}
		echo "hellooooo";
		
		/*function thumbnail($width,$height,$final,$uploaddir,$thumbdir,$srcType,$reqImgW,$reqImgH)
		{
			echo "upload::$uploaddir<br>thumb::$thumbdir";
			$dest_x = $reqImgW;
			$dest_y = $reqImgH;
			$imgsrc = "$uploaddir/";
			$src_img = imagecreatefromjpeg($imgsrc);
			$dst_img = imagecreatetruecolor($dest_x, $dest_y);
			
			//$src_img = imagecreatefromjpeg($imgsrc);			
						
			//  Resize image
			imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0,$dest_x,$dest_y, $width,$height);
				
			//  Output image			 
			//$destdir = $thumbdir.$final;			
			
			if($srcType=="image/jpg" || $srcType=="image/JPG")
			{ ## for jpg image
				echo "JPG";
				@imagejpeg($dst_img, $thumbdir.$final,72);
				@chmod($thumbdir.$final,0755);
			}
			elseif($srcType=="image/pjpeg" || $srcType=="image/PJPEG")
			{ ## for pjpg image
				@imagejpeg($dst_img, $thumbdir.$final,72);
				@chmod($thumbdir.$final,0755);
			}
			elseif($srcType=="image/jpeg" || $srcType=="image/JPEG")
			{ ## for jpg image
				echo "JPEG";
				$v = imagejpeg($dst_img,$thumbdir.$final,72);
				@chmod($thumbdir.$final,0755);
				//echo "<><><><".$thumbdir.$final;
			}	
			elseif($srcType =="image/gif" || $srcType=="image/GIF")
			{ ## for gif image		
				@imagegif($dst_img,$thumbdir.$final,72);
				@chmod($thumbdir.$final,0755);
			}
			elseif($srcType=="image/bmp" || $srcType=="image/BMP")
			{ ## for bitmap image
				@imagewbmp($dst_img, $thumbdir.$final,72);
				@chmod($thumbdir.$final,0755);
			}
			elseif($srcType=="image/png" || $srcType=="image/PNG")
			{ ## for png image
				@imagepng($dst_img, $thumbdir.$final,72);
				@chmod($thumbdir.$final,0755);
			}
			//  Destroy images
			@imagedestroy($src_img);
			@imagedestroy($dst_img);
		}*/

		$ccid=@$_SESSION["login"];
		
		$con=connectdb();
		if($category=="none")
		{
			$newcategory=$_POST["newcategory"];
			//echo $newcategory;
			$catid=addcategory($newcategory,$con);
			$result=additem($name,$description,$catid,$price,$picture,$contact,$ccid,$con);
		}
		else
		{
			$result=additem($name,$description,$category,$price,$picture,$contact,$ccid,$con);
		}
	// info display
		//get id of this new added item (LOGIC newly entered item gets highest ID of all , since AUTO INCREMENT
			$sql="SELECT `id` FROM `item` WHERE `name`='".$name."' ORDER BY `id` DESC;";
			$query=mysql_query($sql,$con)
				   	or die('<div class="error"> ERROR <br>'.mysql_error().'</div>');
			$row=mysql_fetch_array($query);
			$itemid=$row[0];

		if($result==1)
		{
		  echo '<br><br>Congratulations!! A new item has been added<br><br><font color=black>ITEMID: '.$itemid.'</font>';
		  echo "<br><br>Item Name: $name<br><br>Description: $description<br><br>Price: $price<br><br>Contact: $contact<br><br>";

		}
		else
		{
		  echo '<div class="error"> UNKNOWN ERROR: The item could not be entered</div>';
		}
	}//end of submit mode
	else
	{
		//show additem form (interfaceस)
		include("forms/form_additem.php");
	}
  ?>
    </td>
</tr>
</table>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
