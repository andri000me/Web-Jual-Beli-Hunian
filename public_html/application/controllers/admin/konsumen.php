<?php
class Konsumen extends Operator_Controller
{
    public $data = array(
        'halaman' => 'konsumen',
        'main_view' => 'admin/konsumen_list',
        'title' => 'Data Konsumen',
    );

    public function index($offset = 0)
    {
        $konsumen = $this->konsumen->get_all_paged($offset);
        if ($konsumen) {
            $this->data['konsumen'] = $konsumen;
            $this->data['paging'] = $this->konsumen->paging('biasa', site_url('admin/konsumen/halaman/'), 4);
        } else {
            $this->data['konsumen'] = 'Tidak ada data konsumen.';
        }
        $this->load->view($this->layout, $this->data);
    }

    public function cari($offset = 0)
    {
        $konsumen = $this->konsumen->cari($offset);
        if ($konsumen) {
            $this->data['konsumen'] = $konsumen;
            $this->data['paging'] = $this->konsumen->paging('pencarian', site_url('admin/konsumen/cari/'), 4);
        } else {
            $this->data['konsumen'] = 'Data tidak ditemukan.'. anchor('admin/konsumen', ' Tampilkan semua konsumen.', 'class="alert-link"');
        }
        $this->load->view($this->layout, $this->data);
    }

    public function cetak($id)
    {
        // Pastikan data konsumen ada.
        $konsumen = $this->konsumen->get($id);
        if (! $konsumen) {
            $this->session->set_flashdata('pesan_error', 'Data konsumen tidak ada. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/error');
        }
        $data['konsumen'] = $konsumen;

        // Template untuk PDF, return view sbg string
        $html = $this->load->view('dashboard/biodata_pdf', $data, true);
        // Nomor perserta (untuk nama file)
        $no_konsumen = format_no_konsumen($id);

        // Cetak dengan html2pdf
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            $html2pdf->Output('biodata_'.$no_konsumen.'.pdf');
        } catch (HTML2PDF_exception $e) {
            // echo $e;
            $this->session->set_flashdata('pesan_error', 'Maaf, kami mengalami kendala teknis. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/error');
        }
    }

    public function sukses()
    {
        $this->data['main_view'] = 'sukses';
        $this->data['title'] = 'Data Konsumen';
        $this->load->view($this->layout, $this->data);
    }

    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'Data Konsumen';
        $this->load->view($this->layout, $this->data);
    }

    public function hapus($id)
    {
        // Pastikan hanya admin yang bisa menghapus data kontak.
        if ($this->session->userdata('user_level') != 'administrator') {
            $this->session->set_flashdata('pesan_error', 'Anda tidak berhak menghapus data konsumen. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/error');
        }

        // Pastikan data konsumen ada.
        if (! $this->konsumen->get($id)) {
            $this->session->set_flashdata('pesan_error', 'Data konsumen tidak ada. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/error');
        }

        // Hapus
        if ($this->konsumen->delete($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus. Kembali ke halaman '. anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'Data gagal dihapus. Kembali ke halaman '. anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/error');
        }
    }

    // Ubah status verifikasi
    public function ubah_status_verifikasi($id)
    {
        // Pastikan data konsumen ada.
        $konsumen = $this->konsumen->get($id);
        if (! $konsumen) {
            $this->session->set_flashdata('pesan_error', 'Data konsumen tidak ada. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/error');
        }

        // Ubah status verifikasi
        if ($this->konsumen->ubah_status_verifikasi($id, $konsumen->status_verifikasi)) {
            $this->session->set_flashdata('pesan', 'Status verifikasi berhasil diubah. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/sukses');
        } else {
            $this->session->set_flashdata('pesan', 'Status verifikasi gagal diubah. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/error');
        }
    }

    // Ubah status verifikasi
    public function ubah_status_seleksi($id)
    {
        // Pastikan data konsumen ada.
        $konsumen = $this->konsumen->get($id);
        if (! $konsumen) {
            $this->session->set_flashdata('pesan_error', 'Data konsumen tidak ada. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/error');
        }

        // Pastikan data sudah diverifikasi.
        if (! $konsumen->status_verifikasi) {
            $this->session->set_flashdata('pesan_error', 'Data konsumen <strong>belum diverifikasi</strong>. Untuk menentukan hasil-seleksi, data konsumen harus diverifikasi dahulu. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/error');
        }

        // Ubah status seleksi
        if ($this->konsumen->ubah_status_seleksi($id, $konsumen->status_seleksi)) {
            $this->session->set_flashdata('pesan', 'Status seleksi berhasil diubah. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/sukses');
        } else {
            $this->session->set_flashdata('pesan', 'Status seleksi gagal diubah. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen');
        }
    }

    // Ubah status verifikasi
    public function ubah_status_pendaftaran($id)
    {
        // Pastikan data konsumen ada.
        $konsumen = $this->konsumen->get($id);
        if (! $konsumen) {
            $this->session->set_flashdata('pesan_error', 'Data konsumen tidak ada. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/error');
        }

        // Ubah status verifikasi
        if ($this->konsumen->ubah_status_pendaftaran($id, $konsumen->status_pendaftaran)) {
            $this->session->set_flashdata('pesan', 'Status pendaftaran berhasil diubah. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/sukses');
        } else {
            $this->session->set_flashdata('pesan', 'Status pendaftaran gagal diubah. Kembali ke halaman ' . anchor('admin/konsumen', 'konsumen.', 'class="alert-link"'));
            redirect('admin/konsumen/error');
        }
    }
}