<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dekan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!$this->auth_model->current_user()) {
      $this->session->set_flashdata('gagal', 'Gagal mengakses, Silahkan login kembali !');
      redirect('auth');
    }
  }

  function loadView($file, $data)
  {
    $this->load->view('parts/header', $data);
    $this->load->view('dekan/' . $file, $data);
    $this->load->view('parts/footer', $data);
  }

  public function index()
  {
    if ($this->session->userdata('level') !== 'Administrator') {
      $message_403 = "You don't have access to the url you where trying to reach.";
      show_error($message_403 , 403 );
    }
    $data = [
      'title' => 'List Dekan',
      'dekan' => $this->dekan_model->get_all()
    ];

    $this->loadView('index', $data);
  }

  function tambah()
  {
    if ($this->session->userdata('level') !== 'Administrator') {
      $message_403 = "You don't have access to the url you where trying to reach.";
      show_error($message_403 , 403 );
    }
    $data = [
      'title' => 'Tambah Dekan',
      'prodi' => $this->prodi_model->get_all()
    ];

    $this->loadView('tambah', $data);
  }

  function proses_tambah()
  {
    if ($this->session->userdata('level') !== 'Administrator') {
      $message_403 = "You don't have access to the url you where trying to reach.";
      show_error($message_403 , 403 );
    }
    $this->dekan_model->tambah();
    $this->session->set_flashdata('sukses', 'Dekan berhasil ditambahkan!');
    redirect('dekan');
  }

  function edit($nidn)
  {
    $data = [
      'title' => 'Edit Dekan',
      'dekan' => $this->dekan_model->get_dekan($nidn),
      'prodi' => $this->prodi_model->get_all()
    ];

    $this->loadView('edit', $data);
  }

  function proses_edit()
  {
    $this->dekan_model->edit();
    $this->session->set_flashdata('sukses', 'Dekan berhasil diedit!');
    if ($this->session->userdata('level') !== 'Administrator') {
      // $message_403 = "You don't have access to the url you where trying to reach.";
      // show_error($message_403 , 403 );
      redirect('user/profil');
    }
    redirect('dekan');
  }

  function hapus($nidn)
  {
    if ($this->session->userdata('level') !== 'Administrator') {
      $message_403 = "You don't have access to the url you where trying to reach.";
      show_error($message_403 , 403 );
    }
    $this->dekan_model->hapus($nidn);
    $this->session->set_flashdata('sukses', 'Dekan berhasil dihapus!');
    redirect('dekan');
  }
}

/* End of file Dekan.php */
