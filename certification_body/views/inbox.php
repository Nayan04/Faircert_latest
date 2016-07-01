<?php include ('../../include_files/session_check.php'); ?>
<?php
$page = 0;
if ($_SESSION['desig_name'] == 'Reviewer') {
    $page = 7.2;
} else if ($_SESSION['desig_name'] == 'Certification Manager') {
    $page = 8.2;
} else if ($_SESSION['desig_name'] == 'CEO/Certification Committe') {
    $page = 9.2;
}
$tital = "INBOX";
?>
<?PHP
include("../modal/get_programs_certificattion.php");
$db = new certificate();
$program = $db->get_enquiry_for_inbox_by_user($_SESSION['desig_name'], $_SESSION['user_id']);

$dep = $db->get_dept();
$sts = '';
$rs_sts = '';
if ($_SESSION['desig_name'] == 'CEO/Certification Committe') { // get all status for admin
    $sts = $db->get_status();
} else {

    $sts = $db->get_status_by($_SESSION['desig_name']);
}
?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php include("../../include_files/header.php"); ?>
<?php include("enquiry_nav.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Inbox <small> <?php echo $panel; ?> </small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i><?php echo $panel; ?> </a></li>
            <li class="active">Inbox</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Incoming Records</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-responsive table-hover text-center">
                            <thead>
                                <tr>
                                    <th width="1%"></th>
                                    <th width="5%">Company</th>
                                    <th width="5%">ID</th>
                                    <th width="5%">Position</th>
                                    <th width="20%"> Certification </th>
                                    <th  width="10%">Send By </th>
                                    <th  width="5%">Enquiry Date </th>
                                    <th  width="18%">Status</th>
                                    <th width="22%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = mysql_fetch_array($program)) {

                                    echo "<tr><td></td>
                    <td>$data[name] ($data[type])  </td>";
                                    ?>
                                    <?php if ($data['is_client'] == 0) { ?>
                                    <td><?php echo $data['enq_id']; ?></td>
                                <?php } else { ?>
                                    <td><?php echo $data['client_id']; ?> <span class='label  bg-aqua-active'>Client</span></td>
                                <?php } ?>
                                <?php echo "<td>$data[position]</td>";
                                ?>
                                <td><?php echo $c_name = $db->get_certification_name_by_id($data['certi_id']) ?></td>
                                <td><?php echo $c_name = $db->get_user_by_id($data['sent_from']) . ' (' . $data['sent_from2'] . ')' ?> </td>
                                <?php echo "<td>";
                                ?>

                                <?php
                                echo $date = $db->get_date_with_slash($data['dates']);
                                echo "</td>"
                                ?>
                                <td><?php echo $data['status']; ?> <?php if ($data['seen'] == 0) { ?><span class='label  bg-green'>New</span> <?php } ?></td>
                                <td class="no-print"><div class="btn-group"> <a href="../../enquiry/views/view_panel.php?enq_id=<?php echo $data['enq_id']; ?>" class="btn btn-danger" title="View Enquiry In Detail"><i class="fa fa-eye"></i> View </a> &nbsp;
                                        <button type="button" class="btn btn-info"><i class="fa fa-lightbulb-o"></i> Action </button>
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#"></a></li>
                                            <?php if(($data['is_client']==0) && ($_SESSION['desig_name']=='Certification Manager' || $_SESSION['desig_name']=='BDE' || $_SESSION['desig_name']=='CEO/Certification Committe' ) ){ ?>
                                                <li><a href="#"  data-toggle="modal" data-target="#myModal2"  class="myModals2" name="<?php echo $data['enq_id']; ?>"><i class="fa fa-user-plus"></i> Register As Client</a></li>
    <?php } ?>
                                            <li><a href="#"  data-toggle="modal" data-target="#myModal"  class="myModals" name="<?php echo $data['enq_id']; ?>"><i class="fa fa-edit"></i>Change  Status</a></li>                    
                                            <li><a href="#" data-toggle="modal" data-target="#myModal1"  class="myModals1" name="<?php echo $data['enq_id']; ?>"><i class="fa fa-mail-forward"></i>Forward To Other</a></li>
                                            <?php if(($_SESSION['desig_name']=='Certification Manager' || $_SESSION['desig_name']=='BDE' || $_SESSION['desig_name']=='CEO/Certification Committe' ) ){ ?>
                                            <li><a href="edit_enquiry.php?enq_id=<?php echo $data['enq_id']; ?>"><i class="fa fa-pencil-square"></i>Edit Records</a></li>
                                            <?php }?>
                                        </ul>
                                    </div></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>

                        </table>
                        <div id="bar1" class=""> <i id="bar_img1" class=""></i> </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
<?php include("../../footer_outer.php"); ?>
<?php include("staus_remark.php"); ?>
<!-- end Footer -->
<!-- Control Sidebar -->

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../plugins/validation.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
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
    $(function () {

        var t = $('#example1').DataTable({
            "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
            "order": [[1, 'dasc']]
        });
        t.on('order.dt search.dt', function () {
            t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

    });


    $(document).ready(function () {
        $(".modal").on("hidden.bs.modal", function () {
            $("#bar1").addClass('overlay');
            $("#bar_img1").addClass('fa fa-refresh fa-spin');
            delay(3000);
            document.location = 'inbox.php';
        });
    });
</script>
</body>
</html>
