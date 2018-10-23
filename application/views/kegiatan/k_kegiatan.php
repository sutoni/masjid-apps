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
          <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create Berita</li>
        </ol>
      </nav>
  <!-- header pengeluaran -->          
        <div class="form-group col-lg-4 ">
                  <div class="panel panel-default">
                  <div class="panel-body">
                      <h4>Agenda Kegiatan Masjid Al-Falah</h4> 
                      <hr>  
                     <?php
                           $attributes = array('role' => 'form', 'iddetailpengeluaran' => 'formadd');
                           echo form_open('kegiatan/simpanKkegiatan',$attributes); 
                      ?>   
                      <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); 

                      ?>
                     
                          
                       <div class="form-group col-lg-12">
                            <label>Kategori Kegiatan</label>
                             <select name="txtkategori" id="txtkategori" class="form-control">
                               <option value="">--Pilih Nama Kegiatan--</option>
                                <?php 
                                    foreach($data1 as $key){
                                        $idkegiatan = $key->idkegiatan;
                                        $namakegiatan = $key->namakegiatan;
                                        ?>
                                            <option value="<?php echo $idkegiatan; ?>"><?php echo $namakegiatan; ?></option>
                                        <?php   
                                    }
                                    
                               ?>
                             
                             </select>                                 
                        </div>
                      
                      <div class="form-group col-lg-6">
                        <label for="txttglkegiatan">Tanggal Kegiatan</label>
                              <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                       <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                      <input class="form-control" type="text" name="txttglkegiatan" id="txttglkegiatan">                         
                              </div>
                      </div>
                      <div class="form-group col-lg-6">
                            <label for="txtwaktu">Waktu Kegiatan</label>
                            <input type="text" class="form-control"  id="txtwaktu" name="txtwaktu" >
                        </div>   
                      <div class="form-group col-lg-12">
                              <label for="txtagenda">Agenda Kegiatan</label>
                              <textarea class="form-control" rows="1" cols="20" name="txtagenda" id="txtagenda" placeholder="Masukan Agenda Kegiatan"></textarea>
                          </div>
                       <div class="form-group col-lg-12">
                            <label for="txttempat">Tempat Kegiatan</label>
                            <input type="text" class="form-control"  id="txttempat" name="txttempat" >
                        </div>    
                          
    
                          <div class="form-group col-lg-6">
                            <label for="txtketua">Ketua</label>
                            <input type="text" class="form-control" id="txtketua" name="txtketua" placeholder="Ketua Acara">
                          </div> 
                          <div class="form-group col-lg-6">
                            <label for="txtpic">PIC</label>
                            <input type="text" class="form-control" id="txtpic" name="txtpic" placeholder="PIC Acara">
                          </div> 

                          
                          <div class="form-group col-lg-12">
                              <button type="submit" class="btn btn-primary" id="btnTambah" name="btnTambah">Simpan</button>
                              <button type="submit" class="btn btn-primary" id="btnNew" name="btnNew">Tambah</button>
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
                        <h4 class="card-title">Informasi Jadwal Kegiatan Masjid Al-Falah</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Tanggal Cetak : <?php  echo date('d-M-Y'); ?></h6>
                        
                        
                      </div>
                    </div>

                      
                      <h3>Jadwal Kegiatan </h3>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td rowspan="2">No </td><td rowspan="2">Kategori Kegiatan</td><td colspan="6">Kegiatan</td><td rowspan="2"> Action</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Kegiatan</td><td>Tempat</td><td>Waktu</td><td>Uraian</td><td>Ketua</td><td>PIC</td>
                                </tr>     
                          </thead>
                          <tbody>
                             <?php     
                                    $no=1;
                                    foreach($data0 as $baris){
                                        $noa=$no++;
                                        echo"
                                            <tr><td>$noa</td>
                                               
                                                <td>$baris->namakegiatan</td>
                                                <td>$baris->tglkegiatan</td>
                                                <td>$baris->tempatkegiatan</td>
                                                <td>$baris->waktukegiatan</td>
                                                <td>$baris->agendakegiatan</td>
                                                <td>$baris->ketua</td>
                                                <td>$baris->pic</td>
                                                  
                                                   ";
                                                 echo "<td align='center'>   
                                                        <a href=\"".base_url()."kegiatan/k_kegiatan_edit/".$baris->idrealisasikegiatan."\">
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