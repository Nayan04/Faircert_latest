<?php 
include("../modal/database.php");
//$cn_edit=$_REQUEST['cn_edit'];
$id=$_REQUEST['a'];
$b=$_REQUEST['b'];
$obj= new Certification;
if($b=='un'){	
	$rs=$obj->unactive_staff($id);	
	}if($b=='ac'){
	$rs=$obj->active_staff($id);
	}
	
?>

<script>
document.location="../views/add_staff.php";
</script>