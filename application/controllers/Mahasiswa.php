<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
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
    $this->load->view('mahasiswa/' . $file, $data);
    $this->load->view('parts/footer', $data);
  }

  public function index()
  {
    if ($this->session->userdata('level') == 'Mahasiswa') {
      $message_403 = "You don't have access to the url you where trying to reach.";
      show_error($message_403 , 403 );
    }
    $data = [
      'title' => 'List Mahasiswa',
      'mahasiswa' => $this->mahasiswa_model->get_all()
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
      'title' => 'Tambah Mahasiswa',
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
    $this->mahasiswa_model->tambah();
    $this->session->set_flashdata('sukses', 'Mahasiswa berhasil ditambahkan!');
    redirect('mahasiswa');
  }

  function edit($nim)
  {
    $data = [
      'title' => 'Edit Mahasiswa',
      'mahasiswa' => $this->mahasiswa_model->get_mahasiswa($nim),
      'prodi' => $this->prodi_model->get_all()
    ];

    $this->loadView('edit', $data);
  }

  function proses_edit()
  {
    $this->mahasiswa_model->edit();
    $this->session->set_flashdata('sukses', 'Mahasiswa berhasil diedit!');
    if ($this->session->userdata('level') !== 'Administrator') {
      // $message_403 = "You don't have access to the url you where trying to reach.";
      // show_error($message_403 , 403 );
      redirect('user/profil');
    }
    redirect('mahasiswa');
  }

  function hapus($nim)
  {
    if ($this->session->userdata('level') !== 'Administrator') {
      $message_403 = "You don't have access to the url you where trying to reach.";
      show_error($message_403 , 403 );
    }
    $this->mahasiswa_model->hapus($nim);
    $this->session->set_flashdata('sukses', 'Mahasiswa berhasil dihapus!');
    redirect('mahasiswa');
  }
}

/* End of file Mahasiswa.php */
