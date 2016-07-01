<?php session_start(); 
include("../modal/get_programs_certificattion.php");
$id=$_REQUEST['c_id'];
//echo $name=trim($_REQUEST['desig']);
$db=new certificate();
$rs=$db->get_states($id);
?>
<option selected="selected" value="none">---Select---</option>
<?php
while($result=mysql_fetch_array($rs)){ 

?>	
<option value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
<?php 	}
//print_r($result);
?>