<?php include("../modal/database.php");
$obj= new Certification();
$rs=$obj->get_category();
$req=$obj->get_programs();


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
	function program_submit(){
		
		
		
		var rowCount = $('#myTable tr').length;		
		var cat = $("#cat_name").val();
	     var pro= $("#cer_pro_name").val();
		var cat_name= $("#cat_name option:selected").text();
		
		if(pro==""){
			alert("Program Name is Required");
			document.getElementById("#cer_pro_name").focus();
			}
		else if(cat == 'Select'){
			alert("Certification Category is Required");
			document.getElementById("#cat_name").focus();
			}	
		else {
		$('#myTable tbody').append('<tr class=child><td>'+ rowCount + '</td><td>'+ pro + '</td><td>'+ cat_name +'</td></td><td><a href=#>Edit</a></td><td><a href=#>Delete</a></td></tr>'); 
		
		 var dataString = "cat=" + cat + "&pro=" + pro + "&cat_name=" + cat_name;
		
		 $.post("../controller/program_controller.php", dataString, function(data){																																												                                                                    																																																																						                      $("#msds").html('<div class="alert alert-danger alert-dismissable">Program Added!!</div>');
																																																																				
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
          <span class="logo-lg"><b>Fair Cert</b> ICS</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
              <li><a href="../../certification_body/views/welcome_enquiry.php"> <span> Back </span></a></li>
          
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add Certification Program
            <small>..</small>
          </h1>
          
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Setting</a></li>
            <li class="active">Add Certification Program</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <b id="msds"></b>
  <div class="box box-primary" style=" width:45%; float:left; margin-right:25px;">
               <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post">
                  <div class="box-body">
                 
                    <div class="form-group">
                      <label for="cer_pro_name">Certification Program Name</label>
                      <input type="text" class="form-control" id="cer_pro_name" name="cer_pro_name" placeholder="Certification Program Name">
                    </div>
                    
                     
                   <div class="form-group">
                      <label>Certification Category</label>
                      <select class="form-control" id="cat_name" name="cat_name">
                      <option value="Select">Select</option>
                      <?php while($row=mysql_fetch_array($rs)){
						  
						  ?>
                        <option value=" <?php echo $row['row_id']; ?>"> <?php echo $row['program_name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                   
                     <div class="box-footer">
                    <button type="button" class="btn btn-primary"  onClick="program_submit();"> Submit </button>
                                      </div>
                  </div>
                  </form>
                  </div>
                  
                    <div class="box box-primary" style=" width:45%; float:left; overflow:scroll; max-height:400px; ">
          <div class="box-header">
            <div  id="set" class="box-body no-padding" >
              <table class="table table-striped" id="myTable">
                <th>SNo.</th>
                  <th>Certification Program</th>
                  <th>Certification Category</th>
                  
                  
                  <?php $i=1;while($row=mysql_fetch_array($req)){
					  
					  echo "<tr><td>".$i++."</td><td>".$row['certification_name']."</td><td>".$row['program_id']."</tr>";
					  } ?>
                      
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
       
      
      </div><!-- /.content-wrapper -->
</div>

      <!-- Main Footer -->
      <?php include("../../footer_outer.php"); ?>
      <!-- end Footer -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
