<?php session_start();
$user_id='unknown';
if(isset($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
	}else{
		$user_id='unknown';
		}
include("../modal/modal_bill.php");
$obj_db=new bill();

$status=$_REQUEST['status'];
$enq_id=$_REQUEST['enq_id'];
$remark=$_REQUEST['remark'];
$date=date("Y-m-d");
$times=date("h:i:s a");
$old_status=$obj_db->get_status_by_enq($enq_id);
$table="history";
$column="enquiry_id,status,created_date,created_by,created_time,remarks,isactive";
if($status==$old_status){
	echo 1;
	?>

	<?php }else{
$insertP=$obj_db->insert_history_in_status($table,$column,$enq_id,$status,$date,$user_id,$times,$remark,1);
$insertP=$obj_db->update_status($enq_id,$status,$remark);
	}

?>