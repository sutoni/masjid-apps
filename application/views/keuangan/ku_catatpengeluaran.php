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
                      <h4>Header Pengeluaran Keuangan</h4> 
                      <hr>   
                      <?php
                           $attributes = array('role' => 'form', 'iddetailpengeluaran' => 'formadd');
                           echo form_open('master/simpanHeaderpengeluaran',$attributes); 
                      ?>   
                      <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                          
                          <div class="form-group col-lg-12">
                            <label>Bidang</label>
                             <select name="txtbidang" id="txtbidang" class="form-control">
                               <option value="">--Pilih Bidang Organisasi--</option>
                               <?php 
                                    foreach($data1 as $key){
                                        $idbidang = $key->idbidang;
                                        $namabidang = $key->namabidang;
                                        ?>
                                            <option value="<?php echo $idbidang; ?>"><?php echo $namabidang; ?></option>
                                        <?php   
                                    }
                                    
                               ?>
                             </select>                                 
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
                          <div class="form-group col-lg-6">
                              <label for="txttglcatat">Tanggal Pencatatan</label>
                              <input type="text" class="form-control" id="txttglcatat" name="txttglcatat" value="<?php echo date('Y-m-d') ?>" disabled>
                          </div>
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
                       <h3>Prosedur Pembuatan Catatan Pengeluaran </h3>
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