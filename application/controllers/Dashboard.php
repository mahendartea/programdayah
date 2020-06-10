<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->model('my_model');
      $this->load->helper('download');
      $this->load->helper(array('url'));
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

      $whereidpro = ['a.id' => $id];
      $this->db->join('program b', 'b.id = a.id_keg');
      $detailprogres = $this->my_model->cek_data('progres a', $whereidpro);
      $data['pregresd'] = $detailprogres->result();
      // var_dump($data['pregresd']);


      $this->load->view('templates/headermonitor', $data);
      $this->load->view('templates/sidebarmonitor', $data);
      $this->load->view('templates/topbarmonitor', $data);
      $this->load->view('monitor/formprogres', $data);
      $this->load->view('templates/footermonitor', $data);
   }

   function simpanprogress()
   {
      var_dump($_POST);
   }
}
