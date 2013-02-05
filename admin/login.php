<?php
/*TODO:
  variable : webmaster to be made global, or got from database. .. 
 */
 
 //messages: 
 include("../functions/database.php");
 @include("../functions/auth.php");
 
 $about_ccpan='<strong><font size="4">Panel for 
      Communication Centers</font> </strong> <p>This control panel is supposed 
        to be used by the authorized personnel associated with different communication 
        centers located in different villages. The facilties provided are: </p>
      <ul>
        <li><strong>Adding new item </strong><br>
          Use this control panel to add new item to display for the all the villagers.</li>
        <li> <strong>Buy an item</strong><br>
          Use this control panel to place a request order for any item displayed 
          by other villagers. </li>
        <li><strong>Remove items<br>
          </strong>Use this control panel to remove any item that the owner no 
          longer want to sell or if the item is already sold out. </li>
        <li><strong>Account Settings</strong><br>
          Use the same control panel to change your own settings, such as Changing 
          Password, .., etc.</li>
      </ul>';

	$blankfield='<div class="error" align="center"> Blank Field(s)<br><br>
			Username and(or) Password fields cannot be left blank. Please provide your Username & Password.</div>';
	
	$webmaster="webmaster@localhost";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>CC Login</title>

<link href="../default.css" rel="stylesheet" type="text/css">
</head>

<body>

<table width="100%" border="0" cellpadding="10" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td width="100%" rowspan="2" valign="top">
	<?php
		
	  $mode=@$_GET["mode"];

	  if($mode=="submit")
	  {
	  	$username=$_POST["username"];
		$password=$_POST["password"]; 	

		if(($username=="")||($password==""))
		{ echo $blankfield;
		header("Loaction:index.htm");

		}
		else
		{
		 	login($username,$password,"additem.php");
		 } //ends blankfield check
	  }//end of mode=submit
	  else
	  {
	  	echo $about_ccpan;
	  }
	  ?>
      </td>
    <td width="234" height="303" valign="top">
	<?php
		include("forms/form_login.php");
	?>
</td>
  </tr>
  <tr> 
    <td height="174" valign="top">
	 <table class="logintable">
        <!--DWLayoutTable-->
        <tr> 
          <td width="222" height="148" > <p>Do you want to establish a new communication 
              center so that you can help your villagers display and sell their 
              items via Haatbazar? </p>
            <p>
			<?php 

			 echo '<a href="mailto:'.$webmaster.'">Write us a request.</a>';
			?>
			 </p></td>
        </tr>
      </table>
	</td>
  </tr>
  <tr> 
    <td height="45">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
