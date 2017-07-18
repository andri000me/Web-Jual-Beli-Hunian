<div class="container">
    <div class="jumbotron">
        <p class="h1">Selamat Datang!</p>
        <p>Halo, <strong> <?php echo $this->session->userdata('nama'); ?></strong>.</p>
        <p>Sebelum melakukan pemesanan, sebaiknya Anda menyimak prosedur pemesanan di halaman <?php echo anchor('prosedur', 'Prosedur Pemesanan'); ?>.</p>
    </div>
</div>