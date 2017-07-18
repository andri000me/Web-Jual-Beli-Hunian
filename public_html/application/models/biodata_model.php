<?php
class Biodata_model extends MY_Model
{
    protected $_tabel = 'tb_konsumen';

    public $form_rules = array(
        // Data Pribadi ----------------------------------------------------
        array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'trim|xss_clean|required|max_length[64]'
        ),
        array(
            'field' => 'jenis_kelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'trim|xss_clean|required'
        ),
        array(
            'field' => 'agama',
            'label' => 'Agama',
            'rules' => 'trim|xss_clean|required|callback__cek_agama'
        ),
        
        array(
            'field' => 'tempat_lahir',
            'label' => 'Tempat Lahir',
            'rules' => 'trim|xss_clean|required|max_length[32]'
        ),
        array(
            'field' => 'tanggal_lahir',
            'label' => 'Tanggal Lahir',
            'rules' => 'trim|xss_clean|required|max_length[10]|callback__format_tanggal'
        ),
        array(
            'field' => 'norek',
            'label' => 'No Rek Atas Nama',
            'rules' => 'trim|xss_clean|required|max_length[32]'
        ),
        array(
            'field' => 'jumlah',
            'label' => 'Jumlah Pesanan Kamar',
            'rules' => 'trim|xss_clean|required|max_length[10]'
        ),
        array(
            'field' => 'tmp_alamat',
            'label' => 'Alamat Tinggal',
            'rules' => 'trim|xss_clean|required|max_length[255]'
        ),
        array(
            'field' => 'tmp_telepon',
            'label' => 'Telepon Tempat Tinggal',
            'rules' => 'trim|xss_clean|required|max_length[16]'
        ),
        
        
    );

    public function simpan($konsumen)
    {
        $konsumen = (object)$konsumen;

        // Set status biodata.
        $konsumen->status_biodata = '1';

        // Ubah tanggal lahir ke format yyyy-mm-dd
        $konsumen->tanggal_lahir = date_to_en($konsumen->tanggal_lahir);

        // Format huruf depan kapital sebelum disimpan
        $konsumen->nama = format_title_case($konsumen->nama);
        
        $konsumen->tempat_lahir = format_title_case($konsumen->tempat_lahir);
        $konsumen->tmp_alamat = format_title_case($konsumen->tmp_alamat);
        
        // Jika agama dipilih, set keterangan agama null
        
        return $this->update($konsumen->id, $konsumen);
    }
}