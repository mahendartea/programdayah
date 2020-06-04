<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->model('My_model');
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
}
