<?php
class Admin extends Admin_Controller
{
    public $data = array(
        'halaman' => 'admin',
        'main_view' => 'admin/admin_list',
        'title' => 'Data Admin',
    );

	// Perlu mendefisikan ulang, karena lokasi model tidak standar
	// yaitu di bawah folder "admin" -> model/admin
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Admin_model', 'admin');
    }

    public function index()
    {
        $admin = $this->admin->get_all();
        if ($admin) {
            $this->data['admin'] = $admin;
        } else {
            $this->data['admin'] = 'Tidak ada data admin.';
        }
        $this->load->view($this->layout, $this->data);
    }
    
    public function tambah()
    {
        $this->data['main_view'] = 'admin/admin_form';
        $this->data['form_action'] = site_url('admin/admin/tambah');

        // Data untuk form.
        if (! $_POST) {
            $admin = (object) $this->admin->default_value;
            $admin->password = '';
            $admin->passconf = '';
        } else {
            $admin = $this->input->post(null, true);
        }

        // Validasi.
        if (! $this->admin->validate('form_rules')) {
            $this->data['values'] = (object) $admin;
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Simpan ke DB.
        if ($this->admin->tambah($admin)) {
            $this->session->set_flashdata('pesan', 'admin berhasil disimpan. Kembali ke halaman ' . anchor('admin/admin', 'admin.', 'class="alert-link"'));
            redirect('admin/admin/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'admin gagal disimpan. Kembali ke halaman ' . anchor('admin/admin', 'admin.', 'class="alert-link"'));
            redirect('admin/admin/error');
        }
    }

    public function edit($id = null)
    {
        // Pastikan data admin ada.
        $admin = $this->admin->get($id);
        if (! $admin) {
            $this->session->set_flashdata('pesan_error', 'Data admin tidak ada. Kembali ke halaman ' . anchor('admin/admin', 'admin.', 'class="alert-link"'));
            redirect('admin/admin/error');
        }

        // Data untuk form.
        if (!$_POST) {
            $data = (object) $admin;
            $data->password = '';
            $data->passconf = '';
        } else {
            $data = (object) $this->input->post(null, true);
        }
        $this->data['values'] = $data;

        // Validasi.
        if (! $this->admin->validate('form_rules')) {
            $this->data['main_view'] = 'admin/admin_form';
            $this->data['form_action'] = site_url('admin/admin/edit/'.$id);
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Simpan admin.
        if ($this->admin->edit($id, $data)) {
            $this->session->set_flashdata('pesan', 'admin berhasil disimpan. Kembali ke halaman ' . anchor('admin/admin', 'admin.', 'class="alert-link"'));
            redirect('admin/admin/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'admin berhasil disimpan. Kembali ke halaman ' . anchor('admin/admin', 'admin.', 'class="alert-link"'));
            redirect('admin/admin/error');
        }
    }

    public function sukses()
    {
        $this->data['main_view'] = 'sukses';
        $this->data['title'] = 'Data Admin';
        $this->load->view($this->layout, $this->data);
    }

    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'Data Admin';
        $this->load->view($this->layout, $this->data);
    }

    public function hapus($id)
    {
        // Pastikan data admin ada.
        if (! $this->admin->get($id)) {
            $this->session->set_flashdata('pesan_error', 'Data admin tidak ada. Kembali ke halaman ' . anchor('admin/admin', 'admin.', 'class="alert-link"'));
            redirect('admin/admin/error');
        }

        // Hapus
        if ($this->admin->delete($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus. Kembali ke halaman '. anchor('admin/admin', 'admin.', 'class="alert-link"'));
            redirect('admin/admin/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'Data gagal dihapus. Kembali ke halaman '. anchor('admin/admin', 'admin.', 'class="alert-link"'));
            redirect('admin/admin/error');
        }
    }

    // Kolom "password" harus diisi hanya untuk proses tambah.
    // Jika "id" ada di URL (edit), maka password tidak "required"
    public function _is_password_required()
    {
        $id = $this->uri->segment(4);
        if (empty($id)) {
            $password = $this->input->post('password', true);
            if (empty($password)) {
                $this->form_validation->set_message('_is_password_required', '%s harus diisi.');
                return false;
            }
        }
        return true;
    }

    // Jika "password" diisi, maka "passconf" harus diisi
    public function _is_passconf_required()
    {
        $password = $this->input->post('password', true);
        if (! empty($password)) {
            $passconf = $this->input->post('passconf', true);
            if (empty($passconf)) {
                $this->form_validation->set_message('_is_passconf_required', '%s harus diisi.');
                return false;
            }
        }
        return true;
    }

    public function _username_unik()
    {
        $id = $this->uri->segment(4);
        $this->db->where('username', $this->input->post('username'));
        !$id || $this->db->where('id !=', $id);
        $admin = $this->admin->get_all();

        if (count($admin)) {
            $this->form_validation->set_message('_username_unik', '%s sudah digunakan.');
            return false;
        }
        return true;
    }
}