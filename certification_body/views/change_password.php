<?php include("../modal/database.php");
$obj= new Certification();
$rs=$obj->get_designation();
$dept =$obj->get_department();
$req=$obj->get_programs();
$staff=$obj->get_staff_detail();


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 2 | Starter</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../font_awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="../../ionicons-master/ionicons-master/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../../dist/css/skins/skin-blue.min.css">
<script>
	function staff_submit(){
		
		
		
		var rowCount = $('#myTable tr').length;		
		var staff_name = $("#staff_name").val();
		var email = $("#email").val();
		var contact = $("#contact").val();
		var address = $("#address").val();
	     
		 var uid = $("#userid").val();
		 var pwd = $("#pwd").val();
		var designation= $("#designation option:selected").text();
		var designation_id= $("#designation option:selected").val();
		var department= $("#department option:selected").text();
		var department_id= $("#department option:selected").val();
		//alert(designation_id);
		
		if(staff_name==""){
			alert("Staff Name is Required");
			document.getElementById("#staff_name").focus();
			}
		else if(designation == 'Select'){
			alert("Designation is Required");
			document.getElementById("#designation").focus();
			}
		else if(department == 'Select'){
			alert("Department is Required");
			document.getElementById("#department").focus();
			}	
		else {
		$('#myTable tbody').append('<tr class=child><td>'+ rowCount + '</td><td>'+ staff_name + '</td><td>'+ designation +'</td></td><td>'+department+'</td><td>'+uid+'</td><td>'+pwd+'</td></tr>'); 
		
		 var dataString = "staff_name=" + staff_name + "&email=" + email + "&contact=" + contact + "&address=" + address + "&uid=" + uid + "&pwd=" + pwd + "&designation=" + designation +  "&designation_id=" + designation_id + "&department=" + department + "&department_id=" + department_id   ;
		
		
		$.post("../controller/staff_controller.php", dataString, function(data){																																												                                                                    																																																																						                                                                 $("#staff_name").val("");
																																																																				
         });
		
		}
	}
	
	</script>
</head>
<body class="hold-transition  skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>F</b>ICS</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Fair Cert</b> ICS</span> </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
      <!-- Navbar Right Menu -->
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
  
    <section class="sidebar">
     
      <ul class="sidebar-menu">
        <li><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"> <span> Back </span></a></li>
      
      </ul>
     
    </section>
  
  </aside>
 
   <div class="content-wrapper">
    <section class="content-header">
      <h1> Add New Staff <small>..</small> </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Setting</a></li>
        <li class="active">Add New Staff</li>
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content">
    <div >
      <div class="box box-primary" style=" width:45%; float:left;margin-right:25px;">
        <form role="form" method="post">
          <div class="box-body">
          <div class="form-group">
            <label for="cer_pro_name">Name</label>
            <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Staff Name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email Id">
          </div>
          <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact Number">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
          </div>
         
</div>

<?php include("../../footer_outer.php"); ?>


<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../dist/js/app.min.js"></script>

</body>
</html>
