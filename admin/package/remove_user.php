

<?php
/*
This function takes CC personnel name (ccid) then deletes the row containing
that ccid 
note: before using this function database should be connected 

*/

function remove_user($ccid)
{

if($ccid=="admin")
{
die ("admin cannot be deleted");
}


$query= "DELETE FROM ccinfo WHERE ccid='".$ccid."'"; 
$result= mysql_query($query);
if(!$result)
{


die ("query could not be executed probably due to wrong  ID. Click back and try again by using other name.<br>");

}


else
{
echo  $ccid;
echo "  if exist is deleted from the database";
}
}
?>