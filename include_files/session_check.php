<?php session_start();
if(isset($_SESSION['user_id'])){	
	}else{?>
	<script>
            alert("Please Login !!!");
            document.location='../../login/view/login_form.php';
        </script>	
	<?php }	


?>