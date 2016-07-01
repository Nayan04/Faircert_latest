<!-- Modal -->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <span id="msds"></span>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="ress">Change Status </h4>
        
      </div>
      <div class="modal-body col-md-12" >
        <div class="box box-primary" style="padding:20px;">
          <form action=""  class="form-horizontal" role="form" name="status" id="status">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
              <div class="col-xs-9">
                <input type="hidden" name="enq" id="enq"  />
                <select class="form-control" name="status" id="status"  >
                  <option selected value="none">---select---</option>
                  <?php if($_SESSION['desig_name']=='Reviewer'){ ?>
                  <option value="Seen">Seen</option>
                  <option value="Hold">On Hold</option>
                  <option value="Working">Working</option> 
                  <?php }else if($_SESSION['desig_name']=='Certification Manager'){?>
                      <option value="Seen">Seen</option>
                  <option value="Hold">On Hold</option>
                  <option value="Working">Working</option> 
                 <?php }else if($_SESSION['desig_name']=='CEO/Certification Committe'){?>
                      <option value="Seen">Seen</option>
                      <option value="Hold">On Hold</option>
                      <option value="Working">Working</option>                     
                 <?php } ?>                     
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Remark</label>
              <div class="col-xs-9">
                  <textarea class="form-control" rows="5"   name="remark" id="remark"></textarea>
              </div>
            </div>
            <div class="box-footer">
              <button type="reset" class="btn btn-primary">Cancel</button>
              <button type="button" class="btn btn-primary pull-center" onClick="change_status()">Add</button>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
        
    </div>
    
  </div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////
$dept=$db->get_dept();?>
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="ress">Forward To</h4>
        <span id="msgs"></span>
      </div>
      <div class="modal-body col-md-12" >
        <div class="box box-primary" style="padding:20px;">
          <form action=""  class="form-horizontal" role="form" name="status" id="status">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Department</label>
              <div class="col-xs-9">
                <input type="hidden" name="enq1" id="enq1"  />
                <select class="form-control" name="far" id="far" onchange="get_desig()">
                  <option selected value="none">---select---</option>
                  <?php while($row3=mysql_fetch_array($dept)){ 
                  if($row3[1]=='BDE'){}else{
				  ?>
                  <option value="<?php echo $row3[0]; ?>"><?php echo $row3[1]; ?></option>
                  <?php }} ?>
                  
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Designation</label>
              <div class="col-xs-9">
                
                <select class="form-control" name="desig" id="desig" onchange="get_emp()" >
                  
                  
                  
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Send To</label>
              <div class="col-xs-9">
                
                <select class="form-control" name="emp" id="emp" >
                  
                  
                  
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
              <div class="col-xs-9">
                
                <select class="form-control" name="st" id="st"> 
                 <option selected value="none">---select---</option>
                  
                  <?php while($result=mysql_fetch_array($sts)){?>
	<option value="<?php echo $result['status_id'];?>"><?php echo $result['status'];?></option>
<?php 	}?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Remark</label>
              <div class="col-xs-9">
                <textarea class="form-control" name="remark1" id="remark1"></textarea>
              </div>
            </div>
            <div class="box-footer">
              <button type="reset" class="btn btn-primary">Cancel</button>
              <button type="button" class="btn btn-primary pull-center" onClick="forward_to()">Forward</button>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
   
  </div>
</div>
<?php ////////////////////////// ?>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <span id="msds5"></span>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="ress">Register Client</h4>
        
      </div>
      <div class="modal-body col-md-12" >
        <div class="box box-primary" style="padding:20px;">
          <form action=""  class="form-horizontal" role="form" name="client" id="client">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Client ID </label>
              <div class="col-xs-9">
                <input type="hidden" name="enq2" id="enq2"  />
                <input type="text" class="form-control" name="clients" id="clients" placeholde="Enter Client ID" />
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Remark</label>
              <div class="col-xs-9">
                <textarea class="form-control" name="remark3" id="remark3"></textarea>
              </div>
            </div>
            <div class="box-footer">
              <button type="reset" class="btn btn-primary">Cancel</button>
              <button type="button" class="btn btn-primary pull-center" onClick="AddClient()">Add Client</button>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <div id="bar1" class=""> <i id="bar_img1" class=""></i> </div>
  </div>
</div> 
