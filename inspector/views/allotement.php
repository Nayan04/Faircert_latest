<?php include ('../../include_files/session_check.php'); ?>
<?php
$page = 5.5;
$tital = "Inspector INBOX";
?>
<style>

    .hc{
        display: none;
    }
    .shw{
        display: inline;
    }
</style>
<?PHP
include("../modal/main_database.php");
$db = new main_database();
$program = $db->get_enquiry_for_inbox_by_user(trim($_SESSION['desig_name']), $_SESSION['user_id']);
$dep = $db->get_programs_module();
$deps=$db->get_programs_module();
$sts = '';
$rs_sts = '';
if ($_SESSION['desig_name'] == 'CEO/Certification Committe') { // get all status for admin
    $sts = $db->get_status();
} else {
    $sts = $db->get_status_by(trim($_SESSION['desig_name']));
}
?>
<?php
include("../../include_files/header.php");

 $id = $_REQUEST['enq_id'];
$data = $db->get_all_detail_of_enquiry($id);
$row = mysql_fetch_array($data);
if (mysql_num_rows($data) > 0) {
    ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <!-- Sidebar Menu -->


            <ul class="sidebar-menu">
                <li class="header"><i class="fa fa-bar-chart"></i> Inspection details</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="inbox_inspector.php"  ><i class="fa fa-table"></i> <span>Back</span></a></li>
                <!--li class="active"><a href="edit_enquiry.php?enq_id=<?php echo $id; ?>" ><i class="fa fa-edit"></i> <span>Edit</span></a></li-->
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Inspection Details </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Inspector</a></li>
                <li class="active">Inspection Reports</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <span id="msds"></span>
                            <h3 class="box-title">Inspection For <?php echo $_REQUEST['enq_id']; ?></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box box-primary" style="padding:20px;">
                                <form action=""  class="form-horizontal" role="form" name="formss" id="formss">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
                                        <div class="col-xs-6">
                                            <input type="hidden" name="enq" id="enq" value="<?php echo $_REQUEST['enq_id']; ?>"  />
                                            <select class="form-control" name="status" id="status" onchange="get_inspection_date()">
                                                <option selected value="none">---select---</option>
                                                <option value="Seen">Seen</option>
                                                <option value="Hold">On Hold</option>
                                                <option value="Working">Working</option>
                                                <option value="Send Date Of Inspection, Info And Audit Plan To Client">Send Date Of Inspection, Info And Audit Plan To Client</option>
                                                <option value="Send Revised Date Of Inspection, Info And Audit Plan To Client">Send Revised Date Of Inspection, Info And Audit Plan To Client</option>
                                                <option value="Acceptance Of Date Of Inspection By Client">Acceptance Of Date Of Inspection By Client</option>
                                                <option value="NonCompliance Found During The Inspection">NonCompliance Found During The Inspection</option>
                                                <option value="NonCompliance Closure Received">NonCompliance Closure Received</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="d_o_ins" id="doinsp">
                                    <div class="form-group" id="" >
                                        
                                            <label for="inputEmail3" class="col-sm-3 control-label">Date Of Inspection</label>
                                            <div class="col-xs-6" >
                                                <div class="input-group input-daterange">
                                                    <input type="text" class="form-control" placeholder="dd/mm/yyyy" name="d_o_inspection" id="d_o_inspection">
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="form-control" placeholder="dd/mm/yyyy" name="d_o_inspection_to" id="d_o_inspection_to">
                                                </div>
                                            </div>

                                        </div> 
                                        <div class="form-group" id="" >
                                        
                                            <label for="inputEmail3" class="col-sm-3 control-label">Inspection Type</label>
                                            <div class="col-xs-6" >
                                                
                                                <select class="form-control" name="ins_type" id="ins_type" >
                                                <option selected value="none">---select---</option>
                                                <?php while($de=  mysql_fetch_array($dep)) {?>
                                                <option value="<?php echo $de['program_name'] ?>"><?php echo $de['program_name']; ?></option>
                                                
                                            
                                                <?php } ?>
                                                </select>
                                            </div>

                                        </div> 

                                    </div>
                                    <div id="noncom">
                                        <div class="form-group"  >

                                            <label for="inputEmail3" class="col-sm-3 control-label"> NonCompliance Type </label>
                                            <div class="col-xs-6" >
                                                <select class="form-control" name="non_type" id="non_type" >
                                                    <option selected value="none">---select---</option>
                                                    <option value="MAJOR">MAJOR</option>
                                                    <option value="MINOR">MINOR</option>
                                                    <option value="OFI">OFI</option>

                                                </select>
                                            </div>


                                        </div>
                                        <div class="form-group"  >

                                            <label for="inputEmail3" class="col-sm-3 control-label">Date Of NonCompliance Closing </label>
                                            <div class="col-xs-6" >
                                                <div class="input-group date" data-provide="datepicker">
                                                    <input type="text" class="form-control" name="date_of_noncom" id="date_of_noncom">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                         <div class="form-group" id="" >
                                        
                                            <label for="inputEmail3" class="col-sm-3 control-label">Type</label>
                                            <div class="col-xs-6" >
                                                
                                                <select class="form-control" name="non_ptype" id="non_ptype" >
                                                <option selected value="none">---select---</option>
                                                <?php 
                                                while($dess=  mysql_fetch_array($deps)) {?>
                                                <option value="<?php echo $dess['program_name'] ?>"><?php echo $dess['program_name']; ?></option>
                                                
                                            
                                                <?php } ?>
                                                </select>
                                            </div>

                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Remark</label>
                                        <div class="col-xs-6">
                                            <textarea class="form-control" name="remark" id="remark"></textarea>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="reset" id="reset" class="btn btn-primary">Cancel</button>
                                        <button type="button" class="btn btn-primary pull-center" onClick="change_status()">Add</button>
                                    </div>
                                </form>
                            </div>
                            <div id="bar1" class=""> <i id="bar_img1" class=""></i> </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->



        </section>
        <!-- /.content -->
    </div>

<?php
} else {
    echo "No Records Found";
}
?>
<?php include("../../footer_outer.php"); ?>
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="validation.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!--Date Picker-->

<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
<script>
                  $('.input-daterange').datepicker({
                      format: 'dd/mm/yyyy',
                      startDate: '+3d',
                      autoclose: true
                  });
                  $('.date').datepicker({
                      format: 'dd/mm/yyyy',
                      startDate: '+3d',
                      autoclose: true
                  });

                  $('.input-daterange input').each(function () {
                      $(this).datepicker("clearDates");
                  });
</script>
</body>
</html>


