$('#doinsp').addClass('hc');
$('#noncom').addClass('hc');
$(".myModals").on('click', function () {
    var ids = $(this).attr('name');
    $('#enq').val(ids);

});
$(".myModals2").on('click', function () {
    var ids = $(this).attr('name');
    $('#enq2').val(ids);
});
$(".myModals1").on('click', function () {
    var ids = $(this).attr('name');
    $('#enq1').val(ids);
});
function get_inspection_date() {
   // 
    var status = $('#status option:selected').val();
    if (status == 'Send Date Of Inspection, Info And Audit Plan To Client' || status == 'Acceptance Of Date Of Inspection By Client' || status=='Send Revised Date Of Inspection, Info And Audit Plan To Client'  ) {
        
        $('#doinsp').removeClass('hc');
        $('#noncom').addClass('hc');
        $('#non_ptype').prop('selectedIndex',0);            
        $('#non_type').prop('selectedIndex',0);          
        $('#date_of_noncom').val('');
        $('textarea#remark').val('');
    } else if (status == 'NonCompliance Found During The Inspection' || status == 'NonCompliance Closure Received') {
        $('#d_o_inspection').val('');
        $('#d_o_inspection_to').val('');
        $('#ins_type').prop('selectedIndex',0);
        $('textarea#remark').val('');
        $('#doinsp').addClass('hc');
        $('#noncom').removeClass('hc');
    } else {
        $('#doinsp').addClass('hc');
        $('#noncom').addClass('hc');
        $('#non_ptype').prop('selectedIndex',0);            
        $('#non_type').prop('selectedIndex',0);          
        $('#date_of_noncom').val('');
        $('textarea#remark').val('');
        $('#d_o_inspection').val('');
        $('#d_o_inspection_to').val('');
        $('#ins_type').prop('selectedIndex',0);
        //$('textarea#remark').val('');
    }

}
function check_vailds() {
    var status = $('#status option:selected').val();
    var enq_id = $('#enq').val();
    var d_o_ins = $('#d_o_inspection').val();
     var d_o_in_to = $('#d_o_inspection_to').val();
     var i_type = $('#ins_type option:selected').val();
     var non_type = $('#non_type option:selected').val();
     var n_type = $('#non_ptype option:selected').val();
     
     
    
    var date_of_noncom = $('#date_of_noncom').val();
    var remark = $('textarea#remark').val();
   // alert(date_of_noncom)
    if(status=='none'){
        $("#msds").html('<div class="alert alert-danger alert-dismissable">invalid Selection!!</div>');
         return false;     
    }else if (status =='Send Date Of Inspection, Info And Audit Plan To Client') {
            
        if (d_o_ins == null || d_o_in_to=='') {
            $("#msds").html('<div class="alert alert-danger alert-dismissable">Date of Inspection Required!!</div>');
            return false;
        }else if (i_type== 'none'){
            $("#msds").html('<div class="alert alert-danger alert-dismissable">Program Not Selected</div>');
            return false;
        }else if (remark == '' || remark == null){
            $("#msds").html('<div class="alert alert-danger alert-dismissable">Remark Required!!</div>');
            return false;
        }else{
            return true;
        }
    } else if (status =='NonCompliance Found During The Inspection') {
       
        if (non_type == 'none') {
            $("#msds").html('<div class="alert alert-danger alert-dismissable">NonCompliance Type Required!!</div>');
            return false;
        } else if (n_type== 'none'){
            $("#msds").html('<div class="alert alert-danger alert-dismissable">Program Not Selected</div>');
            return false;
        }else if (date_of_noncom ==null || date_of_noncom=='') {
            $("#msds").html('<div class="alert alert-danger alert-dismissable">NonCompliance Closer Date Required!!</div>');
            return false;
        } else if (remark == '' || remark == null){
          $("#msds").html('<div class="alert alert-danger alert-dismissable">Remark Required!!</div>');
        }else{
            return true;
        }

    }else if (remark == '' || remark == null){
     $("#msds").html('<div class="alert alert-danger alert-dismissable">Remark Required!!</div>');
     return false;
    }else{
        return true;
    }
    
}

function change_status(){
$("#msds").html('');
         
        var status = $('#status option:selected').val();
        var enq_id = $('#enq').val();
        var d_o_ins = $('#d_o_inspection').val();
         var d_o_ins_to = $('#d_o_inspection_to').val();
        // alert(d_o_ins_to);
        var non_type = $('#non_type option:selected').val();
        var date_of_noncom = $('#date_of_noncom').val();
        var i_type = $('#ins_type option:selected').val();
     var n_type = $('#non_ptype option:selected').val();
     var type='';
     if(i_type=='none' && n_type=='none'){
         type='';
     }else if(i_type=='none' && n_type!='none'){
         type=n_type;
     }else if(n_type=='none' && i_type!='none'){
         type=i_type;
     }
        //-----------------------------------//
        var remark = $('textarea#remark').val();
       
var get_in = check_vailds();
        if (get_in){

//------------------------------------//
var yess = confirm("Do You Want Change Status!!");
        if (yess) {
			$("#bar1").addClass('overlay');
 $("#bar_img1").addClass('fa fa-refresh fa-spin');
var dataString = 'status=' + status + '&remark=' + remark + '&enq_id=' + enq_id +'&d_o_ins='+d_o_ins+'&non_type='+non_type+'&date_of_noncom='+date_of_noncom+'&doi_to='+d_o_ins_to+'&p_type='+type;
//alert(dataString);exit;
        $.post("../controller/update_status.php", dataString).done(function (data){
	 //alert(data);
   $("#bar1").removeClass('overlay');
 $("#bar_img1").removeClass('fa fa-refresh fa-spin');
if (data == 1) {
$("#msds").html('<div class="alert alert-danger alert-dismissable">Already Same Status!!</div>');
} else {
$("#msds").html('<div class="alert alert-danger alert-dismissable">Status Changed!!</div>');
 
delay(5000);
if(status=='NonCompliance Found During The Inspection' || status=='NonCompliance Closure Received' ){
  var adds=confirm('Do you Want Add More');
  if(adds){}else{
document.location='inbox_inspector.php';
  }
  }
        
      //  
        //window.href="inbox_inspector.php";
}
});

}
}//end else of status==none

}// JavaScript Document
function AddClient()
        {
        $("#bar1").addClass('overlay');
                $("#bar_img1").addClass('fa fa-refresh fa-spin');
                var c_id = $('#clients').val();
                var enq_id = $('#enq2').val();
                //-----------------------------------//
                var remark = $('textarea#remark3').val();
                //------------------------------------//
                var yess = confirm("Do You Want Register Client???");
                if (yess) {

        var dataString = 'c_id=' + c_id + '&remark=' + remark + '&enq_id=' + enq_id;
                alert(dataString)
                //var re=validation();
                //if(re==true){

                $.post("register_client.php", dataString).done(function (data) {
        alert(data)
                $("#msds5").html('<div class="alert alert-danger alert-dismissable">Already Same Status!!</div>');
                // delay(5000);
                $('#myModal2').modal('toggle');
        });
        }

        }// JavaScript Document

function forward_to() {
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
        if (re == true) {
var yess = confirm("do You Want Farwords Enquiry");
        if (yess) {
$.post("../controller/fwd_to.php", dataString).done(function (data)
{
$("#msgs1").html('<div class="alert alert-danger alert-dismissable">Forwarded Successfully!!</div>');
        $('#myModal1').modal('toggle');
});
}
}

}
function valid_fwd() {

var desi = $("#desig option:selected").val();
        var st = $("#st option:selected").val();
        var emp = $("#emp option:selected").val();
        var dept = $("#far option:selected").val();
        $("#msgs").html('');
        if (dept == 'none') {

$("#msgs").html('<div class="alert alert-danger alert-dismissable">Please select Department!!</div>');
        return false;
} else if (desi == 'none') {
$("#msgs").html('<div class="alert alert-danger alert-dismissable">Please select designation!!</div>');
        return false;
} else if (emp == 'none') {
$("#msgs").html('<div class="alert alert-danger alert-dismissable">Please select staff!!</div>');
        return false;
} else if (st == 'none') {
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


function get_desig() {
//  alert();
var dept_name = $("#far option:selected").text();
        var dept_id = $("#far option:selected").val();
        var Strings = 'dept=' + dept_name + '&dept_id=' + dept_id;
        // alert(Strings)
        $.post('../controller/get_desig.php', Strings).done(function (data) {
alert(data);
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
        //$.post('../controller/get_status.php',Strings).done(function (data){
        // alert(data);
        //$('#st').html(data);											  
        // });

        }
