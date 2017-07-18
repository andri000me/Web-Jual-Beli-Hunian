<div class="container">
<div class="jumbotron bio-preview">
    <h2>DATA KONSUMEN</h2>
    <hr>

    <h3 class="bg-success">A. DATA PRIBADI</h3>
    <dl class="dl-horizontal">
        <dt>Nomor konsumen</dt>
        <dd>: <?php echo format_no_konsumen($konsumen->id) ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>KTP</dt>
        <dd>: <?php echo $konsumen->ktp ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Total Harga Kamar</dt>
        <dd>: <?php $angka=700000; $total=$angka*$konsumen->jumlah; echo "Rp.".number_format($total, 0);  ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Status Pembayaran</dt>
        <dd>: <?php echo format_status_verifikasi($konsumen->status_verifikasi) ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Tanggal Pesan</dt>
        <dd>: <?php echo format_tanggal($konsumen->tanggal_pesan) ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Nama</dt>
        <dd>: <?php echo $konsumen->nama ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Tempat, Tanggal Lahir</dt>
        <dd>: <?php echo $konsumen->tempat_lahir ?>, <?php echo format_tanggal($konsumen->tanggal_lahir) ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Jenis Kelamin</dt>
        <dd>: <?php echo format_jenis_kelamin($konsumen->jenis_kelamin) ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Agama</dt>
        <dd>: <?php echo $konsumen->agama != '0' ? format_agama($konsumen->agama) : format_agama($konsumen->ket_agama); ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Alamat</dt>
        <dd>: <?php echo $konsumen->tmp_alamat ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Telepon</dt>
        <dd>: <?php echo $konsumen->tmp_telepon ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>No Rek Atas Nama</dt>
        <dd>: <?php echo $konsumen->norek ?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Jumlah Pesanan Kamar</dt>
        <dd>: <?php echo $konsumen->jumlah ?></dd>
    </dl>
    
    
</div> <!-- jumbotron end -->

<div class="text-center">
    <?php echo anchor('dashboard/biodata-cetak', '&nbsp; &nbsp; Cetak &nbsp; &nbsp;', array('class' => 'btn btn-primary btn-lg', 'role' => 'button')); ?>
</div>
</div>