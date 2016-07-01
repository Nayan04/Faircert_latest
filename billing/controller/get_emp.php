<?php session_start(); 
include("../modal/modal_bill.php");
echo $id=$_REQUEST['desig_id'];
echo $name=trim($_REQUEST['desig']);
$db=new bill();
$rs=$db->get_emp($id,$name);
?>

<option selected="selected" value="none">---Select---</option>
<?php
while($result=mysql_fetch_array($rs)){ 
if(trim($result['user_id'])==($_SESSION['user_id'])){?>
<?php }else{
?>
<option value="<?php echo $result['user_id'];?>"><?php echo $result['staff_name'];?></option>
<?php }	}
//print_r($result);
?>
