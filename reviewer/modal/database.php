<?php include("../../db_config/db_config.php");

class database
{
	private $link;
	function __construct()
	{
		$this->link = mysql_connect(config::host,config::username,config::password);
		mysql_select_db(config::database,$this->link) or die(mysql_error());
		
	}
	function __distruct()
	{
		mysql_close($this->link);
	}
	
	function update_enq_per($enq_id,$fmid,$fmname,$company,$pos,$street,$taluka,$district,$stat,$country,$pincode,$mobile,$phno,$email,$location,$ics){
	
	$sql = sprintf("update enquiry_per_detail 
set firm_type='$fmid',firm_name='$fmname',company_name='$company',position='$pos',street='$street',taluka='$taluka',
district='$district',state='$stat',country='$country',pincode='$pincode',mobile='$mobile',phone='$phno',email='$email',
project_location='$location', ics_name='$ics' where enquiry_id='$enq_id'"); 
	
	               // echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else{
			        return $rs;}
	
	
	}
	
	function update_enq_program($enq_id,$pro_id,$pro_name){
	
	$sql = sprintf("update enquiry_certification_request set certification_id='$pro_id', certification_name='$pro_name' where enquiry_id='$enq_id'"); 
	//echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else{
			        return $rs;}
	
	
	}
	
	
	function update_enq_quote($enq_id,$frmno,$lndsze,$vlgno,$prono,$is_pro,$lastprogramdes,$lstcert,$empno,$subpro,$decle){
	
	$sql = sprintf("update enquiry_info_for_quote set no_of_farmer='$frmno',land_offered='$lndsze',no_of_village='$vlgno',no_of_product='$prono',product_list='$is_pro',pre_certification_name='$lastprogramdes',last_certification_body='$lstcert',no_of_emp='$empno', sub_contract_detail='$subpro',decle='$decle' where enquiry_id='$enq_id'"); 
	//echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else{
			        return $rs;}
	
	
	}
	
	function updated_time_trace($enq_id,$date,$user_id,$times){
		
		$sql = sprintf("update enquiry_tracing set updated_date='$date',update_time='$times',update_by='$user_id' where enquiry_id='$enq_id'"); 
		echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else{
			        return $rs;}
		
		
		}
}