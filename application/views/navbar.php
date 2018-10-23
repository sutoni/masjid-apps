<?php $user_level = $this->session->userdata('user_level')?>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <!-- Link -->
        <ul class="nav navbar-nav navbar-left">
            <?php echo (isset($halaman) && $halaman == 'home') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('admin', '<span class="glyphicon glyphicon-home"></span> Home');?></li>
			

			<!-- Akses menu Administrator-->
            <?php if ($user_level == 'administrator') : ?>
                <?php echo (isset($halaman) && $halaman == 'user') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('admin/user', '<span class="glyphicon glyphicon-user"></span> User');?></li>
           
				<!-- Menu Master -->
				<?php echo (isset($halaman) && preg_match('#(kontak|lupa-password)#', $halaman)) ? '<li class="active">' : '<li>'; ?>
				<?php echo anchor('#', '<span class="glyphicon glyphicon-question-sign"></span>Master<span class="caret"></span>', 'class="dropdown-toggle" data-toggle="dropdown"');?>
				<ul class="dropdown-menu" role="menu">
					<?php echo (isset($halaman) && $halaman == 'daftar') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('admin/daftar', '<span class="glyphicon glyphicon-envelope"></span> Daftar Perusahaan '); ?></li>
					<?php echo (isset($halaman) && $halaman == 'kompetensi group') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('admin/kompetensi', '<span class="glyphicon glyphicon-barcode"></span> Kompetensi Group');?></li>
					<?php echo (isset($halaman) && $halaman == 'biodata') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/biodata', '<span class="glyphicon glyphicon-barcode"></span> Biodata');?></li>
				</ul>



		   <?php endif ?>
			<!-- Akses menu Administrator-->

		
			
			
			<!-- Akses menu Konsultan-->
			<?php if ($user_level == 'konsultan') : ?>
				<!-- Menu Pengajuan -->
				<?php echo (isset($halaman) && preg_match('#(kontak|lupa-password)#', $halaman)) ? '<li class="active">' : '<li>'; ?>
				<?php echo anchor('#', '<span class="glyphicon glyphicon-question-sign"></span>Informasi Dokumen<span class="caret"></span>', 'class="dropdown-toggle" data-toggle="dropdown"');?>
				<ul class="dropdown-menu" role="menu">
					<?php echo (isset($halaman) && $halaman == 'kontak_list') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('admin/kontak', '<span class="glyphicon glyphicon-envelope"></span> Create New '); ?></li>
					<?php echo (isset($halaman) && $halaman == 'lupa-password') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('lupa-password', '<span class="glyphicon glyphicon-barcode"></span> Overview');?></li>
				</ul>
			
                <!-- Menu Profile -->
				<?php echo (isset($halaman) && preg_match('#(kontak|lupa-password)#', $halaman)) ? '<li class="active">' : '<li>'; ?>
				<?php echo anchor('#', '<span class="glyphicon glyphicon-question-sign"></span> Profile<span class="caret"></span>', 'class="dropdown-toggle" data-toggle="dropdown"');?>
				<ul class="dropdown-menu" role="menu">
					<?php echo (isset($halaman) && $halaman == 'kontak') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('kontak', '<span class="glyphicon glyphicon-envelope"></span> Kontak'); ?></li>
					<?php echo (isset($halaman) && $halaman == 'lupa-password') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('lupa-password', '<span class="glyphicon glyphicon-barcode"></span> Lupa Password');?></li>
				</ul>
            </li>
				
            <?php endif ?>
			
			
           
			
        </ul>
        <!-- end Link -->


        <!-- Informasi login -->
        <p class="navbar-text navbar-right">
            Login sebagai,
            <strong>
                <?php echo anchor('admin/logout',
                    '<span class="glyphicon glyphicon-user"></span> ' . $this->session->userdata('username'),
                    array('class' => 'navbar-link', 'data-confirm' => 'Anda yakin akan logout?')); ?>
            </strong>
        </p>
        <!-- end Informasi login -->

    </div> <!-- container -->
</nav>