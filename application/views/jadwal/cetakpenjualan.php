<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
        foreach($data as $key){
                        $kdjadwal=$key->kdjadwal;
                        $bdari=$key->bdari;
                        $btujuan=$key->btujuan;
                        $tglberangkat=$key->tglberangkat;
                        $waktuberangkat=$key->waktuberangkat;
                        $namapool=$key->namapool;
                        $jmlpenumpang=$key->jmlpenumpang;
                        $tiketsatuan=$key->tiketsatuan;
                        $jumlahpenjualan=$key->jumlahpenjualan;
                       
        }

?>
<link rel="shortcut icon" href="<?php echo base_url('assets/img/logokemensos.png');?>" />
    <link href="<?php echo base_url('assets/bootstrap_3_2_0/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap_3_2_0/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/hovernav/hovernav.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap_datepicker/css/datepicker.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                <i class="fa fa-search-plus pull-left icon"></i>
                <h2>Laporan Penjualan</h2>
            </div>
            <hr>
            
        </div>
    </div>
    
    <div class="panel col-lg-12">
        <div class="panel-body">
            <h3>Detail</h3>
             <table id="example1" class="table table-bordered table-striped">
                <tr>
                    <td align="center" >No  </td>
                    <td align="center" >Kode Jadwal</td>
                    <td align="center" >Kota Berangkat</td>
                    <td align="center" >Kota Tujuan</td>
                    <td align="center" >Tanggal Berangkat</td>
                    <td align="center" >Waktu Berangkat</td>
                    <td align="center" >Nama Pool</td>
                    <td align="center" >Jumlah Penumpang</td>
                    <td align="center" >Tiket Satuan</td>
                    <td align="center" >Jumlah Penjualan</td>     
                </tr>
                      
                              <?php  
                                    $no=1;
                                    foreach($data as $key){
                                        $noi =$no++;
                                        echo"
                                            <tr>
                                                <td>$noi</td>
                                                <td align='center'>".$key->kdjadwal."</td>
                                                <td align='center'>".$key->bdari."</td>
                                                <td align='center'>".$key->btujuan."</td>    
                                                <td align='center'>".$key->tglberangkat."</td>    
                                                <td align='center'>".$key->waktuberangkat."</td>
                                                <td align='center'>".$key->namapool."</td>
                                                <td align='center'>".$key->jmlpenumpang."</td>        
                                                <td align='right'>".number_format($key->tiketsatuan)."</td>      
                                                <td align='right'>".number_format($key->jumlahpenjualan)."</td>      
                                                 </tr>";        
                                            
                                    }
                                        
                                     echo"<tr><td colspan='9' align='right'><b>Total</b></td><td align='right'>Rp. ".number_format($jmlpenjualan)."</td></tr>";    
                      ?></table>
        </div>
        </div>
    
    
</section>
