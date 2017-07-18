<div class="container">
    <h2>Lupa Password</h2>
    <hr>

    <?php echo form_open('lupa-password', array('id'=>'myform', 'class'=>'myform', 'role'=>'form')) ?>

        <div class="form-group has-feedback <?php set_validation_style('no_pemesan')?>">
            <?php echo form_label('Nomor Pemesan', 'no_pemesan', array('class' => 'control-label')) ?>
            <?php echo form_input('no_pemesan', $values->no_pemesan, 'id="no_pemesan" class="form-control" placeholder="Nomor Pemesan" maxlength="8"') ?>
            <?php set_validation_icon('no_pemesan') ?>
            <?php echo form_error('no_pemesan', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('ktp')?>">
            <?php echo form_label('KTP', 'ktp', array('class' => 'control-label')) ?>
            <?php echo form_input('ktp', $values->ktp, 'id="ktp" class="form-control" placeholder="No KTP" maxlength="16"') ?>
            <?php set_validation_icon('ktp') ?>
            <?php echo form_error('ktp', '<span class="help-block">', '</span>');?>
        </div>

        <div class="form-group has-feedback <?php set_validation_style('email')?>">            
            <?php echo form_label('Email', 'email', array('class' => 'control-label')) ?>
            <?php echo form_input('email', $values->email, 'id="email" class="form-control" placeholder="Email" maxlength="64"') ?>            
            <?php set_validation_icon('email') ?>
            <?php echo form_error('email', '<span class="help-block">', '</span>');?>
        </div>

        <p><?php echo $captcha; ?></p>
        <div class="form-group has-feedback <?php set_validation_style('captcha')?>">
            <?php echo form_label('Captcha', 'captcha', array('class' => 'control-label')) ?>
            <?php echo form_input('captcha', $values->captcha, 'id="captcha" class="form-control" placeholder="Masukkan 4 huruf / angka pada gambar di atas" maxlength="4"') ?>
            <?php set_validation_icon('captcha') ?>
            <?php echo form_error('captcha', '<span class="help-block">', '</span>');?>
        </div>

        <?php echo form_button(array('content'=>'Kirim', 'type'=>'submit', 'class'=>'btn btn-primary', 'data-confirm'=>'Anda yakin akan mengirim data ini?')) ?>

    <?php echo form_close() ?>

    <br>
    <p class="text-danger"><strong>Catatan:</strong></p>
    <p class="text-danger">Alamat email harus diisi dengan alamat email yang Anda gunakan pada saat pendaftaran.</p>

</div>