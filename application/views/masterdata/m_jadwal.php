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
        
          
               
<!--<section class="content  ">-->
    <div class="form-group col-lg-12">
            
    <div class="form-group col-lg-8  ">
        
                <div class="panel panel-default">
                <div class="panel-body ">
<!--                   <div class="form-group col-lg-8">-->
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
                       
<!--                  </div> -->
                </div> 
              </div>
</div>    
<div class="form-group col-lg-4 ">
        
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Input Jadwal Keberangkatan Travel</h4> 
                    <hr>   
                    <?php
                                    $attributes = array('role' => 'form', 'nopolisi' => 'formadd');
                                    echo form_open('masterdata/simpanJadwal',$attributes); 
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
                                          <input class="form-control" type="text" name="txttglberangkat" id="txttglberangkat">                         
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
                            <input type="text" class="form-control" value=""
                               id="txtwaktu" name="txtwaktu" placeholder="08:00:00">
                        </div>
                        
                        <div class="form-group col-lg-12">
                            <label>Pool Kendaraan</label>
                            <select name="txtpool" id="txtpool" class="form-control">
                                <option value="">--Pilih Pool Kendaraan --</option>
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
                                <option value="JAKARTA">JAKARTA</option>  
                                <option value="MAJALENGKA">MAJALENGKA</option>  
                            </select>    
                        </div>
                    
                        <div class="form-group col-lg-6">
                            <label>Tujuan</label>
                            <select name="txttujuan" id="txttujuan" class="form-control">
                                <option value="MAJALENGKA">MAJALENGKA</option>  
                                <option value="JAKARTA">JAKARTA</option>    
                                
                                
                            </select>    
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="txtharga">Harga</label>
                            <input type="text" class="form-control" value=""
                               id="txtharga" name="txtharga" placeholder="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="txtnopolisi">No Polisi</label>
                            <select name="txtnopolisi" id="txtnopolisi" class="form-control">
                                <option value="">--Pilih Kendaraan --</option>
                                <?php 
                                  foreach ($data3 as $val) {
                                        $nopolisi = $val->nopolisi;
                                        $namakendaraan = $val->namakendaraan;
                                        echo "<option value='$nopolisi'>$nopolisi $namakendaraan</option>";  
                                    }
                                ?>         

                             </select>
                            
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="txtketerangan">Keterangan</label>
                            <textarea class="form-control" rows="1" cols="20" name="txtketerangan" id="txtketerangan"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                           <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    
                        
                </div> 
              </div>
</div>    
    </div>                  
<!-- </section>             -->