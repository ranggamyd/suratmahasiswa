<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  function loadView($file, $data)
  {
    // $this->load->view('auth/parts/header', $data);
    $this->load->view('auth/' . $file, $data);
    // $this->load->view('auth/parts/footer', $data);
  }

  public function index()
  {
    $data['title'] = 'Masuk';
    $this->loadView('login', $data);
  }

  function login()
  {
    if ($this->auth_model->login()) {
      redirect('dashboard');
    } else {
      $this->session->set_flashdata('gagal', 'Pastikan kredensial anda sesuai!');
      $this->index();
    }
  }

  function logout()
  {
    $this->auth_model->logout();
    $this->session->set_flashdata('sukses', 'Berhasil Keluar!');
    redirect('auth');
  }
}
