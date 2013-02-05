<?php


function checklogin()
{
/*
	If session named 'login' is not registered, stop loading remaining page and show the 'login' page
	
	if 'login' is registered, return value of 'login' session
*/
	session_start();
	if(session_is_registered("login"))
	{
		return $_SESSION["login"];
	}
	else
	{
		echo '<div class="error">ERROR,<br> You need to be Signed in Using your Username and Password</div>';		
		include("forms/form_login.php");
		die('');
		
	}
	
}

function login($username, $password, $URL)
{
/*
  if username,password match then  Set session and redirect to URL, 
  else print error message

*/
//MESSAGE
   $loginfailed='<div class="error" align="center">COULD NOT LOGIN<br><br> 
   			The Username/Password pair you have supplied did not match. Please Try again. </div>';


 			$sql="SELECT `ccid` FROM ccinfo WHERE `ccid`='".$username."' AND `password`='".md5($password)."' ";
			$con=connectdb();
			$result=mysql_query($sql,$con) or die('<div class="error"> While authorizing.<br> '.mysql_error().'</div>');
			$row=mysql_fetch_array($result);
			$ccid=$row[0];
			if($ccid==$username)
			{
			//authenticated
			 session_start();
			 $_SESSION["login"]=$ccid;
			 header("Location: ".$URL);
			}
			else
			{
			 echo $loginfailed;
			}

}

function logout()
{
	session_start();
	$_SESSION["login"]="";
	session_unregister("login");
	header("Location: ../controlcenter/index.php");
//	end_session();
}

/*function admin_logout() //added by shakeel
{
	session_start();
	$_SESSION["login"]="";
	session_unregister("login");
	header("Location: ../admin/index.htm");
}*/
?>
