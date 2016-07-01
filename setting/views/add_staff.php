<?php session_start();
include("../modal/database.php");
$obj = new Certification();
$rs = $obj->get_designation();
$dept = $obj->get_department();
$req = $obj->get_programs();
$staff = $obj->get_staff_detail();
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
        <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
        
        
        <script>
		function set_user(){
			//alert()
			var number=Math.round(((Math.random(0,1))*10000),1);
			var n=$('#staff_name').val();
			$('#userid').val(n+number);
			}
		function get_desig() {
    //  alert();
    var dept_name = $("#department option:selected").text();
    var dept_id = $("#department option:selected").val();
    var Strings = 'dept=' + dept_name + '&dept_id=' + dept_id;
    // alert(Strings)
    $.post('../controller/get_desig.php', Strings).done(function (data) {
       // alert(data);
        $('#designation').html(data);

    });

}
            function staff_submit() {



                var rowCount = $('#myTable tr').length;
                var staff_name = $("#staff_name").val();
                var email = $("#email").val();
                var contact = $("#contact").val();
                var address = $("#address").val();

                var uid = $("#userid").val();
                var pwd = $("#pwd").val();
                var designation = $("#designation option:selected").text();
                var designation_id = $("#designation option:selected").val();
                var department = $("#department option:selected").text();
                var department_id = $("#department option:selected").val();
                //alert(designation_id);

                if (staff_name == "") {
                    alert("Staff Name is Required");
                    document.getElementById("#staff_name").focus();
                }
                else if (designation == 'Select') {
                    alert("Designation is Required");
                    document.getElementById("#designation").focus();
                }
                else if (department == 'Select') {
                    alert("Department is Required");
                    document.getElementById("#department").focus();
                }
                else {
                    $('#myTable tbody').append('<tr class=child><td>' + rowCount + '</td><td>' + staff_name + '</td><td>' + designation + '</td></td><td>' + department + '</td><td>' + uid + '</td><td>' + pwd + '</td></tr>');

                    var dataString = "staff_name=" + staff_name + "&email=" + email + "&contact=" + contact + "&address=" + address + "&uid=" + uid + "&pwd=" + pwd + "&designation=" + designation + "&designation_id=" + designation_id + "&department=" + department + "&department_id=" + department_id;


                    $.post("../controller/staff_controller.php", dataString, function (data) {
                        

                    });

                }
            }

        </script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

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

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1> Add New Staff <small>..</small> </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Setting</a></li>
                        <li class="active">Add New Staff</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-4">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Staff Form</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="cer_pro_name">Name</label>
                                            <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Staff Name" onBlur="set_user()">
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
                                         <div class="form-group">
                                            <label>Department</label>
                                            <select class="form-control" id="department" name="department" onChange="get_desig()">
                                                <option value="Select">Select</option>
                                                <?php while ($row = mysql_fetch_array($dept)) {
                                                    ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['department']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <select class="form-control" id="designation" name="designation">
                                                
                                                
                                            </select>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="address">User Id</label>
                                            <input type="text" class="form-control" id="userid" name="userid" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Password</label>
                                            <input type="password" class="form-control" id="pwd" name="pwd"  />
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer" >
                                        <button type="button" class="btn btn-primary"  onClick="staff_submit();"> Submit </button>
                                    </div>
                                </form>
                            </div><!-- /.box -->







                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-8">
                            <!-- Horizontal Form -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Staff Details</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->

                                <div class="box-body" style="overflow-y: hidden; max-height:700px;">
                                     <table class="table table-striped responsive" id="myTable">
                                        <th>SNo.</th>
                                        <th>Staff Name </th>
                                        <th>Designation (Department)</th>
                                        
                                        <th>User Id</th>
                                        <th>Password</th>
                                        <th>Status</th>
                                         <th>Action</th>
                                        <?php
                                        $i = 1;
                                        while ($row = mysql_fetch_array($staff)) {

                                            echo "<tr><td>" . $i++ . "</td><td>" . $row['staff_name'] . "</td><td>" . $row['desig_name'] . "<br/>(" . $row['dept_name'] . ")</td><td>" . $row['user_id'] . "</td><td>" . $row['password'] . "</td>";
											?>
                                                 <?php if($row['isactive']){?>
                  <td><span class='label  bg-green'>Active</span></td>
                  <?php }else{?>
                  <td><span class='label  bg-red'>Not Active</span></td>
                  <?php } ?>
                  <?php if($row['isactive']){?>
                  <td><a href="../controller/edit_staff.php?a=<?php echo $row['id'];?>&b=un"><span class='label  bg-red'>Unactive</span></a></td>
                  <?php }else{?>
                  <td><a href="../controller/edit_staff.php?a=<?php echo $row['id'];?>&b=ac"><span class='label  bg-green'>Active</span></a></td>
                  <?php } ?>
											<?php echo "</tr>";
                                        }
                                        ?>
                                        
                                    </table>
                                </div><!-- /.box-body -->


                            </div><!-- /.box -->
                            <!-- general form elements disabled -->

                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
<?php include '../../footer_outer.php'; ?>

            <!-- Control Sidebar -->

            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../dist/js/app.min.js"></script>

        <!-- FastClick -->
        <script src="../../plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->

        <script src="../../dist/js/demo.js"></script>
    </body>
</html>
