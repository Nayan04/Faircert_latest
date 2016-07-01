<?php include("../../db_config/db_config.php");

class certificate
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
	function add_day_in_date($date,$days){

    $date = strtotime("+".$days." days", strtotime($date));
    return  date("Y-m-d", $date);

}
	function get_date_with_slash($yyyy_dd_mm){
		$date = date_create($yyyy_dd_mm);
		$result=date_format($date, 'd/m/Y');
		return $result;
		}
    function get_date_with_dash($dd_mm_yyyy){
		$var =$dd_mm_yyyy;
        $date=str_replace('/', '-', $var);
        $result=date('Y-m-d', strtotime($date)); 
		return $result;
		}
	function get_enquiry_by_user($user){
		
		$sql = sprintf("select distinct(enquiry_id) from history where from_user='$user' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else{
			        return $rs;
                                
                                 }
					
		}
	function get_programs_module(){
		
		$sql = sprintf("select id,program_name from programs where isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else{
			        return $rs;}
					
		}
		function get_certificate_by_program($id){
		
		$sql = sprintf("select id,certification_name from certification_table where isactive=1 and program_id=".$p_id); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else{
			        return $rs;}
					
		}
}?>