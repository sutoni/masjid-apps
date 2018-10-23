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
    <div class="form-group col-lg-11">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create Berita</li>
        </ol>
      </nav>
  <!-- header pengeluaran -->          
        <div class="form-group col-lg-11 ">
                  <div class="panel panel-default">
                  <div class="panel-body">
                      <h4>Berita Seputar Masjid Al-Falah</h4> 
                      <hr>   
                      <?php
                           $attributes = array('role' => 'form', 'iddetailpengeluaran' => 'formadd');
                           echo form_open('kegiatan/simpanKberita',$attributes); 
                      ?>   
                      <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                      <?php
                                  
                                    foreach($data1 as $key){
                                        $idberita = $key->idberita;
                                        $kategori = $key->kategori;
                                        $tglposting = $key->tglposting;
                                        $topikberita = $key->topikberita;
                                        $detailberita = $key->detailberita;
                                        $linkgambar = $key->linkgambar;
                                        $logupdate = $key->logupdate;
                                        $loguser = $key->loguser;
                                        $statusberita = $key->statusberita;
                                        
                                    }
                                    
                      ?>
                          
                       <div class="form-group col-lg-2">
                            <label>Kategori Berita</label>
                             <select name="txtkategori" id="txtkategori" class="form-control">
                               <option value="<?php echo $kategori;?>"><?php echo $kategori;?></option>
                               <option value="Berita">Berita</option>
                               <option value="Pengumuman">Pengumuman</option>
                             </select>                                 
                        </div>
                      
                     

                       <div class="form-group col-lg-9">
                            <label for="txtnobon">Topik Berita</label>
                            <input type="hidden" class="form-control"  id="txtidberita" name="txtidberita" value="<?php echo $idberita;?>">
                            <input type="text" class="form-control"  id="txttopikberita" name="txttopikberita" value="<?php echo $topikberita;?>">
                        </div>    
    
                          

                          <div class="form-group col-lg-11">
                              <label for="txtdetailberita">detail Info</label>
                              <textarea class="form-control" rows="1" cols="20" name="txtdetailberita" id="ckeditor" ><?php echo $detailberita;?></textarea>
                          </div>

                          <div class="form-group col-lg-11">
                            <label for="filefoto">Link Gambar &nbsp&nbsp&nbsp</label>
                            <input type="file" class="form-control" id="filefoto" name="filefoto" placeholder="Path folder gambar" value="<?php echo $linkgambar;?>">
                        </div> 
                       

                          
                          <div class="form-group col-lg-12">
                              <button type="submit" class="btn btn-primary" id="btnUpdate" name="btnUpdate">Update</button>
                              <button type="submit" class="btn btn-primary" id="btnUpdatePublish" name="btnUpdatePublish">Publish</button>
                          </div>
                  </div> 
                </div>
        </div>  

  <!-- detail berita-->
<div class="form-group col-lg-13  ">
        
                <div class="panel panel-default">
                <div class="panel-body ">
                   <div class="form-group col-lg-13">
                    
                     <div class="card" style="width: 70rem;">
                      <div class="card-body">
                        <h4 class="card-title">Informasi seputar Masjid Al-Falah</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Tanggal : <?php  echo date('d-M-Y'); ?></h6>
                        
                        
                      </div>
                    </div>

                      
                      <h3>History Berita</h3>
                      <div class="table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td>No </td><td>Kategori</td><td>Tanggal Posting</td><td>Topik Berita</td><td>Uraian</td><td>Link Gambar</td><td> Status</td><td> Action</td>
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
                                                <td>$baris->detailberita</td>
                                                <td>$baris->linkgambar</td>
                                                <td>$baris->statusberita</td>
                                                  
                                                   ";
                                                 echo "<td align='center'>";   
                                                      if($baris->statusberita =="draft"){

                                                        echo "<a href=\"".base_url()."kegiatan/editberita/".$baris->idberita."\">
                                                        Edit</a> |
                                                        <a href=\"".base_url()."kegiatan/publishberita/".$baris->idberita."\">
                                                        Publish</a> |
                                                         <a href=\"".base_url()."kegiatan/hapusberita/".$baris->idberita."\">
                                                        Hapus</a>";
                                                      }elseif ($baris->statusberita =="Publish") {
                                                        # code...
                                                      }else{ 
                                                          echo "-";
                                                      }

                                                       echo" 
                                                       </td> 
                                               ";
                                        echo"                                            </tr>     
                                            ";    
                                    }
                              ?>
                          </tbody>    
                      </table>
                    </div>
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