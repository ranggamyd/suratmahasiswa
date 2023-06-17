<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class SPS extends CI_Controller
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
    $this->load->view('sps/' . $file, $data);
    $this->load->view('parts/footer', $data);
  }

  public function index()
  {
    $data = [
      'title' => 'Surat Penelitian Skripsi',
      'sps' => $this->sps_model->get_all()
    ];

    $this->loadView('index', $data);
  }

  function detail($id)
  {
    $data = [
      'title' => 'Detail Surat Penelitian Skripsi',
      'sps' => $this->sps_model->get_sps($id)
    ];

    $this->loadView('detail', $data);
  }

  function buat()
  {
    $data = [
      'title' => 'Buat SPS',
      'no_surat' => $this->sps_model->set_no_surat(),
      'mhs' => $this->mahasiswa_model->get_active_mhs(),
      'dekan' => $this->dekan_model->get_all(),
      'format_default' => $this->format_surat_default_model->get_sps(),
      'js' => 'sps.js'
    ];

    $this->loadView('buat', $data);
  }

  function proses_buat()
  {
    $this->sps_model->buat();
    $this->session->set_flashdata('sukses', 'SPS berhasil dibuatkan!');
    redirect('sps');
  }

  function edit($id)
  {
    $data = [
      'title' => 'Buat SPS',
      'sps' => $this->sps_model->get_sps($id),
      'mhs' => $this->mahasiswa_model->get_active_mhs(),
      'dekan' => $this->dekan_model->get_all(),
      'js' => 'sps.js'
    ];

    $this->loadView('edit', $data);
  }

  function proses_edit()
  {
    $this->sps_model->edit();
    $this->session->set_flashdata('sukses', 'SPS berhasil diedit!');
    redirect('sps');
  }

  function hapus($id)
  {
    $this->sps_model->hapus($id);
    $this->session->set_flashdata('sukses', 'SPS berhasil dihapus!');
    redirect('sps');
  }

  public function download_pdf($id)
  {
    $sps = $this->sps_model->get_sps($id);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $konten = '
      <html>
        <head>
          <title>' . $sps->no_surat . '</title>
            <style>
              @page{
                margin: .5cm;
              }
              .kop-surat{
                width: 100%;
              }
              .body-surat{
                margin-top: .5cm;
                margin-right: 3cm;
                // margin-bottom: 3cm;
                margin-left: 3cm;
                text-align: justify;
              }
            </style>
        </head>
        <body>
          <img src="' . base_url('assets') . '/dist/img/kop_surat.jpg" alt="Kop Surat" class="kop-surat">
          <div class="body-surat">
            ' . $sps->body_surat . '
          </div>
        </body>
      </html>';

    $dompdf->loadHtml($konten);

    $dompdf->render();
    // $dompdf->stream('file.pdf', ['Attachment' => false]);

    $output = $dompdf->output();

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="SPS-' . $sps->no_surat . '.pdf"');
    header('Content-Length: ' . strlen($output));

    echo $output;
  }

  public function cetak_pdf($id)
  {
    $sps = $this->sps_model->get_sps($id);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $konten = '
      <html>
        <head>
          <title>' . $sps->no_surat . '</title>
            <style>
              @page{
                margin: .5cm;
              }
              .kop-surat{
                width: 100%;
              }
              .body-surat{
                margin-top: .5cm;
                margin-right: 3cm;
                // margin-bottom: 3cm;
                margin-left: 3cm;
                text-align: justify;
              }
            </style>
        </head>
        <body>
          <img src="' . base_url('assets') . '/dist/img/kop_surat.jpg" alt="Kop Surat" class="kop-surat">
          <div class="body-surat">
            ' . $sps->body_surat . '
          </div>
        </body>
      </html>';

    $dompdf->loadHtml($konten);

    $dompdf->render();
    $dompdf->stream('SPS-' . $sps->no_surat . '.pdf', ['Attachment' => false]);

    // $output = $dompdf->output();

    // header('Content-Type: application/pdf');
    // header('Content-Disposition: attachment; filename="SPS-' . $sps->no_surat . '.pdf"');
    // header('Content-Length: ' . strlen($output));

    // echo $output;
  }
}

/* End of file SPS.php */