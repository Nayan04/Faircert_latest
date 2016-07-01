<?php include ('../../include_files/session_check.php');?>
<?php $page = 3.2;
$tital = "Billing INBox";
?>
<!DOCTYPE html>
<?PHP
include("../modal/modal_bill.php");
$db = new bill();
$program = $db->get_enquiry_for_inbox_by_user($_SESSION['desig_name'], $_SESSION['user_id']); //getting enquiry sending to Billing
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
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<!-- Left side column. contains the logo and sidebar -->
<?php include("billing_nav.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Billing Enquiry Inbox <small>..</small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Billing</a></li>
            <li class="active">Inbox</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Enquiry Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1%"></th>
                                    <th width="5%">Company</th>
                                    <th width="5%">ID</th>
                                    <th width="5%">Position</th>
                                    <th width="20%"> Certification </th>
                                    <th  width="10%">Send By </th>
                                    <th  width="5%">Enquiry Date </th>
                                    <th  width="20%">Status</th>
                                    <th width="20%">Action</th>
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

                                            <li><a href="#"  data-toggle="modal" data-target="#myModal"  class="myModals" name="<?php echo $data['enq_id']; ?>"><i class="fa fa-edit"></i>Change  Status</a></li>                    
                                            <li><a href="#" data-toggle="modal" data-target="#myModal1"  class="myModals1" name="<?php echo $data['enq_id']; ?>"><i class="fa fa-mail-forward"></i>Forward To Other</a></li>
                                            <li><a href="edit_enquiry.php?enq_id=<?php echo $data['enq_id']; ?>"><i class="fa fa-pencil-square"></i>Edit Records</a></li>

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
    function get_desig() {
        //  alert();
        var dept_name = $("#far option:selected").text();
        var dept_id = $("#far option:selected").val();
        var Strings = 'dept=' + dept_name + '&dept_id=' + dept_id;
        //alert(Strings)
        $.post('../controller/get_desig.php', Strings).done(function (data) {
            // alert(data);
            $('#desig').html(data);

        });

    }

    function get_emp() {
        //  alert();
        var name = $("#desig option:selected").text();
        var id = $("#desig option:selected").val();
        var dept_name = $("#far option:selected").text();
        var dept_id = $("#far option:selected").val();
        var Strings = 'desig=' + name + '&desig_id=' + id + '&dept=' + dept_name + '&dept_id=' + dept_id;
        //alert(Strings);
        $.post('../controller/get_emp.php', Strings).done(function (data) {
            //alert(data);
            $('#emp').html(data);

        });
     }
    $(document).ready(function () {
        $(".modal").on("hidden.bs.modal", function () {
           $("#bar1").addClass('overlay');
    $("#bar_img1").addClass('fa fa-refresh fa-spin');
    delay(2000);
            window.location.reload();
            
        });
    });
</script>
</body>
</html>
