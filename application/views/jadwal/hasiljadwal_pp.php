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
//        foreach($data as $val){
//            $kdjadwal= $val->idjadwal;
//            $tglberangkat= $val->tglberangkat;
//            $waktuberangkat= $val->waktuberangkat;
//            $kdpool= $val->kdpool;
//            $bdari= $val->bdari;
//            $btujuan= $val->btujuan;
//            $harga= $val->harga;
//            $nopolisi= $val->nopolisi;
//            $keterangan= $val->keterangan;
//            //$logupdate= $val->logupdate;
//        }
?>
<section class="content">
    
    <div class="panel panel-default col-lg-12">
        <div class="panel col-lg-6">
        <div class="panel-body">
            <h3><?php echo $berangkatdari; ?> ke <?php echo $pulangke; ?></h3>
             <table id="example1" class="table table-bordered table-striped">
                          <thead>
                               <tr>
                              <td>No </td><td> Pool</td><td>Pergi</td><td> Tiba</td><td> Harga</td><td> Pesan Sekarang</td>
                          </tr>     
                          </thead>
                          <tbody>
                              <?php  
                                    $no=1;
                                    foreach($data1 as $key){
                                        $noi =$no++;
                                        echo"
                                            <tr>
                                                <td>$noi</td>
                                                
                                                <td>$key->namapool</td>
                                                <td>Tanggal : $key->tglberangkat Pukul : $key->waktuberangkat</td>
                                                <td>$key->tglberangkat</td>
                                                <td>$key->harga</td>    
                                                <td><a href=>Pesan</a></td>       
                                            </tr>
                                               ";
                                    }
                                        ?>
                              </tbody>    
                      </table>
        </div>
        </div>
        <div class="panel col-lg-6">
        <div class="panel-body">
            <h3><?php echo $pulangke; ?> ke <?php echo  $berangkatdari; ?></h3>
             <table id="example1" class="table table-bordered table-striped">
                          <thead>
                               <tr>
                              <td>No </td><td> Pool</td><td>Pergi</td><td> Tiba</td><td> Harga</td><td> Pesan Sekarang</td>
                          </tr>     
                          </thead>
                          <tbody>
                              <?php  
                                    $no=1;
                                    foreach($data2 as $keL){
                                        $noi =$no++;
                                        echo"
                                            <tr>
                                                <td>$noi</td>
                                                
                                                <td>$keL->namapool - $key->kota ( $key->alamat)</td>
                                                <td>Tanggal : $keL->tglberangkat Pukul : $keL->waktuberangkat</td>
                                                <td>$keL->tglberangkat</td>
                                                <td>$keL->harga</td>    
                                                <td><a href=>Pesan sekarang</a></td>       
                                            </tr>
                                               ";
                                    }
                                        ?>
                              </tbody>    
                      </table>
        </div>
    </div>
</section>