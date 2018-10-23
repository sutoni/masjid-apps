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
  
<div class="container-fluid">

  <div class="table-responsive col-lg-13">
   <!-- Content Header (Page header) -->
        
          
               
<section class="content  ">
    <div class="form-group col-lg-13">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Keuangan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pencatatan Pengeluaran</li>
        </ol>
      </nav>
  <!-- header pengeluaran -->          
        <div class="form-group col-lg-4 ">
                  <div class="panel panel-default">
                  <div class="panel-body">
                      <h4>Pencatatan Pemasukan Keuangan</h4> 
                      <hr>   
                      <?php
                           $attributes = array('role' => 'form', 'idcatatpemasukan' => 'formadd');
                           echo form_open('master/simpanPemasukan',$attributes); 
                      ?>   
                      <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                          
                          <div class="form-group col-lg-9">
                            <label>Kode Pemasukan</label>
                             <select name="txtkdpemasukan" id="txtkdpemasukan" class="form-control">
                               <option value="">-Pilih Kode Pemasukan-</option>
                               <?php 
                                    foreach($data as $key){
                                        $idpemasukan = $key->idpemasukan;
                                        $namapemasukan = $key->namapemasukan;
                                        ?>
                                            <option value="<?php echo $idpemasukan; ?>"><?php echo $namapemasukan; ?></option>
                                        <?php   
                                    }
                                    
                               ?>
                             </select>                                 
                        </div>
                         <div class="form-group col-lg-6">
                        <label for="txttglcatat">Tanggal Pemasukan</label>
                              <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                       <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                      <input class="form-control" type="text" name="txttglcatat" id="txttglcatat">                         
                              </div>
                      </div>

                        
                        <div class="form-group col-lg-6">
                            <label for="txtrefrensi">Refrensi</label>
                            <input type="text" class="form-control" id="txtrefrensi" name="txtrefrensi" placeholder="Refrensi jika ada">
                        </div> 
                        <div class="form-group col-lg-12">
                            <label for="txtnilaipemasukan">Nilai Pemasukan</label>
                            <input type="text" class="form-control" id="txtnilaipemasukan" name="txtnilaipemasukan" placeholder="Rp.">
                        </div> 
                         
                          <div class="form-group col-lg-12">
                              <label for="txtketerangan">Keterangan Keperluan</label>
                              <textarea class="form-control" rows="1" cols="20" name="txtketerangan" id="txtketerangan" placeholder="Masukan Keterangan Keperluan"></textarea>
                          </div>
                          <!--
                          <div class="form-group col-lg-6">
                              <label for="txtnilai">Nilai</label>
                              <input type="text" class="form-control" id="txtnilai" name="txtnilai" placeholder="Rp. Masukan Nilai Pengajuan">
                          </div>-->
                          
                          <div class="form-group col-lg-12">
                             <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                  </div> 
                </div>
        </div>  

  <!-- detail pengeluaran-->
<div class="form-group col-lg-8  ">
        
                <div class="panel panel-default">
                <div class="panel-body ">
                   <div class="form-group col-lg-11">
                       <h3>Prosedur Pembuatan Catatan Pemasukan </h3>
                       <div class="col-lg-12" align="right">
                        
                     </div>
                  </div> 
                </div> 
              </div>
</div> 


  
                        
</div>                        

                        <script src="<?=base_url('assets/plugins/jQuery/jquery.js');?>" type="text/javascript"></script>
                          
                        <script src="<?=base_url('assets/plugins/datepicker/bootstrap-datepicker3.js');?>" type="text/javascript"></script>
                        <script>
                           //options method for call datepicker
                           $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
                        </script> 
 </section>             
 <br>