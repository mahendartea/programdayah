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

        // $whereId = ['id' => $id];
        // $data = array('nm_kec' => $updatekec);
        // $updatedata = $this->my_model->update("kecamatan", $whereId, $data);
        // if ($updatedata) {
        //     $this->session->set_flashdata("message", "<br/><div class='alert alert-info' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil disimpan..!</div>");
        // } else {
        //     $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data gagal disimpan..!</div>");
        // }
        // redirect('admin/kecamatan');
    }
    // public function index__()
    // {
    //     $data['title'] = 'Dashboard';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     // $dataAnggaran = $this->my_model->tampil("anggaran")->result();
    //     // $data['listanggaran'] = $dataAnggaran;
    //     $totalanggaran = $this->my_model->totalAnggara('anggaran', 'anggaran');
    //     $data['saldo'] = $totalanggaran;

    //     $listpekerjaan = $this->my_model->tampil("pekerjaan")->num_rows();
    //     $data['jmlkerja'] = $listpekerjaan;

    //     $listkonsultan = $this->my_model->tampil("konsultan")->num_rows();
    //     $data['jmlkons'] = $listkonsultan;

    //     $listsuplier = $this->my_model->tampil("suplier")->num_rows();
    //     $data['jmlsup'] = $listsuplier;

    //     $this->db->order_by('id_t');
    //     $this->db->join('pekerjaan b', 'b.id = a.id_kerjaan');
    //     $hitungtransaksi = $this->my_model->tampil("transaksi a")->result();
    //     $total = 0;
    //     foreach ($hitungtransaksi as $transaksi) {
    //         $subtotal = $transaksi->vol * $transaksi->harga;
    //         $total += $subtotal;
    //     }
    //     $data['totaltransaksi'] =  $total;
    //     $sisa = $totalanggaran - $total;
    //     $data['sisaanggaran'] = $sisa;

    //     $data['pesentotal'] = number_format($total / $totalanggaran * 100, 2);
    //     $data['pesensisa'] = number_format($sisa / $totalanggaran * 100, 2);

    //     // $data['transaksi'] = $listransaksi;


    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/index', $data);
    //     $this->load->view('templates/footer');
    // }


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

    public function anggaran()
    {
        $data['title'] = 'Anggaran Tahunan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $dataAnggaran = $this->my_model->tampil("anggaran")->result();
        $data['listanggaran'] = $dataAnggaran;

        // $data['saldo'] = $this->db->query("SELECT SUM(anggaran) FROM anggaran");

        $data['saldo'] = $this->my_model->totalAnggara('anggaran', 'anggaran');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/anggaran', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_anggaran()
    {
        $namaanggaran = $this->input->post('namaanggaran');
        $uraian = $this->input->post('uraian');
        $jmlanggaran = $this->input->post('jmlanggaran');
        $tahunanggaran = $this->input->post('tahunanggaran');

        $jumlahanggaran = preg_replace("/[^0-9]/", "", $jmlanggaran);

        $arrAnggaran  = ['nama_anggaran' => $namaanggaran, 'uraian' => $uraian, 'anggaran' => $jumlahanggaran, 'tahun' => $tahunanggaran, 'access_log' => $this->session->userdata('email')];
        $cekinput = $this->my_model->tambahdata("anggaran", $arrAnggaran);
        if ($cekinput) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil disimpan!</div>');
            redirect('admin/anggaran');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal disimpan!</div>');
            redirect('admin/anggaran');
        }
    }

    public function hapus_anggaran($id)
    {
        $where = array('id' => $id);
        if ($this->my_model->hapus("anggaran", $where)) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-success' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil dihapus.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Gagal dihapus. Coba lagi.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function vedit_anggaran($id)
    {
        $data['title'] = 'Edit Anggaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $cekdata = $this->my_model->cek_data("anggaran", $where);
        $data['vubah'] = $cekdata->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/vedit_anggaran', $data);
        $this->load->view('templates/footer');
    }

    public function update_anggaran()
    {
        $id = trim($this->security->xss_clean($this->input->post('id')));
        $updatenama = trim($this->security->xss_clean($this->input->post('updatenama')));
        $updateuraian = trim($this->security->xss_clean($this->input->post('updateuraian')));
        $updatejml = trim($this->security->xss_clean($this->input->post('updatejml')));
        $updatetahun = trim($this->security->xss_clean($this->input->post('updatetahun')));

        $anggaranUpdate = preg_replace("/[^0-9]/", "", $updatejml);

        $whereId = ['id' => $id];
        $data = array('nama_anggaran' => $updatenama, 'uraian' => $updateuraian, 'anggaran' => $anggaranUpdate, 'tahun' => $updatetahun, 'access_log' => $this->session->userdata('email'));
        $updatedata = $this->my_model->update("anggaran", $whereId, $data);
        if ($updatedata) {
            $this->session->set_flashdata("msg", "<br/><div class='alert alert-info' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil disimpan..!</div>");
        } else {
            $this->session->set_flashdata("msg", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data gagal disimpan..!</div>");
        }
        redirect('admin/anggaran');
    }

    public function pekerjaan()
    {
        $data['title'] = 'Data Pekerjaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $datapekerjaan = $this->my_model->tampil("pekerjaan")->result();
        $data['pekerjaan'] = $datapekerjaan;

        // $data['saldo'] = $this->db->query("SELECT SUM(anggaran) FROM anggaran");

        // $data['saldo'] = $this->my_model->totalAnggara('anggaran', 'anggaran');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pekerjaan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pekerjaan()
    {
        $namapekerjaan = $this->input->post('namapekerjaan');
        $sumber = $this->input->post('sumber');
        $realisasi = $this->input->post('realisasi');
        $volume = $this->input->post('volume');
        $satuan = $this->input->post('satuan');
        $hargarp = $this->input->post('harga');

        $harga = preg_replace("/[^0-9]/", "", $hargarp);

        $arrPekerjaan  = ['nama_pekerjaan' => $namapekerjaan, 'sumber' => $sumber, 'realisasi' => $realisasi];
        $cekinputpekerjaan = $this->my_model->tambahdata("pekerjaan", $arrPekerjaan);
        if ($cekinputpekerjaan) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil disimpan!</div>');
            redirect('admin/pekerjaan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal disimpan!</div>');
            redirect('admin/pekerjaan');
        }
    }

    public function hapus_pekerjaan($id)
    {
        $where = array('id' => $id);
        if ($this->my_model->hapus("pekerjaan", $where)) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-success' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil dihapus.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Gagal dihapus. Coba lagi.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function vedit_pekerjaan($id)
    {
        $data['title'] = 'Edit Pekerjaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $cekdatapekerjaan = $this->my_model->cek_data("pekerjaan", $where);
        $data['pekerjaan'] = $cekdatapekerjaan->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/vedit_pekerjaan', $data);
        $this->load->view('templates/footer');
    }

    public function update_pekerjaan()
    {
        $id = trim($this->security->xss_clean($this->input->post('id')));
        $updatenama = trim($this->security->xss_clean($this->input->post('updatenama')));
        $uptsumber = trim($this->security->xss_clean($this->input->post('uptsumber')));
        $uptrealisasi = trim($this->security->xss_clean($this->input->post('uptrealisasi')));
        $uptvolume = trim($this->security->xss_clean($this->input->post('uptvolume')));
        $uptsatuan = trim($this->security->xss_clean($this->input->post('uptsatuan')));
        $uptharga = trim($this->security->xss_clean($this->input->post('uptharga')));

        $harga = preg_replace("/[^0-9]/", "", $uptharga);

        $whereId = ['id' => $id];
        $data = array('nama_pekerjaan' => $updatenama, 'sumber' => $uptsumber, 'realisasi' => $uptrealisasi, 'volume' => $uptvolume, 'satuan' => $uptsatuan, 'harga' => $harga);
        $updatedata = $this->my_model->update("pekerjaan", $whereId, $data);
        if ($updatedata) {
            $this->session->set_flashdata("msg", "<br/><div class='alert alert-info' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil update..!</div>");
        } else {
            $this->session->set_flashdata("msg", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data gagal disimpan..!</div>");
        }
        redirect('admin/pekerjaan');
    }

    public function rekanan()
    {
        $data['title'] = 'Data Rekanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $datarekanan = $this->my_model->tampil("konsultan")->result();
        $data['rekanan'] = $datarekanan;
        $base_url = 'assets/prov.json';
        $dataprov = file_get_contents($base_url);
        $data['dataprovinsi'] = json_decode($dataprov);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/rekanan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_rekanan()
    {
        $namarekanan = $this->input->post('namarekanan');
        $alamat = $this->input->post('alamat');
        $kecamatan = $this->input->post('kecamatan');
        $kota = $this->input->post('kota');
        $provinsi = $this->input->post('provinsi');
        $telpon = $this->input->post('telpon');
        $keterangan = $this->input->post('keterangan');
        $kodepos = $this->input->post('kodepos');

        $telphone = preg_replace("/[^0-9]/", "", $telpon);

        $arrRekanan  = ['nama_konsultan' => $namarekanan, 'alamat' => $alamat, 'kecamatan' => $kecamatan, 'kota' => $kota, 'kodepos' => $kodepos, 'provinsi' => $provinsi, 'telpon' => $telphone, 'keterangan' => $keterangan];
        $cekinputrekanan = $this->my_model->tambahdata("konsultan", $arrRekanan);
        if ($cekinputrekanan) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil disimpan!</div>');
            redirect('admin/rekanan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal disimpan!</div>');
            redirect('admin/rekanan');
        }
    }

    public function hapus_rekanan($id)
    {
        $where = array('id' => $id);
        if ($this->my_model->hapus("konsultan", $where)) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-success' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil dihapus.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Gagal dihapus. Coba lagi.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function vedit_rekanan($id)
    {
        $data['title'] = 'Edit Rekanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $cekdatarekanan = $this->my_model->cek_data("konsultan", $where);
        $data['rekanan'] = $cekdatarekanan->result();
        $base_url = 'assets/prov.json';
        $dataprov = file_get_contents($base_url);
        $data['dataprovinsi'] = json_decode($dataprov);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/vedit_rekanan', $data);
        $this->load->view('templates/footer');
    }

    public function update_rekanan()
    {
        $id = trim($this->security->xss_clean($this->input->post('id')));
        $updatenama = trim($this->security->xss_clean($this->input->post('updatenama')));
        $uptalmt = trim($this->security->xss_clean($this->input->post('uptalmt')));
        $uptkec = trim($this->security->xss_clean($this->input->post('uptkec')));
        $uptkot = trim($this->security->xss_clean($this->input->post('uptkot')));
        $uptkodepos = trim($this->security->xss_clean($this->input->post('uptkodepos')));
        $uptprov = trim($this->security->xss_clean($this->input->post('uptprov')));
        $upttel = trim($this->security->xss_clean($this->input->post('upttel')));
        $uptket = trim($this->security->xss_clean($this->input->post('uptket')));

        $tepon = preg_replace("/[^0-9]/", "", $upttel);

        $whereId = ['id' => $id];
        $data = array('nama_konsultan' => $updatenama, 'alamat' => $uptalmt, 'kecamatan' => $uptkec, 'kota' => $uptkot, 'kodepos' => $uptkodepos, 'provinsi' => $uptprov, 'telpon' => $tepon, 'keterangan' => $uptket);
        $updatedata = $this->my_model->update("konsultan", $whereId, $data);
        if ($updatedata) {
            $this->session->set_flashdata("msg", "<br/><div class='alert alert-info' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil update..!</div>");
        } else {
            $this->session->set_flashdata("msg", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data gagal disimpan..!</div>");
        }
        redirect('admin/rekanan');
    }

    public function detrekanan($id)
    {
        $data['title'] = 'Detail Rekanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $detailrekanan = $this->my_model->cek_data("konsultan", $where)->result();
        $data['detailrekanan'] = $detailrekanan;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/vedetrekanan', $data);
        $this->load->view('templates/footer');
    }

    public function supplier()
    {
        $data['title'] = 'Data Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $datasuplier = $this->my_model->tampil("suplier")->result();
        $data['suplier'] = $datasuplier;

        $base_url = 'assets/prov.json';
        $dataprov = file_get_contents($base_url);
        $data['dataprovinsi'] = json_decode($dataprov);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/supplier', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_suplier()
    {
        $namasuplier = $this->input->post('namasuplier');
        $alamatsup = $this->input->post('alamatsup');
        $kecamatansup = $this->input->post('kecamatansup');
        $kotasup = $this->input->post('kotasup');
        $kodepossub = $this->input->post('kodepossub');
        $provinsisub = $this->input->post('provinsisub');
        $telponsub = $this->input->post('telponsub');
        $keterangansub = $this->input->post('keterangansub');

        $telphone = preg_replace("/[^0-9]/", "", $telponsub);

        $arrSuplier  = ['nm_supplier' => $namasuplier, 'alamat' => $alamatsup, 'kecamatan' => $kecamatansup, 'kota' => $kotasup, 'kodepos' => $kodepossub, 'provinsi' => $provinsisub, 'telpon' => $telphone, 'keterangan' => $keterangansub];
        $cekinputsuplier = $this->my_model->tambahdata("suplier", $arrSuplier);
        if ($cekinputsuplier) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil disimpan!</div>');
            redirect('admin/supplier');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal disimpan!</div>');
            redirect('admin/supplier');
        }
    }

    public function hapus_suplier($id)
    {
        $where = array('id' => $id);
        if ($this->my_model->hapus("suplier", $where)) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-success' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil dihapus.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Gagal dihapus. Coba lagi.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function vedit_suplier($id)
    {
        $data['title'] = 'Edit Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $cekdatasupplier = $this->my_model->cek_data("suplier", $where);
        $data['suplier'] = $cekdatasupplier->result();

        $base_url = 'assets/prov.json';
        $dataprov = file_get_contents($base_url);
        $data['dataprovinsi'] = json_decode($dataprov);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/vedit_suplier', $data);
        $this->load->view('templates/footer');
    }

    public function update_suplier()
    {
        $id = trim($this->security->xss_clean($this->input->post('id')));
        $uptnmsup = trim($this->security->xss_clean($this->input->post('uptnmsup')));
        $uptalmtsup = trim($this->security->xss_clean($this->input->post('uptalmtsup')));
        $uptkecsup = trim($this->security->xss_clean($this->input->post('uptkecsup')));
        $uptkotsup = trim($this->security->xss_clean($this->input->post('uptkotsup')));
        $uptkdpsup = trim($this->security->xss_clean($this->input->post('uptkdpsup')));
        $uptprovsup = trim($this->security->xss_clean($this->input->post('uptprovsup')));
        $upttelsup = trim($this->security->xss_clean($this->input->post('upttelsup')));
        $uptketsup = trim($this->security->xss_clean($this->input->post('uptketsup')));

        $telfon = preg_replace("/[^0-9]/", "", $upttelsup);

        $whereId = ['id' => $id];
        $data = array('nm_supplier' => $uptnmsup, 'alamat' => $uptalmtsup, 'kecamatan' => $uptkecsup, 'kota' => $uptkotsup, 'kodepos' => $uptkdpsup, 'provinsi' => $uptprovsup, 'telpon' => $telfon, 'keterangan' => $uptketsup);
        $updatedata = $this->my_model->update("suplier", $whereId, $data);
        if ($updatedata) {
            $this->session->set_flashdata("msg", "<br/><div class='alert alert-info' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil update..!</div>");
        } else {
            $this->session->set_flashdata("msg", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data gagal disimpan..!</div>");
        }
        redirect('admin/supplier');
    }

    public function detsuplier($id)
    {
        $data['title'] = 'Detail Rekanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $suplierdetail = $this->my_model->cek_data("suplier", $where)->result();
        $data['suplierdetail'] = $suplierdetail;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/vedetsuplier', $data);
        $this->load->view('templates/footer');
    }

    public function transaksi()
    {
        $data['title'] = 'Rekap Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $listpekerjaan = $this->my_model->tampil("pekerjaan")->result();
        $data['listkerjaan'] = $listpekerjaan;

        $listkonsultan = $this->my_model->tampil("konsultan")->result();
        $data['listrekanan'] = $listkonsultan;

        $listsuplier = $this->my_model->tampil("suplier")->result();
        $data['listsupplier'] = $listsuplier;

        $data['saldo'] = $this->my_model->totalAnggara('anggaran', 'anggaran');

        $this->db->order_by('id_t');
        $this->db->join('pekerjaan b', 'b.id = a.id_kerjaan');
        $listransaksi = $this->my_model->tampil("transaksi a")->result();
        $data['transaksi'] = $listransaksi;




        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function tambahtransaksi()
    {
        $notransaksi = trim($this->security->xss_clean($this->input->post('notransaksi')));
        $thnanggaran = trim($this->security->xss_clean($this->input->post('thnanggaran')));
        $idpekerjaan = trim($this->security->xss_clean($this->input->post('idpekerjaan')));
        $idkonsultan = trim($this->security->xss_clean($this->input->post('idkonsultan')));
        $idsuplier = trim($this->security->xss_clean($this->input->post('idsuplier')));
        $nmbrg = trim($this->security->xss_clean($this->input->post('nmbrg')));
        $volume = trim($this->security->xss_clean($this->input->post('volume')));
        $satuan = trim($this->security->xss_clean($this->input->post('satuan')));
        $harga = trim($this->security->xss_clean($this->input->post('harga')));

        $fixharga = preg_replace("/[^0-9]/", "", $harga);

        $arrSuplier  = ['no_transaksi' => $notransaksi, 'thn_anggaran' => $thnanggaran, 'id_kerjaan' => $idpekerjaan, 'id_kosultan' => $idkonsultan, 'id_suplier' => $idsuplier, 'nm_barang' => $nmbrg, 'vol' => $volume, 'satuan' => $satuan, 'harga' => $fixharga];
        $cekinputsuplier = $this->my_model->tambahdata("transaksi", $arrSuplier);
        if ($cekinputsuplier) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil disimpan!</div>');
            redirect('admin/transaksi');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal disimpan!</div>');
            redirect('admin/transaksi');
        }
    }

    public function hapus_transaksi($id)
    {
        $where = array('id_t' => $id);
        // var_dump($where);
        if ($this->my_model->hapus("transaksi", $where)) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-success' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil dihapus.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data Gagal dihapus. Coba lagi.</div>");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function vedit_transaksi($id)
    {
        $data['title'] = 'Edit Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $whereidt = array('id_t' => $id);
        $this->db->join('pekerjaan b', 'b.id = a.id_kerjaan');
        $this->db->join('konsultan c', 'c.id = a.id_kosultan');
        $this->db->join('suplier d', 'd.id = a.id_suplier');
        $cekdatatransaksi = $this->my_model->cek_data("transaksi a", $whereidt);
        $data['edittransaksi'] = $cekdatatransaksi->result();

        $listpekerjaan = $this->my_model->tampil("pekerjaan")->result();
        $data['listkerjaan'] = $listpekerjaan;

        $listkonsultan = $this->my_model->tampil("konsultan")->result();
        $data['listrekanan'] = $listkonsultan;

        $listsuplier = $this->my_model->tampil("suplier")->result();
        $data['listsupplier'] = $listsuplier;

        $data['saldo'] = $this->my_model->totalAnggara('anggaran', 'anggaran');



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/vedit_transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function update_transaksi()
    {
        $idtrn = trim($this->security->xss_clean($this->input->post('idtrn')));
        $nmrtran = trim($this->security->xss_clean($this->input->post('nmrtran')));
        $thnanggaran = trim($this->security->xss_clean($this->input->post('thnanggaran')));
        $upkrj = trim($this->security->xss_clean($this->input->post('upkrj')));
        $upkons = trim($this->security->xss_clean($this->input->post('upkons')));
        $upsupl = trim($this->security->xss_clean($this->input->post('upsupl')));
        $upnmbrg = trim($this->security->xss_clean($this->input->post('upnmbrg')));
        $upvol = trim($this->security->xss_clean($this->input->post('upvol')));
        $upsatuan = trim($this->security->xss_clean($this->input->post('upsatuan')));
        $upharga = trim($this->security->xss_clean($this->input->post('upharga')));
        $harga = preg_replace("/[^0-9]/", "", $upharga);



        $whereId = ['id_t' => $idtrn,];
        $cekdataup = ['no_transaksi' => $nmrtran, 'thn_anggaran' => $thnanggaran, 'id_kerjaan' => $upkrj, 'id_kosultan' => $upkons, 'id_suplier' => $upsupl, 'nm_barang' => $upnmbrg, 'vol' => $upvol, 'satuan' => $upsatuan,  'harga' => $harga];
        $updatedata = $this->my_model->update("transaksi", $whereId, $cekdataup);
        if ($updatedata) {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-info' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil update..!</div>");
        } else {
            $this->session->set_flashdata("message", "<br/><div class='alert alert-danger' role='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data gagal disimpan..!</div>");
        }
        redirect('admin/transaksi');
    }

    public function dettransaksi($id)
    {
        $data['title'] = 'Detail Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('a.id_t' => $id);
        $this->db->join('pekerjaan b', 'b.id = a.id_kerjaan');
        $this->db->join('konsultan c', 'c.id = a.id_kosultan');
        $this->db->join('suplier d', 'd.id = a.id_suplier');
        $detailtrans = $this->my_model->cek_data("transaksi a", $where)->result();
        $data['detailtrans'] = $detailtrans;



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/vedettransaksi', $data);
        $this->load->view('templates/footer');
    }

    public function cetaklap()
    {
        // $this->load->library('pdfgenerator');

        $listpekerjaan = $this->my_model->tampil("pekerjaan")->result();
        $data['listkerjaan'] = $listpekerjaan;

        $listkonsultan = $this->my_model->tampil("konsultan")->result();
        $data['listrekanan'] = $listkonsultan;

        $listsuplier = $this->my_model->tampil("suplier")->result();
        $data['listsupplier'] = $listsuplier;

        $data['saldo'] = $this->my_model->totalAnggara('anggaran', 'anggaran');

        $tglcetak = trim($this->security->xss_clean($this->input->post('tglcetak')));
        // echo $tglcetak;
        $where = ['thn_anggaran' => $tglcetak];

        $this->db->order_by('id_t');
        $this->db->join('pekerjaan b', 'b.id = a.id_kerjaan');
        $this->db->join('konsultan c', 'c.id = a.id_kosultan');
        $this->db->join('suplier d', 'd.id = a.id_suplier');
        $datatransaksi = $this->my_model->cek_data("transaksi a", $where)->result();

        $data['transaksi'] = $datatransaksi;

        $nummtransaksi = $this->my_model->cek_data("transaksi a", $where)->num_rows();
        if ($nummtransaksi >= 1) {
            $this->load->view('admin/report2', $data);
        } else {
            echo "<h1 align='center'>Tidak Ada Data</h1>";
        }


        // $html = $this->load->view('admin/report', $data, true);

        // $this->pdfgenerator->generate($html, 'cetak urdal');
    }
}
