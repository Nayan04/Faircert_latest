<?php include("../../db_config/db_config.php");

class login {
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
	
	
	function check_login($user){
		
		$sql="select * from staff_detail where user_id='$user'  and isactive=1";
		$r=mysql_query($sql,$this->link);
		if($r){
			return($r);			
			}
		else{
			echo mysql_error($this->link);
			}		
		}
		
}