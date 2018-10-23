<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : Evaluasi tahap I
 * ***************************************************************
 */

?>

<section class="content">
  <div class="row col-lg-10 col-lg-push-1">
    <div class="col-lg-10">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title text-center">TRAINING & DEVELOPMENT EVALUATION FORM LEVEL 1 : REACTION <br></br></h3> 
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
				$empno = $val->empno;
				$trainer = $val->trainer;
				
            }
             echo form_open('evaluasi_dua/save',$attributes); 
          ?>
            <input type="hidden" name="idtrainingevent" id="idtrainingevent" value="<?php echo $id_trainingevent ?>" />
            <input type="hidden" name="empno" id="empno" value="<?php echo $empno;?>" />
            <input type="hidden" name="txtstatus" id="txtstatus" value="done" />
			<div class="form-group col-sm-5">
					<label for="materi pelatihan">Materi Pelatihan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" class="form-control" value="<?php echo $namatraining; ?>"
                     id="txtmateri" name="txtmateri" readonly >
									
				</div>
			<div class="form-group col-sm-4">
					  <label for="nama instruktur">Instruktur Pelatihan</label>
					  <input type="text" class="form-control" value="<?php echo $trainer; ?>" id="txtTrainer" name="txtTrainer" width="400" readonly>
			</div>	
            <div class="form-group col-lg-3">
              <label for="tgltest">Tanggal Evaluasi</label>
                    <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                         <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                        <input class="form-control" type="text" name="tgleval1" id=""tgleval1"" value="<?php echo $tglsekarang;?>">                         
                    </div>
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
							  <td align='center'><input type='radio' id='rb1' name='rb1' value='1'></td>
							  <td align='center'><input type='radio' id='rb1' name='rb1'  value='2'></td>
							  <td align='center'><input type='radio' id='rb1' name='rb1' value='3'></td>
							  <td align='center'><input type='radio' id='rb1' name='rb1' value='4'></td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>2</td>
							   	
							 <td>Materi pelatihan disusun dengan baik sehingga mudah untuk diikuti</td>
							  <td align='center'><input type='radio' id='rb2' name='rb2' value='1'></td>
							  <td align='center'><input type='radio' id='rb2' name='rb2' value='2'></td>
							  <td align='center'><input type='radio' id='rb2' name='rb2' value='3'></td>
							  <td align='center'><input type='radio' id='rb2' name='rb2' value='4'></td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>3</td>
							   	
							 <td>Isi program menjawab kebutuhan / tujuan pelatihan saya</td>
							  <td align='center'><input type='radio' id='rb3' name='rb3' value='1'></td>
							  <td align='center'><input type='radio' id='rb3' name='rb3' value='2'></td>
							  <td align='center'><input type='radio' id='rb3' name='rb3' value='3'></td>
							  <td align='center'><input type='radio' id='rb3' name='rb3' value='4'></td>
							  
							";
					?>
				</tr><tr>
					<?php 
						echo "
							  <td align='center'>4</td>
							   	
							 <td>Penggunaan contoh / latihan / diskusi sesuai dengan materi pelatihan</td>
							  <td align='center'><input type='radio' id='rb4' name='rb4' value='1'></td>
							  <td align='center'><input type='radio' id='rb4' name='rb4' value='2'></td>
							  <td align='center'><input type='radio' id='rb4' name='rb4' value='3'></td>
							  <td align='center'><input type='radio' id='rb4' name='rb4' value='4'></td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>5</td>
							   	
							 <td >Saya mempelajari hal / pengalaman baru dari pelatihan / pengembangan ini</td>
							  <td align='center'><input type='radio' id='rb5' name='rb5' value='1'></td>
							  <td align='center'><input type='radio' id='rb5' name='rb5' value='2'></td>
							  <td align='center'><input type='radio' id='rb5' name='rb5' value='3'></td>
							  <td align='center'><input type='radio' id='rb5' name='rb5' value='4'></td>
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
							  <td align='center'><input type='radio' id='rb6' name='rb6' value='1'></td>
							  <td align='center'><input type='radio' id='rb6' name='rb6' value='2'></td>
							  <td align='center'><input type='radio' id='rb6' name='rb6' value='3'></td>
							  <td align='center'><input type='radio' id='rb6' name='rb6' value='4'></td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>2</td>
							   	
							 <td>Mendorong partisipasi peserta/td>
							  <td align='center'><input type='radio' id='rb7' name='rb7' value='1'></td>
							  <td align='center'><input type='radio' id='rb7' name='rb7' value='2'></td>
							  <td align='center'><input type='radio' id='rb7' name='rb7' value='3'></td>
							  <td align='center'><input type='radio' id='rb7' name='rb7' value='4'></td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>3</td>
							   	
							 <td>Membawakan materi dengan cara yang baik, teratur dan tempo yg sesuai</td>
							  <td align='center'><input type='radio' id='rb8' name='rb8' value='1'></td>
							  <td align='center'><input type='radio' id='rb8' name='rb8' value='2'></td>
							  <td align='center'><input type='radio' id='rb8' name='rb8' value='3'></td>
							  <td align='center'><input type='radio' id='rb8' name='rb8' value='4'></td>
							  
							";
					?>
				</tr><tr>
					<?php 
						echo "
							  <td align='center'>4</td>
							   	
							 <td>Mampu menjawab pertanyaan dengan fokus, sesuai dan mudah dipahami / dimengerti</td>
							  <td align='center'><input type='radio' id='rb9' name='rb9' value='1'></td>
							  <td align='center'><input type='radio' id='rb9' name='rb9' value='2'></td>
							  <td align='center'><input type='radio' id='rb9' name='rb9' value='3'></td>
							  <td align='center'><input type='radio' id='rb9' name='rb9' value='4'></td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>5</td>
							   	
							 <td>Bisa menyampaikan keseluruhan materi secara efektif dalam wak	tu yang ditentukan</td>
							  <td align='center'><input type='radio' id='rb10' name='rb10' value='1'></td>
							  <td align='center'><input type='radio' id='rb10' name='rb10' value='2'></td>
							  <td align='center'><input type='radio' id='rb10' name='rb10' value='3'></td>
							  <td align='center'><input type='radio' id='rb10' name='rb10' value='4'></td>
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
							  <td align='center'><input type='radio' id='rb11' name='rb11'value='1'></td>
							  <td align='center'><input type='radio' id='rb11' name='rb11'  value='2'></td>
							  <td align='center'><input type='radio' id='rb11' name='rb11' value='3'></td>
							  <td align='center'><input type='radio' id='rb11' name='rb11' value='4'></td>
							  
							";
					?>
				</tr>
				<tr>
					<?php 
						echo "
							  <td align='center'>2</td>
							   	
							 <td>Secara keseluruhan saya merasa puas dengan pelatihan / pengembangan ini</td>
							  <td align='center'><input type='radio' id='rb12' name='rb12' value='1'></td>
							  <td align='center'><input type='radio' id='rb12' name='rb12' value='2'></td>
							  <td align='center'><input type='radio' id='rb12' name='rb12' value='3'></td>
							  <td align='center'><input type='radio' id='rb12' name='rb12' value='4'></td>
							  
							";
					?>
				</tr>
				
				
				
				<tr>
					<td colspan="8"><b>D. SARAN</b></td>
				</tr>
				<tr>
					<td colspan="6" align="left">Topik apa yang paling menarik yang anda pelajari dalam pelatihan/pengembangan ini? </td>
				</tr>
				<tr>
					
					<td colspan="6" ><textarea class="form-control" placeholder="Topik menarik yang ingin anda pelajari ?" name="txtsaran1" id="txtsaran1" rows="2" cols="3"> </textarea> </td>
				</tr>
				<tr>
					<td colspan="6" align="left">Informasi atau keterampilan apa yang anda harapkan tetapi tidak anda dapatkan dari pelatihan ini? </td>
				</tr>
				<tr>
					
					<td colspan="6" ><textarea class="form-control" placeholder="Keterampilan yang diharapkan ?" name="txtsaran2" id="txtsaran2" rows="2" cols="3"> </textarea> </td>
				</tr>
				<tr>
					<td colspan="6" align="left">Komentar untuk perbaikan pelatihan/pengembangan </td>
				</tr>
				<tr>
					
					<td colspan="6" ><textarea class="form-control" placeholder="Saran perbaikan " name="txtsaran3" id="txtsaran3" rows="2" cols="3"> </textarea> </td>
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
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?=base_url() . 'evaluasi_satu';?>" class="btn btn-default">Batal</a>
           </div>                        
                                    
           <div class="col-lg-10"><br>safdsaf <br></div>                           
          </div><!-- /.box-body -->
			
       	 <?php echo form_close(); ?>
      </div><!-- /.box -->
      
    </div>
  </div>   <!-- /.row --><br><br><br><br>
</section><!-- /.content -->