<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : Laporan Evaluasi tahap II
 * ***************************************************************
 */

?>

<section class="content">
  <div class="row col-lg-10 col-lg-push-1">
    <div class="col-lg-10">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title text-center">HASIL EVALUASI TAHAP II : PEMBELAJARAN <br></br></h3> 
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
             foreach ($data2 as $val) {
				$id_trainingevent = $val->id_trainingevent;
				$namatraining = $val->namatraining;
				$startdate= $val->startdate;
				$trainer= $val->trainer;
				$namavendor = $val->namavendor;
				$jmlpeserta=$val->jmlpeserta;
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
				$jawaban225 = $val->jwb225;
				
            }
             echo form_open('evaluasi_dua/save',$attributes); 
          ?>
           
            
            <input type="hidden" name="txtstatus" id="txtstatus" value="done" />
			<div class="form-group col-sm-12">
				
			
			<!-- table header -->
    	<table class="table table-bordered table-striped">
    	<?php $tahun1=$this->input->post('txtTahun');
		$bulan1=$this->input->post('txtBulan');
		$status1=$this->input->post('txtStatus'); ?>
    	<tr>
    		<td>Topik Pelatihan</td></td><td>:</td><td><?php echo $namatraining?></td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp;</td><td>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</td><td>Perusahaan</td><td>:</td><td>PT. XYZ </td>
    	</tr>
    	<tr>	
    		<td>Tanggal Pelaksanaan</td><td>:</td><td><?php echo $startdate?></td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td rowspan="2">Alamat</td><td rowspan="2">:</td><td rowspan="2">Gedung Titan Center Bintaro Jaya Sektor 7</td>
    	</tr>
    	<tr>	
    		<td>Vendor</td><td>:</td><td><?php echo $namavendor?></td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
    	</tr>
    	<tr>	
    		<td>Trainer</td><td>:</td><td><?php echo $trainer?></td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
    	</tr>
    	<tr>	
    		<td>Jumlah Peserta</td><td>:</td><td><?php echo $jmlpeserta?></td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
    	</tr>
    	</table>
			</div>
			
			
			<div class="table-responsive col-lg-12">
			
              <table class="table table-bordered table-striped">
				<tr>
					<td align="center" rowspan="2" >No</td>
					<td align="center" rowspan="2" cols >Learning Effectiveness & Support</td>
					<td align="center" colspan="5">Skala</td>
					
				</tr>
				<tr>
					<td align="center">Sangat tidak setuju</td>
					<td align="center">Tidak Setuju</td>
					<td align="center">Setuju</td>
					<td align="center" colspan="2">Sangat Setuju</td>
				</tr>
				<tr>
					<td colspan="8"><b>A. A. Pikirkan kembali tentang pelatihan yang anda ikuti pada minggu/bulan lalu, mohon centang pada tingkat apa anda setuju di setiap pernyataan</b> </td>
				</tr>
				
				<tr>
					<?php 
						echo "
							  <td align='center'>1</td>
							   	
							  <td>Apa yang saya pelajari di pelatihan ini sudah membantu saya dalam pekerjaan ?</td>
							  <td align='center'>$jawaban11</td>
							  <td align='center'>$jawaban12</td>
							  <td align='center'>$jawaban13</td>
							  <td align='center' colspan='2'>$jawaban14</td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>2</td>
							   	
							 <td>Materi pelatihan cukup menyeluruh untuk memenuhi kebutuhan saya ?</td>
							  <td align='center'>$jawaban21</td>
							  <td align='center'>$jawaban22</td>
							  <td align='center'>$jawaban23</td>
							  <td align='center' colspan='2'>$jawaban24</td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>3</td>
							   	
							 <td>Saya menerima dukungan dan dorongan untuk menerapkan apa yang saya pelajari ke pekerjaan ?</td>
							  <td align='center'>$jawaban31</td>
							  <td align='center'>$jawaban32</td>
							  <td align='center'>$jawaban33</td>
							  <td align='center' colspan='2'>$jawaban34</td>
							  
							";
					?>
				</tr><tr>
					<?php 
						echo "
							  <td align='center'>4</td>
							   	
							 <td>Saya memiliki sumber daya yang diperlukan (contoh: alat, waktu, SDM) untuk menerapkan apa yang saya pelajari</td>
							  <td align='center'>$jawaban41</td>
							  <td align='center'>$jawaban42</td>
							  <td align='center'>$jawaban43</td>
							  <td align='center' colspan='2'>$jawaban44</td>
							  
							";
					?>
				</tr>
				
				
				<tr>
					<td colspan="2"><b>B. Saya telah melakukan knowledge sharing apa yang saya pelajari di pelatihan kepada rekan / atasan / bawahan saya</b> </td>
				
					<td align="center">Sdh</td>
					<td align="center">Sdh (1 bln)</td>
					<td align="center">Belum</td>
					<td align="center" colspan="2">Tidak Ingin</td>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>1</td>
							   	
							  <td>Saya sudah melakukan knowledge sharing apa yang saya pelajari segera setelah training</td>
							  <td align='center'>$jawaban211</td>
							  <td align='center'>$jawaban212</td>
							  <td align='center'>$jawaban213</td>
							  <td align='center' colspan='2'>$jawaban214</td>
							  
							";
					?>
				</tr>
				<tr>
					<td colspan="2" rowspan="2"><b>C. Jika Anda TIDAK ingin / belum melakukan knowledge sharing tentang pengetahuan dan keterampilan yang Anda pelajari. Mohon pilih alasannya (centang semua yang sesuai) :</b> </td>
				
					<td align="center">Tdk Relevan</td>
					<td align="center">Belum ada kesempatan</td>
					<td align="center">Enggan</td>
					<td align="center">Tidak Paham</td>
					<td align="center">Tidak Prioritas</td>
				</tr>
				<tr>
					<?php 
						echo "
						
							  <td align='center'>$jawaban221</td>
							  <td align='center'>$jawaban222</td>
							  <td align='center'>$jawaban223</td>
							  <td align='center'>$jawaban224</td>
							  <td align='center'>$jawaban225</td>
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