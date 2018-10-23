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
                      <h3>List Jadwal</h3>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td rowspan="2">No </td><td colspan="3">Keberangkatan</td><td colspan="2">Rute</td><td>Harga</td><td>No Polisi</td><td>Keterangan</td><td> Action</td>
                                </tr>     
                          </thead>
                          <tbody>
                             <?php     
                                    $no=1;
                                    foreach($data as $baris){
                                        
                                        $tglsekarang=date('Y-m-d');
                                        $noa=$no++;
                                        echo"
                                            <tr><td>$noa</td>
                                                
                                                <td>$baris->tglberangkat</td>
                                                <td>$baris->waktuberangkat</td>
                                                <td>$baris->namapool</td>
                                                <td>$baris->bdari</td>    
                                                <td>$baris->btujuan</td>
                                                <td>".number_format($baris->harga)."</td>    
                                                <td>$baris->nopolisi</td>    
                                                <td>$baris->keterangan</td>        
                                                   ";
                                                 if($baris->tglberangkat < $tglsekarang ){
                                                       echo "<td align='center'>   
                                                        -
                                                       </td> ";
                                                   }else{
                                                 echo "<td align='center'>   
                                                        <a href=\"".base_url()."masterdata/m_jadwaledit/".$baris->idjadwal."\">
                                                        Edit</a>
                                                       </td> 
                                                   ";}
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
                    <h4>Update Jadwal Keberangkatan Travel</h4> 
                    <hr>   
                    <?php
                                    $attributes = array('role' => 'form', 'kdjadwal' => 'formadd');
                                    echo form_open('masterdata/updateJadwal',$attributes); 
                                     foreach($data4 as $key){
                                        $idjadwal=$key->idjadwal;
                                        $tglberangkat=$key->tglberangkat;
                                        $waktuberangkat=$key->waktuberangkat;
                                        $kdpool=$key->kdpool;
                                        $namapool=$key->namapool;
                                        $bdari=$key->bdari;
                                        $btujuan=$key->btujuan;
                                        $harga=$key->harga;
                                        $nopolisi=$key->nopolisi;
                                        $namkend=$key->namakendaraan;
                                        $keterangan=$key->keterangan;
                                        
                                    }
                   ?>   <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                        <div class="form-group col-lg-12">
                            <label for="txtidjadwal">ID Jadwal</label>
                            <input type="text" class="form-control"
                               id="txtidjadwal" name="txtidjadwal" value="<?php echo $idjadwal;?>" readonly>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="txttglberangkat">Tanggal Berangkat</label>
                                  <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                           <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                           <input class="form-control" type="text" name="txttglberangkat" id="txttglberangkat" value="<?php echo $tglberangkat;?>">                         
                                  </div>
                        </div>
                        <script src="<?=base_url('assets/plugins/jQuery/jquery.js');?>" type="text/javascript"></script>
			<script src="<?=base_url('assets/plugins/datepicker/bootstrap-datepicker3.js');?>" type="text/javascript"></script>
			<script>
			   //options method for call datepicker
			   $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
			</script>                  
                        <div class="form-group col-lg-6">
                            <label for="txtwaktu">Waktu</label>
                            <input type="text" class="form-control" value="<?php echo $waktuberangkat;?>"
                               id="txtwaktu" name="txtwaktu" placeholder="08:00:00">
                        </div>
                        
                        <div class="form-group col-lg-12">
                            <label>Pool Kendaraan</label>
                            <select name="txtpool" id="txtpool" class="form-control">
                                <option value="<?php echo $kdpool; ?>"><?php echo $namapool; ?></option>
                                <?php 
                                
                                  foreach ($data2 as $val) {
                                        $kdpool = $val->kdpool;
                                        $namapool = $val->namapool;
                                        echo "<option value='$kdpool'>$namapool</option>";  
                                    }
                                ?>         

                             </select>     
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Keberangkatan</label>
                            <select name="txtberangkat" id="txtberangkat" class="form-control">
                                 <?php   
                                    if($bdari =='JAKARTA'){
                                        echo "<option value='JAKARTA'>JAKARTA</option>  
                                                <option value='MAJALENGKA'>MAJALENGKA</option>  ";
                                    }else{
                                        echo "<option value='MAJALENGKA'>MAJALENGKA</option>  
                                            <option value='JAKARTA'>JAKARTA</option>  ";
                                    }
                                ?>
                                  
                                
                            </select>    
                        </div>
                    
                        <div class="form-group col-lg-6">
                            <label>Tujuan</label>
                            <select name="txttujuan" id="txttujuan" class="form-control">
                                <?php   
                                    if($btujuan =='JAKARTA'){
                                        echo "<option value='JAKARTA'>JAKARTA</option>  
                                                <option value='MAJALENGKA'>MAJALENGKA</option>  ";
                                    }else{
                                        echo "<option value='MAJALENGKA'>MAJALENGKA</option>  
                                            <option value='JAKARTA'>JAKARTA</option>  ";
                                    }
                                ?>
                                  
                                
                                
                            </select>    
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="txtharga">Harga</label>
                            <input type="text" class="form-control" value="<?php echo $harga;?>"
                               id="txtharga" name="txtharga" placeholder="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="txtnopolisi">No Polisi</label>
                            <select name="txtnopolisi" id="txtnopolisi" class="form-control">
                                 <option value="<?php echo $nopolisi; ?>"><?php echo $nopolisi." " .$namkend; ?></option>
                                <?php 
                                  foreach ($data3 as $val) {
                                        $nopolisi = $val->nopolisi;
                                        $namakendaraan = $val->namakendaraan;
                                        echo "<option value='$nopolisi'>$nopolisi $namakendaraan</option>";  
                                    }
                                ?>         

                             </select>
                            
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="txtketerangan">Keterangan</label>
                            <textarea class="form-control" rows="1" cols="100" name="txtketerangan" id="txtketerangan" ><?php echo $keterangan;?></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" id="btnUpdate" name="btnUpdate" class="btn btn-primary">Update</button>
                           <button type="submit" id="btnTambah" name="btnTambah" class="btn btn-primary">Tambah</button>
                        </div>
                    
                        
                </div> 
              </div>
</div>    
                        
 </section>             