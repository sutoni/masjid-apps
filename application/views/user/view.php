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
        
          
               
                              <div class="box col-lg-10 col-lg-push-1">
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
            <th class="text-center" width="10" rowspan="2">UID</th>
            <th class="text-center" rowspan="2">Username</th>
            <th class="text-center" rowspan="2">Password</th>
			<th class="text-center" rowspan="2">Level</th>
            <th rowspan="2">Edit</th>
            
          </tr>
		 
        </thead>
        <tbody>
<?php
foreach ($data as $key) {
    echo "<tr>
            <td align='center'>".$key->uid."</td>
            <td>".$key->username."</td>
            <td>".$key->password."</td>
			<td align='center'>".$key->level."</td>
            <td align='center'><a href=\"".base_url()."user/edit/".$key->uid."\">Edit</a></td>
            
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
    <div class="box-footer col-lg-10 col-lg-push-1 ">
        <a href="<?=base_url() . 'user/add';?>" class="btn btn-primary">Tambah</a>
        <a href="<?=base_url() . 'user';?>" class="btn btn-default">Refresh</a>
    </div>
</div><!-- /.box -->