<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class SOKP extends CI_Controller
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
    $this->load->view('sokp/' . $file, $data);
    $this->load->view('parts/footer', $data);
  }

  public function index()
  {
    $data = [
      'title' => 'Surat Observasi Kunjungan Perusahaan',
      'sokp' => $this->sokp_model->get_all()
    ];

    $this->loadView('index', $data);
  }

  function detail($id)
  {
    $data = [
      'title' => 'Detail Surat Observasi Kunjungan Perusahaan',
      'sokp' => $this->sokp_model->get_sokp($id)
    ];

    $this->loadView('detail', $data);
  }

  function buat()
  {
    $data = [
      'title' => 'Buat SOKP',
      'no_surat' => $this->sokp_model->set_no_surat(),
      'mhs' => $this->mahasiswa_model->get_active_mhs(),
      'dekan' => $this->dekan_model->get_all(),
      'format_default' => $this->format_surat_default_model->get_sokp(),
      'js' => 'sokp.js'
    ];

    $this->loadView('buat', $data);
  }

  function proses_buat()
  {
    $this->sokp_model->buat();
    $this->session->set_flashdata('sukses', 'SOKP berhasil dibuatkan!');
    redirect('sokp');
  }

  function edit($id)
  {
    $data = [
      'title' => 'Buat SOKP',
      'sokp' => $this->sokp_model->get_sokp($id),
      'mhs' => $this->mahasiswa_model->get_active_mhs(),
      'dekan' => $this->dekan_model->get_all(),
      'js' => 'sokp.js'
    ];

    $this->loadView('edit', $data);
  }

  function proses_edit()
  {
    $this->sokp_model->edit();
    $this->session->set_flashdata('sukses', 'SOKP berhasil diedit!');
    redirect('sokp');
  }

  function hapus($id)
  {
    $this->sokp_model->hapus($id);
    $this->session->set_flashdata('sukses', 'SOKP berhasil dihapus!');
    redirect('sokp');
  }

  public function download_pdf($id)
  {
    $sokp = $this->sokp_model->get_sokp($id);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $konten = '
      <html>
        <head>
          <title>' . $sokp->no_surat . '</title>
            <style>
              @page{
                margin: .5cm;
              }
              .kop-surat{
                width: 100%;
              }
              .body-surat{
                margin-top: .5cm;
                margin-left: 3cm;
                margin-right: 3cm;
                text-align: justify;
              }
            </style>
        </head>
        <body>
          <img src="' . base_url('assets') . '/dist/img/kop_surat.jpg" alt="Kop Surat" class="kop-surat">
          <div class="body-surat">
            ' . $sokp->body_surat . '
          </div>
        </body>
      </html>';

    $dompdf->loadHtml($konten);

    $dompdf->render();
    // $dompdf->stream('file.pdf', ['Attachment' => false]);

    $output = $dompdf->output();

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="SOKP-' . $sokp->no_surat . '.pdf"');
    header('Content-Length: ' . strlen($output));

    echo $output;
  }

  public function cetak_pdf($id)
  {
    $sokp = $this->sokp_model->get_sokp($id);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $konten = '
      <html>
        <head>
          <title>' . $sokp->no_surat . '</title>
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
            ' . $sokp->body_surat . '
          </div>
        </body>
      </html>';

    $dompdf->loadHtml($konten);

    $dompdf->render();
    $dompdf->stream('SOKP-' . $sokp->no_surat . '.pdf', ['Attachment' => false]);

    // $output = $dompdf->output();

    // header('Content-Type: application/pdf');
    // header('Content-Disposition: attachment; filename="SOKP-' . $sokp->no_surat . '.pdf"');
    // header('Content-Length: ' . strlen($output));

    // echo $output;
  }
}

/* End of file SOKP.php */