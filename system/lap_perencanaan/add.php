<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : Tambah Kompetensi Group
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
					$attributes = array('role' => 'form', 'idgroup_komp' => 'formadd');
					echo form_open('cari/save',$attributes); 
				?>
			<div class="panel panel-primary">
						<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Laporan Rencana Pengembangan
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

			<div class="form-group col-lg-3">
                    <label>Tahun </label>
                     <select name="kategori" id="kategori" class="form-control">
                       <option value="Softskill">--Pilih Tahun --</option>
                       <option value="Technical">Technical</option>
					   <option value="Softskill">Softskill</option>
                       
                     </select>    
            </div>
            <div class="form-group col-lg-3">
                    <label>Bulan </label>
                     <select name="kategori" id="kategori" class="form-control">
                       <option value="Softskill">--Pilih Bulan --</option>
                       <option value="Technical">Evaluasi Tahap I</option>
					   <option value="Softskill">Evaluasi Tahap II</option>
                       <option value="Softskill">Evaluasi Tahap III</option>
                     </select>    
            </div>
            <div class="form-group col-lg-3">
                    <label>Status </label>
                     <select name="kategori" id="kategori" class="form-control">
                       <option value="Softskill">--Pilih Status --</option>
                       <option value="Technical">Evaluasi Tahap I</option>
					   <option value="Softskill">Evaluasi Tahap II</option>
                       <option value="Softskill">Evaluasi Tahap III</option>
                     </select>    
            </div>
            <div class="form-group col-lg-2" >
             <label> </label>
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