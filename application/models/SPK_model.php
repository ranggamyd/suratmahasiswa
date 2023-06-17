<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SPK_model extends CI_Model
{
  public function get_all()
  {
    $this->db->join('kaprodi', 'kaprodi.nidn = spk.nidn_kaprodi', 'left');
    $this->db->join('mhs', 'mhs.nim = spk.nim_mhs', 'left');
    $this->db->order_by('tgl_surat', 'desc');
    $this->db->order_by('no_surat', 'desc');
    $this->db->order_by('nama_mhs', 'asc');
    if ($this->session->userdata('level') == 'Mahasiswa') {
      return $this->db->get_where('spk', ['nim_mhs' => $this->session->userdata('nim_mhs')])->result_array();
    } else {
      return $this->db->get('spk')->result_array();
    }
  }

  public function get_spk($id)
  {
    $this->db->join('kaprodi', 'kaprodi.nidn = spk.nidn_kaprodi', 'left');
    $this->db->join('mhs', 'mhs.nim = spk.nim_mhs', 'left');
    return $this->db->get_where('spk', ['id_spk' => $id])->row();
  }

  public function count_all()
  {
    return $this->db->get('spk')->num_rows();
  }

  public function count_by_mhs($nim)
  {
    return $this->db->get_where('spk', ['nim_mhs' => $nim])->num_rows();
  }

  public function set_no_surat()
  {
    $bulan_angka = date('m');
    $bulan_romawi = $this->convert_to_roman($bulan_angka);
    $tahun = date('Y');
    $no_surat_terakhir = $this->db->select('no_surat')->order_by('id_spk', 'DESC')->limit(1)->get('spk')->row('no_surat');

    if (!empty($no_surat_terakhir)) {
      $nomor_urut = explode('/', $no_surat_terakhir)[0];
      $prefix = explode('/', $no_surat_terakhir)[1];
      $suffix = explode('/', $no_surat_terakhir)[2];
      $nomor_urut++;

      $no_surat = sprintf("%03d", $nomor_urut) . '/' . $prefix . '/' . $suffix . '/' . $bulan_romawi . '/' . $tahun;
    } else {
      $no_surat = '001/2.b/UMC-FT/D-SP/' . $bulan_romawi . '/' . $tahun;
    }

    return $no_surat;
  }

  public function convert_to_roman($num)
  {
    $roman = "";
    $romans = array(
      'M' => 1000,
      'CM' => 900,
      'D' => 500,
      'CD' => 400,
      'C' => 100,
      'XC' => 90,
      'L' => 50,
      'XL' => 40,
      'X' => 10,
      'IX' => 9,
      'V' => 5,
      'IV' => 4,
      'I' => 1
    );

    foreach ($romans as $key => $value) {
      $matches = intval($num / $value);
      $roman .= str_repeat($key, $matches);
      $num = $num % $value;
    }

    return $roman;
  }

  public function buat()
  {
    $data = [
      'no_surat' => $this->input->post('no_surat'),
      'perihal' => $this->input->post('perihal'),
      'tujuan' => $this->input->post('tujuan'),
      'instansi' => $this->input->post('instansi'),
      'nidn_kaprodi' => $this->input->post('nidn_kaprodi'),
      'nim_mhs' => $this->input->post('nim_mhs'),
      'kelas_asal' => $this->input->post('kelas_asal'),
      'kelas_tujuan' => $this->input->post('kelas_tujuan'),
      'alasan' => $this->input->post('alasan'),
      'tgl_surat' => $this->input->post('tgl_surat'),
      'body_surat' => $this->input->post('body_surat')
    ];

    $this->db->insert('spk', $data);
  }

  public function edit()
  {
    $data = [
      'no_surat' => $this->input->post('no_surat'),
      'perihal' => $this->input->post('perihal'),
      'tujuan' => $this->input->post('tujuan'),
      'instansi' => $this->input->post('instansi'),
      'nidn_kaprodi' => $this->input->post('nidn_kaprodi'),
      'nim_mhs' => $this->input->post('nim_mhs'),
      'kelas_asal' => $this->input->post('kelas_asal'),
      'kelas_tujuan' => $this->input->post('kelas_tujuan'),
      'alasan' => $this->input->post('alasan'),
      'tgl_surat' => $this->input->post('tgl_surat'),
      'body_surat' => $this->input->post('body_surat')
    ];

    $this->db->update('spk', $data, ['id_spk' => $this->input->post('id')]);
  }

  public function hapus($id)
  {
    $this->db->delete('spk', ['id_spk' => $id]);
  }
}

/* End of file SPK_model.php */
