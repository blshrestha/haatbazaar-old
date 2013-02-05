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

<table width="600" border="0" cellpadding="0" cellspacing="0">
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
<table border="0" cellpadding="4" cellspacing="4" bgcolor="#FFCC00"> 
<tr>
<td valign="top" height="300" width="600" class="item4"><font size="6">पासवर्ड फेर्न</font><br><br><a href="../help/additem.htm"><img src="../images/help.gif" width="120" height="44" border="0"></a>
  <?php 
  include("../functions/database.php");
  	$mode=@$_GET["mode"];

	if($mode=="submit") //if the data in form are submitted to add in database. 
	{
		$password=$_POST["password"]; 
		$password1=$_POST["password1"]; 
		$ccid=@$_SESSION["login"];
		$con=connectdb();
		if(($password=="")||($password1==""))
		{
			$result="Data Invalid";
			echo '<div class="error"> UNKNOWN ERROR: The password cant be entered(पासवर्ड फेर्न असफल)</div>';
	
		}
		elseif(($password==$password1))
		{
		$user="sam";
		//$result=changepassword($ccid,$password,$con);
		//connect_to_database();
///////////////////Changed by RAmesh
//checking if old password is correct
$query= "update ccinfo set password=md5('".$password."')  where ccid='$ccid' ";  //updating psd 
$result=mysql_query($query);
  if(!$result){ 
	die("<p><b>Personnel information could not be updated</b></p><p>To try againg click <a href=\"settings.php\">here</p>"); 
	}
echo "<p><b>Control Center Info is changed.</b></p>";
		}
		else
		{
		$result="Data not valid";
		}
		if($result==1)
		{
		  echo '<div class="success">Congratulations, Your password has been changed(पासवर्ड फेरिएकोछ)</div>';
		  echo 'TODO: show info of this item';
		//echo"$password";
		//echo"$password1";
		}
		else
		{
		  echo '<div class="error"> UNKNOWN ERROR: The password cant be entered(पासवर्ड फेर्न असफल)</div>';
		}

	// info display
		
	}//end of submit mode
	
		//show additem form (interface)
		include("forms/form_settings.php");	
  ?> 
  </td>
</tr>
</table>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
