<div class="container">
    <h2>Form Pendaftaran</h2>
    <hr>

    <?php echo form_open('pendaftaran', array('id'=>'myform', 'class'=>'myform', 'role'=>'form', 'method'=>'post')) ?>

        <div class="form-group has-feedback <?php set_validation_style('ktp')?>">
            <?php echo form_label('No. KTP', 'ktp', array('class' => 'control-label')) ?>
            <?php echo form_input('ktp', $values->ktp, 'id="ktp" class="form-control" placeholder="Nomer KTP" maxlength="16"') ?>
            <?php set_validation_icon('ktp') ?>
            <?php echo form_error('ktp', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('email')?>">
            <?php echo form_label('Email', 'email', array('class' => 'control-label')) ?>
            <?php echo form_input('email', $values->email, 'id="email" class="form-control" placeholder="Email" maxlength="64"') ?>
            <?php set_validation_icon('email') ?>
            <?php echo form_error('email', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('tanggal_pesan')?>">            
            <?php echo form_label('Tanggal Pesan', 'tanggal_pesan', array('class' => 'control-label')) ?>
            <?php echo form_input('tanggal_pesan', date_to_id($values->tanggal_pesan), 'id="tanggal_pesan" class="form-control" placeholder="Tanggal Pesan" maxlength="10"') ?>            
            <?php set_validation_icon('tanggal_pesan') ?>
            <?php echo form_error('tanggal_pesan', '<span class="help-block">', '</span>');?>
        </div>

       

        <div class="form-group has-feedback <?php set_validation_style('nama')?>">            
            <?php echo form_label('Nama Lengkap', 'nama', array('class' => 'control-label')) ?>
            <?php echo form_input('nama', $values->nama, 'id="nama" class="form-control" placeholder="Nama Lengkap" maxlength="64"') ?>            
            <?php set_validation_icon('nama') ?>
            <?php echo form_error('nama', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('tempat_lahir')?>">            
            <?php echo form_label('Tempat Lahir', 'tempat_lahir', array('class' => 'control-label')) ?>
            <?php echo form_input('tempat_lahir', $values->tempat_lahir, 'id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" maxlength="32"') ?>            
            <?php set_validation_icon('nama') ?>
            <?php echo form_error('nama', '<span class="help-block">', '</span>');?>
        </div>

         

            <div class="form-group has-feedback <?php set_validation_style('tanggal_lahir')?>">            
            <?php echo form_label('Tanggal Lahir', 'tanggal_lahir', array('class' => 'control-label')) ?>
            <?php echo form_input('tanggal_lahir', date_to_id($values->tanggal_lahir), 'id="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" maxlength="10"') ?>            
            <?php set_validation_icon('tanggal_lahir') ?>
            <?php echo form_error('tanggal_lahir', '<span class="help-block">', '</span>');?>
        </div>

         <div class="form-group has-feedback <?php set_validation_style('tmp_alamat')?>">            
            <?php echo form_label('Alamat', 'tmp_alamat', array('class' => 'control-label')) ?>
            <?php echo form_textarea('tmp_alamat', $values->tmp_alamat, 'id="tmp_alamat" class="form-control" placeholder="Alamat" maxlength="255"') ?>            
            <?php set_validation_icon('tmp_alamat') ?>
            <?php echo form_error('tmp_alamat', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('tmp_telepon')?>">            
            <?php echo form_label('Telepon', 'tmp_telepon', array('class' => 'control-label')) ?>
            <?php echo form_input('tmp_telepon', $values->tmp_telepon, 'id="tmp_telepon" class="form-control" placeholder="Telepon" maxlength="16"') ?>            
            <?php set_validation_icon('tmp_telepon') ?>
            <?php echo form_error('tmp_telepon', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('jenis_kelamin')?>">            
            <?php echo form_label('Jenis Kelamin', 'jenis_kelamin', array('class' => 'control-label')) ?>
            <label class="radio-inline" for="laki-laki">
                <?php echo form_radio('jenis_kelamin', 'L', (isset($values->jenis_kelamin) && $values->jenis_kelamin == 'L') ? true : false, 'id ="laki-laki"')?> Laki-laki
            </label>
            <label class="radio-inline" for="perempuan">
                <?php echo form_radio('jenis_kelamin', 'P', (isset($values->jenis_kelamin) && $values->jenis_kelamin == 'P') ? true : false, 'id ="perempuan"')?> Perempuan
            </label>            
            <?php set_validation_icon('jenis_kelamin') ?>
            <?php echo form_error('jenis_kelamin', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('agama')?>">            
            <?php echo form_label('Agama', 'agama', array('class' => 'control-label')) ?>
            <?php
            $agama = array(
                '' => '- Pilih -',
                '1' => 'Islam',
                '2' => 'Katolik',
                '3' => 'Protestan',
                '4' => 'Hindu',
                '5' => 'Budha',
                '6' => 'Konghucu',
            );
            $atribut_agama = 'class="form-control"';
            echo form_dropdown('agama', $agama, $values->agama, $atribut_agama);
            ?>            
            <?php set_validation_icon('agama') ?>
            <?php echo form_error('agama', '<span class="help-block">', '</span>');?>
        </div>

        <p><?php echo $captcha; ?></p>
        <div class="form-group has-feedback <?php set_validation_style('captcha')?>">            
            <?php echo form_label('Captcha', 'captcha', array('class' => 'control-label')) ?>
            <?php echo form_input('captcha', $values->captcha, 'id="captcha" class="form-control" placeholder="Masukkan 4 huruf / angka pada gambar di atas" maxlength="4"') ?>
            <?php set_validation_icon('captcha') ?>
            <?php echo form_error('captcha', '<span class="help-block">', '</span>');?>
        </div>

        <?php echo form_button(array('content'=>'Daftar', 'type'=>'submit', 'class'=>'btn btn-primary', 'data-confirm'=>'Anda yakin akan menyimpan data ini?')) ?>

    <?php echo form_close() ?>

    <br>
    <p class="text-danger"><strong>Catatan:</strong></p>
    <p class="text-danger">Email harus diisi alamat email yang valid dan aktif, karena akan digunakan untuk mengirim informasi.</p>

</div>