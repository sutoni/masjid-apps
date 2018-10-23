<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : Laporan Evaluasi tahap I
 * ***************************************************************
 */

?>

<section class="content">
  <div class="row col-lg-10 col-lg-push-1">
    <div class="col-lg-10">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title text-center">HASIL EVALUASI TAHAP I : REACTION <br></br></h3> 
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php
            $attributes = array('role' => 'form', 'id_assessment' => 'formadd');
            echo form_open('evaluasi_satu/save',$attributes); 
        ?>
          <div class="box-body">
          <?php 
            $tglsekarang=DATE('Y-m-d');
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
             foreach ($data as $val) {
				$id_trainingevent = $val->id_trainingevent;
				$namatraining = $val->namatraining;
				$jawaban11 = $val->jwb11;
				$jawaban12 = $val->jwb12;
				$jawaban13 = $val->jwb13;
				$jawaban14 = $val->jwb14;
				
				$jawaban21 = $val->jwb21;
				$jawaban22 = $val->jwb22;
				$jawaban23 = $val->jwb23;
				$jawaban24 = $val->jwb24;
				
				$jawaban31 = $val->jwb31;
				$jawaban32 = $val->jwb32;
				$jawaban33 = $val->jwb33;
				$jawaban34 = $val->jwb34;
								
				$jawaban41 = $val->jwb41;
				$jawaban42 = $val->jwb42;
				$jawaban43 = $val->jwb43;
				$jawaban44 = $val->jwb44;
				
				$jawaban211 = $val->jwb211;
				$jawaban212 = $val->jwb212;
				$jawaban213 = $val->jwb213;
				$jawaban214 = $val->jwb214;
				
				$jawaban221 = $val->jwb221;
				$jawaban222 = $val->jwb222;
				$jawaban223 = $val->jwb223;
				$jawaban224 = $val->jwb224;
				
				$jawaban231 = $val->jwb231;
				$jawaban232 = $val->jwb232;
				$jawaban233 = $val->jwb233;
				$jawaban234 = $val->jwb234;
				
				$jawaban241 = $val->jwb241;
				$jawaban242 = $val->jwb242;
				$jawaban243 = $val->jwb243;
				$jawaban244 = $val->jwb244;
								
				$jawaban251 = $val->jwb251;
				$jawaban252 = $val->jwb252;
				$jawaban253 = $val->jwb253;
				$jawaban254 = $val->jwb254;
				
				$jawaban311 = $val->jwb311;
				$jawaban312 = $val->jwb312;
				$jawaban313 = $val->jwb313;
				$jawaban314 = $val->jwb314;
				
				$jawaban321 = $val->jwb321;
				$jawaban322 = $val->jwb322;
				$jawaban323 = $val->jwb323;
				$jawaban324 = $val->jwb324;
				
				$jawaban331 = $val->jwb331;
				$jawaban332 = $val->jwb332;
				$jawaban333 = $val->jwb333;
				$jawaban334 = $val->jwb334;
				
            }
             echo form_open('evaluasi_dua/save',$attributes); 
          ?>
            <input type="hidden" name="idtrainingevent" id="idtrainingevent" value="<?php echo $id_trainingevent; ?>" />
            
            <input type="hidden" name="txtstatus" id="txtstatus" value="done" />
			<div class="form-group col-sm-12">
				
			
			<!-- table header -->
    	<table class="table table-bordered table-striped">
    	<?php $tahun1=$this->input->post('txtTahun');
		$bulan1=$this->input->post('txtBulan');
		$status1=$this->input->post('txtStatus'); ?>
    	<tr>
    		<td>Topik Pelatihan</td></td><td>:</td><td><?php echo $tahun1?></td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp;</td><td>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</td><td>Perusahaan</td><td>:</td><td>PT. XYZ </td>
    	</tr>
    	<tr>	
    		<td>Tanggal Pelaksanaan</td><td>:</td><td><?php echo $bulan1?></td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td rowspan="2">Alamat</td><td rowspan="2">:</td><td rowspan="2">Gedung Titan Center Bintaro Jaya Sektor 7</td>
    	</tr>
    	<tr>	
    		<td>Vendor</td><td>:</td><td><?php echo $status1?></td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
    	</tr>
    	<tr>	
    		<td>Trainer</td><td>:</td><td><?php echo $status1?></td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
    	</tr>
    	
    	</table>
			</div>
			
			
			<div class="table-responsive col-lg-12">
			
              <table class="table table-bordered table-striped">
				<tr>
					<td align="center" rowspan="2" >No</td>
					<td align="center" rowspan="2" >Content</td>
					<td align="center" colspan="5">Skala</td>
					
				</tr>
				<tr>
					<td align="center">Sangat tidak setuju</td>
					<td align="center">Tidak Setuju</td>
					<td align="center">Setuju</td>
					<td align="center">Sangat Setuju</td>
				</tr>
				<tr>
					<td colspan="8"><b>A. EVALUASI TENTANG ISI MATERI</b> </td>
				</tr>
				
				<tr>
					<?php 
						echo "
							  <td align='center'>1</td>
							   	
							  <td>Isi program menjawab kebutuhan / tujuan pelatihan saya ?</td>
							  <td align='center'>$jawaban11</td>
							  <td align='center'>$jawaban12</td>
							  <td align='center'>$jawaban13</td>
							  <td align='center'>$jawaban14</td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>2</td>
							   	
							 <td>Materi pelatihan disusun dengan baik sehingga mudah untuk diikuti</td>
							  <td align='center'>$jawaban21</td>
							  <td align='center'>$jawaban22</td>
							  <td align='center'>$jawaban23</td>
							  <td align='center'>$jawaban24</td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>3</td>
							   	
							 <td>Isi program menjawab kebutuhan / tujuan pelatihan saya</td>
							  <td align='center'>$jawaban31</td>
							  <td align='center'>$jawaban32</td>
							  <td align='center'>$jawaban33</td>
							  <td align='center'>$jawaban34</td>
							  
							";
					?>
				</tr><tr>
					<?php 
						echo "
							  <td align='center'>4</td>
							   	
							 <td>Penggunaan contoh / latihan / diskusi sesuai dengan materi pelatihan</td>
							  <td align='center'>$jawaban41</td>
							  <td align='center'>$jawaban42</td>
							  <td align='center'>$jawaban43</td>
							  <td align='center'>$jawaban44</td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>5</td>
							   	
							 <td >Saya mempelajari hal / pengalaman baru dari pelatihan / pengembangan ini</td>
							  <td align='center'>$jawaban211</td>
							  <td align='center'>$jawaban212</td>
							  <td align='center'>$jawaban213</td>
							  <td align='center'>$jawaban214</td>
							";
					?>
				</tr>
				
				<tr>
					<td colspan="8"><b>B. EVALUASI TENTANG PRESENTER / INSTURKTUR TRAINING</b> </td>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>1</td>
							   	
							  <td>Menguasai materi pelatihan dengan baik</td>
							  <td align='center'>$jawaban221</td>
							  <td align='center'>$jawaban222</td>
							  <td align='center'>$jawaban223</td>
							  <td align='center'>$jawaban224</td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>2</td>
							   	
							 <td>Mendorong partisipasi peserta/td>
							  <td align='center'>$jawaban231</td>
							  <td align='center'>$jawaban232</td>
							  <td align='center'>$jawaban233</td>
							  <td align='center'>$jawaban234</td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>3</td>
							   	
							 <td>Membawakan materi dengan cara yang baik, teratur dan tempo yg sesuai</td>
							  <td align='center'>$jawaban241</td>
							  <td align='center'>$jawaban242</td>
							  <td align='center'>$jawaban243</td>
							  <td align='center'>$jawaban244</td>
							  
							";
					?>
				</tr><tr>
					<?php 
						echo "
							  <td align='center'>4</td>
							   	
							 <td>Mampu menjawab pertanyaan dengan fokus, sesuai dan mudah dipahami / dimengerti</td>
							  <td align='center'>$jawaban251</td>
							  <td align='center'>$jawaban252</td>
							  <td align='center'>$jawaban253</td>
							  <td align='center'>$jawaban254</td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>5</td>
							   	
							 <td>Bisa menyampaikan keseluruhan materi secara efektif dalam wak	tu yang ditentukan</td>
							  <td align='center'>$jawaban311</td>
							  <td align='center'>$jawaban312</td>
							  <td align='center'>$jawaban313</td>
							  <td align='center'>$jawaban314</td>
							";
					?>
				</tr>
				<tr>
					<td colspan="8"><B>C. OTHERS</B> </td>
				</tr>
				
				<tr>
					<?php 
						echo "
							  <td align='center'>1</td>
							   	
							  <td>Saya merasa nyaman dengan suasana dan fasilitas ruangan ?</td>
							  <td align='center'>$jawaban321</td>
							  <td align='center'>$jawaban322</td>
							  <td align='center'>$jawaban323</td>
							  <td align='center'>$jawaban324</td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>2</td>
							   	
							 <td>Secara keseluruhan saya merasa puas dengan pelatihan / pengembangan ini</td>
							  <td align='center'>$jawaban331</td>
							  <td align='center'>$jawaban332</td>
							  <td align='center'>$jawaban333</td>
							  <td align='center'>$jawaban334</td>
							  
							";
					?>
				</tr>
				
				
				
				
			  </table>
            </div>
            
            <!-- this java script must be appear when you use twitter bootstrop -->
            <script src="<?=base_url('assets/plugins/jQuery/jquery.js');?>" type="text/javascript"></script>
                                    <!--<script src="js/jquery.js"></script>-->
                                     <!--this datepicker java script for bootstrap 3-->
                                    <!--<script src="js/bootstrap-datepicker3.js"></script>-->
                                    <script src="<?=base_url('assets/plugins/datepicker/bootstrap-datepicker3.js');?>" type="text/javascript"></script>
                                    <script>
                                        //options method for call datepicker
                                        $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });

                                    </script>
           <div class="box-footer col-lg-10">
            
           </div>                        
                                    
           <div class="col-lg-10"><br>safdsaf <br></div>                           
          </div><!-- /.box-body -->
			
       	 <?php echo form_close(); ?>
      </div><!-- /.box -->
      
    </div>
  </div>   <!-- /.row --><br><br><br><br>
</section><!-- /.content -->