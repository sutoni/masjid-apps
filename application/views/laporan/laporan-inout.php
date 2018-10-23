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
                    echo form_open('laporan/carilaporanInout',$attributes); 
                    $thnsekarang=DATE('Y');
                    $blnsekarang=DATE('m');
               ?>

                  <div class="form-group col-lg-2 ">
                        <label for="txtTahun">Tahun</label>
                        
                        <input type="text" class="form-control" id="txtTahun" name="txtTahun" value="" placeholder="<?php echo $thnsekarang; ?>">
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
                  
                  
                   <div class="form-group col-lg-2">
                       <label for="exampleInputPassword1">&nbsp;&nbsp;&nbsp;</label><br>
                        <button type="submit" id="btnCari" name="btnCari" class="btn btn-default">Cari</button><button type="submit" id="btnCetak" name="btnCetak" class="btn btn-default">Cetak</button>
                  </div>

                  <div class="card" style="width: 170rem;">
                      <div class="card-body">
                        <h2 class="card-title">Laporan Keuangan Masjid Al-Falah  </h2>
                        <h5 class="card-subtitle mb-2 text-muted">Tanggal Cetak: <?php $hariini=date('d-m-Y');echo $hariini; ?></h5>
                      
                        
                      </div>
                    </div>
                 <?php form_close(); ?>       <br>   
                     <div><hr></hr></div>
                <div class="form-group col-lg-6">
                    <h2>Laporan Pengeluaran</h2> <?php ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>



                                    <td rowspan="2">No </td><td colspan="3" align="center">Informasi Pengeluaran</td>

                                </tr>  
                                <tr>
                                    <td align="center" >Tgl Bon</td><td align="center">Uraian</td><td align="center">Jumlah Pengeluaran</td>

                                  
                                    
                                </tr>
                          </thead>
                          <tbody>
                             
                              <?php  
                              
                                    if(count($data)<0){
                                        echo"<tr>"
                                        . "<td colspan='5'>Maaf data tidak ditemukan</td></tr>";
                                    }else{
                                        $no=1;
                                    
                                    foreach($data as $key){
                                        $noa=$no++;
                                        echo"
                                            <tr><td align='center'>$noa</td>
                                                
                                                 <td align='center'>".$key->tglbon."</td>
                                                <td>".$key->keterangandetail."</td>
                                                
                                                <td align='right'>".number_format($key->totaldetailpengeluaran)."</td>
                                               
                                                 
                                                  "; 
                                                
                                                    echo"</tr>"; 
                                           
                                    }}
                              ?>
                          </tbody>    
                      </table>

                       <?php 

                          foreach($data0 as $key){
                                       
                                       $totaldetailpengeluaran = $key->total;
                                       
                                    }

                      ?> 
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td colspan="2">Total Pengeluaran</td><td align='right'><b><?php  echo number_format($totaldetailpengeluaran);  ?></b></td>
                                </tr>  
                               
                          </thead>

                        </table> 

                       <div class="col-lg-12" align="right">
                         <?php echo $this->pagination->create_links(); ?>
                     </div>
                  </div>


                  <div class="form-group col-lg-6">
                    <h2>Laporan Pemasukan </h2> <?php ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>



                                    <td rowspan="2">No </td><td colspan="3" align='center'  >Informasi Pemasukan</td>
                                </tr>  
                                <tr>
                                    <td align='center'>Tgl Catan</td><td align='center'>Uraian</td><td align='center'>Jumlah Pemasukan</td>

                                  
                                    
                                </tr>
                          </thead>
                          <tbody>
                             
                              <?php  
                              
                                    if(count($data)<0){
                                        echo"<tr>"
                                        . "<td colspan='5'>Maaf data tidak ditemukan</td></tr>";
                                    }else{
                                        $no=1;
                                    
                                    foreach($data1 as $key){
                                        $noa=$no++;
                                        echo"
                                            <tr><td align='center'>$noa</td>
                                                
                                                 <td align='center'>".$key->tglpemasukan."</td>
                                                <td>".$key->keteranganpemasukan."</td>
                                                
                                                <td align='right'>".number_format($key->nilaipemasukan)."</td>
                                               
                                                 
                                                  "; 
                                                
                                                    echo"</tr>"; 
                                           
                                    }}
                              ?>
                          </tbody>    
                      </table>

                      <?php 

                          foreach($data2 as $key){
                                       
                                       $jumlahpemasukan = $key->nilaipemasukan;
                                       
                                    }

                      ?>
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td colspan="2">Total Pemasukan</td><td align="right"><b><?php  echo number_format($jumlahpemasukan);  ?></b></td>
                                </tr>  
                               
                          </thead>

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
                   