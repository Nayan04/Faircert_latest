<?php session_start();
           unset($_SESSION['user_id']);
		   session_destroy();


?>
<script>
document.location='login_form.php';
</script>