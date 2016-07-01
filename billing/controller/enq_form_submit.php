<?php session_start();
$user_id='unknown';
if(isset($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
	}else{
		$user_id='unknown';
		}
include("../modal/get_programs_certificattion.php");
$fmname=$_REQUEST['fmname'];
$fmid=$_REQUEST['fmid'];
$pos=$_REQUEST['pos'];
$company=$_REQUEST['cname'];
//--------------------------------------
$street=$_REQUEST['street'];
$taluka=$_REQUEST['taluka'];
$district=$_REQUEST['district'];
$stat=$_REQUEST['stat'];
$country=$_REQUEST['country'];
$pincode=$_REQUEST['pincode'];
$mobile=$_REQUEST['mobile'];
$phno=$_REQUEST['phno'];
$email=$_REQUEST['email'];
$location=$_REQUEST['location'];
//---------------------------------------
$pro_id=$_REQUEST['pro_id'];
$pro_name=$_REQUEST['pro_name'];
//---------------------------------------
$frmrno=$_REQUEST['frmrno'];
$lndsze=$_REQUEST['lndsze'];
$prono=$_REQUEST['prono'];
$lastprogramdes=$_REQUEST['prodes'];
$vlgno=$_REQUEST['vlgeno'];
$lstcert=$_REQUEST['lstcert'];
$empno=$_REQUEST['empno'];
$decle=$_REQUEST['decle'];
$subpro=$_REQUEST['sub'];
//---------------------------------------

$obj_db=new certificate();
//print_r($obj_db);
$enq_id='';
//echo $email;
//-----------------personal_table-----------------------/////
$table='enquiry_per_detail';

$rs=$obj_db->select($table,"count(id)");
$count=mysql_fetch_array($rs);
if($count[0]==0){
     $enq_id='FMO'.($count[0]+1);//1
}else{
     $enq_id='FMO'.($count[0]+1);
}

//-----------------contact_table-----------------------//////
$column="enquiry_id,firm_type,firm_name,company_name,position,street,taluka,district,state,country,pincode,mobile,phone,email,project_location";
$insertP=$obj_db->insert_enq_per($table,$column,$enq_id,$fmid,$fmname,$company,$pos,$street,$taluka,$district,$stat,$country,$pincode,$mobile,$phno,$email,$location);
//-----------------contact_table-----------------------//////

//-----------------certification table-----------------//////
$table="enquiry_certification_request";
$column="enquiry_id,certification_id,certification_name";
$insertP=$obj_db->insert_enq_program($table,$column,$enq_id,$pro_id,$pro_name);
//-----------------certification table-----------------//////

//-----------------land details------------------------//////
$table="enquiry_info_for_quote";
$column="enquiry_id,no_of_farmer,land_offered,no_of_village,no_of_product,is_pre_certified,pre_certification_name,last_certification_body,no_of_emp,sub_contract_detail,decle";

$insertP=$obj_db->insert_enq_quote($table,$column,$enq_id,$frmrno,$lndsze,$vlgno,$prono,1,$lastprogramdes,$lstcert,$empno,$subpro,$decle);
//-----------------land details------------------------//////
//-----------------history------------------------//////

$table="enquiry_tracing";
$column="enquiry_id,created_date,created_by,times,isactive";
$date=date("Y-m-d");
$times=date("h:i:s a");
$insertP=$obj_db->insert_time_trace($table,$column,$enq_id,$date,$user_id,$times,1);
//-----------------history------------------------//////

$table="enquiry_status";
$column="enquiry_id,current_status,remarks,isactive";
$insertP=$obj_db->insert_enquiry_status($table,$column,$enq_id,"pending","NEW ENQUIRY",1);
//-----------------history------------------------//////







/*$rs=$obj_db->view_ccit_by_name($ccit);

if(mysql_num_rows($rs)==0){
$obj_db->insert_ccit($ccit,$pri);

?>

<script>
document.location="view_ccit.php";
</script>

<?php	 
}
else {?>
<div style="color:#F00;">CCIT Charge Already Exist!!!</div>

 <?php	} */ ?>