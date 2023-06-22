<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class SPKL extends CI_Controller
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
    $this->load->view('spkl/' . $file, $data);
    $this->load->view('parts/footer', $data);
  }

  function send_notification($target, $message)
  {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.fonnte.com/send',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array(
        'target' => $target,
        'message' => $message,
      ),
      CURLOPT_HTTPHEADER => array(
        'Authorization: M9X6wZ#LkpSzwX6teMp#'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function index()
  {
    $data = [
      'title' => 'Surat Praktek Kerja Lapangan',
      'spkl' => $this->spkl_model->get_all()
    ];

    $this->loadView('index', $data);
  }

  function detail($id)
  {
    $data = [
      'title' => 'Detail Surat Praktek Kerja Lapangan',
      'spkl' => $this->spkl_model->get_spkl($id)
    ];

    $this->loadView('detail', $data);
  }

  function buat()
  {
    $data = [
      'title' => 'Buat SPKL',
      'no_surat' => $this->spkl_model->set_no_surat(),
      'mhs' => $this->session->userdata('level') == 'Mahasiswa' ? $this->db->get_where('mhs', ['nim_mhs' => $this->session->userdata('nim_mhs')->result_array()]) : $this->mahasiswa_model->get_active_mhs(),
      'dekan' => $this->dekan_model->get_all(),
      'format_default' => $this->format_surat_default_model->get_spkl(),
      'js' => 'spkl.js'
    ];

    $this->loadView('buat', $data);
  }

  function proses_buat()
  {
    $this->spkl_model->buat();
    $mhs = $this->mahasiswa_model->get_mahasiswa($this->input->post('nim_mhs'));
    $this->send_notification("082340101670", "*== PEMBERITAHUAN ==*\n\nMahasiswa bernama *$mhs->nama_mhs* baru saja mengajukan Surat Praktek Kerja Lapangan. Mohon untuk segera ditindak lanjuti sebagaimana mestinya.\nTerima kasih!");

    $this->session->set_flashdata('sukses', 'SPKL berhasil dibuatkan!');
    redirect('spkl');
  }

  function edit($id)
  {
    $data = [
      'title' => 'Buat SPKL',
      'spkl' => $this->spkl_model->get_spkl($id),
      'mhs' => $this->session->userdata('level') == 'Mahasiswa' ? $this->db->get_where('mhs', ['nim_mhs' => $this->session->userdata('nim_mhs')->result_array()]) : $this->mahasiswa_model->get_active_mhs(),
      'dekan' => $this->dekan_model->get_all(),
      'js' => 'spkl.js'
    ];

    $this->loadView('edit', $data);
  }

  function proses_edit()
  {
    $this->spkl_model->edit();
    $this->session->set_flashdata('sukses', 'SPKL berhasil diedit!');
    redirect('spkl');
  }

  function hapus($id)
  {
    $this->spkl_model->hapus($id);
    $this->session->set_flashdata('sukses', 'SPKL berhasil dihapus!');
    redirect('spkl');
  }

  function terima($id)
  {
    $this->db->update('spkl', ['status_surat' => 'Dikonfirmasi'], ['id_spkl' => $id]);
    $spkl = $this->spkl_model->get_spkl($id);
    $mhs = $this->mahasiswa_model->get_mahasiswa($spkl->nim_mhs);
    $this->send_notification($mhs->no_telp, "*== PEMBERITAHUAN ==*\n\nSurat Praktek Kerja Lapangan anda sudah selesai dibuat. Mohon untuk segera mengambil surat di TU Fakultas.\nTerima kasih!");

    $this->session->set_flashdata('sukses', 'spkl berhasil dikonfirmasi!');
    redirect('spkl');
  }

  function tolak($id)
  {
    $this->db->update('spkl', ['status_surat' => 'Ditolak'], ['id_spkl' => $id]);
    $spkl = $this->spkl_model->get_spkl($id);
    $mhs = $this->mahasiswa_model->get_mahasiswa($spkl->nim_mhs);
    $this->send_notification($mhs->no_telp, "*== PEMBERITAHUAN ==*\n\nSurat Praktek Kerja Lapangan anda ditolak. Mohon untuk segera mengonfirmasikannya dengan TU Fakultas.\nTerima kasih!");

    $this->session->set_flashdata('sukses', 'spkl berhasil ditolak!');
    redirect('spkl');
  }

  public function download_pdf($id)
  {
    $spkl = $this->spkl_model->get_spkl($id);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $konten = '
      <html>
        <head>
          <title>' . $spkl->no_surat . '</title>
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
            ' . $spkl->body_surat . '
          </div>
        </body>
      </html>';

    $dompdf->loadHtml($konten);

    $dompdf->render();
    // $dompdf->stream('file.pdf', ['Attachment' => false]);

    $output = $dompdf->output();

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="SPKL-' . $spkl->no_surat . '.pdf"');
    header('Content-Length: ' . strlen($output));

    echo $output;
  }

  public function cetak_pdf($id)
  {
    $spkl = $this->spkl_model->get_spkl($id);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $konten = '
      <html>
        <head>
          <title>' . $spkl->no_surat . '</title>
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
            ' . $spkl->body_surat . '
          </div>
        </body>
      </html>';

    $dompdf->loadHtml($konten);

    $dompdf->render();
    $dompdf->stream('SPKL-' . $spkl->no_surat . '.pdf', ['Attachment' => false]);

    // $output = $dompdf->output();

    // header('Content-Type: application/pdf');
    // header('Content-Disposition: attachment; filename="SPKL-' . $spkl->no_surat . '.pdf"');
    // header('Content-Length: ' . strlen($output));

    // echo $output;
  }
}

/* End of file SPKL.php */
