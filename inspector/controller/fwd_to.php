<?php session_start();
$user_id='unknown';
$send_from='BDE';
if(isset($_SESSION['dept'])){
	$send_from=$_SESSION['dept'];
	}else{
		$send_from='BDE';
		}
if(isset($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
	}else{
		$user_id='unknown';
		}
include("../modal/main_database.php");
$obj_db=new main_database();
$insp_flag=0;
$dept_to=$_REQUEST['dept'];
$desig_to=$_REQUEST['desig'];
$staff_to=$_REQUEST['staff'];
$status_to=$_REQUEST['status'];

$dept_from=$_SESSION['dept_name'];
$desig_from=$_SESSION['desig_name'];
$staff_from=$_SESSION['user_id'];

$enq_id=$_REQUEST['enq_id'];
$remark=$_REQUEST['remark'];
//$new_status="Farword To ".$fwd_to;
$date=date("Y-m-d");
$times=date("h:i:s a");

$table="history";
$column="enquiry_id,status,to_desig,from_desig,to_user,from_user,to_dept,from_dept,created_date,created_by,created_time,remarks,inspection_complite,isactive";
$insertP=$obj_db->insert_history($table,$column,$enq_id,$status_to,$desig_to,$desig_from,$staff_to,$staff_from,$dept_to,$dept_from,$date,$user_id,$times,$insp_flag,$remark,1);
$insertP=$obj_db->update_status_in_fwd($enq_id,$dept_to,$desig_to,$staff_to,$status_to,$dept_from,$desig_from,$staff_from,$date,$times,$insp_flag,$remark,1);
if(trim($status_to)=="Send Complete Application Packet Reviewed to Inspection Manager"){
	$obj_db->update_doar_in_report($enq_id,$date,$_SESSION['name'],$_SESSION['user_id']);//doar==date of application recevied

}

?>