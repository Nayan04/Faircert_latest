<?php session_start();
$user_id='unknown';
if(isset($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
	}else{
		$user_id='unknown';
		}
include("../modal/get_programs_certificattion.php");
$obj_db=new certificate();


$enq_id=$_REQUEST['enq_id'];
$remark=$_REQUEST['remark'];
$c_id=$_REQUEST['c_id'];
//$client_id='FIC_'.date('Ymdhis').rand(range(1000,9999));
$status="New Client Register By ".$_SESSION['name'];
$date=date("Y-m-d");
$times=date("h:i:s a");

$table="history";
$column="enquiry_id,status,created_date,created_by,created_time,remarks,isactive";

$insertP=$obj_db->insert_history_in_status($table,$column,$enq_id,$status,$date,$user_id,$times,$remark,1);
$insertP=$obj_db->registe_client($enq_id,$c_id,$remark,$status);


?>