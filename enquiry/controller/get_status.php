<?php include("../modal/get_programs_certificattion.php");
 $id=$_REQUEST['desig_id'];
 $dept_id=$_REQUEST['dept_id'];
 $dept=trim($_REQUEST['dept']);
 $name=trim($_REQUEST['desig']);
$db=new certificate();
$rs=$db->get_status($id,$name,$dept_id,$dept);
while($result=mysql_fetch_array($rs)){?>
	<option value="<?php echo $result['status_id'];?>"><?php echo $result['status'];?></option>
<?php 	}

?>