<?php session_start();
$user_id='unknown';
if(isset($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
	}else{
		$user_id='unknown';
		}
include("../modal/main_database.php");
$obj_db=new main_database();


$status=$_REQUEST['status'];
$insp_flag=0;
if($status=='Seen' || $status=='Hold' || $status=='Working'){
$insp_flag=0;
}else{
$insp_flag=1;
}

$enq_id=$_REQUEST['enq_id'];
$remark=$_REQUEST['remark'];
$pro_type=$_REQUEST['p_type'];
$doi=$obj_db->get_date_with_dash($_REQUEST['d_o_ins']);
$doi_to=$obj_db->get_date_with_dash($_REQUEST['doi_to']);

$comtype=$_REQUEST['non_type'];
$d_o_noncom=$obj_db->get_date_with_dash($_REQUEST['date_of_noncom']);
$date=date("Y-m-d");
$times=date("h:i:s a");
$old_status=$obj_db->get_status_by_enq($enq_id);
$live='';
$is_live=1;
if(($doi!='0000-00-00' && $doi!='1979-01-01') && ($doi_to!='0000-00-00' && $doi_to!='1979-01-01')){
    $dates=$doi.' to '.$doi_to;
}if($d_o_noncom!='0000-00-00'&& $d_o_noncom!='1970-01-01'){
    $dates=$d_o_noncom;
}else{
    $dates='Date Is Missing';
}
if($status=='Send Date Of Inspection, Info And Audit Plan To Client' || $status=='Send Revised Date Of Inspection, Info And Audit Plan To Client' || $status=='Acceptance Of Date Of Inspection By Client'){
$row=$obj_db->get_enquiry_by_status($status, $enq_id) ;   
if($live=  mysql_fetch_array($row)){
    $row_id=$live['id'];
    $obj_db->update_inspection($enq_id,$row_id);
   }
    
}
$table="history";
$insp_table="inspection_records";
$column="enquiry_id,status,created_date,created_by,created_time,remarks,d_o_inspection,d_o_inspection_to,noncom_type,d_o_noncom,pro_type,inspection_complite,isactive";
$column1="enquiry_id,status,created_date,created_by,created_time,remarks,d_o_inspection,d_o_inspection_to,noncom_type,d_o_noncom,pro_type,is_inspection_done,is_live,isactive";

$insertP=$obj_db->insert_history_in_status($table,$column,$enq_id,$status,$date,$user_id,$times,$remark,$doi,$doi_to,$comtype,$d_o_noncom,$pro_type,$insp_flag,1);
$insertP=$obj_db->update_status($enq_id,$status,$remark,$doi,$doi_to,$comtype,$d_o_noncom,$pro_type,$insp_flag);
$insertP=$obj_db->insert_inspection($insp_table,$column1,$enq_id,$status,$date,$user_id,$times,$remark,$doi,$doi_to,$comtype,$d_o_noncom,$pro_type,$insp_flag,1);

if($insp_flag){
$enqs=$obj_db->get_all_detail_of_enquiry($enq_id);
if($enq=  mysql_fetch_array($enqs)){
$company_name = $enq['company_name'];
$address=$enq['street'].', '.$enq['district'].', '.$enq['state'].', '.$enq['country'].'- '.$enq['pincode'];
$isnpec=$obj_db->get_user_by_id($id);
$inspector='';
$staff_email='';
$desig_n='';
if($inspp=  mysql_fetch_array($inspec)){
    $inspector=$inspp['staff_name'];
    $staff_email=$inspp['email'];
	 $desig_n=$inspp['desig_name'];
}
$to = $enq['email'];
$subject = 'Regarding confirmation of your application received';
$message = '<html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>Welcome To Faircert Certification Service Pvt. Ltd.</title>
                    </head>

                    <body>
                    <table width="550" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #999;" align="center">
                      
                      <tr>
                        <td>
                        <table width="537" border="0" cellspacing="0" cellpadding="0" style="background-color:#fcfcfa; margin-top:10px; float:left; border:1px solid #d5d5d5; margin-left:3px; margin-bottom:10px;">
                      <tr>
                        <td style="margin:0px;font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#074e8c; border-bottom:1px dashed #d5d5d5; margin-bottom:5px; padding:10px 0 10px 10px;">To</td>
                      </tr>
                      <tr>
                        <td style="margin:0px;font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#074e8c; border-bottom:1px dashed #d5d5d5; margin-bottom:5px; padding:10px 0 10px 10px;">'. $company_name. '<br/>'.$address.'</td>
                      </tr>
                      <tr>
                        <td style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#000; padding:10px 10px 10px 10px; line-height:20px;"> <b>Subject: Inspection information of'.$comapny_name.'.</b>  </td>
                        </tr>
                        <tr>
                        <td style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#000; padding:10px 10px 10px 10px; line-height:20px;"> 
                          Dear Sir,<br/>
                          Greetings from FairCert!!!<br>
                          <p>We wish to confirm our intention to perform an initial  inspection of <strong>'.$company_name.'</strong>. The purpose of the audit is to  verify conformance of your operation, the associated policies, procedures,  records and infrastructures with the requirement according to NPOP. </p>                          <p>Our Audit will comprise '.$inspector.' will conduct the audit from '.$dates.'.                           
                          <p>The auditor is abide by confidentiality  agreements.&nbsp; </p>
                          <p>As previously agreed, the language of the audit will be  in English and Hindi. Please inform us if the language requirement has been changed  since this may require us to arrange for an independent interpreter.</p>
                          <p>Please  contact me if there are any concerns regarding the following:</p>
                          <ul>
                            <li>Composition of the audit team or audit plan content</li>
                            <li>If there are areas which may expose the audit team members to  substances that could cause potential injury or a risk to health</li>
                            <li>Any dress code requirements applicable for your organization  (i.e. safety shoes, glasses, suit/tie) </li>
                          </ul>
                          <p>The Audit will commence with an Opening Meeting.</p>
                          <p>The audit will conclude with report writing, followed by  a Closing Meeting and the Auditor will confirm timings during the audit.</p>
                          <p>We would appreciate it if you could  arrange for relevant management/technical personnel to be available to attend  both opening and closing meetings. An audit plan detailing areas to be assessed  is attached.</p>
                          <p>It is our intention to conduct the audit with minimum of  disruption to your operations so to facilitate this it would be appreciated if  you could make appropriate personnel available to accompany our auditors. The  auditor will also require easy access to pertinent manuals, procedures and all  relevant infrastructures and sites including any sub-contracted operations if  any and an office room if available. </p>
                          <p>Please acknowledge the same. If you have any queries on  the audit, please do not hesitate to contact us audit plan is flexible to suit  your business requirement.</p>
                          <p>Thanking you. </p>
                          <p>Yours Sincerely,</p>
                          <p>'.$inspector.'<br>
                            '.$desig_n.'<br>
                            FairCert Certification Services Pvt. Ltd.<br>
                            C – 122, Gouridham Colony, Diversion Road,<br>
                            Khargone – 451 001, Madhya Pradesh.<br>
                            Phone: +91 7282 231 271 Email: <a href="mailto:info@faircert.com" target="_blank">info@faircert.com</a>; </p>
Website: <a href="http://www.faircert.com" target="_blank">www.faircert.com</a></td>
                      </tr>
                      
                    </table>
                    </td>
                    </table>

                    </body>
                    </html>';


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$staff_email.'>' . "\r\n";
$headers .= 'Cc: cert.fair@gmail.com' . "\r\n";

mail($to, $subject, $message, $headers);
}
    
}





?>