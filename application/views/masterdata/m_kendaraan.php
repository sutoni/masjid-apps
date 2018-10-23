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
                      <h3>List Kendaraan</h3>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td>No </td><td > No Polisi</td><td >Nama Kendaraan</td><td >Kapasitas</td><td>Keterangan</td><td> Action</td>
                                </tr>     
                          </thead>
                          <tbody>
                             <?php     
                                    $no=1;
                                    foreach($data as $baris){
                                        
                                        
                                        $noa=$no++;
                                        echo"
                                            <tr><td>$noa</td>
                                                <td>$baris->nopolisi</td>
                                                <td>$baris->namakendaraan</td>
                                                <td>$baris->kapasitas</td>
                                                <td>$baris->keterangan</td>
                                                   
                                                   ";
                                                 echo "<td align='center'>   
                                                        <a href=\"".base_url()."masterdata/m_kendaraanedit/".$baris->nopolisi."\">
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
                    <h4>Input Kendaraan</h4> 
                    <hr>   
                    <?php
                                    $attributes = array('role' => 'form', 'nopolisi' => 'formadd');
                                    echo form_open('masterdata/simpanKendaraan',$attributes); 
                   ?>   <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                        <div class="form-group col-lg-12">
                            <label for="txtnopolisi">No Polisi</label>
                            <input type="text" class="form-control"
                                   id="txtnopolisi" name="txtnopolisi" placeholder="B 1234 SAH" >
                        </div>
                                        
                        <div class="form-group col-lg-12">
                            <label for="txtnamakendaraan">Nama Kendaraan</label>
                            <input type="text" class="form-control"                                id="txtnamakendaraan" name="txtnamakendaraan" placeholder="Masukan nama kendaraan">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="txtkapasitas">Kapasitas</label>
                            <input type="text" class="form-control" 
                               id="txtkapasitas" name="txtkapasitas" placeholder="Kapasitas angkut penumpang">
                        </div>
                        
                        <div class="form-group col-lg-12">
                            <label for="txtketerangan">Keterangan</label>
                            <textarea class="form-control" rows="1" cols="20" name="txtketerangan" id="txtketerangan" placeholder="Keterangan tentang kendaraan"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                           <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    
                        
                </div> 
              </div>
</div>    
                        
 </section>             