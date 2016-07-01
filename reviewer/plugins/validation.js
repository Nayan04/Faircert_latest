$(window).bind('keydown', function(event) {
    if (event.ctrlKey || event.metaKey) {
        switch (String.fromCharCode(event.which).toLowerCase()) {
        case 's':
            event.preventDefault();
            $('#adds').click();
            break;
        case 'c':
            event.preventDefault();
            $('#resets').click();
            break;
        case 'b':
            event.preventDefault();
            document.location=history.go(-1);
            break;
        }
    }
});
function validation_form(){
    $(".msgs2").html('');
    var fmname = $('#firm_type option:selected').text();
    var fmid = $('#firm_type option:selected').val();    
    var cname = $('#company_name').val();
    var pos = $('#designation').val();
    //-----------------------------------//
    var street = $('#street').val();
    var taluka = $('#taluka').val();
    var dist = $('#district').val();
    var stat = $('#state').val();
    var country = $('#country').val();
    var pincode = $('#pincode').val();
    var mobile = $('#mobile').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var location = $('#location').val();
    var ics = $('#ics').val();
      var pro_ids = [];
    var pro_name = [];
    var phoneno = /^\d{10}$/; 
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    $('.minimal-red').each(function () {
        if ($(this).is(':checked')) {
            pro_ids.push($(this).val());
            //pro_ids.push($(this).val());
            pro_name.push($(this).val());
        } else {
            pro_ids.push(0);
            pro_name.push('');
        }


        // alert(pro_ids)
    });
   // alert();exit;
    if(fmid=='none'){
       // alert()
     $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Invalid Selection Of Type</div>');
     
      return false;
    }else if(cname=='' || cname==null){
        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Company Name Is Required</div>');
        $('#company_name').focus();
        return false;
    }else if(pos==''){
        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Position Reqiured</div>');
        $('#designation').focus();
        return false;
    }else if(street==''){
        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Street Reqiured</div>');
        $('#street').focus();
        return false;        
    }else if(taluka==''){
        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Taluka Reqiured</div>');
         $('#taluka').focus();
        return false;        
    }else if(dist==''){
        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">District Reqiured</div>');
        $('#district').focus();
        return false;        
    }else if(stat==''){
        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">State Reqiured</div>');
       $('#state').focus();
        return false;        
    }else if(country==''){
        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Country Reqiured</div>');
       $('#country').focus();
        return false;        
    }else if(pincode==''){
        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Pincode Reqiured</div>');
     $('#pincode').focus();
        return false;        
    }else if(mobile==''){
        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Contact Reqiured</div>');
       $('#mobile').focus();
        return false;        
    }else if(email==''){
        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Email Reqiured</div>');
       $('#email').focus();
        return false;        
    }else if($('.minimal-red:checked').length==0){
        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Atleast One Program To Be Selected</div>');
      //=-r pro_ids.focus();
      $('.minimal-red').focus();
        return false;        
    }else if(!mobile.match(phoneno)){
       $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Invalid Contact Number</div>');
         $('#mobile').focus();
        return false;          
    }else if(!email.match(mailformat)){
       $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Invalid Email Id</div>');
        $('#email').focus();
        return false;          
    }else{
        return true;
    }
    
}
function update_new_enq() {
   

    var fmname = $('#firm_type option:selected').text();
    var fmid = $('#firm_type option:selected').val();
    var cname = $('#company_name').val();
    var pos = $('#designation').val();

    //-----------------------------------//
    var street = $('#street').val();
    var taluka = $('#taluka').val();
    var dist = $('#district').val();
    var stat = $('#state').val();
    var country = $('#country').val();
    var pincode = $('#pincode').val();
    var mobile = $('#mobile').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var location = $('#location').val();
    var ics = $('#ics').val();

    //------------------------------------//

    var pro_ids = [];
    var pro_name = [];

    $('.minimal-red').each(function () {
        if ($(this).is(':checked')) {
            pro_ids.push($(this).val());
            //pro_ids.push($(this).val());
            pro_name.push($(this).val());
        } else {
            pro_ids.push(0);
            pro_name.push('');
        }


        // alert(pro_ids)
    });
    //alert(pro_ids);
    //-------------------------------------//
    var frmrno = $('#farmerNo').val();
    var lndsze = $('#landsize').val();
    var vlgeno = $('#villaNo').val();


    var prono = $('#proNo').val();
    var prodes = $('#programdes').val();
    var lstcert = $('#lastcerti').val();
    var empno = $('#noemp').val();
    var decle = $('#trueness:checked').val();

    if ($("#trueness:not(:checked)")) {
        decle = 0;
    }
    var subpro = $('#sub').val();
    var enq_id = $('#enq_id').val();
    //-------------------------------------//
    //alert(decle);

    var dataString = 'fmname=' + fmname + '&fmid=' + fmid + '&pos=' + pos + "&street=" + street + "&taluka=" + taluka + "&district=" + dist + "&stat=" + stat + "&country=" + country + "&pincode=" + pincode + "&mobile=" + mobile + "&phno=" + phone + "&email=" + email + "&location=" + location + "&pro_id=" + pro_ids + "&pro_name=" + pro_name + "&frmrno=" + frmrno + "&lndsze=" + lndsze + "&vlgeno=" + vlgeno + "&prono=" + prono + "&prodes=" + prodes + "&lstcert=" + lstcert + "&empno=" + empno + "&decle=" + decle + "&cname=" + cname + "&sub=" + subpro + "&enq_id=" + enq_id + '&ics=' + ics;

   // alert(dataString)
     var re=validation_form();
     if(re==true){
          $("#bar").addClass('overlay');
        $("#bar_img").addClass('fa fa-refresh fa-spin');

    $.post("../controller/enq_form_edit.php", dataString).done(function (data)
    {
        //alert(data);
       // alert("Enquiry Updated Successfully!!");
       
        $("#bar").removeClass('overlay');
        $("#bar_img").removeClass('fa fa-refresh fa-spin');
        delay(5000);
        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Enquiry Updated Successfully!!</div>');
        
       document.location=history.go(-1);
       



    });
     }
}
function add_new_enq()
{
    
  
    var fmname = $('#firm_type option:selected').text();
    var fmid = $('#firm_type option:selected').val();
    var cname = $('#company_name').val();
    var pos = $('#designation').val();
    //-----------------------------------//
    var street = $('#street').val();
    var taluka = $('#taluka').val();
    var dist = $('#district').val();
    var stat = $('#state').val();
    var country = $('#country').val();
    var pincode = $('#pincode').val();
    var mobile = $('#mobile').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var location = $('#location').val();
    var ics = $('#ics').val();
    //------------------------------------//
    var pro_ids = [];
    var pro_name = [];
    $('.minimal-red').each(function () {
        if ($(this).is(':checked')) {
            pro_ids.push($(this).val());
            //pro_ids.push($(this).val());
            pro_name.push($(this).val());
        } else {
            pro_ids.push(0);
            pro_name.push('');
        }      
    });   
    //-------------------------------------//
    var frmrno = $('#farmerNo').val();
    var lndsze = $('#landsize').val();
    var vlgeno = $('#villaNo').val();
    var prono = $('#proNo').val();
    var prodes = $('#programdes').val();
    var lstcert = $('#lastcerti').val();
    var empno = $('#noemp').val();
    var decle = $('#trueness:checked').val();
    if ($("#trueness:not(:checked)")) {
        decle = 0;
    }
    var subpro = $('#sub').val();
    var re=validation_form();
    if(re==true){
        $("#bar").addClass('overlay');
  $("#bar_img").addClass('fa fa-refresh fa-spin');
    //-------------------------------------//
    var dataString = 'fmname=' + fmname + '&fmid=' + fmid + '&pos=' + pos + "&street=" + street + "&taluka=" + taluka + "&district=" + dist + "&stat=" + stat + "&country=" + country + "&pincode=" + pincode + "&mobile=" + mobile + "&phno=" + phone + "&email=" + email + "&location=" + location + "&pro_id=" + pro_ids + "&pro_name=" + pro_name + "&frmrno=" + frmrno + "&lndsze=" + lndsze + "&vlgeno=" + vlgeno + "&prono=" + prono + "&prodes=" + prodes + "&lstcert=" + lstcert + "&empno=" + empno + "&decle=" + decle + "&cname=" + cname + "&sub=" + subpro + '&ics=' + ics;

    $.post("../controller/enq_form_submit.php", dataString).done(function (data)
    {

        //alert(data)	

        $(".msgs2").html('<div class="alert alert-danger alert-dismissable">Enquiry Added Successfully!!</div>');
        $("#bar").removeClass('overlay');
        $("#bar_img").removeClass('fa fa-refresh fa-spin');
        delay(3000);
       // document.location = 'enquiry_form.php';


    });
    
    }
    
    

}// JavaScript Document
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
function change_status(){ 
    $("#msds").html('');
    $("#bar1").addClass('overlay');
    $("#bar_img1").addClass('fa fa-refresh fa-spin');
    var status = $('#status option:selected').val();
    var enq_id = $('#enq').val();
    //-----------------------------------//
    var remark = $('textarea#remark').val();
     if(status=='none'){
        $("#msds").html('<div class="alert alert-danger alert-dismissable">Invalid Selection!!</div>');        
    }else if(remark=='' || remark==null){
      $("#msds").html('<div class="alert alert-danger alert-dismissable">Remark Required!!</div>');       
    }else{
    //------------------------------------//
    var yess = confirm("Do You Want Change Status??");
    if (yess) {
        var dataString = 'status=' + status + '&remark=' + remark + '&enq_id=' + enq_id;

        $.post("../controller/update_status.php", dataString).done(function (data)
        {
            if (data == 1) {
                $("#msds").html('<div class="alert alert-danger alert-dismissable">Already Same Status!!</div>');
            } else {
                $("#msds").html('<div class="alert alert-danger alert-dismissable">Status Changed!!</div>');
               // delay(5000);
                $('#myModal').modal('toggle');
            }
        });
               }
    }//end else of status==none

}// JavaScript Document
function AddClient()
{
    
    var c_id = $('#clients').val();
    var enq_id = $('#enq2').val();


    //-----------------------------------//
    var remark = $('textarea#remark3').val();

     if(c_id==''){
        $("#msds5").html('<div class="alert alert-danger alert-dismissable">Client Id Requierd!!</div>');        
    }else if(remark=='' || remark==null){
      $("#msds5").html('<div class="alert alert-danger alert-dismissable">Remark Required!!</div>');       
    }else{
    //------------------------------------//
    var yess = confirm("Do You Want Register Client???");
    if (yess) {

        var dataString = 'c_id=' + c_id + '&remark=' + remark + '&enq_id=' + enq_id;


        //alert(dataString)
        //var re=validation();
        //if(re==true){

        $.post("register_client.php", dataString).done(function (data) {
            //alert(data)
           if(data==1){
            $("#msds5").html('<div class="alert alert-danger alert-dismissable">Already Same Status!!</div>');
        }else{
             $("#msds5").html('<div class="alert alert-danger alert-dismissable">Already Same Status!!</div>');
             $('#myModal2').modal('toggle');
            
        }
            // delay(5000);
           

        });

    }
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
        var yess = confirm("Do You Want Forwards ?");
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
        var d = new Date();  // Possible memory leak?
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
        //alert(data);
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
