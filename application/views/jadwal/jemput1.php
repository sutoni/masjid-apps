<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


?>
<section class="content">
    
    <div class="panel panel-default col-lg-10 col-lg-push-1">
        <div class="panel-body">
            <h3><?php echo $kotaberangkat ?> ke <?php echo $kotatujuan; ?></h3>
             <table id="example1" class="table table-bordered table-striped">
                          <thead>
                               <tr>
                              <td>No </td><td> Pool</td><td>Pergi</td><td> Tiba</td><td> Harga Tiket</td><td>Ketersediaan Kursi</td>
                          </tr>     
                          </thead>
                          <tbody>
                              <?php  
                                    $no=1;
                                    foreach($data3 as $key){
                                        $noi =$no++;
                                        echo"
                                            <tr>
                                                <td>$noi</td>
                                                
                                                <td>$key->namapool - $key->kota ( $key->alamat)</td>
                                                <td>Tanggal : $key->tglberangkat Pukul : $key->waktuberangkat</td>
                                                <td>$key->tglberangkat</td>
                                                <td>Rp. ".number_format($key->harga)."</td>    
                                                <td align='center'>";
                                                  if($key->sisakursi==0){
                                                     echo $key->kapasitas ;
                                                  }
                                                  else{
                                                      echo $key->sisakursi ;
                                                  }
                                                 echo "</td>      
                                            </tr>
                                               ";
                                    }
                                        ?>
                              </tbody>    
                      </table>
<!-- form start -->
        <?php
            $attributes = array('role' => 'form', 'idjadwal' => 'formedit');
            echo form_open('jadwal/simpanpesanan',$attributes); 
        ?>
                <div class="form-group col-md-3 padding-left-lg">
                   <label for="ktp">Nama Pemesan </label>
                   <input type="hidden" id="txtkotaberangkat" name="txtkotaberangkat" value="<?php echo $kotaberangkat; ?>">
                   <input type="text" class="form-control"  id="txtnamapemesan" name="txtnamapemesan" placeholder="Masukkan Nama Pemesan">               
                </div>
                <div class="form-group col-md-3 padding-left-lg">
                   <label for="ktp">Nomer Tlp/HP </label>
                   <input type="text" class="form-control"  id="txttelpon" name="txttelpon" placeholder="Masukan Nomer Telpon">               
                </div>
                <div class="form-group col-md-2 padding-left-lg">
                   <label for="ktp">Jumlah Penumpang </label>
                   <input type="hidden" class="form-control" value="<?php echo $key->harga; ?>" id="txtharga" name="txtharga" >               
                   <?php if($jmlpenumpang==''){?>
                        <input type="text" class="form-control" value="0" id="txtjmlpng" name="txtjmlpng" >               
                   <?php }
                   else {?>
                        <input type="text" class="form-control" value="<?php echo $jmlpenumpang; ?>" id="txtjmlpng" name="txtjmlpng" >               
                   <?php     
                   }
                   
                   ?>
                   
                </div>
<!--                javascrip total harga-->
                    <script src="<?php echo base_url('assets/plugins/jQuery/jquery.js') ?>" type="text/javascript"></script>
			<script src="<?php echo base_url('assets/plugins/jQuery/jquery-1.4.js') ?>" type="text/javascript"></script>
				<script>
						
                                        $("#txtjmlpng").keyup(function(){	
                                        // variabel dari nilai combo box group
                                        var jmlpenumpang = $("#txtjmlpng").val();
					var harga = $("#txtharga").val();
					var intjmlpenumpang = parseInt(jmlpenumpang);
					var intharga = parseInt(harga);
					var total1 = intjmlpenumpang * intharga;
														
					
					document.getElementById("txtbtiket").value = total1;
					
                                        });
													
													
               </script>

                <div class="form-group col-md-2 padding-left-lg">
                   <label for="ktp">Total Biaya Tiket </label>
                   <input type="text" class="form-control" value="" id="txtbtiket" name="txtbtiket" >               
                </div>
                <div class="form-group col-md-1 padding-left-lg">
                    <label for="ktp">&nbsp;&nbsp;&nbsp;&nbsp; </label>
                   <input type="submit" class="form-group dark" value="Pesan">               
                </div>
        </div>    
    </div>
    <div class="col-lg-12"> 
<!--    batas awal-->
    <div class="panel panel-default col-lg-5 col-lg-push-1">
        <H3>Tempat Penjemputan</H3>
        <hr>
        <div class="panel-body " style="border:0px solid #bbb;border-radius:1px;padding:20px;">

					  <div class="form-group col-md-5">
						<label class="control-label">Kecamatan</label>
                                                <input type="hidden" class="form-control" id="txtidjadwal" name="txtidjadwal" value="<?php echo $idjadwal; ?>">   
						<select class="form-control" name="txtkecamatan" id="txtkecamatan" >
                                                    <option value="">--Pilih Kecamatan --</option>
                                                    <?php 
                                                      foreach ($data2 as $kec) {
                                                            $kdkecamatan = $kec['kdkecamatan']   ;
                                                            $namakecamatan = $kec['namakecamatan'];
                                                            echo "<option value='$kdkecamatan'>$namakecamatan</option>";  
                                                        }
                                                    ?>         

                                                 </select> 
					  </div>
                                            <script src="<?php echo base_url('assets/plugins/jQuery/jquery.js') ?>" type="text/javascript"></script>
                                            <script src="<?php echo base_url('assets/plugins/jQuery/jquery-1.4.js') ?>" type="text/javascript"></script>
                                                <script>

                                                $("#txtkecamatan").change(function(){

                                                    // variabel dari nilai combo box group
                                                    var kdkelurahan = $("#txtkecamatan").val();
                                                      //alert(kdkelurahan);
                                                    // tampilkan image load
                                                    $("#imgLoad").show("");
                                                    //  
                                                    // mengirim dan mengambil data
                                                    $.ajax({  
                                                        //alert(kdprovinsi);
                                                        type: "POST",
                                                        dataType: "html",
                                                        url: "<?php echo base_url('jadwal/getKelurahan'); ?>",

                                                        data: {
                                                            kdkelurahan: kdkelurahan

                                                                },
                                                        success: function(msg){

                                                            // jika tidak ada data
                                                            if(msg == ''){
                                                                alert('Tidak ada data Kota');
                                                            }

                                                            // jika dapat mengambil data,, tampilkan di combo box elemen
                                                            else{
                                                               $("#txtkelurahan").html(msg);    
                                                                <!-- alert('Tidak ada data Kota');  --> 
                                                            }

                                                            // hilangkan image load
                                                            $("#imgLoad").hide();
                                                        }
                                                    });    
                                                });



                                        </script>
                                             
<!--                                        <div class="form-group col-md-5">
                                               <label class="control-label">Kelurahan</label>
                                            <select name="txtkelurahan" id="txtkelurahan" class="form-control onchange">
                                                <option value="">--- Pilih Kelurahan1 --- </option>
                                           </select>    
                                        </div>    <div class="clearfix"></div>-->
                                        <input type="hidden" id="txtkelurahan" name="txtkelurahan" value="">
                                        <div class="clearfix"></div>
                                        
					 <div class="form-group col-md-10 ">
                                             <label class="control-label" for="exampleInputEmail1">Alamat</label>
                                                <textarea class="form-control" rows="1" cols="300" name="txtalamatberangkat" id="txtalamatberangkat"></textarea>
                                        </div> 
					
			</div>
		</div>

<!--       batas kanan dan kiri         -->
<div class="clearfix col-lg-1"></div>
<div class="panel panel-default col-lg-5">
        <H3>Tempat Antar ke Tujuan</H3>
        <hr>
        <div class="panel-body " style="border:0px solid #bbb;border-radius:1px;padding:20px;">
                                            <div class="form-group col-md-5">
						<label class="control-label">Kecamatan</label>
						<select class="form-control" name="txtkecamatantujuan" id="txtkecamatantujuan" >
                                                    <option value="">--Pilih Kecamatan --</option>
                                                    <?php 
                                                      foreach ($data4 as $kec) {
                                                            $kdkecamatan = $kec['kdkecamatan']   ;
                                                            $namakecamatan = $kec['namakecamatan'];
                                                            echo "<option value='$kdkecamatan'>$namakecamatan</option>";  
                                                        }
                                                    ?>         

                                                 </select> 
					  </div>
                                            <script src="<?php echo base_url('assets/plugins/jQuery/jquery.js') ?>" type="text/javascript"></script>
                                            <script src="<?php echo base_url('assets/plugins/jQuery/jquery-1.4.js') ?>" type="text/javascript"></script>
                                                <script>

                                                $("#txtkecamatantujuan").change(function(){

                                                    // variabel dari nilai combo box group
                                                    var kdkelurahan = $("#txtkecamatantujuan").val();
                                                      //alert(kdkelurahan);
                                                    // tampilkan image load
                                                    $("#imgLoad").show("");
                                                    //  
                                                    // mengirim dan mengambil data
                                                    $.ajax({  
                                                        //alert(kdprovinsi);
                                                        type: "POST",
                                                        dataType: "html",
                                                        url: "<?php echo base_url('jadwal/getKelurahan'); ?>",

                                                        data: {
                                                            kdkelurahan: kdkelurahan

                                                                },
                                                        success: function(msg){

                                                            // jika tidak ada data
                                                            if(msg == ''){
                                                                alert('Tidak ada data Kota');
                                                            }

                                                            // jika dapat mengambil data,, tampilkan di combo box elemen
                                                            else{
                                                               $("#txtkelurahan").html(msg);    
                                                                <!-- alert('Tidak ada data Kota');  --> 
                                                            }

                                                            // hilangkan image load
                                                            $("#imgLoad").hide();
                                                        }
                                                    });    
                                                });



                                        </script>
<!--                                        <div class="clearfix"></div>       -->
<!--                                        <div class="form-group col-md-5">
                                               <label class="control-label">Kelurahan</label>
                                            <select name="txtkelurahantujuan" id="txtkelurahantujuan" class="form-control onchange">
                                                <option value="">--- Pilih Kelurahan --- </option>
                                           </select>    
                                        </div>    <div class="clearfix"></div>-->
                                        <input type="hidden" id="txtkelurahantujuan" name="txtkelurahantujuan" value="">
                                        <div class="clearfix"></div>
                                        
					 <div class="form-group col-md-10 ">
                                             <label class="control-label" for="exampleInputEmail1">Alamat</label>
                                                <textarea class="form-control" rows="1" cols="300" name="txtalamattujuan" id="txtalamattujuan"></textarea>
                                        </div> 
					
            
			
	</div>
</div>
</div>
<!--    batas akhir-->
   
</section>