<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : 
 * ***************************************************************
 */

?>
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header col-lg-8 col-lg-push-1">
          <h3 class="box-title">Managemen User</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php
            $id = $this->uri->segment(3);
            $attributes = array('role' => 'form', 'uid' => 'formadd');
            echo form_open('user/save/',$attributes); 
        ?>
          <div class="box-body col-lg-8 col-lg-push-1">
          <?php 
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
            foreach ($data as $val) {
                $empno = $val->empno;
                $firstname = $val->firstname;
				$lastname = $val->lastname;
				
            }
          ?>
           	 <input type="hidden" name="uid" />
			<div class="form-inline">
			<div class="form-group col-lg-6 ">
              <label for="empno">ID Karyawan</label> <div class="form-inline" > 
                    <input type="text" class="form-control" value="<?php echo $empno; ?>"
                     id="empno" name="empno" placeholder="ID Karyawan">
				
							
					<a href="<?=base_url() . 'user/view_karyawan';?>" class="btn btn-primary">....</a> </div>
            </div>
			</div>
            
			<div class="form-group col-lg-8">
              <label for="username">Username</label>
              <input type="text" class="form-control" value="<?php echo $firstname.' '.$lastname; ?>"
                     id="username" name="username" placeholder="Masukkan Nama User">
            </div>
			<div class="form-group col-lg-8">
              <label for="passuser">Password</label>
              <input type="password" class="form-control" value="<?php echo set_value('passuser'); ?>"
                     id="passuser" name="passuser" placeholder="Masukkan Password">
            </div>
			<div class="form-group col-lg-8">
              <label for="idlevel">Level</label>
               <select name="idlevel" id="idlevel" class="form-control">
					   <option value="adm">admin</option>
                       <option value="ats">atasan</option>
					   <option value="kar">karyawan</option>
					   <option value="hrd">hrd</option>
					   
					 
                     </select>    <br><br> <br><br>
            </div><!-- /.box-body -->

          <div class="box-footer col-lg-8 ">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?=base_url() . 'user';?>" class="btn btn-default">Batal</a>
          </div>
        <?php echo form_close(); ?>
      </div><!-- /.box -->
    </div>
  </div>   <!-- /.row -->
</section><!-- /.content -->