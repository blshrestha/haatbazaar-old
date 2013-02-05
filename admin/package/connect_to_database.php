

<?php
/*
This function makes a connection to the database with user name= uname
and no password is mentioned (pass)
*/

function connect_to_database()
{


$host="localhost";
$uname="root";
$pass="nepalwireless2064";
$connection= mysql_connect($host,$uname,$pass);
if(!$connection)
{
die("no connection");
}
else
{
echo "";
}

$result= mysql_select_db("Haatbazar");
if(!$result)
{
die("\ndatabase could not be selected");
}
//echo("\ndata bsae ready for use");
}
?>
