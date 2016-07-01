<?php session_start();
include("../modal/database.php");
$user=$_REQUEST['user'];
$password=$_REQUEST['pass'];
$obj= new login;
$rs=$obj->check_login($user);
$page='';
if((mysql_num_rows($rs)!=0)){
	
	if($row=mysql_fetch_array($rs)){
		
		              if($row['password']==$password){
			
							$_SESSION['user_id']= $row['user_id'];
							$_SESSION['name']= $row['staff_name'];
							$_SESSION['pass']= $row['password'];
						    $_SESSION['dept_name']= $row['dept_name'];
							$_SESSION['dept_id']= $row['dept_id'];
							$_SESSION['desig_id']= $row['desig_id'];
							$_SESSION['desig_name']= $row['desig_name'];
							//echo $_SESSION['desig_name']; die;
							if(trim($row['desig_name'])=='admin' ){
								$page='index.php';
							}else if(trim($row['desig_name'])=='CEO/Certification Committe'){
								$page='certification_body/views/inbox.php';
								}else if(trim($row['desig_name'])=='BDE' || trim($row['desig_name'])=='Quality Manager'){
									$page='enquiry/views/welcome_enquiry.php';
									}else if(trim($row['desig_name'])=='Accountant'){
										$page='billing/views/inbox_bill.php';
										}else if(trim($row['desig_name'])=='Inspection Manager'){
										    $page='inspection_manager/views/inbox_inspection.php';
										}else if(trim($row['desig_name'])=='Inspector'){
										    $page='inspector/views/inbox_inspector.php';
										}else if(trim($row['desig_name'])=='Reviewer' ){
										    $page='reviewer/views/inbox.php';
										}else if(trim($row['desig_name'])=='Certification Manager'){
										    $page='certification_body/views/inbox.php';
										}else{
											$page='404.php';
											}
?>                           
       						 <script>
							// alert('<?php echo $page; ?>');
        					 document.location='../../<?php echo $page; ?>';
        
        					</script>
        
<?php
												}
						else { ?>
			<div class="callout callout-warning">
                    <h4><?php echo " Password is wrong!!!"; ?></h4>
                  
                  </div>
			
						<?php	}
									}
							}
else{
	?>
     <div class="callout callout-warning">
                    <h4><?php echo "User Id  is wrong!!!"; ?></h4>
                  
                  </div>
	
	<?php }	

?>