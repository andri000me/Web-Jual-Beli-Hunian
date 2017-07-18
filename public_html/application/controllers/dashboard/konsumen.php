<?php
class Konsumen extends Dashboard_Controller
{
    public $data = array(
        'halaman' => 'konsumen',
        'main_view' => 'konsumen_list',
        'title'  => 'Data Konsumen',
    );

    public function index($offset = null)
    {
        $konsumen = $this->konsumen->get_all_paged($offset);
        if ($konsumen) {
            $this->data['konsumen'] = $konsumen;
            $this->data['paging'] = $this->konsumen->paging('biasa', site_url('dashboard/konsumen/halaman/'), 4);
        } else {
            $this->data['konsumen'] = 'Tidak ada data konsumen.';
        }
        $this->data['form_action'] = site_url('dashboard/konsumen/cari');
        $this->load->view($this->layout, $this->data);
    }

    public function cari($offset = 0)
    {
        $konsumen = $this->konsumen->cari($offset);
        if ($konsumen) {
            $this->data['konsumen'] = $konsumen;
            $this->data['paging'] = $this->konsumen->paging('pencarian', site_url('dashboard/konsumen/cari/'), 4);
        } else {
            $this->data['konsumen'] = 'Data tidak ditemukan.'. anchor('dashboard/konsumen', ' Tampilkan semua konsumen.', 'class="alert-link"');
        }
        $this->data['form_action'] = site_url('dashboard/konsumen/cari');
        $this->load->view($this->layout, $this->data);
    }
}