<?php 
include("../modal/database.php");

$staff_name=$_REQUEST['staff_name'];
$email=$_REQUEST['email'];

$address=$_REQUEST['address'];

$contact=$_REQUEST['contact'];

$designation=$_REQUEST['designation'];
$designation_id=$_REQUEST['designation_id'];

$department=$_REQUEST['department'];
$department_id =$_REQUEST['department_id'];

$uid=$_REQUEST['uid'];

$pwd=$_REQUEST['pwd'];


$obj= new Certification;
$last=$obj->last_id_staff();


if($rs=mysql_fetch_array($last)){
	$rown=$rs['staff_id'];
	}
	
$row=$rown+1;
$rs=$obj->submit_staff($staff_name,$email,$contact,$designation,$department,$uid,$pwd,$designation_id,$department_id,$address);
echo "Data Saved Sucessfully!!!";




?>

