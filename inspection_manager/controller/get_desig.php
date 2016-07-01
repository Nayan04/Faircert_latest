<?php include("../modal/inspection_manager.php");
$db=new inspection_manager();

echo $id=$_REQUEST['dept_id'];
echo $name=trim($_REQUEST['dept']);

$rs=$db->get_desig($id,$name);
?>
<option selected="selected" value="none">---Select---</option>
<?php
while($result=mysql_fetch_array($rs)){?>
	<option value="<?php echo $result['designation_id'];?>"><?php echo $result['designation_name'];?></option>
<?php 	}
//print_r($result);
?>