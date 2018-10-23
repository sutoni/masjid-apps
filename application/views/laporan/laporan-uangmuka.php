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
                    echo form_open('laporan/carilaporanUangmuka',$attributes); 
                    $thnsekarang=DATE('Y');
                    $blnsekarang=DATE('m');
               ?>

                  <div class="form-group col-lg-2 ">
                        <label for="txtTahun">Tahun</label>
                        
                        <input type="text" class="form-control" id="txtTahun" name="txtTahun" placeholder="<?php echo $thnsekarang; ?>">
                  </div>
                  
                  <div class="form-group col-lg-2">
                        <label for="txtBulan">Bulan</label>
                        <select class="form-control" id='txtBulan' name="txtBulan">
                            <option value=''>-- All --</option> 
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
                        <label for="txtStatus">Status</label>
                        <select class="form-control" id='txtStatus' name="txtStatus">
                            <option value='all'>-- All --</option> 
                            <option value='draft'>Draft</option> 
                            <option value='submit'>Submit</option> 
                            <option value='bayar'>Bayar</option> 
                            <option value='closed'>Closed</option> 
                            <option value='reject'>Reject</option>                            
                      </select> 
                        
                  </div>
                  
                   <div class="form-group col-lg-2">
                       <label for="exampleInputPassword1">&nbsp;&nbsp;&nbsp;</label><br>
                        <button type="submit" id="btnCari" name="btnCari" class="btn btn-default">Cari</button>
                        
                  </div>
                  <div class="form-group col-lg-12">
                  <div class="card" style="width: 170rem;">
                      <div class="card-body">
                        <h2 class="card-title">Laporan Uang Muka Keuangan Masjid Al-Falah  </h2>
                        <h5 class="card-subtitle mb-2 text-muted">Tanggal Cetak: <?php $hariini=date('d-m-Y');echo $hariini; ?></h5>
                      
                        
                      </div>
                    </div>
                    <div class="form-group col-lg-12"><hr></hr>
                    </div>

                  </div>  
                 <?php form_close(); ?>       
                 
                     
                <div class="form-group col-lg-10">
                    
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>



                                    <td rowspan="3">No </td>
                                    <td colspan="8" align="center">Informasi Uang Muka </td>

                                </tr>  
                                <tr>
                                    <td rowspan="2" align="center" >Tgl Pengajuan</td>
                                    <td align="center" rowspan="2" >Tgl Dibutuhkan</td>

                                    <td align="center" rowspan="2">Uraian</td>
                                    <td align="center" rowspan="2">Jumlah Uang Muka</td>
                                    <td colspan="3" align="center">Penerima</td>
                                    
                                    <td rowspan="2"  align="center">Status</td>
                                </tr>
                                <tr>
                                    <td  align="center">Cara Bayar</td>
                                    <td  align="center">Nama Penerima</td>
                                    <td align="center">Tanggal Terima</td>
                                  
                                    
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

                                         $statusnya = $key->status;
                                        $noa=$no++;
                                        echo"
                                            <tr>
                                                <td align='center'>$noa</td>
                                                <td align='center'>".$key->tglpengajuan."</td>
                                                <td align='center'>".$key->tgldibutuhkan."</td>
                                                <td>".$key->ketkeperluan."</td>
                                                <td align='right'>".number_format($key->nilai)."</td>
                                                <td align='center'>".$key->tipebill."</td>
                                                <td align='center'>".$key->penerima."</td>";

                                              if($statusnya=="closed"){
                                                     echo "<td align='center'>".$key->tglterima."</td>";

                                              }
                                              else{
                                                    echo "<td align='center'> -</td>";
                                              }
                                                
                                                echo "<td align='center'>".$key->status."</td>
                                                 
                                                  "; 
                                                
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
                   