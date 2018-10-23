<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of booking
 *
 * @author usahadong_toni
 */
?>
<section class="content">
      <?php  
            if(count($data3)<1){
                echo '<script>alert("Mohon maaf, Kode Booking Tidak Ditemukan");window.history.back();';
                        echo '</script>';
            }
            else{
            foreach ($data3 as $row){
                $kotaberangkat=$row->bdari;
                $tempattujuan=$row->btujuan;
                $namapool=$row->namapool;
                $tglberangkat=$row->tglberangkat;
                $waktuberangkat=$row->waktuberangkat;
                $kotajemput=$row->namakotajemput;
                $kelurahanjemput=$row->kelurahanjemput;
                $alamatjemput=$row->alamatjemput;
                
                $jmlpenumpang=$row->jmlpenumpang;
                $totaltiket=$row->totaltiket;
                $kodebooking=$row->kdpesanan;
                $kotatujuan=$row->namakotatujuan;
                $kelurahantujuan=$row->kelurahantujuan;
                $alamattujuan=$row->alamattujuan;
                $statuspesanan=$row->statuspesanan;
                $nama=$row->kdmember;
                $nohp=$row->nohp;
            }
            
            ?>
    
    <div class="panel panel-default col-lg-10 col-lg-push-1">
        <div class="panel-body">
          
            <h3>Tiket a/n Bapak/Ibu, <?php echo $nama;?> HP: <?php echo $nohp;?>  </h3> 
            
            <h3>Rute : <?php echo $kotaberangkat ?> Tujuan :  <?php echo $tempattujuan; ?> | Tanggal : <?php echo $tglberangkat;?> | Jam : <?php  echo $waktuberangkat; ?>  </h3>
            <h4>Status Pemesanan : <?php echo $statuspesanan;?></h4>
             <table id="example1" class="table table-bordered table-striped">
                          <thead>
                               <tr>
                              <td>Berangkat dari Pool</td><td colspan="3">Alamat Jemput</td><td colspan="3">Alamat Tujuan</td><td> Penumpang</td><td>Biaya</td><td>Kode Booking</td>
                          </tr>     
                          </thead>
                          <tbody>
                              <tr>
                                  <td><?php echo $namapool; ?></td>
                                   <td>Kecamatan : <?php echo $kotajemput; ?></td>
                                   <td>Kelurahan : <?php echo $kelurahanjemput; ?></td>
                                   <td><?php echo $alamatjemput; ?></td>
                                   <td>Kecamatan : <?php echo $kotatujuan; ?></td>
                                   <td>Kelurahan : <?php echo $kelurahantujuan; ?></td>
                                   <td><?php echo $alamattujuan; ?></td>
                                   
                                   <td align="center"><?php echo $jmlpenumpang; ?> orang</td>
                                   <td align="right">Rp. <?php echo number_format($totaltiket); ?></td>
                                   <td align="center"><?php echo $kodebooking; ?></td>
                              </tr>
                          </tbody>    
                      </table>
            
             <div class="panel panel-default col-lg-10 col-lg-push-1">
                <div class="panel-body">
                    <?php
                        $attributes = array('role' => 'form', 'idjadwal' => 'formedit');
                        echo form_open('jadwal/simpan_konfirmasi',$attributes); 
                    ?>
                   <form class="form-inline">
                       <?php 
                            if($statuspesanan=='Lunas'){ 
                        ?>
                                <h4>Terima kasih atas pembayarannya, silahkan cetak tiket anda atau cukup tunjukan bukti Transfer/bukti halaman ini  </h4><hr>     
                                <div class="form-inline col-lg-8">
                                    <input type="hidden" id="txtkdbook" name="txtkdbook" value="<?php echo $kodebooking;?>">
                                    <button type="submit" name="btnPrint" id="btnPrint" class="btn btn-primary" onClick="window.print()">Cetak Tiket</button>
                                    <button type="submit" name="btnBatal" id="btnBatal" class="btn btn-primary" >Pembatalan Tiket</button>
                                </div> 
                       <?php
                                
                            }
                            elseif($statuspesanan=='konfirm'){ 
                        ?>
                                <h4>Terima kasih atas pembayarannya, kami akan melakukan validasi pembayaran sesuai bukti Transfer yang anda kirim  </h4><hr>     
                                <div class="form-inline col-lg-8">
                                    <input type="hidden" id="txtkdbook" name="txtkdbook" value="<?php echo $kodebooking;?>">
                                    
                                    
                                </div> 
                       <?php
                                
                            }
                            else{
                         ?>
                                    <h4>Konfirmasi Pembayaran - Tranfer Melalui Nomer Rekening </h4><hr>     
                                    <div class="form-inline col-lg-10">
                                        <input type="hidden" class="form-control"  id="txtkdbooking1" name="txtkdbooking1" value="<?php echo $kodebooking; ?>" >
                                        <input type="text" class="form-control"  id="txtnamabank" name="txtnamabank" placeholder="Nama BANK"><input type="text" class="form-control"  id="txtnomerekening" name="txtnomerekening" placeholder="Nomer Rekening"> <input type="text" class="form-control"  id="txtatasnama" name="txtatasnama" placeholder="a/n Nama">
                                          <button type="submit" name="btnKonfirmasi" id="btnKonfirmasi" class="btn btn-primary">Submit</button>
                                    </div>  
                       <?php        
                                
                            }
                       ?> 
                      
                              
                              
                    </form> 
            <?php form_close(); }?>    
                </div>    
            </div>
            
      </div>      
</div>