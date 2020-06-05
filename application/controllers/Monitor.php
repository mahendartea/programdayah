<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitor extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->model('My_model');
      $this->load->helper('download');
      $this->load->helper(array('url'));
      $this->load->library('pagination');
      ini_set('date.timezone', 'Asia/Jakarta');
   }

   function index()
   {
      $data['title'] = 'Monitor Pembangunan Dayah';

      $this->load->view('templates/auth_header', $data);
      $this->load->view('monitor/login', $data);
      $this->load->view('templates/auth_footer');
   }

   function ceklogin()
   {
      $username = trim($this->security->xss_clean($this->input->post('username')));
      $password = trim($this->security->xss_clean($this->input->post('password')));


      // echo password_hash($password, PASSWORD_DEFAULT);

      $where = array('username' => $username);
      $akses = $this->My_model->cek_data("petugas", $where);
      if ($akses->num_rows() >= 1) {
         $data = $akses->row_array();
         if (password_verify($password, $data['pass'])) {
            $session['id'] = $data['id'];
            $session['username'] = $data['username'];
            $session['nama'] = $data['nama'];
            $session['level'] = $data['level'];
            $this->session->set_userdata($session);
            redirect('dashboard');
         } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username dan Password Salah!</div>');
            redirect('monitor');
         }
      } else {
         $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username dan Password Salah</div>');
         redirect('monitor');
      }
   }
   public function logout()
   {
      $this->session->sess_destroy();
      redirect('monitor');
   }
}
