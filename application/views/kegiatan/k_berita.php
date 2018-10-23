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
                      <h4>Berita Seputar Masjid Al-Falah</h4> 
                      <hr>   
                      <?php
                           $attributes = array('role' => 'form', 'iddetailpengeluaran' => 'formadd');
                           echo form_open('kegiatan/simpanKberita',$attributes); 
                      ?>   
                      <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>

                          
                       <div class="form-group col-lg-12">
                            <label>Kategori Berita</label>
                             <select name="txtkategori" id="txtkategori" class="form-control">
                               <option value="">--Pilih Pos Pengeluaran--</option>
                               <option value="Berita">Berita</option>
                               <option value="Pengumuman">Pengumuman</option>
                             </select>                                 
                        </div>
                      
                      <div class="form-group col-lg-6">
                        <label for="txttglposting">Tanggal Posting</label>
                              <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                       <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                      <input class="form-control" type="text" name="txttglposting" id="txttglposting">                         
                              </div>
                      </div>

                       <div class="form-group col-lg-6">
                            <label for="txtnobon">Topik Berita</label>
                            
                            <input type="text" class="form-control"  id="txttopikberita" name="txttopikberita" >
                        </div>    
    
                          <div class="form-group col-lg-12">
                              <label for="txtsekilasberita">Sekilas Info</label>
                              <textarea class="form-control" rows="1" cols="20" name="txtsekilasberita" id="txtsekilasberita" placeholder="Masukan Sekilas Berita"></textarea>
                          </div>

                          <div class="form-group col-lg-12">
                              <label for="txtdetailberita">detail Info</label>
                              <textarea class="form-control" rows="1" cols="20" name="txtdetailberita" id="ckeditor" placeholder="Masukan Detail Berita"></textarea>
                          </div>

                          <div class="form-group col-lg-12">
                            <label for="txtlinkgambar">Link Gambar</label>
                            <input type="text" class="form-control" id="txtlinkgambar" name="txtlinkgambar" placeholder="Path folder gambar">
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
                        <h4 class="card-title">Informasi seputar Masjid Al-Falah</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Tanggal : <?php  echo date('d-M-Y'); ?></h6>
                        
                        
                      </div>
                    </div>

                      
                      <h3>History Berita</h3>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td>No </td><td>Kategori</td><td>Tanggal Posting</td><td>Topik Berita</td><td>Sekilas Info</td><td>Uraian</td><td>Link Gambar</td><td> Status</td><td> Action</td>
                                </tr>     
                          </thead>
                          <tbody>
                             <?php     
                                    $no=1;
                                    foreach($data0 as $baris){
                                        $noa=$no++;
                                        echo"
                                            <tr><td>$noa</td>
                                               
                                                <td>$baris->kategori</td>
                                                <td>$baris->tglposting</td>
                                                <td>$baris->topikberita</td>
                                                <td>$baris->sekilasinfo</td>
                                                <td>$baris->detailberita</td>
                                                <td>$baris->linkgambar</td>
                                                <td>$baris->statusberita</td>
                                                  
                                                   ";
                                                 echo "<td align='center'>   
                                                        <a href=\"".base_url()."kegiatan/".$baris->idberita."\">
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

                        <script src="<?php echo base_url().'assets/jquery/jquery-2.2.3.min.js'?>"></script>
                        <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
                        <script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
                        <script type="text/javascript">
                          $(function () {
                            CKEDITOR.replace('ckeditor');
                          });
                        </script>
 </section>             
 <br>