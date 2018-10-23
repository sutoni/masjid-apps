<?php

/* 
 * ***************************************************************
 * Script :  
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : Hapus Vendor Training
 * ***************************************************************
 */

?>
<div class="box">
    <div class="box-header">
        Menghapus Data Vendor Training
    </div><!-- /.box-header -->
    <div class="box-body">    
    <?php
    $id = $this->uri->segment(3);
    $attributes = array('role' => 'form', 'id_vendor' => 'formedit');
    $hidden = array('id_vendor' => $id);
    echo form_open('vendor_training/delete/'.$id,$attributes,$hidden); 
    foreach ($data as $key) {
        echo "<p>Yakin akan menghapus data " . $key->id_vendor . " ?</p>"; 
    }
    echo form_submit('submit', 'Ya!','class="btn btn-primary"');
    ?>
    <a href="<?=base_url() . 'vendor_training';?>" class="btn btn-default">Tidak</a>
    <?php echo form_close();  ?>
    </div><!-- /.box-body -->
</div><!-- /.box -->