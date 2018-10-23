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
  <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Pengurus</li>
  </ol>
</nav>
    <div class="form-group col-lg-13">
            
<div class="form-group col-lg-8  ">
        
                <div class="panel panel-default">
                <div class="panel-body ">
                   <div class="form-group col-lg-10">
                      <h3>List pengurus</h3>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td>No </td><td > Kode pengurus</td><td >Nama pengurus</td><td>Bidang</td><td>Jabatan</td><td>Tanggal Berlaku</td><td>Tanggal Berakhir</td><td> Action</td>
                                </tr>     
                          </thead>
                          <tbody>
                             <?php     
                                    $no=1;
                                    foreach($data as $baris){
                                        
                                        
                                        $noa=$no++;
                                        echo"
                                            <tr><td>$noa</td>
                                                <td>$baris->idpengurus</td>
                                                <td>$baris->namapengurus</td>
                                                <td>$baris->namabidang</td>
                                                <td>$baris->namajabatan</td>
                                                <td>$baris->keterangan</td>
                                                <td>$baris->validfrom</td>
                                                <td>$baris->validto</td>
                                                   
                                                   ";
                                                 echo "<td align='center'>   
                                                        <a href=\"".base_url()."master/m_Editpengurus/".$baris->idpengurus."\">
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
<div class="form-group col-lg-4 ">
        
                <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Input Kode pengurus</h4> 
                    <hr>   
                    <?php
                                    $attributes = array('role' => 'form', 'idpengurus' => 'formadd');
                                    echo form_open('master/EditPengurus',$attributes); 

                                    foreach($data as $key){
                                        $idpengurus = $key->idpengurus;
                                        $idpengurus2 = $key->idpengurus2;
                                        $namapengurus = $key->namapengurus;
                                        $idjabatan = $key->idjabatan;
                                        $namajabatan = $key->namajabatan;
                                        $idbidang = $key->idbidang;
                                        $namabidang = $key->namabidang;
                                        $idatasan = $key->idatasan;

                                        $keterangan = $key->keterangan;
                                        $validfrom = $key->validfrom;
                                        $validto = $key->validto;
                                    }


                   ?>   <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                        
                        <div class="form-group col-lg-12">
                            <label for="txtnamajabatan">Id Pengurus</label>
                            <input type="text" class="form-control" id="txtidpengurus" name="txtidpengurus" value="<?php echo $idpengurus;  ?>" disabled="">
                        </div>
                                                          

                        <div class="form-group col-lg-12">
                            <label>Nama Pengurus</label>
                             <select name="txtnamapengurus" id="txtnamapengurus" class="form-control">
                               <option value="<? echo $idpengurus2; ?>"> <?php echo $namapengurus;?></option>
                               <?php 
                                    foreach($data3 as $key){
                                        $idjamaah = $key->idjamaah;
                                        $namajamaah = $key->namajamaah;
                                        ?>
                                            <option value="<?php echo $idjamaah; ?>"><?php echo $namajamaah; ?></option>
                                        <?php   
                                    }
                                    
                               ?>

                              
                               
                             </select>    
                             
                        </div>
                       
                        

                        <div class="form-group col-lg-12">
                            <label>Bidang</label>
                             <select name="txtbidang" id="txtbidang" class="form-control">
                               <option value="<? echo $idbidang; ?>"> <?php echo $namabidang;?></option>
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
                            <label>Jabatan</label>
                             <select name="txtjabatan" id="txtjabatan" class="form-control">
                                <option value="<? echo $idjabatan; ?>"> <?php echo $namajabatan;?></option>
                              <?php 
                                    foreach($data2 as $key){
                                        $idjabatan = $key->idjabatan;
                                        $namajabatan = $key->namajabatan;
                                        ?>
                                            <option value="<?php echo $idjabatan; ?>"><?php echo $namajabatan; ?></option>
                                        <?php   
                                    }
                                    
                              ?>
                               
                             </select>    
                             
                        </div>
                        
                        <div class="form-group col-lg-12">
                            <label>Atasan Pengurus</label>
                             <select name="txtatasan" id="txtatasan" class="form-control">
                               <option value="<? echo $idatasan; ?>"> <?php echo $namajamaah;?></option>
                              <?php 
                                    foreach($data as $key){
                                        $idpengurus = $key->idpengurus;
                                        $namapengurus = $key->namapengurus;
                                        ?>
                                            <option value="<?php echo $idpengurus; ?>"><?php echo $namapengurus; ?></option>
                                        <?php   
                                    }
                                    
                              ?>
                               
                             </select>    
                             
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="txtketerangan">Keterangan</label>
                            <textarea class="form-control" rows="1" cols="20" name="txtketerangan" id="txtketerangan" > <?php echo $keterangan; ?></textarea>
                        </div>
                          <div class="form-group col-lg-6">
                  <label for="validfrom">Tanggal Berlaku</label>
                        <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                 <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                <input class="form-control" type="text" name="txttglberlaku" id="txttglberlaku" value="<?php echo $validfrom; ?>">                         
                        </div>
                </div>
        
                <div class="form-group col-lg-6">
                  <label for="validfrom">Tanggal Berakhir</label>
                        <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                 <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                <input class="form-control" type="text" name="txttglberakhir" id="txttglberakhir" value="<?php echo $validto; ?>">                         
                        </div>
                </div>
                        <div class="form-group col-lg-12">
                           <button type="submit" class="btn btn-primary">Update</button>
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