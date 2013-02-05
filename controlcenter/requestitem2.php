<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<!form action="removeitem.php?mode=submit" method="post" name="form_remove" id="form_remove">


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
.style2 {
	color: #FF0000;
	font-size: 18px;
}
body {
	background-color: #99FFFF;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_nbGroup(event, grpName) { //v6.0
  var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.MM_nbOver = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : ((args[i+1])? args[i+1] : img.MM_up);
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) {
      img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    nbArr = document[grpName];
    if (nbArr)
      for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = (args[i+1])? args[i+1] : img.MM_up;
      nbArr[nbArr.length] = img;
  } }
}
//-->
</script>
</head>

<body onLoad="MM_preloadImages('../images/help1.gif','../images/help.gif')">

<p>&nbsp;		</p>
<div id="Layer2" style="position:absolute; width:200px; height:115px; z-index:2; left: 472px; top: 2px;"><img name="" src="" width="135" height="73" alt="">
  <table border="0" cellpadding="0" cellspacing="0" bordercolor="#9999FF">
    <tr>
      <td><a href="help/"reserveitem.htm"" target="_top" onClick="MM_nbGroup('down','group1','help1','../images/help1.gif',1)" onMouseOver="MM_nbGroup('over','help1','../images/help.gif','../images/help.gif',1)" onMouseOut="MM_nbGroup('out')"><img src="../images/help1.gif" alt="" name="help1" width="167" height="61" border="0" onload=""></a></td>
    </tr>
  </table>
</div>
<p class="style1">PLEASE SELECT THE ITEM THAT YOU WANT TO RESREVE </p>
<p>&nbsp;</p>
<table width="442" border="0">
  <tr>
    <th width="225" scope="col"><span class="style2">CHOOSE ITEM TO RESRVE </span></th>
    <th width="182" scope="col">
 <select name="itemlist" id="itemlist" onChange="form_remove.itemid.value=form_remove.itemlist.value" >
        <option value="value" selected>tst</option>
        <option value="u">khn</option>
        <?php
		//add all items to the list
	   	$con=connectdb();
	   	$result=mysql_query("SELECT `id`,`name` FROM `item` WHERE status != 'Sold' ORDER BY `name` ASC ",$con)
				or die('<div class="error"> ERROR while getting item list. <br>'.mysql_error().'</div>');;
	   	while($row=mysql_fetch_array($result))
	   	{   echo '<option value="'.$row["id"].'">'.$row["name"].', '.$row["id"].'</option>';  }
		echo 'alert('.$result.');';
	  ?>
                  </select>
  </tr>
</table>
<p>&nbsp;</p>
<div id="Layer1" style="position:absolute; width:71px; height:31px; z-index:1; left: 16px; top: 267px;">
  <input name="Submit" type="submit" class="style2" value="Submit">
</div>
</body>
</html>
