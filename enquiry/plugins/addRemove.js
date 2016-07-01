var container='';
    $(document).ready(function() {
//alert()
        var iCnt = 0;
        // CREATE A "DIV" ELEMENT AND DESIGN IT USING JQUERY ".css()" CLASS.
        var container = $(document.createElement('div')).css({
            padding: '5px', margin: '10px',  border: '1px dashed',
            borderTopColor: '#999', borderBottomColor: '#999',
            borderLeftColor: '#999', borderRightColor: '#999'
        });

        $('#Adds').click(function() {
           // alert()
            if (iCnt <= 4) {

                iCnt = iCnt + 1;

                // ADD TEXTBOX.
                $(container).append('<div class="form-group" ><label for="inputEmail3" class="col-sm-1 control-label">ICS Name '+ iCnt +'</label>'+
             '<div class="col-sm-3"><input type="text" class="form-control ics" id="ics"'+ iCnt +' name="ics" placeholder="ICS NAME (optional)"></div>'+'<label for="inputEmail3" class="col-sm-1 control-label">No. of Farmers '+ iCnt +'</label>'
            +'<div class="col-xs-3"><input type="text" class="form-control farmerNo" id="farmerNo'+iCnt+ 'name="farmerNo" placeholder="No. of Farmers"></div>'+
            '<label for="inputEmail3" class="col-sm-1 control-label">Land Offered (Ha.) '+ iCnt +'</label>'+
            '<div class="col-xs-3"><input type="text" class="form-control landsize" id="landsize'+iCnt+ '" name="landsize" placeholder="Size Of Land">'+
            '</div></div><div class="form-group">'+
             '<label for="inputEmail3" class="col-sm-1 control-label">No. of Villages '+ iCnt +'</label>'+
            '<div class="col-xs-3">'+
              '<input type="text" class="form-control villaNo" id="villaNo"'+iCnt+' name="villaNo" placeholder="No Of Village">'+
            '</div>'+
            '<label for="inputEmail3" class="col-sm-1 control-label">No. of Product '+ iCnt +'</label>'+
            '<div class="col-xs-3">'+
              '<input type="text" class="form-control proNo" id="proNo"'+iCnt+' name="proNo" placeholder="NO Of Product">'+
            '</div>'+
            '<label for="inputEmail3" class="col-sm-1 control-label">Product List '+ iCnt +'</label>'+
            '<div class="col-xs-3">'+
              '<input type="text" class="form-control prolist" id="prolist"'+iCnt+' name="prolist" placeholder="Product List">'+
            '</div>'+
          '</div>');

                // SHOW SUBMIT BUTTON IF ATLEAST "1" ELEMENT HAS BEEN CREATED.
                

                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                $('#GG_container').after(container);
            }
            // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
            // (20 IS THE LIMIT WE HAVE SET)
            else {      
                $(container).append('<label>Reached the limit</label>'); 
                $('#Adds').attr('class', 'bt-disable'); 
                $('#Adds').attr('disabled', 'disabled');
            }
        });

        // REMOVE ELEMENTS ONE PER CLICK.
        $('#Remove').click(function() {
            if (iCnt != 0) { $('#tb' + iCnt).remove(); iCnt = iCnt - 1; }
        
            if (iCnt == 0) { 
                $(container)
                    .empty() 
                    .remove(); 

                $('#btSubmit').remove(); 
                $('#btAdd')
                    .removeAttr('disabled') 
                    .attr('class', 'bt') 

            }
        });

        // REMOVE ALL THE ELEMENTS IN THE CONTAINER.
        $('#btRemoveAll').click(function() {
            $(container)
                .empty()
                .remove(); 

            $('#btSubmit').remove(); 
            iCnt = 0; 
            
            $('#btAdd')
                .removeAttr('disabled') 
                .attr('class', 'bt');
        });
    });

    // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
    var divValue, values = '';

    function GetTextValue() {

        $(divValue) 
            .empty() 
            .remove(); 
        
        values = '';

        $('.input').each(function() {
            divValue = $(document.createElement('div')).css({
                padding:'5px', width:'200px'
            });
            values += this.value + '<br />'
        });

        $(divValue).append('<p><b>Your selected values</b></p>' + values);
        $('body').append(divValue);
    }
    /* * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function show_btn(){
    //$('#AddRemove').show();
    if($('.programs').is(":checked"))   
        $("#AddRemove").show();
    else
        $("#AddRemove").hide();
    $(container)
                .empty()
                .remove(); 
    // alert(pro_ids)
    };


