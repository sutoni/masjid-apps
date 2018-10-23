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
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.5.2.min.js'); ?>"></script>
<script type="text/javascript">
//check all checkbox
function check_all(val) {
    // Ganti nilai form_data sesuai dengan nama form dan deleted_items[] sesuai dengan nama checkbox
    var checkbox = document.form_data.elements['item[]'];
    if ( checkbox.length > 0 ) {
        for (i = 0; i < checkbox.length; i++) {
            if ( val.checked ) {
                checkbox[i].checked = true;
            }
            else {
                checkbox[i].checked = false;
            }
        }
    }
    else {
        if ( val.checked ) {
            checkbox.checked = true;
        }
        else {
            checkbox.checked = false;
        }
    }
}
</script>	
<section class="content">
    
    <div class="panel panel-default col-lg-10 col-lg-push-1">
        <div class="panel-body">
            <h3>List Konfirmasi Pembayaran</h3><hr>
            <form action="<?php echo base_url('jadwal/update_konfirmasi'); ?>" method="post" name="form_data">
             <table  class="table table-bordered table-striped"  id="myTable">
                          <thead>
                                <tr>
                                    <td rowspan="2">No </td>
                                    <td rowspan="2"> Kode Booking</td><td colspan="2">Jadwal</td><td rowspan="2">Nama Pemesan</td><td rowspan="2">No HP</td><td colspan="4">Data Transfer</td><td rowspan="2">Status</td>
                                    <td rowspan="2"><input type="checkbox" name="allbox" value="item" onclick="check_all(this);"/></td>
                                </tr>     
                                <tr>
                                    <td>Tanggal Berangkat</td><td>Rute</td><td>Bank</td><td>Nomer Rekening</td><td>a/n</td><td >Jumlah Transfer</td>
                                </tr>
                          </thead>
                          <tbody>
                              <?php 
//                                $attributes = array('role' => 'form', 'kdpesanan' => 'form_data');
//                                 echo form_open('jadwal/update_konfirmasi',$attributes); 
//                                echo "<form name='form_data' method='post' action='?jadwal/update_konfirmasi' >";
                                ?>
                              
                                 &nbsp;&nbsp;
                                <button type="submit" id="btnLunas" name="btnLunas" class="btn btn-default">Lunas</button>
                                <button type="submit" id="btnReject" name="btnReject"  class="btn btn-default">Reject</button> <BR><br>  
                                    <?php
                                 
                                    $no=1;
                                    foreach($data as $key){
                                        $noi =$no++;
                                        echo"
                                            <tr>
                                                <td>$noi</td>
                                                
                                                <td>$key->kdpesanan</td>
                                                <td>$key->tglberangkat $key->waktuberangkat</td>    
                                                <td>$key->bdari $key->btujuan</td>        
                                                <td>$key->kdmember</td>
                                                <td>$key->nohp </td>
                                                <td>$key->namabank </td>
                                                <td>$key->nomerrekening </td>
                                                <td>$key->atasnama </td>    
                                                <td>Rp.".number_format($key->totaltiket)."</td>
                                               <td>$key->statuspesanan</td>";
                                               echo '<td><input type="checkbox" name="item[]" id="item[]" value="'.$key->kdpesanan.'" />
                                               </td></tr>';
                                         ?>
                                            
                                    <?php
                                    }
                                    ?>
                              </tbody>    
             </table></form>
        </div>    
    </div>
</section>