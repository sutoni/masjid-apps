<?php $user_level = $this->session->userdata('level');
?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery11.js"></script>
    <!-- include input widgets; this is independent of Datepair.js -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" />
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>" type="text/javascript"></script>

<div class="container">
<div class="row">

 <div class="row col-lg-12">
                <?php

                    $attributes = array('role' => 'form', 'idnasabah' => 'formcari');
                    echo form_open('jadwal/carilaporan',$attributes); 
                    $thnsekarang=DATE('Y');
                    $blnsekarang=DATE('m');
               ?>

                  <div class="form-group col-lg-2 ">
                        <label for="txtTahun">Tahun</label>
                        
                        <input type="text" class="form-control" id="txtTahun" name="txtTahun" value="" placeholder="<?php echo $thnsekarang; ?>">
                  </div>
                  <div class="form-group col-lg-2 ">
                      <label for="piltahun">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></label>
                      <select id='piltahun' name="piltahun">
                            <option value=''>-- pilih ( and / or )--</option> 
                            <option value='AND'>AND</option> 
                            <option value='OR'>OR</option> 
                        </select> 
                        
                  </div>
                  <div class="form-group col-lg-2">
                        <label for="txtBulan">Bulan</label>
                        <select class="form-control" id='txtBulan' name="txtBulan">
                            <option value='all'>-- All --</option> 
                            <option value='01'>01</option> 
                            <option value='02'>02</option> 
                            <option value='03'>03</option> 
                            <option value='04'>04</option> 
                            <option value='05'>05</option> 
                            <option value='06'>06</option> 
                            <option value='07'>07</option> 
                            <option value='08'>08</option> 
                            <option value='09'>09</option> 
                            <option value='10'>10</option> 
                            <option value='11'>11</option> 
                            <option value='12'>12</option> 
                      </select> 
                        
                  </div>
                  <div class="form-group col-lg-2 ">
                      <label for="exampleInputEmail1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <select id='pilbulan' name="pilbulan">
                            <option value=''>-- pilih ( and / or ) --</option> 
                            <option value='AND'>AND</option> 
                            <option value='OR'>OR</option> 
                      </select> 
                        
                  </div>
                  <div class="form-group col-lg-2">
                        <label for="exampleInputPassword1">Status</label>
                        <select class="form-control" id='txtStatus' name="txtStatus">
                            <option value='all'>-- All --</option> 
                            <option value='submited'>Submited</option> 
                            <option value='verified'>Verified</option> 
                            <option value='scored'>Scored</option> 
                            <option value='approved'>Approved</option> 
                            <option value='rejected'>Rejected</option> 
                      </select> 
                       
                  </div>
                   <div class="form-group col-lg-2">
                       <label for="exampleInputPassword1">&nbsp;&nbsp;&nbsp;</label><br>
                        <button type="submit" id="btnCari" name="btnCari" class="btn btn-default">Cari</button><button type="submit" id="btnCetak" name="btnCetak" class="btn btn-default">Cetak</button>
                  </div>
                </form>   <br>   <br>   <br>   
                     <div><hr></hr></div>
                <div class="form-group col-lg-12">
                    <h2>Laporan </h2> <?php ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td rowspan="2">No </td><td rowspan="2"> Kode Pemesanan</td><td colspan="4">Informasi Pemesan</td><td colspan="4">Informasi Pesanan</td><td rowspan="2">Status Proses</td>
                                </tr>  
                                <tr>
                                    <td>Nama Lengkap</td><td>No HP</td><td>Alamat Jemput</td><td>Alamat Tujuan</td>
                                    <td>Jadwal</td><td>Jumlah Tiket</td><td>Harga Tiket</td><td>Total Harga</td>
                                    
                                </tr>
                          </thead>
                          <tbody>
                             
                              <?php  
                              
                                    if(count($data2)<0){
                                        echo"<tr>"
                                        . "<td colspan='5'>Maaf data tidak ditemukan</td></tr>";
                                    }else{
                                        $no=1;
                                    
                                    foreach($data2 as $key){
                                        $noa=$no++;
                                        echo"
                                            <tr><td>$noa</td>
                                                
                                                 <td>".$key->kdpesanan."</td>
                                                <td>".$key->kdmember."</td>
                                                
                                                <td>".$key->nohp."</td>    
                                                <td>".$key->alamatjemput."</td>    
                                                <td>".$key->alamattujuan."</td>
                                                <td>".$key->kdjadwal."</td>   
                                                <td>".$key->jmlpenumpang."</td>        
                                                <td align='right'>".number_format($key->tiketsatuan)."</td>      
                                                <td align='right'>".number_format($key->totaltiket)."</td>      
                                                  
                                                <td>".$key->statuspesanan."</td>"; 
                                                
                                                    echo"</tr>"; 
                                           
                                    }}
                              ?>
                          </tbody>    
                      </table>
                       <div class="col-lg-12" align="right">
                         <?php echo $this->pagination->create_links(); ?>
                     </div>
                  </div>
                         
            <div class="form-group col-lg-12">
              
                <br><br> <br><br> 
            </div>           
    </div>
</div>  
</div>  
    
    <!--modal --> 
                  <div class="modal fade bs-example-modal-md" id="data-nasabah" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Tamdah Data Provinsi</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form style="max-width: 500px;" action="<?php echo base_url(); ?>masterdata/simpan_provinsi" method="post" id="form-input">
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" id="kdprovinsi" name="kdprovinsi"  required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Kode Provinsi</label>
                                                                    <input type="text" class="form-control" id="kdprovinsi" name="kdprovinsi" placeholder="Kode Provinsi" value="<?php echo $rows->kdprovinsi; ?>" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Nama Provinsi</label>
                                                                    <input type="text" class="form-control" id="namaprovinsi" name="namaprovinsi" placeholder="Nama Provinsi" value="<?php echo $rows->namaprovinsi; ?>" required="">
                                                                </div>
                                                                
                                                                
                                                                <div class="pull-right">
                                                                    <button type="submit" id="btn" class="btn btn-primary" style="border-radius:0px;">Save</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:0px;">Close</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 