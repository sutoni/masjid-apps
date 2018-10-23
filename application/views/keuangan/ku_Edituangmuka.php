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
                         echo form_open('master/updateUangmuka',$attributes); 
                         $namauser2 = $this->session->userdata('level'); 
                         //echo "$namauser2";
                         foreach($data as $key){
                                        $iduangmuka = $key->iduangmuka;
                                        $tglpengajuan = $key->tglpengajuan;
                                        $tgldibutuhkan = $key->tgldibutuhkan;
                                        $kodebidang = $key->kodebidang;
                                        $namabidang = $key->namabidang;
                                        $tipebill = $key->tipebill;
                                        $ketkeperluan = $key->ketkeperluan;
                                        $nilai = $key->nilai;
                                        $penerima = $key->penerima;
                                        $txtstatus = $key->status;
                                        $loguser = $key->loguser;
                                    }
                    ?>   
                    <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                        <div class="form-group col-lg-6">
                          <input type="hidden" class="form-control" id="txtiduangmuka" name="txtiduangmuka" value="<?php echo $iduangmuka; ?>">
                          <label for="txttglpengajuan">Tanggal Pengajuan</label>
                          <input type="text" class="form-control" id="txttglpengajuan" name="txttglpengajuan" value="<?php echo $tglpengajuan; ?>" disabled="">
                        </div>

                        <div class="form-group col-lg-6">
                              <label for="txttgldibutuhkan">Tanggal Dibutuhkan</label>
                        <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                 <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                <input class="form-control" type="text" name="txttgldibutuhkan" id="txttgldibutuhkan" value="<?php echo $tgldibutuhkan; ?>">                         
                        </div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Bidang</label>
                             <select name="txtbidang" id="txtbidang" class="form-control">
                               <option value="<?php echo $kodebidang;?>"><?php echo $namabidang;?></option>
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
                              
                               <option value="<?php echo $tipebill;?>"><?php echo $tipebill;?></option>
                                <option value="Cash">Cash</option>
                                <option value="Transfer">Transfer</option>
                             </select>    
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="txtkeperluan">Keterangan Keperluan</label>
                            <textarea class="form-control" rows="1" cols="20" name="txtkeperluan" id="txtkeperluan" placeholder="Masukan Keterangan Keperluan"><?php echo $ketkeperluan; ?></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="txtnilaiuangmuka">Nilai</label>
                            <input type="text" class="form-control" id="txtnilaiuangmuka" name="txtnilaiuangmuka" value="<?php echo $nilai; ?>">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="txtpenerima">Penerima</label>
                            <textarea class="form-control" rows="1" cols="20" name="txtpenerima" id="txtpenerima" ><?php echo $penerima; ?></textarea>
                             <input type="hidden" class="form-control" id="txtstatus" name="txtstatus" value="<?php echo $txtstatus; ?>">
                        </div>
                         <?php 
                              if($namauser2=="keuangan"){ ?>
                        <div class="form-group col-lg-6">
                              <label for="txttglterima">Tanggal Diterima</label>
                        <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                 <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                <input class="form-control" type="text" name="txttglterima" id="txttglterima">                         
                        </div>
                        </div>
                            <?php } ?>
                        <div class="form-group col-lg-12">
                          <?php 
                              if($namauser2=="dkm"){ ?>

                                 <button type="submit" class="btn btn-primary" id="btnApprove" name="btnApprove">Approve</button>
                                 <button type="submit" class="btn btn-primary" id="btnReturn" name="btnReturn">Return</button>

                                

                            <?php
                              

                              }
                              if($namauser2=="keuangan"){ ?>

                                 <button type="submit" class="btn btn-primary" id="btnBayar" name="btnBayar">Bayar</button>
                                 <button type="submit" class="btn btn-primary" id="btnReturn" name="btnReturn">Return</button>

                                

                            <?php
                              

                              }

                              else{ ?>


                                 
                                 
                                 <button type="submit" class="btn btn-primary" id="btnUpdateDraft" name="btnUpdateDraft">Update Draft</button>
                                 <button type="submit" class="btn btn-primary" id="btnSubmit" name="btnSubmit">Submit</button>

                                 <?php
                              }

                          ?>
                           
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
                                                              <a href=\"".base_url()."keuangan/".$baris->iduangmuka."\">
                                                              Edit</a>
                                                             </td> 
                                                        ";   
                                                   }elseif($baris->status=="submit"){


                                                    //set akses rulenya untuk DKM
                                                        echo "<td align='center'>   
                                                              <a href=\"".base_url()."keuangan/".$baris->iduangmuka."\">
                                                              Approve</a>|
                                                              <a href=\"".base_url()."keuangan/".$baris->iduangmuka."\">
                                                              Koreksi</a> |
                                                              <a href=\"".base_url()."keuangan/".$baris->iduangmuka."\">
                                                              Reject</a>
                                                             </td> 
                                                        ";   

                                                   }
                                                   elseif($baris->status=="approved"){


                                                    //set akses rulenya untuk keuangan
                                                        echo "<td align='center'>   
                                                              <a href=\"".base_url()."keuangan/".$baris->iduangmuka."\">
                                                              Bayar</a>|
                                                              <a href=\"".base_url()."keuangan/".$baris->iduangmuka."\">
                                                              Koreksi</a> |
                                                              <a href=\"".base_url()."keuangan/".$baris->iduangmuka."\">
                                                              Reject</a>
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