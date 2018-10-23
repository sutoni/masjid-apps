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
    <div class="form-group col-lg-12">
            
<div class="form-group col-lg-8  ">
        
                <div class="panel panel-default">
                <div class="panel-body ">
                   <div class="form-group col-lg-10">
                      <h3>List User</h3>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td>No </td><td> Userid</td><td>Username</td><td> Password</td><td> Level</td><td> Action</td>
                                </tr>     
                          </thead>
                          <tbody>
                             <?php     
                                    $no=1;
                                    foreach($data as $baris){
                                        
                                        
                                        $noa=$no++;
                                        echo"
                                            <tr><td>$noa</td>
                                                <td>$baris->userid</td>
                                                <td>$baris->username</td>
                                                <td>$baris->password</td>
                                                <td>$baris->level</td>
                                                   ";
                                                 echo "<td align='center'>   
                                                        <a href=\"".base_url()."master/m_useredit/".$baris->userid."\">
                                                        Edit</a>
                                                       </td> 
                                               ";
                                        echo"                                            </tr>     
                                            ";    
                                    }
                                    
                              ?>
                              
                          </tbody>    
                      </table>
                       <div class="col-lg-12" align="right">
                        
                     </div>
                  </div> 
                </div> 
              </div>
</div>    
<div class="form-group col-lg-4 ">
        
                <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Update User Akses</h4> 
                    <hr>   
                    <?php
                                    $attributes = array('role' => 'form', 'userid' => 'formadd');
                                    echo form_open('masterdata/updateUser',$attributes); 
                                    foreach($data2 as $key){
                                        $iduser=$key->userid;
                                        $usernya=$key->username;
                                        $passnya=$key->password;
                                        $levelnya=$key->level;
                                    }
                   ?>   <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                        <div class="form-group col-lg-9">
                            <label for="txtuserid">User ID</label>
                            <input type="text" class="form-control"
                               id="txtuserid" name="txtuserid" value="<?php echo $iduser;?>" readonly>
                        </div>
                        
                        <div class="form-group col-lg-9">
                            <label for="txtusername">Username</label>
                            <input type="text" class="form-control" value="<?php echo $usernya;?>"
                               id="txtusername" name="txtusername" placeholder="Masukkan Username">
                        </div>
                        
                        <div class="form-group col-lg-9">
                            <label for="txtpassword">Password</label>
                            <input type="password" class="form-control" value="<?php echo $usernya;?>"
                               id="txtpassword" name="txtpassword" placeholder="******">
                        </div>
                    
                        <div class="form-group col-lg-6">
                            <label>Level</label>
                            <select name="txtlevel" id="txtlevel" class="form-control">
                                
                                <?php 
                                    if($levelnya=='manager'){
                                        echo '<option value="manager">Manager</option>';
                                        echo '<option value="petugas">Petugas</option>';
                                        echo '<option value="admin">Admin</option>';
                                    }
                                    elseif($levelnya=='petugas'){
                                        echo '<option value="petugas">Petugas</option>';
                                        echo '<option value="manager">Manager</option>';
                                        echo '<option value="admin">Admin</option>';
                                    }else{
                                        echo '<option value="admin">Admin</option>';
                                        echo '<option value="petugas">Petugas</option>';
                                        echo '<option value="manager">Manager</option>';
                                    }
                                ?>
                               
                            </select>    
                        </div>
                        
                        <div class="form-group col-lg-12">
                           <button type="submit" id="btnUpdate" name="btnUpdate" class="btn btn-primary">Update</button>
                           <button type="submit" id="btnTambah" name="btnTambah" class="btn btn-primary">Tambah</button>
                        </div>
                    
                        
                </div> 
              </div>
</div>    
                        
 </section>             