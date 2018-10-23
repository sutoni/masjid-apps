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
          <h3 class="box-title text-center">HASIL EVALUASI EFEKTIVITAS PELATIHAN DAN PENGEMBANGAN <br></br></h3> 
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
             foreach ($data3 as $val) {
				$id_trainingevent = $val->id_trainingevent;
				$namatraining = $val->namatraining;
				$startdate= $val->startdate;
				$trainer= $val->trainer;
				$jmlpeserta=$val->jmlpeserta;
				$namavendor = $val->namavendor;
				$jawaban01 = $val->jwb01;
				$jawaban11 = $val->jwb11;
				$jawaban12 = $val->jwb12;
				$jawaban13 = $val->jwb13;
				$jawaban14 = $val->jwb14;
				
				$jawaban02 = $val->jwb02;
				$jawaban21 = $val->jwb21;
				$jawaban22 = $val->jwb22;
				$jawaban23 = $val->jwb23;
				$jawaban24 = $val->jwb24;
				
				$jawaban03 = $val->jwb03;
				$jawaban31 = $val->jwb31;
				$jawaban32 = $val->jwb32;
				$jawaban33 = $val->jwb33;
				$jawaban34 = $val->jwb34;

				$jawaban04 = $val->jwb04;
				$jawaban41 = $val->jwb41;
				$jawaban42 = $val->jwb42;
				$jawaban43 = $val->jwb43;
				$jawaban44 = $val->jwb44;
				
				$jawaban06 = $val->jwb06;
				$jawaban61 = $val->jwb61;
				$jawaban62 = $val->jwb62;
				$jawaban63 = $val->jwb63;
				$jawaban64 = $val->jwb64;
				
				$jawaban08 = $val->jwb08;
				$jawaban81 = $val->jwb81;
				$jawaban82 = $val->jwb82;
				$jawaban83 = $val->jwb83;
				$jawaban84 = $val->jwb84;
				
				$jawaban010 = $val->jwb010;
				$jawaban101 = $val->jwb101;
				$jawaban102 = $val->jwb102;
				$jawaban103 = $val->jwb103;
				$jawaban104 = $val->jwb104;
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
					<td align="center" rowspan="2" cols >Isi</td>
					<td align="center" colspan="5">(-) ------------------------- (+)</td>
					
				</tr>
				<tr>
					<td align="center">0</td>
					<td align="center">1</td>
					<td align="center">2</td>
					<td align="center" >3</td>
					<td align="center" >4</td>
				</tr>
				<tr>
					<td colspan="8"><b>A. A. Dampak pelatihan/pengembangan yang diukur</b> </td>
				</tr>
				
				<tr>
					<?php 
						echo "
							  <td align='center'>1</td>
							   	
							  <td>Pengetahuan : Apakah mampu mengajarkan/berbagi pengetahuan, keterampilan, atau perilaku barunya?</td>
							  <td align='center'>$jawaban01</td>
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
							   	
							 <td>Keterampilan : Apakah mampu menerapkan apa yang sudah dipelajarinya ?</td>
							 <td align='center'>$jawaban02</td> 
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
							   	
							 <td>Sikap : Apakah mampu merubah perilakunya ?</td>
							  <td align='center'>$jawaban03</td>
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
							   	
							 <td>Produktivitas : Apakah mampu meningkatkan kinerja hariannya</td>
							  <td align='center'>$jawaban04</td>
							  <td align='center'>$jawaban41</td>
							  <td align='center'>$jawaban42</td>
							  <td align='center'>$jawaban43</td>
							  <td align='center'>$jawaban44</td>
							  
							";
					?>
				</tr><tr>
					<?php 
						echo "
							  <td align='center'>5</td>
							   	
							 <td>Produktivitas : Dampak lainnya?</td>
							  <td align='center'>$jawaban06</td> 
							  <td align='center'>$jawaban61</td>
							  <td align='center'>$jawaban62</td>
							  <td align='center'>$jawaban63</td>
							  <td align='center'>$jawaban64</td>
							  
							  
							";
					?>
				</tr>
				
				
				<tr>
					<td colspan="2"><b>B. Hasil yang diharapkan berdasarkan permintaan pelatihan/pengembangan</b> </td>
					<?php echo "
					 		  <td align='center'>$jawaban08</td>
					 		  <td align='center'>$jawaban81</td>
							  <td align='center'>$jawaban82</td>
							  <td align='center'>$jawaban83</td>
							  <td align='center'>$jawaban84</td>
							  	";
					?>
				</tr>
				
				<tr>
					<td colspan="2"><b>C. Action plan berdasarkan evaluasi pelatihan & pengembangan tahap 2 : Pembelajaran</b> </td>
					<?php echo "
					 		  <td align='center'>$jawaban010</td>
					 		  <td align='center'>$jawaban101</td>
							  <td align='center'>$jawaban102</td>
							  <td align='center'>$jawaban103</td>
							  <td align='center'>$jawaban104</td>
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