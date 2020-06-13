<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->model('my_model');
      $this->load->helper('download');
      $this->load->helper(array('url', 'form'));
      $this->load->library('pagination');
      ini_set('date.timezone', 'Asia/Jakarta');

      if (!$this->session->userdata('username')) {
         $this->session->set_flashdata("msg", "<div class='card bg-danger text-white shadow mb-3'><div class='card-body'>Silahkan login terlebih dahulu</div></div>");
         redirect('login');
      }
   }

   function index()
   {
      $data['title'] = 'Dashboard Monitoring Pembangunan Dayah';
      $data['judul'] = 'Dashboard';

      $this->load->view('templates/headermonitor', $data);
      $this->load->view('templates/sidebarmonitor', $data);
      $this->load->view('templates/topbarmonitor', $data);
      $this->load->view('monitor/dashboard', $data);
      $this->load->view('templates/footermonitor', $data);
   }

   public function listdayah()
   {
      $data['title'] = 'Daftar Dayah Kelola Saya';
      $data['judul'] = 'Dashboard';

      $where = ['a.id_koor' => $this->session->userdata('id')];
      $this->db->order_by('a.id', 'desc');
      $this->db->select('a.id,a.nm_program,a.thn_realisasi,b.nm_dayah,a.status,a.file');
      $this->db->join('dayah b', 'b.id=a.id_dayah');
      $listprogram = $this->my_model->cek_data("program a", $where);
      $data['listdayah'] = $listprogram->result();

      $this->load->view('templates/headermonitor', $data);
      $this->load->view('templates/sidebarmonitor', $data);
      $this->load->view('templates/topbarmonitor', $data);
      $this->load->view('monitor/daftardayah', $data);
      $this->load->view('templates/footermonitor', $data);
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

      $this->load->view('templates/headermonitor', $data);
      $this->load->view('templates/sidebarmonitor', $data);
      $this->load->view('templates/topbarmonitor', $data);
      $this->load->view('monitor/detailprogram', $data);
      $this->load->view('templates/footermonitor', $data);
   }

   function formrincian($id)
   {
      $data['title'] = 'Form Rincian Kegiatan';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $whereidpro = ['id' => $id];
      $infoprog = $this->my_model->cek_data('program', $whereidpro);
      $data['infopro'] = $infoprog->result();

      $this->load->view('templates/headermonitor', $data);
      $this->load->view('templates/sidebarmonitor', $data);
      $this->load->view('templates/topbarmonitor', $data);
      $this->load->view('monitor/formrincian', $data);
      $this->load->view('templates/footermonitor', $data);
   }

   function tambahrincian()
   {
      $idpro = trim($this->security->xss_clean($this->input->post('idpro')));
      $nmitem = trim($this->security->xss_clean($this->input->post('nmitem')));
      $satuan = trim($this->security->xss_clean($this->input->post('satuan')));
      $jumlah = trim($this->security->xss_clean($this->input->post('jumlah')));
      $unitsatuan = trim($this->security->xss_clean($this->input->post('unitsatuan')));

      $danasatuan = preg_replace('/\D/', '', $satuan);
      $jml = preg_replace('/\D/', '', $jumlah);

      $data = ['id_keg' => $idpro, 'nm_item' => $nmitem, 'satuan' => $danasatuan, 'jml' => $jml, 'unitsatuan' => $unitsatuan];
      $tambahdata = $this->my_model->tambahdata("rincian", $data);
      if ($tambahdata) {
         $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data rincian berhasil disimpan!</div>');
         redirect('dashboard/detailprog/' . $idpro);
      } else {
         $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Data rincian gagal disimpan!</div>');
         redirect('dashboard/detailprog' . $idpro);
      }
   }

   function formprogress($id)
   {
      $data['title'] = 'Form Pregres Kegiatan';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $whereidpro = ['id_keg' => $id];
      // $this->db->join('program b', 'b.id = a.id_keg');
      $cekprogres = $this->my_model->cek_data('progres', $whereidpro);
      // var_dump($cekprogres);
      if ($cekprogres->num_rows() == 0) {
         $datapro = ['id_keg' => $id];
         $this->my_model->tambahdata("progres", $datapro);
         $data['idkeg'] = $id;

         $this->load->view('templates/headermonitor', $data);
         $this->load->view('templates/sidebarmonitor', $data);
         $this->load->view('templates/topbarmonitor', $data);
         $this->load->view('monitor/formprogres', $data);
         $this->load->view('templates/footermonitor', $data);
      } else {
         $datapro = ['id_keg' => $id];
         $this->my_model->update("progres", $whereidpro, $datapro);
         $data['idkeg'] = $id;
         $data['progres'] = $cekprogres->result();

         $this->load->view('templates/headermonitor', $data);
         $this->load->view('templates/sidebarmonitor', $data);
         $this->load->view('templates/topbarmonitor', $data);
         $this->load->view('monitor/formprogres', $data);
         $this->load->view('templates/footermonitor', $data);
      }
   }

   function simpanprogress()
   {
      $idkeg = trim($this->security->xss_clean($this->input->post('idkeg')));
      $pro1 = trim($this->security->xss_clean($this->input->post('pro1')));
      $pro2 = trim($this->security->xss_clean($this->input->post('pro2')));
      $pro3 = trim($this->security->xss_clean($this->input->post('pro3')));
      $pro4 = trim($this->security->xss_clean($this->input->post('pro4')));

      // var_dump($_FILES['image']['name']);
      $wherekeg = ['id_keg' => $idkeg];
      $cekdulu = $this->my_model->cek_data('progres', $wherekeg)->result();
      // var_dump($cekdulu);
      foreach ($cekdulu as $c) {
         $foto = $_FILES['image']['name'];
         $files = $_FILES;
         for ($i = 0; $i < count($foto); $i++) {
            $nama_baru = trim($c->id_keg . $i . $foto[$i]);
            echo $nama_baru . '<br>';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '2048';
            $config['upload_path'] = './uploads/img/';
            $config['file_name'] = $nama_baru;
            $config['overwrite'] = TRUE;

            $_FILES['image']['name'] = $files['image']['name'][$i];
            $_FILES['image']['type'] = $files['image']['type'][$i];
            $_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
            $_FILES['image']['error'] = $files['image']['error'][$i];
            $_FILES['image']['size'] = $files['image']['size'][$i];

            $this->load->library('upload', $config);

            $this->upload->initialize($config);
            $updateFoto = $this->upload->do_upload('image');
            if ($updateFoto) {
               $angka = $i + 1;
               $datagambar = ['img' . $angka => $nama_baru, 'progres1' => $pro1, 'progres2' => $pro2, 'progres3' => $pro3, 'progres4' => $pro4];
               $this->my_model->update('progres', $wherekeg, $datagambar);
            } else {
               $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Tidak semua Foto di Simpan/update</div>');
               redirect('Dashboard/listdayah');
            }
         }
      }
      $dataket = ['progres1' => $pro1, 'progres2' => $pro2, 'progres3' => $pro3, 'progres4' => $pro4];
      $update = $this->my_model->update('progres', $wherekeg, $dataket);
      if ($update) {
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Foto dan data berhasil disimpan/update</div>');
         redirect('Dashboard/listdayah');
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan/update</div>');
         redirect('Dashboard/listdayah');
      }
   }
}
