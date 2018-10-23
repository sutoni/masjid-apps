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
    
    <div class="panel panel-default col-lg-10 col-lg-push-1">
        <div class="panel-body">
            <?php  
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
                
                $nama=$row->kdmember;
                $nohp=$row->nohp;
            }
            
            ?>
            
            
            <h3>Pergi : <?php echo $kotaberangkat ?> ke <?php echo $tempattujuan; ?> | Tanggal : <?php echo $tglberangkat;?> | Jam : <?php  echo $waktuberangkat; ?>  </h3>
             <table id="example1" class="table table-bordered table-striped">
                          <thead>
                               <tr>
                              <td> Pool</td><td colspan="3">Alamat Jemput</td><td colspan="3">Alamat Tujuan</td><td> Jumlah Penumpang</td><td>Biaya</td><td>Kode Booking</td>
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
                                   
                                   <td align="center"><?php echo $jmlpenumpang; ?></td>
                                   <td align="right">Rp. <?php echo number_format($totaltiket); ?></td>
                                   <td align="center"><?php echo $kodebooking; ?></td>
                              </tr>
                          </tbody>    
                      </table>
            
             <div class="panel panel-default col-lg-10 col-lg-push-1">
                <div class="panel-body">
                    <h3>Dear Bapak/Ibu, <?php echo $nama;?> HP: <?php echo $nohp;?>  </h3> <hr>
                    <ul>
                        <li>Mohon dapat segera lakukan pembayaran, kami berhak mendahului yang telah membayar apabila tidak ada pembayaran  .</li>   
                        <li>Metode Pembayaran dapat dilakukan melalui transfer atau melalukan pembayaran langsung di tiket box kami.</li>   
                        <li>Konfirmasi pembayaran dapat melalui website atau melalui telp. 021-33543435</li>   
                        <li>Catat kode booking anda sebagai kode konfirmasi pembayaran</li> 
                    </ul>    
                </div>    
            </div>
            
      </div>      
</div>