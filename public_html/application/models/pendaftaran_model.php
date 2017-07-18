<?php
class Pendaftaran_model extends MY_Model
{
    public $_tabel = 'tb_konsumen';

    public $form_rules = array(
        array(
            'field' => 'ktp',
            'label' => 'KTP',
            'rules' => 'trim|xss_clean|required|exact_length[16]|is_unique[tb_konsumen.ktp]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|xss_clean|required|max_length[64]|is_unique[tb_konsumen.email]'
        ),
         array(
            'field' => 'tanggal_pesan',
            'label' => 'Tanggal Pesan',
            'rules' => 'trim|xss_clean|required|max_length[10]'
        ),
        array(
            'field' => 'nama',
            'label' => 'Nama Lengkap',
            'rules' => 'trim|xss_clean|required|max_length[64]'
        ),
         array(
            'field' => 'tempat_lahir',
            'label' => 'Tempat Lahir',
            'rules' => 'trim|xss_clean|required|max_length[32]'
        ),
         array(
            'field' => 'tanggal_lahir',
            'label' => 'Tanggal Lahir',
            'rules' => 'trim|xss_clean|required|max_length[10]'
        ),
         array(
            'field' => 'tmp_alamat',
            'label' => 'Alamat',
            'rules' => 'trim|xss_clean|required|max_length[255]'
        ),
         array(
            'field' => 'tmp_telepon',
            'label' => 'Telepon',
            'rules' => 'trim|xss_clean|required|max_length[16]'
        ),
         array(
            'field' => 'jenis_kelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'trim|xss_clean|required|'
        ),
         array(
            'field' => 'agama',
            'label' => 'Agama',
            'rules' => 'trim|xss_clean|required|'
        ),
        array(
            'field' => 'captcha',
            'label' => 'Captcha',
            'rules' => 'trim|xss_clean|required|exact_length[4]|callback__validate_captcha'
        ),
    );

    public $default_values = array(
        'ktp' => '',
        'email' => '',
        'nama' => '',
        'tanggal_pesan' => '',
        'tempat_lahir' => '',
        'tanggal_lahir' => '',
        'tmp_alamat' => '',
        'tmp_telepon' => '',
        'jenis_kelamin' => '',
        'agama' => '',
        'captcha' => '',
    );

    public function daftar($konsumen)
    {
        // Data captcha tidak perlu disimpan di DB.
        unset($konsumen->captcha);

        // Generate random string username dan password untuk login user.
        $konsumen->username = random_string('alnum', 8);
        $konsumen->password = random_string('alnum', 8);

        // Proses insert data ke tabel tb_konsumen.
        $id = $this->insert($konsumen);
        if ($id) {
            $no_konsumen = format_no_konsumen($id);

            // Set data untuk ditampilkan.
            $data_session = array(
                'nomor_konsumen' => $no_konsumen,
                'username' => $konsumen->username,
                'password' => $konsumen->password,
                'email' => $konsumen->email,
            );
            $this->session->set_userdata($data_session);
            return true;
        }
        return false;
    }

    public function reset_konsumen()
    {
        $data_session = array(
            'nomor_konsumen' => '',
            'username'  => '',
            'password'  => '',
            'email' => '',
        );
        $this->session->unset_userdata($data_session);
    }
}