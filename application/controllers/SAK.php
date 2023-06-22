<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class SAK extends CI_Controller
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
    $this->load->view('sak/' . $file, $data);
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
      'title' => 'Surat Aktif Kuliah',
      'sak' => $this->sak_model->get_all()
    ];

    $this->loadView('index', $data);
  }

  function detail($id)
  {
    $data = [
      'title' => 'Detail Surat Aktif Kuliah',
      'sak' => $this->sak_model->get_sak($id)
    ];

    $this->loadView('detail', $data);
  }

  function buat()
  {
    $this->db->join('prodi', 'prodi.id = mhs.id_prodi', 'left');
    $mhs = $this->db->get_where('mhs', ['nim' => $this->session->userdata('nim_mhs')])->result_array();

    $data = [
      'title' => 'Buat SAK',
      'no_surat' => $this->sak_model->set_no_surat(),
      'mhs' => $this->session->userdata('level') == 'Mahasiswa' ? $mhs : $this->mahasiswa_model->get_active_mhs(),
      'dekan' => $this->dekan_model->get_all(),
      'format_default' => $this->format_surat_default_model->get_sak(),
      'js' => 'sak.js'
    ];

    $this->loadView('buat', $data);
  }

  function proses_buat()
  {
    $this->sak_model->buat();
    $mhs = $this->mahasiswa_model->get_mahasiswa($this->input->post('nim_mhs'));
    $this->send_notification("082340101670", "*== PEMBERITAHUAN ==*\n\nMahasiswa bernama *$mhs->nama_mhs* baru saja mengajukan Surat Aktif Kuliah. Mohon untuk segera ditindak lanjuti sebagaimana mestinya.\nTerima kasih!");

    $this->session->set_flashdata('sukses', 'SAK berhasil dibuatkan!');
    redirect('sak');
  }

  function edit($id)
  {
    $this->db->join('prodi', 'prodi.id = mhs.id_prodi', 'left');
    $mhs = $this->db->get_where('mhs', ['nim' => $this->session->userdata('nim_mhs')])->result_array();

    $data = [
      'title' => 'Buat SAK',
      'sak' => $this->sak_model->get_sak($id),
      'mhs' => $this->session->userdata('level') == 'Mahasiswa' ? $mhs : $this->mahasiswa_model->get_active_mhs(),
      'dekan' => $this->dekan_model->get_all(),
      'js' => 'sak.js'
    ];

    $this->loadView('edit', $data);
  }

  function proses_edit()
  {
    $this->sak_model->edit();
    $this->session->set_flashdata('sukses', 'SAK berhasil diedit!');
    redirect('sak');
  }

  function hapus($id)
  {
    $this->sak_model->hapus($id);
    $this->session->set_flashdata('sukses', 'SAK berhasil dihapus!');
    redirect('sak');
  }

  function terima($id)
  {
    $this->db->update('sak', ['status_surat' => 'Dikonfirmasi'], ['id_sak' => $id]);
    $sak = $this->sak_model->get_sak($id);
    $mhs = $this->mahasiswa_model->get_mahasiswa($sak->nim_mhs);
    $this->send_notification($mhs->no_telp, "*== PEMBERITAHUAN ==*\n\nSurat Aktif Kuliah anda sudah selesai dibuat. Mohon untuk segera mengambil surat di TU Fakultas.\nTerima kasih!");

    $this->session->set_flashdata('sukses', 'SAK berhasil dikonfirmasi!');
    redirect('sak');
  }

  function tolak($id)
  {
    $this->db->update('sak', ['status_surat' => 'Ditolak'], ['id_sak' => $id]);
    $sak = $this->sak_model->get_sak($id);
    $mhs = $this->mahasiswa_model->get_mahasiswa($sak->nim_mhs);
    $this->send_notification($mhs->no_telp, "*== PEMBERITAHUAN ==*\n\nSurat Aktif Kuliah anda ditolak. Mohon untuk segera mengonfirmasikannya dengan TU Fakultas.\nTerima kasih!");

    $this->session->set_flashdata('sukses', 'SAK berhasil ditolak!');
    redirect('sak');
  }

  public function download_pdf($id)
  {
    $sak = $this->sak_model->get_sak($id);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $konten = '
      <html>
        <head>
          <title>' . $sak->no_surat . '</title>
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
            ' . $sak->body_surat . '
          </div>
        </body>
      </html>';

    $dompdf->loadHtml($konten);

    $dompdf->render();
    // $dompdf->stream('file.pdf', ['Attachment' => false]);

    $output = $dompdf->output();

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="SAK-' . $sak->no_surat . '.pdf"');
    header('Content-Length: ' . strlen($output));

    echo $output;
  }

  public function cetak_pdf($id)
  {
    $sak = $this->sak_model->get_sak($id);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $konten = '
      <html>
        <head>
          <title>' . $sak->no_surat . '</title>
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
            ' . $sak->body_surat . '
          </div>
        </body>
      </html>';

    $dompdf->loadHtml($konten);

    $dompdf->render();
    $dompdf->stream('SAK-' . $sak->no_surat . '.pdf', ['Attachment' => false]);

    // $output = $dompdf->output();

    // header('Content-Type: application/pdf');
    // header('Content-Disposition: attachment; filename="SAK-' . $sak->no_surat . '.pdf"');
    // header('Content-Length: ' . strlen($output));

    // echo $output;
  }
}

/* End of file SAK.php */
