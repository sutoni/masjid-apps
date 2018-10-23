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
            <h3></h3>
             <table id="example1" class="table table-bordered table-striped">
                          <thead>
                               <tr>
                              <td>No </td><td> Tanggal</td><td> Kategori</td><td>Waktu Sholat</td><td> Imam</td><td>Muadzin</td><td>Penceramah</td>
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

                                                    <td>$key->tanggal</td>
                                                    <td>$key->kategori</td>
                                                    <td>$key->namasholat </td>
                                                    <td>$key->imam </td>
                                                    <td>$key->muadzin </td>
                                                    <td>$key->penceramah</td>
                                                    
                                                   ";
                                                     }   
                                             echo "</tr>";


                                        }
                                    
                                    
                                        ?>
                              </tbody>    
                      </table>
        </div>    
    </div>
</section>