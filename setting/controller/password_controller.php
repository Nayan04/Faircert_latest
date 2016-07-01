<?php 
include("../modal/database.php");

$uid=$_REQUEST['uid'];

$pwd=$_REQUEST['pwd'];

$np=$_REQUEST['np'];

$obj= new Certification;

$check=$obj->check_for_password($uid,$pwd);

if(mysql_num_rows($check)>0)
{
$rs=$obj->change_password($uid,$pwd,$np);
echo "1"; ?>

<?php }else{
	echo "2";      
}


?>
