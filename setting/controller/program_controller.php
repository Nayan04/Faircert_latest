<?php
include("../modal/database.php");
$cat =$_REQUEST['cat'];
$pro= $_REQUEST['pro'];
$cat_name=$_REQUEST['cat_name'];
$obj= new certification;
$rs= $obj->submit_program($cat,$pro,$cat_name);
if($rs){
	echo "Data Saved Sucessfully";
	}










?>