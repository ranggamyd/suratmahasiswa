<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class SC extends CI_Controller
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
    $this->load->view('sc/' . $file, $data);
    $this->load->view('parts/footer', $data);
  }

  public function index()
  {
    $data = [
      'title' => 'Surat Cuti',
      'sc' => $this->sc_model->get_all()
    ];

    $this->loadView('index', $data);
  }

  function detail($id)
  {
    $data = [
      'title' => 'Detail Surat Cuti',
      'sc' => $this->sc_model->get_sc($id)
    ];

    $this->loadView('detail', $data);
  }

  function buat()
  {
    $data = [
      'title' => 'Buat SC',
      'no_surat' => $this->sc_model->set_no_surat(),
      'mhs' => $this->mahasiswa_model->get_active_mhs(),
      'kaprodi' => $this->kaprodi_model->get_all(),
      'format_default' => $this->format_surat_default_model->get_sc(),
      'js' => 'sc.js'
    ];

    $this->loadView('buat', $data);
  }

  function proses_buat()
  {
    $this->sc_model->buat();
    $this->session->set_flashdata('sukses', 'SC berhasil dibuatkan!');
    redirect('sc');
  }

  function edit($id)
  {
    $data = [
      'title' => 'Buat SC',
      'sc' => $this->sc_model->get_sc($id),
      'mhs' => $this->mahasiswa_model->get_active_mhs(),
      'kaprodi' => $this->kaprodi_model->get_all(),
      'js' => 'sc.js'
    ];

    $this->loadView('edit', $data);
  }

  function proses_edit()
  {
    $this->sc_model->edit();
    $this->session->set_flashdata('sukses', 'SC berhasil diedit!');
    redirect('sc');
  }

  function hapus($id)
  {
    $this->sc_model->hapus($id);
    $this->session->set_flashdata('sukses', 'SC berhasil dihapus!');
    redirect('sc');
  }

  public function download_pdf($id)
  {
    $sc = $this->sc_model->get_sc($id);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $konten = '
      <html>
        <head>
          <title>' . $sc->no_surat . '</title>
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
            ' . $sc->body_surat . '
          </div>
        </body>
      </html>';

    $dompdf->loadHtml($konten);

    $dompdf->render();
    // $dompdf->stream('file.pdf', ['Attachment' => false]);

    $output = $dompdf->output();

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="SC-' . $sc->no_surat . '.pdf"');
    header('Content-Length: ' . strlen($output));

    echo $output;
  }

  public function cetak_pdf($id)
  {
    $sc = $this->sc_model->get_sc($id);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $konten = '
      <html>
        <head>
          <title>' . $sc->no_surat . '</title>
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
            ' . $sc->body_surat . '
          </div>
        </body>
      </html>';

    $dompdf->loadHtml($konten);

    $dompdf->render();
    $dompdf->stream('SC-' . $sc->no_surat . '.pdf', ['Attachment' => false]);

    // $output = $dompdf->output();

    // header('Content-Type: application/pdf');
    // header('Content-Disposition: attachment; filename="SC-' . $sc->no_surat . '.pdf"');
    // header('Content-Length: ' . strlen($output));

    // echo $output;
  }
}

/* End of file SC.php */