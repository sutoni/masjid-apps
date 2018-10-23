<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">

        <!-- Navbar Link -->
        <ul class="nav navbar-nav navbar-left">
            <!-- Dropdown Home -->
            <?php echo (isset($halaman) && $halaman == 'design/home') ? '<li class="active">' : '<li>'; ?> <?php echo anchor(base_url(), '<span class="glyphicon glyphicon-home"></span> Home');?></li>

<!--                 Dropdown Peserta 
                <?php echo (isset($halaman) && $halaman == 'peserta') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('peserta', '<span class="glyphicon glyphicon-list-alt"></span> Peserta');?></li>

                 Dropdown Daftar 
                <?php echo (isset($halaman) && $halaman == 'pendaftaran') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('pendaftaran', '<span class="glyphicon glyphicon-pencil"></span> Pendaftaran');?></li>

                 Dropdown Informasi 
                <?php echo (isset($halaman) && preg_match('#(pengumuman|prosedur|jadwal)#', $halaman)) ? '<li class="active">' : '<li>'; ?>
                <?php echo anchor('#', '<span class="glyphicon glyphicon-info-sign"></span> Informasi<span class="caret"></span>', 'class="dropdown-toggle" data-toggle="dropdown"');?>
                <ul class="dropdown-menu" role="menu">
                    <?php echo (isset($halaman) && $halaman == 'pengumuman') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('pengumuman', '<span class="glyphicon glyphicon-bullhorn"></span> Pengumuman');?></li>
                    <?php echo (isset($halaman) && $halaman == 'prosedur') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('prosedur', '<span class="glyphicon glyphicon-sort"></span> Prosedur');?></li>
                    <?php echo (isset($halaman) && $halaman == 'jadwal') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('jadwal', '<span class="glyphicon glyphicon-calendar"></span> Jadwal');?></li>
                </ul>
                </li>

                 Link Hasil Seleksi 
                <?php if (config_item('psb_tahap_psb') == 'pengumuman') : ?>
                    <?php echo (isset($halaman) && $halaman == 'hasil-seleksi') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('hasil-seleksi', '<span class="glyphicon glyphicon-flag"></span> Hasil Seleksi'); ?></li>
                <?php endif ?>

                 Dropdown Bantuan 
                <?php echo (isset($halaman) && preg_match('#(kontak|lupa-password)#', $halaman)) ? '<li class="active">' : '<li>'; ?>
                <?php echo anchor('#', '<span class="glyphicon glyphicon-question-sign"></span> Bantuan<span class="caret"></span>', 'class="dropdown-toggle" data-toggle="dropdown"');?>
                <ul class="dropdown-menu" role="menu">
                    <?php echo (isset($halaman) && $halaman == 'kontak') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('kontak', '<span class="glyphicon glyphicon-envelope"></span> Kontak'); ?></li>
                    <?php echo (isset($halaman) && $halaman == 'lupa-password') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('lupa-password', '<span class="glyphicon glyphicon-barcode"></span> Lupa Password');?></li>
                </ul>-->

        </ul>
            <p class="navbar-text navbar-right">
               
            Login 
            <strong>
                <?php echo anchor('loginhere',
                    '<span class="glyphicon glyphicon-lock"></span> '
                   ); ?>
            </strong>
        </p>          
         
        <!-- /Navbar Link -->
        
        <!-- Form Login Peserta -->
        
        <!-- /Form Login Peserta -->

    </div> <!-- container -->
</nav>