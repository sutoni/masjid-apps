<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : Laporan Evaluasi
 * ***************************************************************
 */

?>


<section class="content">
		<div class="row">
    		<div class="row">
            <div class="box box-primary">
			<div class="panel-body col-lg-10 col-lg-push-1">
				

			<div class="row">
			<div class=" col-lg-12  ">
				<!-- form start -->
				<?php
					$attributes = array('role' => 'form', 'id' => 'formadd');
					echo form_open('laporan/evaluasi',$attributes); 
				?>
			<div class="panel panel-primary">
						<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Laporan Evaluasi Pelatihan
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						 
						
						
						</div>
			  <div class="row">
				<div class="col-sm-push-1 col-lg-8 col-sm-pull-4">
				  <!-- general form elements -->
				  <div class="box box-primary">
       
          <div class="box-body">
          <?php 
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
          ?>
            <input type="hidden" name="idgroup_komp" />

			<div class="form-group col-lg-5">
                    <label>Nama Training </label>
                     <select name="txtNamatraining" id="txtNamatraining" class="form-control">
                       
                       <?php 
							foreach($data as $j){
								echo "<option value='$j->id_training_event'>$j->namatraining - $j->startdate</option>";
							}
					   ?>
                       
                     </select>    
            </div>
            <div class="form-group col-lg-5">
                    <label>Tahapan Evaluasi </label>
                     <select name="txtEvaluasi" id="txtEvaluasi" class="form-control">
                       <option value="1">Evaluasi Tahap I</option>
					   <option value="2">Evaluasi Tahap II</option>
                       <option value="3">Evaluasi Tahap III</option>
                     </select>    
            </div>
            <div class="form-group col-lg-2" >
             <label>&nbsp; </label>
             <button type="submit" class="btn btn-primary"> &nbsp;&nbsp;- Cari - &nbsp;&nbsp; </button> </div> 
            
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
          </div><!-- /.box-body -->

        
       
      </div><!-- /.box -->
    </div>
  </div> </div> <?php echo form_close(); ?></div></div></div></div></div></div>          <!-- /.row -->
</section><!-- /.content -->