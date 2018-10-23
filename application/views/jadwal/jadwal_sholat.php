<?php $user_level = $this->session->userdata('level');
?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery11.js"></script>
    <!-- include input widgets; this is independent of Datepair.js -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" />
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>" type="text/javascript"></script>

<div class="container">
<div class="row">

 <div class="row col-lg-12">

<!doctype html>
<html>
    <head>
        <title>Upload Jadwal Sholat</title>
       
    </head>
    <body>

        <div class="container-fluid">

        <div class="table-responsive col-lg-13">
        <div class="form-group col-lg-13">
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Jadwal</a></li>
              <li class="breadcrumb-item active" aria-current="page">Import Jadwal</li>
            </ol>
          </nav>


        <div class="wrapper" >
            <h4>Upload Jadwal Sholat</h4>

            <?php echo $error;?>

            <?php echo form_open_multipart('upload/do_upload');?>

            <input type="file" name="file" size="20" />


            <input type="submit" value="upload" 'class="btn btn-primary"/>

            </form>

            <?php
            //echo form_open_multipart($action);
            //$attributes = array('role' => 'form', 'idtgsholat' => 'formcari');
            //echo form_open_multipart('upload/proses'); 

            //echo '<div class="form-group">';
            //echo '<label>Judul ' . form_error('judul') . '</label>'; // show error judul
            //echo form_input('judul', $judul, 'class="form-control" placeholder="Judul"');
            //echo '</div>';

            //echo '<div class="form-group">';
            //echo '<label>Gambar ' . $error . '</label>'; // show error upload
            //echo form_upload('file');
            //echo '</div>';
            //echo form_submit(null, 'Upload', 'class="btn btn-primary"');
            //echo form_submit('mysubmit', 'Upload', 'class="btn btn-primary"');
            //echo form_close();
            ?>
        </div>
    </div>
</div>
    </body>
</html>

</div>
</div>