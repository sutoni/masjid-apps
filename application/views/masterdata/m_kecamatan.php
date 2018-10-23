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
                      <h3>List Kecamatan</h3>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td align='center'>No </td><td align='center'> Kode Kecamatan</td><td align='center'>Nama Kecamatan</td><td align='center'>Kota</td><td align='center'> Action</td>
                                </tr>     
                          </thead>
                          <tbody>
                             <?php     
                                    $no=1;
                                    foreach($data as $baris){
                                        
                                        
                                        $noa=$no++;
                                        echo"
                                            <tr><td align='center'>$noa</td>
                                                <td align='center'>$baris->kdkecamatan</td>
                                                <td>$baris->namakecamatan</td>
                                                <td>$baris->kota</td>
                                                
                                                   
                                                   ";
                                                 echo "<td align='center'>   
                                                        <a href=\"".base_url()."masterdata/m_kecamatanedit/".$baris->kdkecamatan."\">
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
                    <h4>Input Kecamatan</h4> 
                    <hr>   
                    <?php
                                    $attributes = array('role' => 'form', 'kdkecamatan' => 'formadd');
                                    echo form_open('masterdata/simpanKecamatan',$attributes); 
                   ?>   <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                        <div class="form-group col-lg-12">
                            <label for="txtkdkecamatan">Kode Kecamatan</label>
                            <input type="text" class="form-control"
                                   id="txtkdkecamatan" name="txtkdkecamatan" value="<?php echo $kdkecamatan; ?>" readonly>
                        </div>
                                        
                        <div class="form-group col-lg-12">
                            <label for="txtnamakecamatan">Nama Kecamatan</label>
                            <input type="text" class="form-control" id="txtnamakecamatan" name="txtnamakecamatan" placeholder="Masukan nama kecamatan">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="txtkota">Kota</label>
                            <input type="text" class="form-control" 
                               id="txtkota" name="txtkota" placeholder="Nama Kota">
                        </div>
                        
                        
                        <div class="form-group col-lg-12">
                           <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    
                        
                </div> 
              </div>
</div>    
                        
 </section>             