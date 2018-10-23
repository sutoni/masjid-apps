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
                                  <h3 class="box-title">Data Karyawan</h3>
                                  <div class="pull-right hidden-xs">
                                      <a href="<?=base_url() . 'user/add';?>"><i class="fa fa-plus text-success"></i></a>&nbsp;&nbsp;
                                      
                                  </div> 
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    
                                    <thead>
                                        <tr>
   

          <tr>
            <th class="text-center" width="10" rowspan="2">ID Karyawan</th>
            <th class="text-center" rowspan="2">Firstname</th>
            <th class="text-center" rowspan="2">Lastname</th>
			<th class="text-center" rowspan="2">Posisi</th>
			<th class="text-center" rowspan="2">Departemen</th>
			<th class="text-center" rowspan="2">Tanggal Masuk</th>
			<th class="text-center" rowspan="2">Tanggal Keluar</th>
			
            
            
          </tr>
		 
        </thead>
        <tbody>
<?php 
foreach ($data as $key) {
    echo "<tr>
            <td align='center'><a href=\"".base_url()."user/edit/".$key->empno."\">".$key->empno."</a></td>
            <td>".$key->firstname."</td>
            <td>".$key->lastname."</td>
			<td align='center'>".$key->postitle."</td>
            <td align='center'>".$key->orgname."</td>
            <td align='center'>".$key->joindate."</td>
            <td align='center'>".$key->terminationdate."</td>
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
   
</div><!-- /.box -->