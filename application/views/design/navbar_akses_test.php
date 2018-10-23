<?php $user_level = $this->session->userdata('level'); ?>

<html>
   <header>
      
       <link rel="stylesheet" href=""/> 
   </header>
   
    <script src="<?php echo base_url('assets/html5shiv/html5shiv.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/respond/respond.min.js'); ?>"></script>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
 <!-- nav class="navbar navbar-inverse" role="navigation">

<div class="navbar navbar-inverse" role="navigation">-->
<body>
	<body>
<div class="navbar navbar-inverse" role="navigation">
<div class="navbar-wrapper">

    
        <!-- <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container"> -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Masjid</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
      		<ul class="nav navbar-nav navbar-right"> 
			   <li><a href="<?=base_url('Home');?>">
			   	<span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
			   
			   <!-- akses sebagai karyawan -->
			   
				<?php if ($user_level == 'admin'){  ?> 
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Master Data&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                        <li><a href="<?=base_url('master/m_kodepemasukan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Pemasukan</a></li>    
	                        <li><a href="<?=base_url('master/m_kodepengeluaran');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Pengeluaran</a></li>
	                        <li><a href="<?=base_url('master/m_kodebidang');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Bidang</a></li>
	                        <li><a href="<?=base_url('master/m_kodekegiatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Kegiatan</a></li>  
	                        <li><a href="<?=base_url('master/m_jabatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Jabatan</a></li>  
	                        <hr>
	                        <li><a href="<?=base_url('master/m_pengurus');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Data Pengurus</a></li>  
	                        <li><a href="<?=base_url('master/m_jamaah');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Data Jamaah</a></li>   
	                        <li><a href="<?=base_url('master/m_sosial');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Data Sosial</a></li>   
						</ul>
                    </li>


                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Kegiatan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                        <li><a href="<?=base_url('master/m_kodepemasukan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Berita</a></li>    
	                        <li><a href="<?=base_url('master/m_kodepengeluaran');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pengumuman</a></li>
	                        <li><a href="<?=base_url('kegiatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Jadwal Sholat 5 Waktu</a></li>
	                        <li><a href="<?=base_url('master/m_kodekegiatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Jadwal Kegiatan</a></li>    
						</ul>
                    </li>	


                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Keuangan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                        <li><a href="<?=base_url('master/ku_catatpemasukan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Pemasukan</a></li>    
	                        <li><a href="<?=base_url('master/ku_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Uang Muka Pengeluaran</a></li>
	                        <li><a href="<?=base_url('master/ku_catatpengeluaran');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Pengeluaran</a></li>
	                        <li><a href="<?=base_url('master/m_kodekegiatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Approval Pengeluaran</a></li>    
						</ul>
                    </li>







                                        
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Laporan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="<?=base_url('laporan/cek_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Overview Uang Muka</a></li>
						<li><a href="<?=base_url('laporan/laporanKeluarmasuk');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Laporan Pengeluaran</a></li>
						</ul>
                    </li>


                <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Setting&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                        <li><a href="<?=base_url('masterdata/m_user');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;User</a></li>    
	                        
						</ul>
                    </li>
				<!-- akses sebagai Atasan -->
				<?php } elseif ($user_level == 'petugas'){  ?>
					
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Master Data&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                        <li><a href="<?=base_url('master/m_kodepemasukan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Pemasukan</a></li>    
	                        <li><a href="<?=base_url('master/m_kodepengeluaran');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Pengeluaran</a></li>
	                        <li><a href="<?=base_url('master/m_kodebidang');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Bidang</a></li>
	                        <li><a href="<?=base_url('master/m_kodekegiatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Kegiatan</a></li>  
	                        <li><a href="<?=base_url('master/m_jabatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Jabatan</a></li>  
	                        <hr>
	                        <li><a href="<?=base_url('master/m_pengurus');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Data Pengurus</a></li>  
	                        <li><a href="<?=base_url('master/m_jamaah');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Data Jamaah</a></li>   
	                        <li><a href="<?=base_url('master/m_sosial');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Data Sosial</a></li>   
						</ul>
                    </li>


                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Kegiatan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                        <li><a href="<?=base_url('kegiatan/k_berita');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Berita</a></li>    
	                        
	                        <li><a href="<?=base_url('upload');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Jadwal Sholat 5 Waktu</a></li>
	                        <li><a href="<?=base_url('kegiatan/k_kegiatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Jadwal Kegiatan</a></li>    
						</ul>
                    </li>	


                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Keuangan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                           
	                        <li><a href="<?=base_url('master/ku_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Uang Muka Pengeluaran</a></li>
	                        
						</ul>
                    </li>







                                        
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Laporan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="<?=base_url('laporan/cek_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Overview Uang Muka</a></li>
						<li><a href="<?=base_url('laporan/laporanKeluarmasuk');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Laporan Pengeluaran</a></li>
						</ul>
                    </li>


                
					
				
				
				<!-- akses sebagai Administrator -->
				<?php } elseif($user_level == 'dkm'){?>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Keuangan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                       
	                        <li><a href="<?=base_url('master/ku_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Approval Uang Muka</a></li>
	                        <li><a href="<?=base_url('master/ku_catatpengeluaran');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Pengeluaran</a></li>
	                       
						</ul>
                    </li>
				
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Laporan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="<?=base_url('laporan/cek_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Overview Uang Muka</a></li>
						<li><a href="<?=base_url('laporan/laporanKeluarmasuk');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Laporan Pengeluaran</a></li>
						</ul>
                    </li>
				
					
			   
				<?php  }
				elseif($user_level == 'keuangan'){?>
				
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Keuangan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                       <li><a href="<?=base_url('master/ku_catatpemasukan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Pemasukan</a></li>    
	                        <li><a href="<?=base_url('master/ku_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Bayar Uang Muka</a></li>
	                        <li><a href="<?=base_url('master/ku_catatpengeluaran');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Pengeluaran</a></li>
	                       
						</ul>
                    </li>
				
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Laporan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="<?=base_url('laporan/cek_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Overview Uang Muka</a></li>
						<li><a href="<?=base_url('laporan/laporanKeluarmasuk');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Laporan Pengeluaran</a></li>
						</ul>
                    </li>
				
				<?php  }
				
				?>
                                <li><a href="<?=base_url('loginhere/changepass');?>">
                                    Change Password</a>
                                </li>
				<li><a href="<?=base_url('loginhere/logout');?>"><span class="glyphicon glyphicon-log-out"></span><?php echo $user_level;?></a></li>
				


     </ul>
   </div>
 



 <!-- nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid"> 
			 <!-- Collect the nav links, forms, and other content for toggling -->
			
			<!-- <div class="collapse navbar-collapse" id="navbarCollapse">
			  
			   <ul class="nav navbar-nav navbar-right">

			   <li><a href="<?=base_url('Home');?>">
			   	<span class="glyphicon glyphicon-home"></span>&nbsp;Home 1</a></li>
			   
			   <!-- akses sebagai karyawan -->
			   
				<!-- <!-- <!-- <?php if ($user_level == 'admin'){  ?> 
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Master Data&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                        <li><a href="<?=base_url('master/m_kodepemasukan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Pemasukan</a></li>    
	                        <li><a href="<?=base_url('master/m_kodepengeluaran');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Pengeluaran</a></li>
	                        <li><a href="<?=base_url('master/m_kodebidang');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Bidang</a></li>
	                        <li><a href="<?=base_url('master/m_kodekegiatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Kegiatan</a></li>  
	                        <li><a href="<?=base_url('master/m_jabatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Jabatan</a></li>  
	                        <hr>
	                        <li><a href="<?=base_url('master/m_pengurus');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Data Pengurus</a></li>  
	                        <li><a href="<?=base_url('master/m_jamaah');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Data Jamaah</a></li>   
	                        <li><a href="<?=base_url('master/m_sosial');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Data Sosial</a></li>   
						</ul>
                    </li>


                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Kegiatan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                        <li><a href="<?=base_url('master/m_kodepemasukan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Berita</a></li>    
	                        <li><a href="<?=base_url('master/m_kodepengeluaran');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pengumuman</a></li>
	                        <li><a href="<?=base_url('kegiatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Jadwal Sholat 5 Waktu</a></li>
	                        <li><a href="<?=base_url('master/m_kodekegiatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Jadwal Kegiatan</a></li>    
						</ul>
                    </li>	


                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Keuangan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                        <li><a href="<?=base_url('master/ku_catatpemasukan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Pemasukan</a></li>    
	                        <li><a href="<?=base_url('master/ku_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Uang Muka Pengeluaran</a></li>
	                        <li><a href="<?=base_url('master/ku_catatpengeluaran');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Pengeluaran</a></li>
	                        <li><a href="<?=base_url('master/m_kodekegiatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Approval Pengeluaran</a></li>    
						</ul>
                    </li>







                                        
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Laporan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="<?=base_url('laporan/cek_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Overview Uang Muka</a></li>
						<li><a href="<?=base_url('laporan/laporanKeluarmasuk');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Laporan Pengeluaran</a></li>
						</ul>
                    </li>


                <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Setting&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                        <li><a href="<?=base_url('masterdata/m_user');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;User</a></li>    
	                        
						</ul>
                    </li>
				< akses sebagai Atasan
				<?php } elseif ($user_level == 'petugas'){  ?>
					
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Master Data&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                        <li><a href="<?=base_url('master/m_kodepemasukan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Pemasukan</a></li>    
	                        <li><a href="<?=base_url('master/m_kodepengeluaran');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Pengeluaran</a></li>
	                        <li><a href="<?=base_url('master/m_kodebidang');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Bidang</a></li>
	                        <li><a href="<?=base_url('master/m_kodekegiatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Kegiatan</a></li>  
	                        <li><a href="<?=base_url('master/m_jabatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Kode Jabatan</a></li>  
	                        <hr>
	                        <li><a href="<?=base_url('master/m_pengurus');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Data Pengurus</a></li>  
	                        <li><a href="<?=base_url('master/m_jamaah');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Data Jamaah</a></li>   
	                        <li><a href="<?=base_url('master/m_sosial');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Data Sosial</a></li>   
						</ul>
                    </li>


                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Kegiatan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                        <li><a href="<?=base_url('kegiatan/k_berita');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Berita</a></li>    
	                        
	                        <li><a href="<?=base_url('upload');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Jadwal Sholat 5 Waktu</a></li>
	                        <li><a href="<?=base_url('kegiatan/k_kegiatan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Jadwal Kegiatan</a></li>    
						</ul>
                    </li>	


                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Keuangan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                           
	                        <li><a href="<?=base_url('master/ku_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Uang Muka Pengeluaran</a></li>
	                        
						</ul>
                    </li>







                                        
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Laporan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="<?=base_url('laporan/cek_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Overview Uang Muka</a></li>
						<li><a href="<?=base_url('laporan/laporanKeluarmasuk');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Laporan Pengeluaran</a></li>
						</ul>
                    </li>


                
					
				
				
				<! akses sebagai Administrator 
				<?php } elseif($user_level == 'dkm'){?>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Keuangan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                       
	                        <li><a href="<?=base_url('master/ku_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Approval Uang Muka</a></li>
	                        <li><a href="<?=base_url('master/ku_catatpengeluaran');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Pengeluaran</a></li>
	                       
						</ul>
                    </li>
				
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Laporan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="<?=base_url('laporan/cek_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Overview Uang Muka</a></li>
						<li><a href="<?=base_url('laporan/laporanKeluarmasuk');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Laporan Pengeluaran</a></li>
						</ul>
                    </li>
				
					
			   
				<?php  }
				elseif($user_level == 'keuangan'){?>
				
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Keuangan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
	                       <li><a href="<?=base_url('master/ku_catatpemasukan');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Pemasukan</a></li>    
	                        <li><a href="<?=base_url('master/ku_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Bayar Uang Muka</a></li>
	                        <li><a href="<?=base_url('master/ku_catatpengeluaran');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Pencatatan Pengeluaran</a></li>
	                       
						</ul>
                    </li>
				
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-pencil"></span>&nbsp;Laporan&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="<?=base_url('laporan/cek_uangmuka');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Overview Uang Muka</a></li>
						<li><a href="<?=base_url('laporan/laporanKeluarmasuk');?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;Laporan Pengeluaran</a></li>
						</ul>
                    </li>
				
				<?php  }
				
				?>
                                <li><a href="<?=base_url('loginhere/changepass');?>">
                                    Change Password</a>
                                </li>
				<li><a href="<?=base_url('loginhere/logout');?>"><span class="glyphicon glyphicon-log-out"></span><?php echo $user_level;?></a></li>
				
			  </ul> 
			</div>
	</div> 
	</nav> --> 

</div>


 <!--
</div> -->
</div>

	
	</body>
	</html>