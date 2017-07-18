<div class="container">
<h2>Cek Kelengkapan Data & Isi Form Yang Kosong</h2>
<hr>

<?php echo form_open($form_action, array('id'=>'myform', 'class'=>'form-horizontal', 'role'=>'form')) ?>

    <!-- hidden field -->
    <?php echo form_hidden('id', $values->id);?>
    <?php echo form_hidden('ktp', $values->ktp);?>
    <?php echo form_hidden('tanggal_pesan', $values->tanggal_pesan);?>
    
 
    <h3 class="bg-success">A. Data Pribadi </h3>

    <!-- no_konsumen -->
    <div class="form-group form-group-sm">
        <?php echo form_label('Nomor Konsumen', 'no_konsumen', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-2">
            <p class="form-control-static"><?php echo format_no_konsumen($values->id);?></p>
        </div>
    </div>

    <!-- ktp -->
    <div class="form-group form-group-sm">        
        <?php echo form_label('KTP', 'ktp', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-2">
            <p class="form-control-static"><?php echo $values->ktp;?></p>
        </div>
    </div>

    <!-- nama -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('nama')?>">        
        <?php echo form_label('Nama', 'nama', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-4">
            <?php echo form_input('nama', $values->nama, 'id="nama" class="form-control" placeholder="Nama" maxlength="64"') ?>
            <?php set_validation_icon('nama') ?>
        </div>
        <?php if (form_error('nama')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('nama', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <!-- jenis_kelamin -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('jenis_kelamin')?>">
        <?php echo form_label('Jenis Kelamin', 'jenis_kelamin', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-4">
            <label class="radio-inline" for="laki-laki">
                <?php echo form_radio('jenis_kelamin', 'L', (isset($values->jenis_kelamin) && $values->jenis_kelamin == 'L') ? true : false, 'id ="laki-laki"')?> Laki-laki
            </label>
            <label class="radio-inline" for="perempuan">
                <?php echo form_radio('jenis_kelamin', 'P', (isset($values->jenis_kelamin) && $values->jenis_kelamin == 'P') ? true : false, 'id ="perempuan"')?> Perempuan
            </label>
        </div>
        <?php if (form_error('jenis_kelamin')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('jenis_kelamin', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <!-- agama -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('agama')?>">        
        <?php echo form_label('Agama', 'agama', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-2">
            <?php
            $agama = array(
                '' => '- Pilih -',
                '1' => 'Islam',
                '2' => 'Katolik',
                '3' => 'Protestan',
                '4' => 'Hindu',
                '5' => 'Budha',
                '6' => 'Konghucu',
                '0' => 'Lainnya',
            );
            $atribut_agama = 'class="form-control"';
            echo form_dropdown('agama', $agama, $values->agama, $atribut_agama);
            ?>
        </div>
        <?php if (form_error('agama')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('agama', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>


    <!-- tempat_lahir -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('tempat_lahir')?>">
        <?php echo form_label('Tempat Lahir', 'tempat_lahir', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-3">
            <?php echo form_input('tempat_lahir', $values->tempat_lahir, 'id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" maxlength="32"') ?>
            <?php set_validation_icon('tempat_lahir') ?>
        </div>
        <?php if (form_error('tempat_lahir')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('tempat_lahir', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <!-- tanggal_lahir -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('tanggal_lahir')?>">        
        <?php echo form_label('Tanggal Lahir', 'tanggal_lahir', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-2">
            <div class="input-group date" data-date-format="dd-mm-yyyy">
                <?php echo form_input('tanggal_lahir', date_to_id($values->tanggal_lahir), 'id="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" maxlength="10"') ?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>
        <?php if (form_error('tanggal_lahir')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('tanggal_lahir', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>



    <!-- tmp_alamat -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('tmp_alamat')?>">
        <?php echo form_label('Alamat', 'tmp_alamat', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-5">
            <?php echo form_textarea('tmp_alamat', $values->tmp_alamat, 'class="form-control" id="tmp_alamat" placeholder="Alamat Tinggal"') ?>
        </div>
        <?php if (form_error('tmp_alamat')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('tmp_alamat', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <!-- tmp_telepon -->
    <div class="form-group form-group-sm has-feedback <?php set_validation_style('tmp_telepon')?>">        
        <?php echo form_label('Telepon', 'tmp_telepon', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-3">
            <?php echo form_input('tmp_telepon', $values->tmp_telepon, 'id="tmp_telepon" class="form-control" placeholder="Telepon Tempat Tinggal" maxlength="16"') ?>
            <?php set_validation_icon('tmp_telepon') ?>
        </div>
        <?php if (form_error('tmp_telepon')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('tmp_telepon', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>

    <div class="form-group form-group-sm has-feedback <?php set_validation_style('norek')?>">
        <?php echo form_label('No Rek Atas Nama', 'norek', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-5">
            <?php echo form_input('norek', $values->norek, 'class="form-control" id="norek" placeholder="No Rek atas nama" maxlength="32"') ?>
        </div>
        <?php if (form_error('norek')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('norek', '<span class="help-block">', '</span>');?>
            </div>
            <?php endif ?>
    </div>

    <div class="form-group form-group-sm has-feedback <?php set_validation_style('jumlah')?>">
        <?php echo form_label('Jumlah Pesanan Kamar', 'jumlah', array('class' => 'control-label col-sm-3')) ?>
        <div class="col-sm-5">
            <?php echo form_input('jumlah', $values->jumlah, 'class="form-control" id="jumlah" placeholder="Jumlah Pesanan Kamar" maxlength="10"') ?>
        </div>
        <?php if (form_error('jumlah')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
                <?php echo form_error('jumlah', '<span class="help-block">', '</span>');?>
            </div>
        <?php endif ?>
    </div>


    <hr>
    <div class="form-group">
        <div class="col-sm-5 col-sm-offset-3">
            <?php echo form_button(array('content'=>'Simpan', 'type'=>'submit', 'class'=>'btn btn-primary', 'data-confirm'=>'Anda yakin akan menyimpan data ini?')) ?>
        </div>
    </div>

<?php echo form_close() ?>

</div>