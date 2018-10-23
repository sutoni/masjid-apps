<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hasiljadwal
 *
 * @author usahadong_toni
 * 
 */

?>
<section class="content">
    
    <div class="panel panel-default col-lg-10 col-lg-push-1">
        <div class="panel-body">
            <h3><?php echo $berangkatdari; ?> ke <?php echo $pulangke; ?></h3>
             <table id="example1" class="table table-bordered table-striped">
                          <thead>
                               <tr>
                              <td>No </td><td> Pool</td><td>Pergi</td><td> Tiba</td><td> Harga</td><td> Ketersediaan Kursi</td><td> Pesan Sekarang</td>
                          </tr>     
                          </thead>
                          <tbody>
                              <?php  
                                    if (count($data1)<1) {
                                        echo "<tr><td colspan=7>DATA KOSONG!!</td></tr>";
                                    }else{
                                        $no=1;
                                        foreach($data1 as $key){
                                            $noi =$no++;
                                            echo"
                                                <tr>
                                                    <td>$noi</td>

                                                    <td>$key->namapool - $key->kota ( $key->alamat)</td>
                                                    <td>Tanggal : $key->tglberangkat Pukul : $key->waktuberangkat</td>
                                                    <td>$key->tglberangkat </td>
                                                    <td>Rp.".number_format($key->harga)."</td>
                                                    <td align='center'>";
                                                        $jmlkursipesan=$key->jmlkonfirm + $key->jmllunas + $key->jmlsubmit ;
                                                        $sisakursi=$key->sisakursi;
                                                        if($jmlkursipesan==0){
                                                            echo $key->kapasitas;
                                                        }
                                                        elseif($jmlkursipesan!=0 AND $sisakursi>0){
                                                            echo $sisakursi ;
                                                        }
                                                        elseif($jmlkursipesan!=0 AND $sisakursi==0){
                                                            echo $sisakursi  ;
                                                        }
                                                        elseif($jmlkursipesan==$key->kapasitas){
                                                            echo $sisakursi  ;
                                                        }
                                                        else  {
                                                            echo "maaf data sedang disinkronise";
                                                        }
                                                    echo "</td> "; 

                                                     if($jmlkursipesan == 0){
                                                         echo "<td align='center'>   
                                                            <a href=\"".base_url()."jadwal/jemputberangkat/".$key->idjadwal."\">
                                                            Pesan Sekarang</a>
                                                           </td> ";

                                                     }
                                                     elseif($jmlkursipesan !=0 AND $sisakursi==0){
                                                         echo"<td>Penuh</td>"; 
                                                     }
                                                     else{
                                                         echo "<td align='center'>   
                                                            <a href=\"".base_url()."jadwal/jemputberangkat/".$key->idjadwal."\">
                                                            Pesan Sekarang</a>
                                                           </td> 
                                                   ";
                                                     }   
                                             echo "</tr>";


                                        }
                                    }
                                    
                                        ?>
                              </tbody>    
                      </table>
        </div>    
    </div>
</section>