<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : 
 * Email : 
 * Website : www.usahadong.com
 * Description : 
 * ***************************************************************
 */

?>
 <!-- DATA TABES SCRIPT -->
    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>" type="text/javascript"></script>
	<div class="table-responsive col-lg-11">
   <!-- Content Header (Page header) -->
        
          
               
<section class="content  ">
    
            
    
        <div class="form-group col-lg-5 col-lg-push-3">
        
                <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Change Password</h4> 
                    <hr>   
                    <?php
                                    $attributes = array('role' => 'form', 'nopolisi' => 'formadd');
                                    echo form_open('loginhere/changePassword',$attributes); 
                                    
                                   
                   ?>   <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                        <div class="form-group col-lg-5">
                            <label for="txtusername">Username</label>
                            <?php  foreach($data as $baris){
                                        $userid=$baris->userid;
                                        $username=$baris->username;
                                        $password=$baris->password;
                                    } ?>
                                <input type="text" class="form-control" value="<?php echo $username; ?>"
                                       id="txtusername" name="txtusername" readonly>
                                <input type="hidden" class="form-control" value="<?php echo $userid; ?>"
                                       id="txtusername" name="txtusername" readonly>
                        </div>
                        
                        <div class="form-group col-lg-7">
                            <label for="txtPassword">Password</label>
                            <input type="password" class="form-control" value="<?php echo $password; ?>"
                               id="txtPassword" name="txtPassword">
                        </div>
                        
                        <div class="form-group col-lg-12">
                           <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    
                        
                </div>  
              </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>    
  
     
</section>            