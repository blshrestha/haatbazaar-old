<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
.style3 {
	font-weight: bold;
	color: #FF0000;
	font-size: 24px;
}
.style5 {font-size: 20px}
-->
</style>
</head>

<?php
session_start();
?>

<body bgcolor="#FFFFFF" text="#000000">
<form name="form1" method="post" action="users.php">
  <table width="100%" border="0" cellpadding="10" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <tr bgcolor="#FFCCFF">
      <td width="37" height="70"></td>
      <td valign="bottom" colspan="0" bordercolor="#FFFFFF" width="657" height="30">
        <h2>ADMINISTRATOR LOGIN</h2></td>
    </tr>
    <tr>
      <td height="163" colspan="4" bgcolor="#CCCCCC">
        <p>USERNAME <font size="5">(प्रयोगकर्ता):</font>
            <input type="text" name="name">
        </p>
        <p>PASSWORD <font size="5">(पासवर्ड):</font>
            <input type="password" name="password">
            <input type="submit" name="Submit" value="Submit (पेस गर)">
        </p>
        <h2 class="style3"><span class="style5">PLEASE ENTER CORRECT USERNAME AND PASSWORD. </span><br><br>
        (प्रयोगकर्ताको सहि नाम र पासवर्ड दिनुहोस्)</h2></td>
    </tr>
    <tr>
      <td height="73" colspan="4" bgcolor="#FFFFFF">
        <p>&nbsp;</p></td>
    </tr>
  </table>
</form>
<? php
//session_start();
if(session_is_registered("login"))
{
echo"test1";

	echo "<div class=warning align=center>You are already logged in as <strong><em> ".$_SESSION["login"]."; </em></strong>
			<br><br>
			<a href='adminhome1.php'><img align='middle' alt='Continue' src='../images/continue.png'></a> 
			<br><br>
			<a href='index.php'>Login as Different User</a>";
	
}
else
{
echo"test2";	
header("Location: login.php");
}
?>

</body>

</html>
