<?php include("../../db_config/db_config.php");

class Certification {
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
	function get_desig($id, $name) {

        $sql = sprintf("select * from designation where isactive=1 and department_id='$id' and department_name='$name'");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }
	
	function update_category($name,$id){
		
		echo $sql="update programs set program_name='$name' where id='$id' and isactive=1";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);			
			}
		else{
			echo mysql_error($this->link);
			}		
		}
		
		
	function unactive_category($id){
		
		echo $sql="update programs set isactive=0 where id='$id'";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);			
			}
		else{
			echo mysql_error($this->link);
			}		
		}
		function unactive_staff($id){
		
		echo $sql="update staff_detail set isactive=0 where id='$id'";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);			
			}
		else{
			echo mysql_error($this->link);
			}		
		}
		function active_staff($id){
		
		$sql="update staff_detail set isactive=1 where id='$id'";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);			
			}
		else{
			echo mysql_error($this->link);
			}		
		}
		function active_category($id){
		
		$sql="update programs set isactive=1 where id='$id'";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);			
			}
		else{
			echo mysql_error($this->link);
			}		
		}
	
	function last_id(){
		$sql="select count(row_id) las from programs where isactive=1";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);
			}
		else{
			echo mysql_error($this->link);
			}	
		}
	
	function get_category(){
		
		$sql="select * from programs";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);
			}
		else{
			echo mysql_error($this->link);
			}	
		
		}
	function submit_program($cat,$pro,$cat_name){
		 $sql="insert into certification_table(certification_name,program_id,isactive) values ('$pro','$cat',1)";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);
			}else{
				echo mysql_error($this->link);
				}
		
		
		}
		function submit_category($pro,$row){
		 $sql="insert into programs(program_name,row_id,isactive) values ('$pro','$row',1)";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);
			}else{
				echo mysql_error($this->link);
				}
		
		
		}
		
	function get_programs(){
		
		$sql=sprintf("select * from certification_table where isactive=1 order by certification_name");
		$r=mysql_query($sql,$this->link);
		if(!mysql_errno()){
			return($r);
			}
		else{
			echo mysql_error($this->link);
			}	
		
		}
		
   function get_designation(){
	   $sql=sprintf("select * from designation where isactive=1 ");
		$r=mysql_query($sql,$this->link);
		if(!mysql_errno()){
			return($r);
			}
		else{
			echo mysql_error($this->link);
			}	
	   	   }	
		
	function get_department(){
		
		$sql=sprintf("select * from department where isactive=1 ");
		$r=mysql_query($sql,$this->link);
		if(!mysql_errno()){
			return($r);
			}
		else{
			echo mysql_error($this->link);
			}	
		
		
		}	
		
		function get_staff_detail(){
		
		$sql=sprintf("select * from staff_detail ");
		$r=mysql_query($sql,$this->link);
		if(!mysql_errno()){
			return($r);
			}
		else{
			echo mysql_error($this->link);
			}	
		
		
		}	
		
		function last_id_staff(){
		$sql="select count(row_id) las from staff_detail where isactive=1";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);
			}
		else{
			echo mysql_error($this->link);
			}	
		}
		
		function submit_staff($staff_name,$email,$contact,$designation,$department,$uid,$pwd,$designation_id,$department_id,$address){
			$date=date("d-m-Y");
			$sql="insert into staff_detail(staff_name,email,contact,address,desig_id,desig_name,dept_id,dept_name,user_id,password,isactive,creation_date) values ('$staff_name','$email','$contact','$address','$designation_id','$designation','$department_id','$department','$uid','$pwd',1,'$date')";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);
			}
			else{
				echo mysql_error($this->link);
				}
		
			}
			
	function change_password($uid,$pwd,$np){
		
		$sql="update staff_detail set password='$np' where user_id='$uid'";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);
			}
		else{
			echo mysql_error($this->link);
			}	
		
		}	
		
	function check_for_password($uid,$pwd){
		
		$sql="select * from staff_detail where user_id='$uid' and password='$pwd'";
	$r=mysql_query($sql,$this->link);
		if($r){
			return($r);
			}
		else{
			echo mysql_error($this->link);
			}	
	
	}
	
	
		
	}