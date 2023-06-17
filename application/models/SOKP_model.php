<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SOKP_model extends CI_Model
{
  public function get_all()
  {
    $this->db->join('dekan', 'dekan.nidn = sokp.nidn_dekan', 'left');
    $this->db->join('mhs', 'mhs.nim = sokp.nim_mhs', 'left');
    $this->db->order_by('tgl_surat', 'desc');
    $this->db->order_by('no_surat', 'desc');
    $this->db->order_by('nama_mhs', 'asc');
    if ($this->session->userdata('level') == 'Mahasiswa') {
      return $this->db->get_where('sokp', ['nim_mhs' => $this->session->userdata('nim_mhs')])->result_array();
    } else {
      return $this->db->get('sokp')->result_array();
    }
  }

  public function get_sokp($id)
  {
    $this->db->join('dekan', 'dekan.nidn = sokp.nidn_dekan', 'left');
    $this->db->join('mhs', 'mhs.nim = sokp.nim_mhs', 'left');
    return $this->db->get_where('sokp', ['id_sokp' => $id])->row();
  }

  public function count_all()
  {
    return $this->db->get('sokp')->num_rows();
  }

  public function count_by_mhs($nim)
  {
    return $this->db->get_where('sokp', ['nim_mhs' => $nim])->num_rows();
  }

  public function set_no_surat()
  {
    $bulan_angka = date('m');
    $bulan_romawi = $this->convert_to_roman($bulan_angka);
    $tahun = date('Y');
    $no_surat_terakhir = $this->db->select('no_surat')->order_by('id_sokp', 'DESC')->limit(1)->get('sokp')->row('no_surat');

    if (!empty($no_surat_terakhir)) {
      $nomor_urut = explode('/', $no_surat_terakhir)[0];
      $prefix = explode('/', $no_surat_terakhir)[1];
      $suffix = explode('/', $no_surat_terakhir)[2];
      $nomor_urut++;

      $no_surat = sprintf("%03d", $nomor_urut) . '/' . $prefix . '/' . $suffix . '/' . $bulan_romawi . '/' . $tahun;
    } else {
      $no_surat = '001/2.b/UMC-FT/Obs/' . $bulan_romawi . '/' . $tahun;
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
      'nidn_dekan' => $this->input->post('nidn_dekan'),
      'nim_mhs' => $this->input->post('nim_mhs'),
      'nama_instansi' => $this->input->post('nama_instansi'),
      'alamat_instansi' => $this->input->post('alamat_instansi'),
      'tgl_surat' => $this->input->post('tgl_surat'),
      'perihal' => $this->input->post('perihal'),
      'body_surat' => $this->input->post('body_surat')
    ];

    $this->db->insert('sokp', $data);
  }

  public function edit()
  {
    $data = [
      'no_surat' => $this->input->post('no_surat'),
      'nidn_dekan' => $this->input->post('nidn_dekan'),
      'nim_mhs' => $this->input->post('nim_mhs'),
      'nama_instansi' => $this->input->post('nama_instansi'),
      'alamat_instansi' => $this->input->post('alamat_instansi'),
      'tgl_surat' => $this->input->post('tgl_surat'),
      'perihal' => $this->input->post('perihal'),
      'body_surat' => $this->input->post('body_surat')
    ];

    $this->db->update('sokp', $data, ['id_sokp' => $this->input->post('id')]);
  }

  public function hapus($id)
  {
    $this->db->delete('sokp', ['id_sokp' => $id]);
  }
}

/* End of file SOKP_model.php */
