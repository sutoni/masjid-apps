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
                      <h4>Detail Pengeluaran Keuangan</h4> 
                      <hr>   
                      <?php
                           $attributes = array('role' => 'form', 'iddetailpengeluaran' => 'formadd');
                           echo form_open('master/simpanDetailpengeluaran',$attributes); 
                      ?>   
                      <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>

                      <?php
                                  
                                    foreach($data1 as $key){
                                        $idpengeluaran = $key->idpengeluaran;
                                        $namabidang = $key->namabidang;
                                        $keterangan = $key->ketpengeluaran;
                                        $tglcatat = $key->tglcatat;
                                        
                                    }
                                    
                   ?> 
                          
                       <div class="form-group col-lg-12">
                            <label>Pos Pengeluaran</label>
                             <select name="txtkodepengeluaran" id="txtkodepengeluaran" class="form-control">
                               <option value="">--Pilih Pos Pengeluaran--</option>
                               <?php 
                                    foreach($data2 as $key){
                                        $kodepengeluaran = $key->kodepengeluaran;
                                        $namapengeluaran = $key->namapengeluaran;
                                        ?>
                                            <option value="<?php echo $kodepengeluaran; ?>"><?php echo $namapengeluaran; ?></option>
                                        <?php   
                                    }
                                    
                               ?>
                             </select>                                 
                        </div>
                       <div class="form-group col-lg-6">
                            <label for="txtnobon">No Bon</label>
                            <input type="text" class="form-control"  id="txtnobon" name="txtnobon" placeholder="Masukan No Bon">
                            <input type="hidden" class="form-control"  id="txtidpengeluaran" name="txtidpengeluaran" value="<?php echo($idpengeluaran); ?>" >
                        </div>    

                      <div class="form-group col-lg-6">
                        <label for="txttglbon">Tanggal Bon</label>
                              <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                       <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                      <input class="form-control" type="text" name="txttglbon" id="txttglbon">                         
                              </div>
                      </div>

                          
                          <div class="form-group col-lg-12">
                              <label for="txtketerangandetail">Keterangan Keperluan</label>
                              <textarea class="form-control" rows="1" cols="20" name="txtketerangandetail" id="txtketerangandetail" placeholder="Masukan Keterangan Keperluan"></textarea>
                          </div>
                          <div class="form-group col-lg-4">
                            <label for="txtqty">Qty</label>
                            <input type="text" class="form-control" id="txtqty" name="txtqty" placeholder="Qty">
                        </div> 
                        <div class="form-group col-lg-8">
                            <label for="txthargasatuan">Harga Satuan</label>
                            <input type="text" class="form-control" id="txthargasatuan" name="txthargasatuan" placeholder="Rp.">
                        </div> 

                          
                          <div class="form-group col-lg-12">
                              <button type="submit" class="btn btn-primary" id="btnTambah" name="btnTambah">Tambah</button>
                              <button type="submit" class="btn btn-primary" id="btnNew" name="btnNew">New</button>
                          </div>
                  </div> 
                </div>
        </div>  

  <!-- detail pengeluaran-->
<div class="form-group col-lg-8  ">
        
                <div class="panel panel-default">
                <div class="panel-body ">
                   <div class="form-group col-lg-11">
                    
                     <div class="card" style="width: 70rem;">
                      <div class="card-body">
                        <h4 class="card-title">Bidang : <?php echo "$namabidang"; ?></h4>
                        <h6 class="card-subtitle mb-2 text-muted">Tanggal : <?php echo "$tglcatat"; ?></h6>
                        <p class="card-text">Keterangan Keperluan Biaya : <?php echo "$keterangan"; ?>.</p>
                        
                      </div>
                    </div>

                      
                      <h3>Detail Pengeluaran </h3>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td>No </td><td>Tanggal Bon</td><td>No Bon</td><td>Keterangan</td><td>Qty</td><td>harga Satuan</td><td>Total Nilai (Rp)</td><td>Pos Pengeluaran</td><td> Status</td><td> Action</td>
                                </tr>     
                          </thead>
                          <tbody>
                             <?php     
                                    $no=1;
                                    foreach($data0 as $baris){
                                        $noa=$no++;
                                        echo"
                                            <tr><td>$noa</td>
                                               
                                                <td>$baris->tglbon</td>
                                                <td>$baris->nomerbon</td>
                                                <td>$baris->keterangan</td>
                                                <td>$baris->kuantiti</td>
                                                <td>$baris->hargasatuan</td>
                                                <td>$baris->total</td>
                                                <td>$baris->kodedetail</td>
                                                <td>$baris->status</td>   
                                                   ";
                                                 echo "<td align='center'>   
                                                        <a href=\"".base_url()."keuangan/".$baris->iddetailpengeluaran."\">
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


  
                        
</div>                        

                        <script src="<?=base_url('assets/plugins/jQuery/jquery.js');?>" type="text/javascript"></script>
                          
                        <script src="<?=base_url('assets/plugins/datepicker/bootstrap-datepicker3.js');?>" type="text/javascript"></script>
                        <script>
                           //options method for call datepicker
                           $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
                        </script> 
 </section>             
 <br>