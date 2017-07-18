<?php
$login_status = $this->session->userdata('login_status');
$user_level = $this->session->userdata('user_level');
?>
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">

        <!-- Navbar Link -->
        <ul class="nav navbar-nav navbar-left">
            <!-- Link Pemesan -->
            <?php echo (isset($halaman) && $halaman == 'home') ? '<li class="active">' : '<li>'; ?> <?php echo anchor(site_url('dashboard'), '<span class="glyphicon glyphicon-home"></span> Beranda');?></li>

            <!-- Link Pemesan -->
            <?php echo (isset($halaman) && $halaman == 'konsumen') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/konsumen', '<span class="glyphicon glyphicon-list-alt"></span> Data Konsumen');?></li>

            <!-- Dropdown Informasi -->
            <?php echo (isset($halaman) && preg_match('#(pengumuman|prosedur|jadwal)#', $halaman)) ? '<li class="active">' : '<li>'; ?>
            <?php echo anchor('#', '<span class="glyphicon glyphicon-info-sign"></span> Informasi<span class="caret"></span>', 'class="dropdown-toggle" data-toggle="dropdown"');?>
            <ul class="dropdown-menu" role="menu">
                <?php echo (isset($halaman) && $halaman == 'pengumuman') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/pengumuman', '<span class="glyphicon glyphicon-bullhorn"></span> Berita');?></li>
                <?php echo (isset($halaman) && $halaman == 'prosedur') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/prosedur', '<span class="glyphicon glyphicon-sort"></span> Prosedur');?></li>
                <?php echo (isset($halaman) && $halaman == 'jadwal') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/jadwal', '<span class="glyphicon glyphicon-calendar"></span> Cek Ketersediaan');?></li>
            </ul>
            </li>
            <!-- Dropdown Informasi end -->

            <!-- Link Hasil Seleksi -->
            <?php if (config_item('psb_tahap_psb') == 'pengumuman') : ?>
                <?php echo (isset($halaman) && $halaman == 'hasil-seleksi') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/hasil-seleksi', '<span class="glyphicon glyphicon-flag"></span> Hasil Seleksi'); ?></li>
            <?php endif ?>

            <!-- Link Kontak -->
            <?php echo (isset($halaman) && $halaman == 'kontak') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/kontak', '<span class="glyphicon glyphicon-envelope"></span> Kontak'); ?></li>

            <!-- Link Dropdown Akun Saya -->
            <?php echo (isset($halaman) && preg_match('#(biodata|cetak-biodata)#', $halaman)) ? '<li class="active">' : '<li>'; ?>
            <?php echo anchor('#', '<span class="glyphicon glyphicon-user"></span> Pesan Disini<span class="caret"></span>', 'class="dropdown-toggle" data-toggle="dropdown"');?>
                <ul class="dropdown-menu" role="menu">
                    <?php echo (isset($halaman) && $halaman == 'biodata') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/biodata', '<span class="glyphicon glyphicon-book"></span> Order');?></li>
                    <?php echo (isset($halaman) && $halaman == 'cetak-biodata') ? '<li class="active">' : '<li>'; ?> <?php echo anchor('dashboard/biodata-preview', '<span class="glyphicon glyphicon-print"></span> Cetak Bukti Pemesanan');?></li>
                </ul>
            </li>
            <!-- Link Dropdown Akun Saya -->
        </ul>
        <!-- Navbar Link end -->

        <!-- Informasi login -->
        <?php if (($login_status == true) && ($user_level == 'konsumen')) : ?>
        <p class="navbar-text navbar-right">
            Login sebagai,
            <strong>
                <?php echo anchor('dashboard/logout',
                    '<span class="glyphicon glyphicon-user"></span> ' . $this->session->userdata('nama'),
                    array('class' => 'navbar-link', 'data-confirm' => 'Anda yakin akan logout?')); ?>
            </strong>
        </p>
              <?php endif ?>
        
        <!-- end Informasi login -->

    </div> <!-- container -->
</nav>