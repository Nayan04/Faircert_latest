$(".myModals").on('click', function () {
    var ids = $(this).attr('name');
    $('#enq').val(ids);
});
$(".myModals1").on('click', function () {
    var ids = $(this).attr('name');
    $('#enq1').val(ids);
});
function change_status(){
   // alert();
               $("#bar1").addClass('overlay');
                $("#bar_img1").addClass('fa fa-refresh fa-spin');
                var status = $('#status option:selected').val();
                var enq_id = $('#enq').val();
                //-----------------------------------//
                var remark = $('textarea#remark').val();
                if (status == 'none'){
        $("#msds").html('<div class="alert alert-danger alert-dismissable">Invalid Selection!!</div>');
        } else if (remark == '' || remark == null){
        $("#msds").html('<div class="alert alert-danger alert-dismissable">Remark Required!!</div>');
        } else{
        //------------------------------------//
        var yess = confirm("do You Want Change Status");
                if (yess) {

        var dataString = 'status=' + status + '&remark=' + remark + '&enq_id=' + enq_id;
                $.post("../controller/update_status.php", dataString).done(function (data){
                   // alert(data);
        if (data == 1) {
        $("#msds").html('<div class="alert alert-danger alert-dismissable">Already Same Status!!</div>');
        } else {
        $("#msds").html('<div class="alert alert-danger alert-dismissable">Status Changed!!</div>');
                // delay(5000);
                $('#myModal').modal('toggle');
              }
        });
        }
        }
        }// JavaScript Document
        function forward_to(){
// $("#bar1").addClass('overlay');
        //$("#bar_img1").addClass('fa fa-refresh fa-spin');
//  +'&dept='+fwd_dept+'&desig='+fwd_desig+'&staff='+fwd_staff+'&status='+fwd_st
        var fwd_dept = $('#far option:selected').text();
                var fwd_desig = $('#desig option:selected').text();
                var fwd_staff = $('#emp option:selected').val();
                var fwd_st = $('#st option:selected').text();
                var enq_id = $('#enq1').val();
                //-----------------------------------//
                var remark = $('textarea#remark1').val();
                //

                //------------------------------------//

                var dataString = 'remark=' + remark + '&enq_id=' + enq_id + '&dept=' + fwd_dept + '&desig=' + fwd_desig + '&staff=' + fwd_staff + '&status=' + fwd_st;
//  alert(dataString); 
                var re = valid_fwd();
                if (re == true){
        var yess = confirm("Do You Want Farwords Enquiry???");
                if (yess){
        $.post("../controller/fwd_to.php", dataString).done(function(data)
        {
        //   alert(data)

        $('#myModal1').modal('toggle');
                $("#msgs1").html('<div class="alert alert-danger alert-dismissable">Forwarded Successfully!!</div>');
        });
        }
        }

        }
        function valid_fwd(){

        var desi = $("#desig option:selected").val();
                var st = $("#st option:selected").val();
                var emp = $("#emp option:selected").val();
                var dept = $("#far option:selected").val();
                $("#msgs").html('');
                if (dept == 'none'){

        $("#msgs").html('<div class="alert alert-danger alert-dismissable">Please select Department!!</div>');
                return false;
        } else if (desi == 'none'){
        $("#msgs").html('<div class="alert alert-danger alert-dismissable">Please select designation!!</div>');
                return false;
        } else if (emp == 'none'){
        $("#msgs").html('<div class="alert alert-danger alert-dismissable">Please select staff!!</div>');
                return false;
        } else if (st == 'none'){
        $("#msgs").html('<div class="alert alert-danger alert-dismissable">Please select Status!!</div>');
                return false;
        }
        return true;
                }

        function delay(ms) {
        // alert()
        var cur_d = new Date();
                var cur_ticks = cur_d.getTime();
                var ms_passed = 0;
                while (ms_passed < ms) {
        var d = new Date(); // Possible memory leak?
                var ticks = d.getTime();
                ms_passed = ticks - cur_ticks;
                // d = null;  // Prevent memory leak?
        }
        }


        function get_desig(){
        //  alert();
        var dept_name = $("#far option:selected").text();
                var dept_id = $("#far option:selected").val();
                var Strings = 'dept=' + dept_name + '&dept_id=' + dept_id;
                // alert(Strings)
                $.post('../controller/get_desig.php', Strings).done(function (data){
     //   alert(data);
                $('#desig').html(data);
        });
        }

        function get_emp(){
        //  alert();
        var name = $("#desig option:selected").text();
                var id = $("#desig option:selected").val();
                var dept_name = $("#far option:selected").text();
                var dept_id = $("#far option:selected").val();
                var Strings = 'desig=' + name + '&desig_id=' + id + '&dept=' + dept_name + '&dept_id=' + dept_id;
                $.post('../controller/get_emp.php', Strings).done(function (data){      
                $('#emp').html(data);
                });
             }
