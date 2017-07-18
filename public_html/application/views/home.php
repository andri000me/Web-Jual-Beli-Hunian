<div class="container">
    <div class="jumbotron">
            
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo base_url('asset/img/house-1.jpg') ?>" alt="...">
      <div class="carousel-caption">
        Rosa
      </div>
    </div>
    <div class="item">
      <img src="<?php echo base_url('asset/img/1.jpg') ?>" alt="...">
      <div class="carousel-caption">
        Rosa
      </div>
    </div>

    <div class="item">
      <img src="<?php echo base_url('asset/img/2.jpg') ?>" alt="...">
      <div class="carousel-caption">
        Rosa
      </div>
    </div>

    <div class="item">
      <img src="<?php echo base_url('asset/img/3.jpg') ?>" alt="...">
      <div class="carousel-caption">
        Rosa
      </div>
    </div>
	
	<div class="item">
      <img src="<?php echo base_url('asset/img/4.jpg') ?>" alt="...">
      <div class="carousel-caption">
        Rosa
      </div>
    </div>
	
	<div class="item">
      <img src="<?php echo base_url('asset/img/5.jpg') ?>" alt="...">
      <div class="carousel-caption">
        Rosa
      </div>
    </div>
	
	<div class="item">
      <img src="<?php echo base_url('asset/img/6.jpg') ?>" alt="...">
      <div class="carousel-caption">
        Rosa
      </div>
    </div>
    
	<div class="item">
      <img src="<?php echo base_url('asset/img/7.jpg') ?>" alt="...">
      <div class="carousel-caption">
        Rosa
      </div>
    </div>
	
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>  


        <h2 class="h1"><marquee>Selamat Datang!</marquee></h2>
        <p>
            Selamat datang di website <strong>Pemesanan kontrakan berbasis web</strong>. Sebelum melakukan pemesanan,
            sebaiknya Anda menyimak prosedur pemesanan di halaman <?php echo anchor('prosedur', 'Prosedur Pemesanan'); ?>.
        </p>
		<P>
		Kontrakan ini berisi 2 petak ruangan dan 1 kamar mandi, untuk tampilan tampak depan bisa dilihat pada gambar yang berada di beranda.
		</p>
        <p>
            Pastikan juga anda mengetahui ketersediaan kontrakan yang ada di halaman <?php echo anchor('jadwal', 'Cek Ketersediaan'); ?>.
            Semua informasi terbaru mengenai Berita yang ada di wilayah kawasan MM2100 bisa anda lihat di halaman <?php echo anchor('pengumuman', 'Berita'); ?>.
        </p>
        <p>Anda juga dapat mengetahui data user yang telah melakukan pemesanan yang ada di kontrakan kami pada halaman <?php echo anchor('konsumen', 'Konsumen'); ?>.</p>
        <p>Jika Anda sudah memahami prosedur pemesanan, silakan klik tombol "<strong>Daftar</strong>" di bawah ini!</p>
        <p><?php echo anchor('pendaftaran', 'Daftar', 'class="btn btn-primary btn-lg" role="button"'); ?></p>
    </div>
</div>