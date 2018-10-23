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
        <div class="box-header">
          <h3 class="box-title">Edit Data Vendor Training </h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php
            $id = $this->uri->segment(3);
            $attributes = array('role' => 'form', 'id_vendor' => 'formedit');
            echo form_open('vendor_training/update/'.$id,$attributes); 
        ?>
          <div class="box-body">
          <?php 
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
            foreach ($data as $val) {
                $namavendor = $val->namavendor;
                $alamat = $val->alamat;
				$telpon = $val->telpon;
				$fax = $val->fax;
				$email = $val->email;
                $validfrom = $val->validfrom;
                $validto = $val->validto;
            }
          ?>
           <input type="hidden" name="id_vendor" value="<?php echo $id;?>"  />

             <div class="form-group">
              <label for="namavendor">Nama Vendor Training</label>
              <input type="text" class="form-control" value="<?php echo $namavendor ; ?>"
                     id="namavendor" name="namavendor" placeholder="Masukkan Nama Vendor Training">
            </div>
            <div class="form-group">
              <label for="deskripsi">Alamat</label>
              <textarea style="resize: vertical;" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat terupdate"><?php echo $alamat; ?></textarea>
            </div>
			<div class="form-group">
			  <div class="col-lg-6">	
              <label for="telpon">Telpon</label>
              <input type="text" class="form-control" value="<?php echo $telpon; ?>"
                     id="telpon" name="telpon" placeholder="+62-21-7209510">
            </div>
				<div class="col-lg-6">
              <label for="fax">Fax</label>
              <input type="text" class="form-control" value="<?php echo $fax; ?>"
                     id="fax" name="fax" placeholder="Masukkan No Fax">
				</div>
			</div>
			
			<div class="form-group">
              <label for="email"><br>Email</label>
              <input type="text" class="form-control" value="<?php echo $email; ?>"
                     id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="form-group">
              <label for="validfrom">Valid From</label>
                    <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                         <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                        <input class="form-control" type="text" name="validfrom" id="validfrom" value="<?php echo $validfrom; ?>">                         
                    </div>
            </div>
            <div class="form-group">
              <label for="validto">Valid To</label>
                    <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                        <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>
                          <input class="form-control" type="text" name="validto" id="validto" value="<?php echo $validto; ?>">
                          
                    </div>
            </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?=base_url() . 'kompetensi_group';?>" class="btn btn-default">Batal</a>
          </div>
        <?php echo form_close(); ?>
      </div><!-- /.box -->
    </div>
  </div>   <!-- /.row -->
</section><!-- /.content -->