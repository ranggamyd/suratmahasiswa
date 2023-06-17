<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi extends CI_Controller
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
    $this->load->view('kaprodi/' . $file, $data);
    $this->load->view('parts/footer', $data);
  }

  public function index()
  {
    if ($this->session->userdata('level') !== 'Administrator') {
      $message_403 = "You don't have access to the url you where trying to reach.";
      show_error($message_403 , 403 );
    }
    $data = [
      'title' => 'List Kaprodi',
      'kaprodi' => $this->kaprodi_model->get_all()
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
      'title' => 'Tambah Kaprodi',
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
    $this->kaprodi_model->tambah();
    $this->session->set_flashdata('sukses', 'Kaprodi berhasil ditambahkan!');
    redirect('kaprodi');
  }

  function edit($nidn)
  {
    $data = [
      'title' => 'Edit Kaprodi',
      'kaprodi' => $this->kaprodi_model->get_kaprodi($nidn),
      'prodi' => $this->prodi_model->get_all()
    ];

    $this->loadView('edit', $data);
  }

  function proses_edit()
  {
    $this->kaprodi_model->edit();
    $this->session->set_flashdata('sukses', 'Kaprodi berhasil diedit!');
    if ($this->session->userdata('level') !== 'Administrator') {
      // $message_403 = "You don't have access to the url you where trying to reach.";
      // show_error($message_403 , 403 );
      redirect('user/profil');
    }
    redirect('kaprodi');
  }

  function hapus($nidn)
  {
    if ($this->session->userdata('level') !== 'Administrator') {
      $message_403 = "You don't have access to the url you where trying to reach.";
      show_error($message_403 , 403 );
    }
    $this->kaprodi_model->hapus($nidn);
    $this->session->set_flashdata('sukses', 'Kaprodi berhasil dihapus!');
    redirect('kaprodi');
  }
}

/* End of file Kaprodi.php */
