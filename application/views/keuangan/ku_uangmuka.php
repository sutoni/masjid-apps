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

<div class="form-group col-lg-4 ">
                <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Pengajuan Uang Muka</h4>  
                    <hr>   
                    
                    
                    <?php
                         $attributes = array('role' => 'form', 'iduangmuka' => 'formadd');
                         echo form_open('master/simpanUangmuka',$attributes); 
                    ?>   
                    <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                        <div class="form-group col-lg-6">
                          <label for="txttglpengajuan">Tanggal Pengajuan</label>
                          <input type="text" class="form-control" id="txttglpengajuan" name="txttglpengajuan" value="<?php echo date('Y-m-d') ?>" disabled="">
                        </div>

                        <div class="form-group col-lg-6">
                              <label for="txttgldibutuhkan">Tanggal Dibutuhkan</label>
                        <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                 <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                <input class="form-control" type="text" name="txttgldibutuhkan" id="txttgldibutuhkan">                         
                        </div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Bidang</label>
                             <select name="txtbidang" id="txtbidang" class="form-control">
                               <option value="">--Pilih Bidang --</option>
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
                        <div class="form-group col-lg-6">
                            <label>Tipe Pembayaran</label>
                             <select name="txttipebayar" id="txttipebayar" class="form-control">
                               <option value="">--Pilih --</option>
                                <option value="Cash">Cash</option>
                                <option value="Transfer">Transfer</option>
                             </select>    
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="txtkeperluan">Keterangan Keperluan</label>
                            <textarea class="form-control" rows="1" cols="20" name="txtkeperluan" id="txtkeperluan" placeholder="Masukan Keterangan Keperluan"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="txtnilaiuangmuka">Nilai</label>
                            <input type="text" class="form-control" id="txtnilaiuangmuka" name="txtnilaiuangmuka" placeholder="Rp. Masukan Nilai Pengajuan">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="txtpenerima">Penerima</label>
                            <textarea class="form-control" rows="1" cols="20" name="txtpenerima" id="txtpenerima" placeholder="Masukan Penerima dan nomer rekening jika transfer"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                           <button type="submit" class="btn btn-primary" id="btnDraft" name="btnDraft">Simpan Draft</button>
                           <button type="submit" class="btn btn-primary" id="btnSubmit" name="btnSubmit">Submit</button>
                        </div>
                </div> 
              </div>
</div>    
                        
</div>   


            

<div class="form-group col-lg-8  ">
        
                <div class="panel panel-default">
                <div class="panel-body ">
                   <div class="form-group col-lg-11">
                      <h3>List Uang Muka </h3>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td>No </td>
                                    <td>Tanggal Pengajuan</td>
                                    <td>Tanggal Dibutuhkan</td>
                                    <td> Kode Bidang</td><td >Keterangan</td><td>Nilai (Rp)</td><td>Tipe Pembayaran</td><td> Penerima</td><td> Status</td><td> Action</td>
                                </tr>     
                          </thead>
                          <tbody>
                             <?php     
                                    $no=1;
                                    foreach($data as $baris){
                                          
                                        
                                        $noa=$no++;
                                        echo"
                                            <tr><td>$noa</td>
                                                <td>$baris->tglpengajuan</td>
                                                <td>$baris->tgldibutuhkan</td>
                                                <td>$baris->kodebidang</td>
                                                <td>$baris->ketkeperluan</td>
                                                <td>$baris->nilai</td>
                                                <td>$baris->tipebill</td>
                                                <td>$baris->penerima</td>
                                                <td>$baris->status</td>   
                                                   ";
                                                   IF($baris->status=="draft"){
                                                        echo "<td align='center'>   
                                                              <a href=\"".base_url()."master/m_Edituangmuka/".$baris->iduangmuka."\">
                                                              Edit</a>
                                                             </td> 
                                                        ";   
                                                   }elseif($baris->status=="submit"){


                                                    //set akses rulenya untuk DKM
                                                        echo "<td align='center'>   
                                                              <a href=\"".base_url()."master/m_Approveuangmuka/".$baris->iduangmuka."\">
                                                              Approve</a>|
                                                              <a href=\"".base_url()."master/m_Edituangmuka/".$baris->iduangmuka."\">
                                                              Koreksi</a> |
                                                              <a href=\"".base_url()."master/m_Rejectuangmuka/".$baris->iduangmuka."\">
                                                              Reject</a>
                                                             </td> 
                                                        ";   

                                                   }

                                                   elseif($baris->status=="approved"){


                                                    //set akses rulenya untuk DKM
                                                        echo "<td align='center'>   
                                                              <a href=\"".base_url()."master/m_Bayaruangmuka/".$baris->iduangmuka."\">
                                                              Bayar</a>|
                                                              <a href=\"".base_url()."master/m_Edituangmuka/".$baris->iduangmuka."\">
                                                              Koreksi</a> |
                                                              <a href=\"".base_url()."master/m_Rejectuangmuka/".$baris->iduangmuka."\">
                                                              Reject</a>
                                                             </td> 
                                                        ";  }

                                                        elseif($baris->status=="bayar"){


                                                    //set akses rulenya untuk DKM
                                                        echo "<td align='center'>   
                                                              <a href=\"".base_url()."master/ku_tutupuangmuka/".$baris->iduangmuka."\">
                                                              Tutup</a>
                                                             </td> 
                                                        ";   

                                                       } 

                                                   
                                                 
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


                     

                        <script src="<?=base_url('assets/plugins/jQuery/jquery.js');?>" type="text/javascript"></script>
                          
                        <script src="<?=base_url('assets/plugins/datepicker/bootstrap-datepicker3.js');?>" type="text/javascript"></script>
                        <script>
                           //options method for call datepicker
                           $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
                        </script> 
 </section>             
 <br>