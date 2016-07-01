<?php include("../modal/get_programs_certificattion.php");
echo $id=$_REQUEST['dept_id'];
echo $name=trim($_REQUEST['dept']);
$db=new certificate();
$rs=$db->get_desig($id,$name);
?>
<option selected="selected" value="none">---Select---</option>
<?php
while($result=mysql_fetch_array($rs)){?>
	<option value="<?php echo $result['designation_id'];?>"><?php echo $result['designation_name'];?></option>
<?php 	}
//print_r($result);
?>