<?php
class Admin_model extends MY_Model
{
    protected $form_rules = array(
        array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'trim|xss_clean|required|max_length[32]'
        ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|xss_clean|required|max_length[32]|callback__username_unik'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|xss_clean|callback__is_password_required|max_length[32]|matches[passconf]'
        ),
        array(
            'field' => 'passconf',
            'label' => 'Konfirmasi Password',
            'rules' => 'trim|xss_clean|callback__is_passconf_required|max_length[32]|matches[password]'
        ),
        array(
            'field' => 'level',
            'label' => 'Level',
            'rules' => 'trim|xss_clean|required'
        ),
        array(
            'field' => 'is_blokir',
            'label' => 'Status Blokir',
            'rules' => 'trim|xss_clean|required'
        ),
    );

    public $default_value = array(
        'nama' => '',
        'username' => '',
        'password' => '',
        'passconf' => '',
        'level' => '',
        'is_blokir' => '',
    );

    public function tambah($admin)
    {
        $admin = (object) $admin;
        unset($admin->passconf);
        $admin->password = md5($admin->password);
        return $this->insert($admin);
    }

    public function edit($id, $admin)
    {
        $admin = (object) $admin;
        unset($admin->passconf);

        // Cek password
        if (empty($admin->password)) {
            unset($admin->password);
        } else {
            $admin->password = md5($admin->password);
        }
        return $this->update($id, $admin);
    }
}