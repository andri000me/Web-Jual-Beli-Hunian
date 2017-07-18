<?php
class Jadwalad extends Admin_Controller
{
    public $data = array(
        'halaman' => 'jadwal',
        'main_view' => 'jadwalad',
        'title' => 'Cek Ketersediaan Kamar',
    );

    public function index()
    {
        $this->load->view($this->layout, $this->data);
    }
}