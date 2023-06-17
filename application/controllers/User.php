<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
    $this->load->view('user/' . $file, $data);
    $this->load->view('parts/footer', $data);
  }

  public function index()
  {
    if ($this->session->userdata('level') !== 'Administrator') {
      $message_403 = "You don't have access to the url you where trying to reach.";
      show_error($message_403 , 403 );
    }
    $data = [
      'title' => 'List User',
      'user' => $this->user_model->get_all()
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
      'title' => 'Tambah User',
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
    $this->user_model->tambah();
    $this->session->set_flashdata('sukses', 'User berhasil ditambahkan!');
    redirect('user');
  }

  function edit($id)
  {
    if ($this->session->userdata('level') !== 'Administrator') {
      $message_403 = "You don't have access to the url you where trying to reach.";
      show_error($message_403 , 403 );
    }
    $data = [
      'title' => 'Edit User',
      'user' => $this->user_model->get_user($id),
      'prodi' => $this->prodi_model->get_all()
    ];

    $this->loadView('edit', $data);
  }

  function proses_edit()
  {
    if ($this->session->userdata('level') !== 'Administrator') {
      $message_403 = "You don't have access to the url you where trying to reach.";
      show_error($message_403 , 403 );
    }
    $this->user_model->edit();
    $this->session->set_flashdata('sukses', 'User berhasil diedit!');
    redirect('user');
  }

  function hapus($id)
  {
    if ($this->session->userdata('level') !== 'Administrator') {
      $message_403 = "You don't have access to the url you where trying to reach.";
      show_error($message_403 , 403 );
    }
    $this->user_model->hapus($id);
    $this->session->set_flashdata('sukses', 'User berhasil dihapus!');
    redirect('user');
  }

  function profil()
  {
    $id = $this->session->userdata('id');
    $data = [
      'title' => 'Profil Saya',
      'user' => $this->user_model->get_user($id),
      'prodi' => $this->prodi_model->get_all()
    ];

    $this->loadView('profil', $data);
  }
}

/* End of file User.php */
