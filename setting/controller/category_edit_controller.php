<?php 
include("../modal/database.php");
//$cn_edit=$_REQUEST['cn_edit'];
$id=$_REQUEST['a'];
$b=$_REQUEST['b'];
$obj= new Certification;
if($b=='un'){	
	$rs=$obj->unactive_category($id);	
	}if($b=='active'){
	$rs=$obj->active_category($id);
	}
	
?>

<script>
document.location="../views/add_certification_category.php";
</script>