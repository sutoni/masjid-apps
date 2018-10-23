<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : Registrasi User Aplikasi
 * ***************************************************************
 */


/**
 * Description of Crud
 *
 * @author Sutoni
 */
 
 ?>
 <section class="content">
  <div class="row">
    		<div class="row">
            <div class="box box-primary">
			<div class="panel-body col-lg-10 col-lg-push-1">
				

			<div class="row">
			<div class="col-lg-push-1 col-lg-10  ">
				 <!-- form start -->
				<?php
					$attributes = array('role' => 'form', 'idu' => 'formadd');
					echo form_open('user/save',$attributes); 
				?>
			<div class="panel panel-primary">
						<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Tambah Data User
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
        <br><br>
          <div class="box-body">
          <?php 
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
          ?>
            <input type="hidden" name="idu" />
			<div class="form-inline">
			<div class="form-group col-lg-6">
              <label for="empno">ID Karyawan</label> <div class="form-inline" > 
                    <input type="text" class="form-control" value="<?php echo set_value('empno'); ?>"
                     id="empno" name="empno" placeholder="ID Karyawan">
				
							
					<a href="<?=base_url() . 'user/view_karyawan';?>" class="btn btn-primary">....</a> </div>
            </div>
			</div>
            
			<div class="form-group col-lg-6">
              <label for="username">Username</label>
              <input type="text" class="form-control" value="<?php echo set_value('username'); ?>"
                     id="username" name="username" placeholder="Masukkan Nama User">
            </div>
			<div class="form-group col-lg-6">
              <label for="passuser">Password</label>
              <input type="password" class="form-control" value="<?php echo set_value('passuser'); ?>"
                     id="passuser" name="passuser" placeholder="Masukkan Password">
            </div>
			<div class="form-group col-lg-5">
              <label for="idlevel">Level</label>
               <select name="idlevel" id="idlevel" class="form-control">
					   <option value="adm">admin</option>
                       <option value="ats">atasan</option>
					   <option value="kar">karyawan</option>
					   <option value="hrd">hrd</option>
					   
					 
                     </select>    <br><br> <br><br>
            </div>
            <br><br>
            
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
  </div> </div> <?php echo form_close(); ?></div> </div> </div> </div> </div> </div>   <!-- /.row -->
</section><!-- /.content -->
 
 
	
	

</div>



