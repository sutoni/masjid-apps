<?php $user_level = $this->session->userdata('level'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dropdown</title>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   
  </head>
  <body>

<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid"> 
			 <!-- Collect the nav links, forms, and other content for toggling -->
			
			<div class="collapse navbar-collapse" id="navbarCollapse">
			  
			   <ul class="nav navbar-nav navbar-right">

			   <li><a href="<?=base_url('Home');?>">
			   	<span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
			   
			   <!-- akses sebagai karyawan -->
			   
				<?php if ($user_level == 'admin'){  ?> 
					<li class="dropdown-toggle">
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
			</div><!-- /.navbar-collapse -->
	</div> <!---	/continer -->
	</nav><!-- /navbar -->
	
	
	</body>
	</html>