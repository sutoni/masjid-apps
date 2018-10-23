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
                    echo form_open('jadwal/caripenjualan',$attributes); 
                    $thnsekarang=DATE('Y');
                    $blnsekarang=DATE('m');
               ?>
                  
                  <div class="form-group col-lg-2">
                        <label for="txtJurusan">Jurusan</label>
                        <select class="form-control" id='txtJurusan' name="txtJurusan">
                            <option value='all'>-- All --</option> 
                            <option value='JAKARTA'>Jakarta - Majalengka</option> 
                            <option value='MAJALENGKA'>Majalengka - Jakarta</option> 
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
                  <div class="form-group col-lg-1 ">
                      <label for="txtTahun">&nbsp;</label>                        
                        <input type="text" class="form-control" id="txtTahun" name="txtTahun" value="" placeholder="<?php echo $thnsekarang; ?>">
                  </div>
                  
                   <div class="form-group col-lg-2">
                       <label for="exampleInputPassword1">&nbsp;&nbsp;&nbsp;</label><br>
                        <button type="submit" id="btnCari" name="btnCari" class="btn btn-default">Cari</button><button type="submit" id="btnCetak" name="btnCetak" class="btn btn-default">Cetak</button>
                  </div>
                 <?php form_close(); ?>      <br>   <br>   <br>   
                     <div><hr></hr></div>
                <div class="form-group col-lg-12">
                    <h2>Laporan Penjualan </h2> <?php ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td align="center" rowspan="2">No </td>
                                    <td align="center" rowspan="2"> Kode Pemesanan</td>
                                    <td align="center" rowspan="2">Kota Berangkat</td>
                                    <td align="center" rowspan="2">Kota Tujuan</td>
                                    <td align="center" rowspan="2">Tanggal Berangkat</td>
                                    <td align="center" rowspan="2">Waktu Berangkat</td>
                                    <td align="center" rowspan="2">Nama Pool</td>
                                    <td align="center" rowspan="2">Jumlah Penumpang</td>
                                    <td align="center" rowspan="2">Tiket Satuan</td>
                                    <td align="center" rowspan="2">Jumlah Penjualan</td>
                                </tr>  
                               
                          </thead>
                          <tbody>
                             
                              <?php  
                              
                                    if(count($data)<1){
                                        echo"<tr>"
                                        . "<td colspan='5'>Maaf data tidak ditemukan</td></tr>";
                                    }else{
                                        $no=1;
                                    
                                    foreach($data as $key){
                                        $noa=$no++;
                                        echo"
                                            <tr><td align='center'>$noa</td>
                                                
                                                <td align='center'>".$key->kdjadwal."</td>
                                                <td align='center'>".$key->bdari."</td>
                                                
                                                <td align='center'>".$key->btujuan."</td>    
                                                <td align='center'>".$key->tglberangkat."</td>    
                                                <td align='center'>".$key->waktuberangkat."</td>
                                                <td align='center'>".$key->namapool."</td>
                                                <td align='center'>".$key->jmlpenumpang."</td>        
                                                <td align='right'>".number_format($key->tiketsatuan)."</td>      
                                                <td align='right'>".number_format($key->jumlahpenjualan)."</td>      
                                                  "; 
                                                
                                                    echo"</tr>"; 
                                           
                                    }}
                                    echo"<tr><td colspan='9' align='right'><b>Total</b></td><td align='right'>Rp. ".number_format($jumlahpenjualan)."</td></tr>";
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
                   