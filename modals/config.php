<?php include("db_config.php");

class common
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
	
	function get_iap_register_obj_by_mst($mst){
		
		$sql = sprintf("select * from register_obj where isactive=1 and MastCode='$mst'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
	function get_registe_by_date_and_apt($grp,$final_date){		
		if($grp=='All'){
		$sql = sprintf("select * from registerdet where LimitationDate='$final_date' and isactive=1");
		}else{
		$sql = sprintf("select * from registerdet where LimitationDate='$final_date' and isactive=1 and ObjType='$grp'");
		}
		
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		
		function get_iap_register_details(){
		
		$sql = sprintf("SELECT registerdet.AssName, registerdet.MastCode, registerdet.DOAO1, registerdet.PanNo, registerdet.ScanFile1, registerdet.ScanFile2,assyear.year AS AsstYearCode ,registerdet.BlockAsst,registerdet.BlockAsstPeriod,registerdet.TaxEffect,registerdet.MajorMinor,registerdet.AssGroup,registerdet.GOObjection,registerdet.StatusCode,audit_party.party_name,ao_detail.name,registerdet.ObjType,finyc.year AS FinYearCode ,register_obj.LARIAMNo,audit_party_type.type_name,ccit_charge.ccit_charge,cit_detail.cit_charge_name,range_detail.range_name,usergroupmast.MastName,register_obj.EntryDate from registerdet join register_obj on registerdet.MastCode =register_obj.MastCode Left join audit_party on audit_party.audit_id=registerdet.APCode Left join year_detail assyear on assyear.year_id=registerdet.AssYearCode Left join year_detail finyc on finyc.year_id=register_obj.FinYearCode Left join ao_detail on ao_detail.ao_id=registerdet.AOCode Left join ccit_charge on ccit_charge.id=register_obj.CCITCode Left join cit_detail on cit_detail.id=register_obj.CITCode Left join range_detail on range_detail.range_id=register_obj.RangeCode Left join usergroupmast on usergroupmast.id=register_obj.UserCode Left join audit_party_type on audit_party_type.id=register_obj.APTypeCode where  registerdet.ObjType='IAP' and registerdet.isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_iap_register_details_form_obj_det(){
		
		$sql = sprintf("select * from register_obj,registerdet where register_obj.isactive=1  and  registerdet.ObjType='IAP' and registerdet.MastCode=register_obj.MastCode"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_rap_register_details(){
		
		$sql = sprintf("select * from registerdet where isactive=1 and ObjType='RAP'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_iap_register_details_by_ap($ap){
		
		$sql = sprintf("select * from registerdet where isactive=1 and MastCode='$ap' and ObjType='IAP'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		
		function get_iap_register_details_by_ccit($ap,$type){
		
		$sql = sprintf("select * from registerdet where isactive=1 and MastCode='$ap' and ObjType='$type'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_rap_register_details_by_ap($ap){
		
		$sql = sprintf("select * from registerdet where isactive=1 and MastCode='$ap' and ObjType='RAP'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_iap_register_details_by_ap_rap($ap){
		
		$sql = sprintf("select * from registerdet where isactive=1 and MastCode='$ap' and ObjType='RAP'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_registe_by_year_and_ap($yea,$ap){
		
		$sql = sprintf("select * from register_obj where isactive=1 and APCode='$ap' and FinYearCode='$yea' and ObjType='IAP'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_registe_by_year_and_ccit($yea,$ccit,$type){
		
		$sql = sprintf("select * from register_obj where isactive=1 and CCITCode='$ccit' and FinYearCode='$yea' and ObjType='$type'");
		
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_registe_by_year_and_cit($yea,$cit,$type){
		
		$sql = sprintf("select * from register_obj where isactive=1 and CITCode='$cit' and FinYearCode='$yea' and ObjType='$type'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_registe_by_year_and_ap_rap($yea,$ap){
		
		$sql = sprintf("select * from register_obj where isactive=1 and APCode='$ap' and FinYearCode='$yea' and ObjType='RAP'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_registe_by_year_and_ap_by_quater($qua,$yea,$ap){
		
		$sql = sprintf("select * from register_obj where isactive=1 and APCode='$ap' and FinYearCode='$yea' and QuarterCode='$qua' and ObjType='IAP'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_registe_by_year_and_ap_by_quater_rap($qua,$yea,$ap){
		
		$sql = sprintf("select * from register_obj where isactive=1 and APCode='$ap' and FinYearCode='$yea' and QuarterCode='$qua' and ObjType='RAP'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_year_dist_by_ap($ap){
		
		$sql = sprintf("select distinct(FinYearCode)y from register_obj where isactive=1 and APCode='$ap' and FinYearCode!=0 and ObjType='IAP'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_year_dist_by_ccit($ccit,$type){
		
		$sql = sprintf("select distinct(FinYearCode)y from register_obj where isactive=1 and CCITCode='$ccit' and FinYearCode!=0 and ObjType='$type'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_year_dist_by_cit($cit,$type){
		
		$sql = sprintf("select distinct(FinYearCode)y from register_obj where isactive=1 and CITCode='$cit' and FinYearCode!=0 and ObjType='$type'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_year_dist_by_ap_rap($ap){
		
		$sql = sprintf("select distinct(FinYearCode)y from register_obj where isactive=1 and APCode='$ap' and FinYearCode!=0 and ObjType='RAP'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_quater_dist_by_ap($yar,$ap){
		
		$sql = sprintf("select distinct(QuarterCode)q from register_obj where isactive=1 and FinYearCode='$yar' and APCode='$ap' and  ObjType='IAP'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
		function get_quater_dist_by_ap_rap($yar,$ap){
		
		$sql = sprintf("select distinct(QuarterCode)q from register_obj where isactive=1 and FinYearCode='$yar' and APCode='$ap' and  ObjType='RAP'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }
			        return $rs;
					
		}
	function get_ao_by_range($range){
		
		$sql = sprintf("SELECT * FROM ao_detail where  range_id='$range' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_ap_group_by_type($group){
		
		$sql = sprintf("SELECT * FROM audit_party_type where  group_type='$group' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_ap_type(){
		
		$sql = sprintf("SELECT * FROM audit_party_type where  isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_ap_by_type($id){
		
		$sql = sprintf("SELECT * FROM audit_party where audit_id='$id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_apt(){
			
					$sql = sprintf("select * from audit_party_type where isactive=1 "); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }	
			 return $rs;
			
			
			}
		function get_ap_by_type_name($id){
		
		$sql = sprintf("SELECT * FROM audit_party where apt_group='$id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_ap_by_group($id){
		//echo $id;
		$sql = sprintf("SELECT * FROM audit_party where apt_group='$id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_cit(){
		
		$sql = sprintf("SELECT * FROM cit_detail where  isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_ao(){
		
		$sql = sprintf("SELECT * FROM ao_detail where  isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_year_by_id($id){
		
		$sql = sprintf("SELECT * FROM year_detail where  year_id='$id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_sec(){
		
		$sql = sprintf("SELECT * FROM section_detail where isactive=1 order by section_code"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_sec_by_id($id){
		
		$sql = sprintf("SELECT * FROM section_detail where section_id='$id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_toc_by_id($id){
		
		$sql = sprintf("SELECT * FROM type_of_case where  id='$id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_ass_by_id($id){		
		$sql = sprintf("SELECT * FROM ao_detail where  ao_id='$id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
		}
		function get_ap_by_id($id){		
		$sql = sprintf("SELECT * FROM audit_party where  audit_id='$id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
		}
		
		function get_ap(){		
		$sql = sprintf("SELECT * FROM audit_party where isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
		}
		function get_ac_by_id($range){
		
		$sql = sprintf("SELECT * FROM auditable_case where  ac_id='$range' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_regobjdet_by_id($id){
		
		$sql = sprintf("SELECT * FROM registerdet where  MastCode='$id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_regobj_by_id($id){
		
		$sql = sprintf("SELECT * FROM register_obj where  MastCode='$id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_ao_by_cit($cit){//this audit party 
		
		$sql = sprintf("SELECT * FROM audit_party where  cit_code='$cit' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_aoo_by_cit($cit){//this audit party 
		
		$sql = sprintf("SELECT * FROM ao_detail where  cit='$cit' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
		}
		function get_range_by_id($range){		
		$sql = sprintf("SELECT * FROM range_detail where  range_id='$range' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;					
		}
		function get_range(){//we can get cIT and city
		
		$sql = sprintf("SELECT * FROM range_detail where isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
				}
	 
	     function get_cit_by_range($cit)
		 {//we can get cIT and cit		
		     $sql = sprintf("SELECT * FROM cit_detail where isactive=1 and id='$cit'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
				}
	
	function get_ccit_of_cit($cit){
		
		 $sql = sprintf("SELECT * FROM cit_detail where isactive=1 and id='$cit'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
			         }
					 function get_ao_by_id($id){
		
		 $sql = sprintf("SELECT * FROM ao_detail where isactive=1 and ao_id='$id'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
			         }
					 function get_cit_by_id($id){
		
		 $sql = sprintf("SELECT * FROM cit_detail where isactive=1 and id='$id'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
			         }
					 function get_ccit_by_id($id){
		
		 $sql = sprintf("SELECT * FROM ccit_charge where isactive=1 and id='$id'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
			         }
		
		function get_city_by_id($city){
			$sql = sprintf("SELECT * FROM city_detail where isactive=1 and city_id='$city'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
			         }
					 
	   function get_type_of_case(){
			$sql = sprintf("SELECT * FROM type_of_case where isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
			       }
					  
					 function get_year(){
			$sql = sprintf("SELECT * FROM year_detail where isactive=1 order by year desc"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
			         }
			
			 function get_ccit(){
			$sql = sprintf("SELECT * FROM ccit_charge where isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
			         }
					  
			 function get_cit_by_ccit($ccit){
				
				 $sql = sprintf("SELECT * FROM cit_detail where ccit_charge_id='$ccit' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
				 
				 }
				 function get_range_by_cit($cit){
				 $sql = sprintf("SELECT * FROM range_detail where cit_id='$cit' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
				 
				 }
				  function get_ao_by_ccit($ccit){
				 $sql = sprintf("SELECT * FROM ao_detail where ccit='$ccit' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
				 
				 }
				function get_off(){
					 $sql = sprintf("SELECT * FROM officer_detail where isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
					
					}
					 function get_user(){
				  $sql = sprintf("select * from user_detail where isactive=1 "); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }	
			 return $rs;
				 
				 
				 }
				
				  function get_user_by_id($user){
				  $sql = sprintf("select * from user_detail where id='$user' and isactive=1 "); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }	
			 return $rs;
				 
				 
				 }
				 
		         function get_objection(){
					  $sql = sprintf("SELECT * FROM objection_detail where isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;					 
				}
				function get_dp_for_master($cay,$ao,$dpno,$ccit,$stat,$ass_ye,$cit_id){
					$string="SELECT draftpara.id, dpdettab.draft_id, draftpara.DPNo,draftpara.DOR, draftpara.DOSPartA, draftpara.AssName,draftpara.Remarks, dpdettab.ScanFile1, dpdettab.ScanFile2,dpdettab.TaxEffect, assyear.year AS AsstYearCode ,dpdettab.StatusCode,ao_detail.name, finyc.year AS FinYearCode ,ccit_charge.ccit_charge,cit_detail.cit_charge_name,range_detail.range_name from draftpara join dpdettab on draftpara.id =dpdettab.MastCode Left join audit_party on audit_party.audit_id=draftpara.APCode Left join year_detail assyear on assyear.year_id=dpdettab.AssYearCode Left join year_detail finyc on finyc.year_id=draftpara.FinYearCode Left join ao_detail on ao_detail.ao_id=draftpara.AOCode Left join ccit_charge on ccit_charge.id=draftpara.CCITCode Left join cit_detail on cit_detail.id=draftpara.CITCode Left join range_detail on range_detail.range_id=draftpara.RangeCode where";
					if($cay=='...'){}else{ $string.=" draftpara.FinYearCode=$cay and"; }
					if($ao=='...'){}else{ $string.=" draftpara.AOCode=$ao and"; }
					if($dpno==''){}else{ $string.=" draftpara.DPNo='$dpno' and"; }
					if($ccit=='...'){}else{ $string.=" draftpara.CCITCode=$ccit and"; }
					if($stat=='...'){}else{ $string.=" dpdettab.StatusCode='$stat' and"; }
				    if($ass_ye==''){}else{ $string.=" draftpara.AssName='$ass_ye' and"; }
				    if($cit_id=='...'){}else{ $string.=" draftpara.CITCode=$cit_id and"; }
					
					$string.=" dpdettab.isactive=1";
				 
					 $sql = sprintf($string);
					 //echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;	
					
					}
					function view_ac_for_report($ccit_id,$cit_id,$range,$ao,$ay,$doa,$grp,$case_type,$lar_sd,$lar_ed){
						//echo $ccit_id;
					$string="SELECT * FROM auditable_case where";
					if($ccit_id=='...'){}else{ $string.=" ccit_id='$ccit_id' and"; }
					if($cit_id=='...'){}else{ $string.=" cit_id='$cit_id' and"; }
					if($range=='...'){}else{ $string.=" range_code='$range' and"; }
					if($ao=='...'){}else{ $string.=" assesing_officer='$ao' and"; }
					if($ay=='...'){}else{ $string.=" asst_year='$ay' and"; }
				    if($doa=='...'){}else{
						
						if($doa=='between')
						{							
					     $string.=" d_o_a between '$lar_sd' and '$lar_ed' and";
					    }else if($doa=='equal'){
							 $string.=" d_o_a ='$lar_sd' and";
							}else if($doa=='greater'){
							 $string.=" d_o_a > '$lar_sd' and";
							}else if($doa=='less'){
							 $string.="d_o_a < '$lar_sd' and";
							}
					}
				    if($grp=='...'){}else{ $string.=" Groups='$grp' and"; }
					if($case_type=='...'){}else{ $string.=" type_of_case='$case_type' and"; }				
					$string.=" isactive=1";
				 
					 $sql = sprintf($string);
					//echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;	
					
					}
					function view_allocation_for_report($ccit_id,$cit_id,$apt,$ap,$ay,$doa,$grp,$case_type,$lar_sd,$lar_ed){
					$string="SELECT * FROM auditable_case where";
					if($ccit_id=='...'){}else{ $string.=" ccit_id='$ccit_id' and"; }
					if($cit_id=='...'){}else{ $string.=" cit_id='$cit_id' and"; }
					if($apt=='...'){}else{ $string.=" APTCode='$apt' and"; }
					if($ap=='...'){}else{ $string.=" cgap_code='$ap' and"; }
					if($ay=='...'){}else{ $string.=" asst_year='$ay' and"; }
				    if($doa=='...'){}else{
						
						if($doa=='between')
						{							
					     $string.=" d_o_a between '$lar_sd' and '$lar_ed' and";
					    }else if($doa=='equal'){
							 $string.=" d_o_a ='$lar_sd' and";
							}else if($doa=='greater'){
							 $string.=" d_o_a > '$lar_sd' and";
							}else if($doa=='less'){
							 $string.="d_o_a < '$lar_sd' and";
							}
					}
				    if($grp=='...'){}else{ $string.=" Groups='$grp' and"; }
					if($case_type=='...'){}else{ $string.=" type_of_case='$case_type' and"; }				
					$string.=" isactive=1 order by cgap_code";
				 
					 $sql = sprintf($string);
					 //echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;	
					
					}
					  function get_dp_detials_by_id($draft){
					  $sql = sprintf("SELECT * FROM dpdettab where MastCode='$draft' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;					 
				}
				function get_iap_register_details_for_view($ccit_id,$ass_name,$cit_id,$fy,$ao,$pan,$groups,$stat,$sec,$range,$type){
				//	echo $ao;
					$string="SELECT registerdet.AssName, registerdet.MastCode,
					
					sec1.section_code as ObjSection1, 
					sec2.section_code as ObjSection2, 
					sec3.section_code as ObjSection3, 
					sec4.section_code as ObjSection4, 
					sec5.section_code as ObjSection5, 
					
					
					registerdet.DOAO1, registerdet.PanNo, registerdet.ScanFile1, registerdet.ScanFile2,assyear.year AS AsstYearCode ,registerdet.BlockAsst,registerdet.BlockAsstPeriod,registerdet.TaxEffect,registerdet.MajorMinor,registerdet.AssGroup,registerdet.GOObjection,registerdet.StatusCode,audit_party.party_name,ao_detail.name,registerdet.ObjType,finyc.year AS FinYearCode ,register_obj.LARIAMNo,audit_party_type.type_name,ccit_charge.ccit_charge,cit_detail.cit_charge_name,range_detail.range_name,usergroupmast.MastName,register_obj.EntryDate from registerdet join register_obj on registerdet.MastCode =register_obj.MastCode Left join audit_party on audit_party.audit_id=registerdet.APCode Left join year_detail assyear on assyear.year_id=registerdet.AssYearCode 
					
					Left join section_detail sec1 on sec1.section_id=registerdet.SectionCode1	 
					Left join section_detail sec2 on sec2.section_id=registerdet.SectionCode2 
					Left join section_detail sec3 on sec3.section_id=registerdet.SectionCode3 
					Left join section_detail sec4 on sec4.section_id=registerdet.SectionCode4 
					Left join section_detail sec5 on sec5.section_id=registerdet.SectionCode5 
					
					Left join year_detail finyc on finyc.year_id=register_obj.FinYearCode Left join ao_detail on ao_detail.ao_id=registerdet.AOCode Left join ccit_charge on ccit_charge.id=register_obj.CCITCode Left join cit_detail on cit_detail.id=register_obj.CITCode Left join range_detail on range_detail.range_id=register_obj.RangeCode Left join usergroupmast on usergroupmast.id=register_obj.UserCode Left join audit_party_type on audit_party_type.id=register_obj.APTypeCode where ";
				        
					//--------------------Register_obj ------------------------------
					if($ccit_id=='...'){}else{ $string.=" register_obj.CCITCode='$ccit_id' and"; }
					if($fy=='...'){}else{ $string.=" register_obj.FinYearCode=$fy and"; }
					if($cit_id=='...'){}else{ $string.=" register_obj.CITCode=$cit_id and"; }
					if($range=='...'){}else{ $string.=" register_obj.RangeCode=$range and"; }
					//----------------------------Register Details---------------------------
					if($stat=='...'){}else{ $string.=" registerdet.StatusCode='$stat' and"; }
				    if($ass_name==''){}else{ $string.=" registerdet.AssName='$ass_name' and"; }
				    if($pan==''){}else{ $string.=" registerdet.PanNo='$pan' and"; }
					if($groups=='...'){}else{ $string.=" registerdet.AssGroup='$groups' and"; }
					if($ao=='...'){}else{ $string.=" registerdet.AOCode='$ao' and"; }
					if($type=='...'){}else{ $string.=" registerdet.MajorMinor='$type' and"; }
					if($sec==''){}else{
						//echo $sec;
					//$secs=explode(',',$sec);
					//$sec=array_values($secs);
					$string.=" registerdet.SectionCode1 in($sec) and"; }
					
					$string.=" registerdet.isactive=1 and register_obj.ObjType='IAP'";
				   //  echo $ao;
					 $sql = sprintf($string);
					 //echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;	
					
					}
					function get_rap_register_details_for_view($ccit_id,$ass_name,$cit_id,$fy,$ao,$pan,$groups,$stat,$sec,$range,$type){
					$string="SELECT * FROM register_obj,registerdet where";// yaha join lagana hai
					echo $ccit_id;
					//--------------------Register_obj ------------------------------
					if($ccit_id=='...'){}else{ $string.=" register_obj.CCITCode='$ccit_id' and"; }
					if($fy=='...'){}else{ $string.=" register_obj.FinYearCode=$fy and"; }
					if($cit_id=='...'){}else{ $string.=" register_obj.CITCode=$cit_id and"; }
					if($range=='...'){}else{ $string.=" register_obj.RangeCode=$range and"; }
					//----------------------------Register Details---------------------------
					if($stat=='...'){}else{ $string.=" registerdet.StatusCode='$stat' and"; }
				    if($ass_name==''){}else{ $string.=" registerdet.AssName='$ass_name' and"; }
				    if($pan==''){}else{ $string.=" registerdet.PanNo='$pan' and"; }
					if($groups=='...'){}else{ $string.=" registerdet.AssGroup='$groups' and"; }
					if($ao=='...'){}else{ $string.=" registerdet.AOCode='$ao' and"; }
					if($type=='...'){}else{ $string.=" registerdet.MajorMinor='$type' and"; }
					if($sec==''){}else{ 
										
					$string.=" registerdet.SectionCode1 in($sec) and"; }
					
					$string.=" registerdet.isactive=1 and register_obj.ObjType='RAP' and registerdet.MASTCode=register_obj.MASTCode ";
				 
					 $sql = sprintf($string);
					// echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;	
					
					}
					function get_iap_register_details_for_report($ccit_id,$cit_id,$ap,$apt,$range,$ao,$fy,$lar_date,$objection,$type,$groups,$status,$dos,$user,$txe,$entry,$lar_sd,$lar_ed,$dos_sd,$dos_ed,$tax_st,$tax_ed,$entry_st,$entry_ed){
					$string="SELECT * FROM register_obj,registerdet where";
					//echo $ccit_id;
				//	echo $lar_sd."oo";
					//echo $status;
					//--------------------Register_obj ------------------------------
					if($ccit_id=='...'){}else{ $string.=" register_obj.CCITCode='$ccit_id' and"; }
					
					if($cit_id=='...'){}else{ $string.=" register_obj.CITCode=$cit_id and"; }
					
					if($ap=='...'){}else{ $string.=" register_obj.APCode=$ap and"; }
					
					if($apt=='...'){}else{ $string.=" register_obj.APTypeCode=$apt and"; }					
					
					if($range=='...'){}else{ $string.=" register_obj.RangeCode=$range and"; }
					
					if($ao='...'){}else{ $string.=" registerdet.AOCode='$ao' and"; }
					
					if($fy=='...'){}else{ $string.=" register_obj.FinYearCode=$fy and"; }
					
					if($lar_date=='...'){}else{
						
						if($lar_date=='between')
						{							
					     $string.=" registerdet.DOAO1 between '$lar_sd' and '$lar_ed' and";
					    }else if($lar_date=='equal'){
							 $string.=" registerdet.DOAO1 ='$lar_sd' and";
							}else if($lar_date=='greater'){
							 $string.=" registerdet.DOAO1 > '$lar_sd' and";
							}else if($lar_date=='less'){
							 $string.=" registerdet.DOAO1 < '$lar_sd' and";
							}
					}
					
					if($objection=='...'){}else{ $string.=" registerdet.GOObjection='$objection' and"; }
					
					//----------------------------Register Details---------------------------
					if($type=='...'){}else{ $string.=" registerdet.MajorMinor='$type' and"; }
					if($groups=='...'){}else{ $string.=" registerdet.AssGroup='$groups' and"; }
					if($status==''){}else{ 
					  $s=explode(",",$status);
					  $m=array();
					  for($i=0;$i<sizeof($s);$i++){
						  $m[$i]='"'.$s[$i].'"';
						  }
						 $n=implode(",",$m);
					  //$ss= "'" . join(', ',$s) . "'";
					 $string.=" registerdet.StatusCode in($n) and"; }
					
					
				    if($dos=='...'){}else{
						
						if($dos=='between')
						{							
					     $string.=" registerdet.DOS between '$dos_sd' and '$dos_ed' and";
					    }else if($dos=='equal'){
							 $string.=" registerdet.DOS='$dos_sd' and";
							}else if($dos=='greater'){
							 $string.=" registerdet.DOS > '$dos_sd' and";
							}else if($dos=='less'){
							 $string.=" registerdet.DOS < '$dos_sd' and";
							}
						 }
					if($user=='...'){}else{ $string.=" register_obj.UserCode='$user' and"; }
					if($txe=='...'){}else{ if($txe=='between')
						{							
					     $string.=" registerdet.TaxEffect between '$tax_st' and '$tax_ed' and";
					    }else if($txe=='equal'){
							 $string.=" registerdet.TaxEffect='$tax_st' and";
							}else if($txe=='greater'){
							 $string.=" registerdet.TaxEffect > '$tax_st' and";
							}else if($txe=='less'){
							 $string.=" registerdet.TaxEffect < '$tax_st' and";
							} 
						}
					if($entry=='...'){}else{ 
					if($entry=='between')
						{	
						  $sd=$entry_st;
						  $ed=$entry_ed;
					     $string.=" register_obj.EntryDate between '$sd' and '$ed' and";
					    }else if($entry=='equal'){
							 $string.=" register_obj.EntryDate='$entry_st' and";
							}else if($entry=='greater'){
							 $string.=" register_obj.EntryDate > '$entry_st' and";
							}else if($entry=='less'){
							 $string.=" register_obj.EntryDate < '$entry_st' and";
							} 
					
					 }				
					
					$string.=" registerdet.isactive=1 and register_obj.isactive=1 and registerdet.ObjType='IAP' and register_obj.ObjType='IAP' and registerdet.MASTCode=register_obj.MASTCode order by register_obj.APCode asc ";
				 
					 $sql = sprintf($string);
					// echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;	
					
					}
					
					function get_rap_register_details_for_report($ccit_id,$cit_id,$ap,$range,$ao,$fy,$lar_date,$objection,$type,$groups,$status,$dos,$user,$txe,$entry,$lar_sd,$lar_ed,$dos_sd,$dos_ed,$tax_st,$tax_ed,$entry_st,$entry_ed){
			
					$string="SELECT * FROM register_obj,registerdet where";
					//echo $ccit_id;
					//echo $lar_sd;
					//--------------------Register_obj ------------------------------
					if($ccit_id=='...'){}else{ $string.=" register_obj.CCITCode='$ccit_id' and"; }
					
					if($cit_id=='...'){}else{ $string.=" register_obj.CITCode=$cit_id and"; }
					
					if($ap=='...'){}else{ $string.=" register_obj.APCode=$ap and"; }
					
							
					
					if($range=='...'){}else{ $string.=" register_obj.RangeCode=$range and"; }
					
					if($ao='...'){}else{ $string.=" registerdet.AOCode='$ao' and"; }
					
					if($fy=='...'){}else{ $string.=" register_obj.FinYearCode=$fy and"; }
					
					if($lar_date=='...'){}else{
						
						if($lar_date=='between')
						{							
					     $string.=" register_obj.LARIAMRecDate between '$lar_sd' and '$lar_ed'  and";
					    }else if($lar_date=='equal'){
							 $string.=" register_obj.LARIAMRecDate ='$lar_sd' and";
							}else if($lar_date=='greater'){
							 $string.=" register_obj.LARIAMRecDate > '$lar_sd' and";
							}else if($lar_date=='less'){
							 $string.=" register_obj.LARIAMRecDate < '$lar_sd' and";
							}
					}
					
					if($objection=='...'){}else{ $string.=" registerdet.GOObjection='$objection' and"; }
					
					//----------------------------Register Details---------------------------
					if($type=='...'){}else{ $string.=" registerdet.MajorMinor='$type' and"; }
					if($groups=='...'){}else{ $string.=" registerdet.AssGroup='$groups' and"; }
					if($status==''){}else{ 
					 $s=explode(",",$status);
					  $m=array();
					  for($i=0;$i<sizeof($s);$i++){
						  $m[$i]='"'.$s[$i].'"';
						  }
						 $n=implode(",",$m);
					 $string.=" registerdet.StatusCode IN ($n) and"; }
					
					
				    if($dos=='...'){}else{
						
						if($dos=='between')
						{							
					     $string.=" registerdet.DOS between '$dos_sd' and '$dos_ed' and";
					    }else if($dos=='equal'){
							 $string.=" registerdet.DOS='$dos_sd' and";
							}else if($dos=='greater'){
							 $string.=" registerdet.DOS > '$dos_sd' and";
							}else if($dos=='less'){
							 $string.=" registerdet.DOS < '$dos_sd' and";
							}
						 }
					if($user=='...'){}else{ $string.=" register_obj.UserCode='$user' and"; }
					if($txe=='...'){}else{ if($txe=='between')
						{							
					     $string.=" registerdet.TaxEffect between '$tax_st' and '$tax_ed' and";
					    }else if($txe=='equal'){
							 $string.=" registerdet.TaxEffect='$tax_st' and";
							}else if($txe=='greater'){
							 $string.=" registerdet.TaxEffect > '$tax_st' and";
							}else if($txe=='less'){
							 $string.=" registerdet.TaxEffect < '$tax_st' and";
							} 
						}
					if($entry=='...'){}else{ 
					if($entry=='between')
						{	
						  $sd= $entry_st;
						  $ed=$entry_ed;
					     $string.=" register_obj.EntryDate between '$entry_st' and '$entry_ed' and";
					    }else if($entry=='equal'){
							 $string.=" register_obj.EntryDate='$entry_st' and";
							}else if($entry=='greater'){
							 $string.=" register_obj.EntryDate > '$entry_st' and";
							}else if($entry=='less'){
							 $string.=" register_obj.EntryDate < '$entry_st' and";
							} 
					
					 }				
					
					$string.=" registerdet.isactive=1 and register_obj.isactive=1 and registerdet.ObjType='RAP' and register_obj.ObjType='RAP' and registerdet.MASTCode=register_obj.MASTCode order by register_obj.APCode asc ";
				 
					 $sql = sprintf($string);
				  //  echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;	
					
					}

function get_draft_para_detail($ccit_id,$cit_id,$cay,$ay){
	
	$string="SELECT * FROM draftpara ,dpdettab where";
					
					if($ccit_id=='...'){}else{ $string.=" draftpara.CCITCode='$ccit_id' and"; }
					
					if($cit_id=='...'){}else{ $string.=" draftpara.CITCode=$cit_id and"; }
					
					if($cay=='...'){}else{ $string.=" draftpara.FinYearCode=$cay and"; }
					if($ay=='...'){}else{ $string.=" dpdettab.AssYearCode=$ay and"; }
	
	$string.=" draftpara.isactive=1 and dpdettab.isactive=1 and draftpara.draft_id=dpdettab.MastCode";
	
	 $sql = sprintf($string);
					// echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;	
	
	
	}			
			
	function get_rap_by_officer($id){
	
	 $sql = sprintf("SELECT * FROM register_obj where isactive=1 and APOfficerCode=$id"); 
//	 echo $sql;
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
	

	
	
	}

			
function get_iap_register_reg_by_mst($mast){
	
	 $sql = sprintf("SELECT * FROM registerdet where isactive=1 and Mastcode='$mast'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
	
	
	
	
	}	
function get_off_by_id($id){
	
	
	 $sql = sprintf("SELECT * FROM officer_detail where isactive=1 and officer_id='$id'"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else
			        return $rs;
	
	
	
	}		

			
			
			}
		
		?>