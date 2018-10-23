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
 <!-- DATA TABES SCRIPT -->
    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>" type="text/javascript"></script>
<div class="table-responsive">
   <!-- Content Header (Page header) -->
        
          
               
                              <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">Management User</h3>
                                  <div class="pull-right hidden-xs">
                                      <a href="<?=base_url() . 'user/add';?>"><i class="fa fa-plus text-success"></i></a>&nbsp;&nbsp;
                                      
                                  </div> 
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    
                                    <thead>
                                        <tr>
   

          <tr>
            <th class="text-center" width="10" rowspan="2">ID</th>
            <th class="text-center" rowspan="2">Nama Lengkap</th>
            <th class="text-center" rowspan="2">Email</th>
			<th colspan="2" class="text-center" >Authority</th>
			<th class="text-center" rowspan="2">Level</th>
            <th class="text-center" rowspan="2">Blokir</th>
            <th rowspan="2">Edit</th>
            <th rowspan="2">Hapus</th>
          </tr>
		  <tr>
			
			<th>Username</th>
			<th>Password</th>
		  </tr>
        </thead>
        <tbody>
<?php
foreach ($data as $key) {
    echo "<tr>
            <td>".$key->empno."</td>
            <td>".$key->nama_lengkap."</td>
            <td>".$key->email."</td>
			<td>".$key->username."</td>
			<td>".$key->passuser."</td>
			<td>".$key->level."</td>
            <td>".$key->blokir."</td>
            
            <td><a href=\"".base_url()."user/edit/".$key->idu."\">Edit</a></td>
            <td><a href=\"".base_url()."user/delete/".$key->idu."\">Hapus</a></td>
          </tr>";
}
?>
        </tbody>
      </table>            
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" align="right">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <a href="<?=base_url() . 'user/add';?>" class="btn btn-primary">Tambah</a>
        <a href="<?=base_url() . 'user';?>" class="btn btn-default">Refresh</a>
    </div>
</div><!-- /.box -->