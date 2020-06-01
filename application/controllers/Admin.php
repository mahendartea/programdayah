<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('my_model');
        $this->load->model(array('Model_komponen', 'Model_subkomponen', 'Model_divisi', 'Model_suboutput', 'Model_rencana', 'Model_detail'));
        // $this->load->library('pdf');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function kecamatan()
    {
        $data['title'] = 'Kelola Kecamatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $listkec = $this->my_model->tampil("kecamatan")->result();
        $data['kecamatan'] = $listkec;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kecamatan', $data);
        $this->load->view('templates/footer');
    }

    public function pluskec()
    {
        $namakec = $this->input->post('kec');
        $kec  = ['nm_kec' => $namakec];
        $cekinput = $this->my_model->tambahdata("kecamatan", $kec);
        if ($cekinput) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil disimpan!</div>');
            redirect('admin/kecamatan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal disimpan!</div>');
            redirect('admin/kecamatan');
        }
    }

    public function hapuskec($id)
    {
        $where = array('id' => $id);
        if ($this->my_model->hapus("kecamatan", $where)) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-success' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil dihapus.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Gagal dihapus. Coba lagi.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function editkec($id)
    {
        $data['title'] = 'Edit Kecamatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $cekdata = $this->my_model->cek_data("kecamatan", $where);
        $data['vubah'] = $cekdata->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/vedit_kec', $data);
        $this->load->view('templates/footer');
    }

    public function update_kec()
    {
        $id = trim($this->security->xss_clean($this->input->post('id')));
        $updatekec = trim($this->security->xss_clean($this->input->post('updatekec')));

        $whereId = ['id' => $id];
        $data = array('nm_kec' => $updatekec);
        $updatedata = $this->my_model->update("kecamatan", $whereId, $data);
        if ($updatedata) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-info' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil disimpan..!</div>");
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data gagal disimpan..!</div>");
        }
        redirect('admin/kecamatan');
    }

    public function dayah()
    {
        $data['title'] = 'Data Dayah Terdaftar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->order_by('a.id', 'desc');
        $this->db->select('a.id,a.nm_dayah,a.alamat,a.desa,b.nm_kec,a.telp,a.ka_dayah');
        $this->db->join("kecamatan b", "b.id=a.id_kec");
        $listdayah = $this->my_model->tampil("dayah a")->result();
        $data['dayahs'] = $listdayah;

        $liskec = $this->my_model->tampil('kecamatan');
        $data['liskec'] = $liskec->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dayah', $data);
        $this->load->view('templates/footer');
    }

    public function plusdayah()
    {
        $nmdayah = $this->input->post('nmdayah');
        $alamat = $this->input->post('alamat');
        $desa = $this->input->post('desa');
        $kecamatan = $this->input->post('kecamatan');
        $kontak = $this->input->post('kontak');
        $pidayah = $this->input->post('pidayah');

        $datadayah = ['nm_dayah' => $nmdayah, 'alamat' => $alamat, 'desa' => $desa, 'id_kec' => $kecamatan, 'telp' => $kontak, 'ka_dayah' => $pidayah];

        $cekinput = $this->my_model->tambahdata("dayah", $datadayah);
        if ($cekinput) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil disimpan!</div>');
            redirect('admin/dayah');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal disimpan!</div>');
            redirect('admin/dayah');
        }
    }

    public function hapus_kec($id)
    {
        $where = array('id' => $id);
        if ($this->my_model->hapus("dayah", $where)) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-success' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil dihapus.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Gagal dihapus. Coba lagi.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function vedit_dayah($id)
    {
        $data['title'] = 'Edit Dayah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('a.id' => $id);
        $this->db->select('a.id,a.nm_dayah,a.alamat,a.desa,a.id_kec,a.telp,a.ka_dayah,b.nm_kec');
        $this->db->join('kecamatan b', 'a.id_kec=b.id');
        $cekdata = $this->my_model->cek_data("dayah a", $where);
        $data['veddayah'] = $cekdata->result();

        $liskec = $this->my_model->tampil('kecamatan');
        $data['liskec'] = $liskec->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/vedit_dayah', $data);
        $this->load->view('templates/footer');
    }

    public function update_dayah()
    {
        $id = trim($this->security->xss_clean($this->input->post('id')));
        $updnamadayah = trim($this->security->xss_clean($this->input->post('updnamadayah')));
        $uptalamat = trim($this->security->xss_clean($this->input->post('uptalamat')));
        $upddesa = trim($this->security->xss_clean($this->input->post('upddesa')));
        $updkec = trim($this->security->xss_clean($this->input->post('updkec')));
        $updkontak = trim($this->security->xss_clean($this->input->post('updkontak')));
        $updkdayah = trim($this->security->xss_clean($this->input->post('updkdayah')));

        $whereid = ['id' => $id];
        $data = ['nm_dayah' => $updnamadayah, 'alamat' => $uptalamat, 'desa' => $upddesa, 'id_kec' => $updkec, 'telp' => $updkontak, 'ka_dayah' => $updkdayah];

        $updatedayah = $this->my_model->update('dayah', $whereid, $data);

        if ($updatedayah) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-info' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil disimpan..!</div>");
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data gagal disimpan..!</div>");
        }
        redirect('admin/dayah');
    }

    public function petugas()
    {
        $data['title'] = 'Data Tim Koordinator Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $listpetugas = $this->my_model->tampil("petugas")->result();
        $data['petugas'] = $listpetugas;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/petugas', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_petugas($id)
    {
        $where = array('id' => $id);
        if ($this->my_model->hapus("petugas", $where)) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-success' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil dihapus.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Gagal dihapus. Coba lagi.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function pluspetugas()
    {
        $nip = $this->input->post('nip');
        $nmpetugas = $this->input->post('nmpetugas');
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        $alamat = $this->input->post('alamat');
        $kontak = $this->input->post('kontak');

        $password = password_hash($pass, PASSWORD_DEFAULT);

        $datapetugas = ['nip' => $nip, 'nama' => $nmpetugas, 'username' => $username, 'pass' => $password, 'alamat' => $alamat, 'notelp' => $kontak, 'level' => 2];

        $cekinput = $this->my_model->tambahdata("petugas", $datapetugas);
        if ($cekinput) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil disimpan!</div>');
            redirect('admin/petugas');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal disimpan!</div>');
            redirect('admin/petugas');
        }
    }

    public function vedit_petugas($id)
    {
        $data['title'] = 'Edit Petugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);

        $cekdata = $this->my_model->cek_data("petugas", $where);
        $data['edpetugas'] = $cekdata->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/vedit_petugas', $data);
        $this->load->view('templates/footer');
    }

    public function update_petugas()
    {
        $id = trim($this->security->xss_clean($this->input->post('id')));
        $upnip = trim($this->security->xss_clean($this->input->post('upnip')));
        $uptnama = trim($this->security->xss_clean($this->input->post('uptnama')));
        $uusername = trim($this->security->xss_clean($this->input->post('uusername')));
        $upalamat = trim($this->security->xss_clean($this->input->post('upalamat')));
        $upkontak = trim($this->security->xss_clean($this->input->post('upkontak')));

        $whereid = ['id' => $id];
        $data = ['nip' => $upnip, 'nama' => $uptnama, 'username' => $uusername, 'alamat' => $upalamat, 'notelp' => $upkontak];

        $updatepetugas = $this->my_model->update('petugas', $whereid, $data);

        if ($updatepetugas) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-info' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil disimpan..!</div>");
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data gagal disimpan..!</div>");
        }
        redirect('admin/petugas');
    }

    public function ubpass($id)
    {
        $data['title'] = 'Ubah Password Petugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = ['id' => $id];

        $card = $this->my_model->cek_data('petugas', $where);
        $data['passgan'] = $card->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/vu_pass', $data);
        $this->load->view('templates/footer');
    }

    public function update_pass()
    {
        $id = trim($this->security->xss_clean($this->input->post('id')));
        $pass = trim($this->security->xss_clean($this->input->post('pass')));

        $whereid = ['id' => $id];
        $passs = password_hash($pass, PASSWORD_DEFAULT);
        $password = ['pass' => $passs];

        $updpass = $this->my_model->update('petugas', $whereid, $password);

        if ($updpass) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-info' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password Berhasil dirubah..!</div>");
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password gagal dirubah..!</div>");
        }
        redirect('admin/petugas');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function program()
    {
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->join('petugas c', 'c.id = a.id_koor');
        $this->db->join('dayah b', 'b.id=a.id_dayah');
        $listkegiatan = $this->my_model->tampil("program a")->result();
        $data['program'] = $listkegiatan;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/program', $data);
        $this->load->view('templates/footer');
    }

    function detailprog($id)
    {
        $data['title'] = 'Detail Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = ['a.id' => $id];
        $this->db->join('petugas c', 'c.id = a.id_koor');
        $this->db->join('dayah b', 'b.id=a.id_dayah');
        $detailprogram = $this->my_model->cek_data('program a', $where);
        $data['progdetail'] = $detailprogram->result();

        $where = ['id_keg' => $id];
        $detailrincian = $this->my_model->cek_data('rincian', $where);
        $data['rincian'] = $detailrincian->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detailprogram', $data);
        $this->load->view('templates/footer');
    }
}
