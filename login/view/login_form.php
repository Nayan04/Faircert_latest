<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 2 | Log in</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
<script>

function check_login(){
	
	var user=$("#user_id").val();
	var pas=$("#password").val();
	
	if(user== "" ){
		alert("User Id Can Not Be Left Blank");
		$("#user_id").focus();
		}
    else if(pas==""){
		alert("Password Can Not Be Left Blank");
		$("#password").focus();
		}
		
	else {
		var dataString = " user=" + user + "&pass="+ pas;
		//alert(dataString);
		$.post("../controller/check_login.php",dataString,function(data){
																//alert(data);  
																$("#ref").html(data);
																
																  });
		
				}	
	
	
	
	}

</script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"> <a href="#"><b>FairCert</b> Admin</a> </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <p id="ref"></p>
    <form  method="post" name="login_form" id="login_form">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="User Id" id="user_id" name="user_id">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span> </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span> </div>
      <div class="row">
        <div class="col-xs-4"> 
         <input type="reset" class="btn btn-primary btn-block btn-flat"  value="Reset"></div>
        <!-- /.col -->
        <div class="btn-group col-xs-4">
           
            <input type="button" class="btn btn-primary btn-block btn-flat" id="sends" onClick="check_login()" value="Sign In">
        </div>
        <!-- /.col -->
      </div>
    </form>
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
    $('body').keydown(function(event){ 
    var keyCode = (event.keyCode ? event.keyCode : event.which);   
    if (keyCode == 13) {
        $('#sends').trigger('click');
    }
});
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>
</html>
