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
	<div class="table-responsive col-lg-13">
   <!-- Content Header (Page header) -->
        
          
               
<section class="content  ">
<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Jamaah</li>
  </ol>
</nav>

<div class="form-group col-lg-12">
            
<!-- Form input Jamaah  -->
<div class="form-group col-lg-12 ">
        
                <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Input Jamaah Masjid</h4> 
                    <hr>   
                    <?php
                                    $attributes = array('role' => 'form', 'idjamaah' => 'formadd');
                                    echo form_open('master/simpanJamaah',$attributes); 
                   ?>   <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                        <div class="form-group col-lg-2">
                            <label for="txtidjamaah">ID Jamaah</label>
                            <input type="text" class="form-control"
                                   id="txtidjamaah" name="txtidjamaah" disabled="">
                        </div>
                                        
                        <div class="form-group col-lg-6">
                            <label for="txtnamajamaah">Nama Jamaah</label>
                            <input type="text" class="form-control" id="txtnamajamaah" name="txtnamajamaah" placeholder="Masukan nama lengkap">
                        </div>
                        <div class="form-group col-lg-2">
                            <label>Gender</label>
                             <select name="txtgender" id="txtgender" class="form-control">
                               <option value="">--Pilih Dari--</option>
                              <option value="l">Laki-laki</option>
                              <option value="p">Perempuan</option>
                               
                             </select>    
                             
                        </div>

                        <div class="form-group col-lg-2">
                            <label for="txttgllahir">Tanggal Lahir</label>
                            <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                 <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                <input class="form-control" type="text" name="txttgllahir" id="txttgllahir">                         
                            </div>
                          </div>
                       

                        <div class="form-group col-lg-1">
                            <label for="txtrt">RT</label>
                            <input type="text" class="form-control" id="txtrt" name="txtrt" placeholder="30">
                        </div>
                        <div class="form-group col-lg-1">
                            <label for="txtrw">RW</label>
                            <input type="text" class="form-control" id="txtrw" name="txtrw" placeholder="07">
                        </div>

                        <div class="form-group col-lg-1">
                            <label for="txtblok">Blok</label>
                            <input type="text" class="form-control" id="txtblok" name="txtblok" placeholder="D9/11">
                        </div>
                         <div class="form-group col-lg-3">
                            <label for="txtkelurahan">Kelurahan</label>
                            <input type="text" class="form-control" id="txtkelurahan" name="txtkelurahan" placeholder="Masukan nama Kelurahan">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="txtkecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="txtkecamatan" name="txtkecamatan" placeholder="Masukan nama Kecamatan">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="txtprovinsi">Provinsi</label>
                            <input type="text" class="form-control" id="txtprovinsi" name="txtprovinsi" placeholder="Masukan nama Provinsi">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="txttelp">Telpon</label>
                            <input type="text" class="form-control" id="txttelp" name="txttelp" placeholder="Masukan No Telpon">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="txtemail">Email</label>
                            <input type="text" class="form-control" id="txtemail" name="txtemail" placeholder="Masukan alamat email">
                        </div>
                          
                        <div class="form-group col-lg-4">
                            <label for="txtcatatan">Catatan</label>
                            <textarea class="form-control" rows="1" cols="20" name="txtcatatan" id="txtcatatan" placeholder="Catatan yang diperlukan"></textarea>
                        </div>
                          <div class="form-group col-lg-2">
                            <label>Status Ke aktifan</label>
                             <select name="txtstatus" id="txtstatus" class="form-control">
                               <option value="">--Pilih --</option>
                              <option value="Aktif">Aktif</option>
                              <option value="Pasif">Pasif</option>
                               <option value="N/A">N/A</option>
                             </select>    
                             
                        </div>
        
                <div class="form-group col-lg-2">
                  <label for="validfrom">Tanggal Berakhir</label>
                        <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                 <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                <input class="form-control" type="text" name="txttglberakhir" id="txttglberakhir">                         
                        </div>
                </div>
                        <div class="form-group col-lg-12">
                           <button type="submit" class="btn btn-primary">Simpan</button>
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