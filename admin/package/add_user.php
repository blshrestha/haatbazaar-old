
<?php
/*
This function takes CC name(ccid), address(address),password(password),email (email)and inset into table ccinfo
*/


function add_user($ccid,$address,$password,$email)
{
$query= "INSERT INTO ccinfo VALUES ('".$ccid."','".$address."','".$password."','".$email."')";
$result= mysql_query($query);
if(!$result)
{
die ("query could not be executed probably due to duplicate username name. Click back and try again by using other name.<br>");
}
else
{
echo $sname;
echo " ";
echo $lname;
echo " is added in data base user";
}
}
?>