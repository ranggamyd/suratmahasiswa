<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
  function __construct()
  {
      parent::__construct();
      if (!$this->auth_model->current_user()) {
          $this->session->set_flashdata('gagal', 'Gagal mengakses, Silahkan login kembali !');
          redirect('auth');
      }
      if ($this->session->userdata('level') !== 'Administrator') {
        $message_403 = "You don't have access to the url you where trying to reach.";
        show_error($message_403 , 403 );
      }
  }

  function loadView($file, $data)
  {
    $this->load->view('parts/header', $data);
    $this->load->view('prodi/' . $file, $data);
    $this->load->view('parts/footer', $data);
  }

  public function index()
  {
    $data = [
      'title' => 'List Prodi',
      'prodi' => $this->prodi_model->get_all()
    ];

    $this->loadView('index', $data);
  }

  function tambah()
  {
    $data = [
      'title' => 'Tambah Prodi'
    ];

    $this->loadView('tambah', $data);
  }

  function proses_tambah()
  {
    $this->prodi_model->tambah();
    $this->session->set_flashdata('sukses', 'Prodi berhasil ditambahkan!');
    redirect('prodi');
  }

  function edit($id)
  {
    $data = [
      'title' => 'Edit Prodi',
      'prodi' => $this->prodi_model->get_prodi($id)
    ];

    $this->loadView('edit', $data);
  }

  function proses_edit()
  {
    $this->prodi_model->edit();
    $this->session->set_flashdata('sukses', 'Prodi berhasil diedit!');
    redirect('prodi');
  }

  function hapus($id)
  {
    $this->prodi_model->hapus($id);
    $this->session->set_flashdata('sukses', 'Prodi berhasil dihapus!');
    redirect('prodi');
  }
}

/* End of file Prodi.php */
