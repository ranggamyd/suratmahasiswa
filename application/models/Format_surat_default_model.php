<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Format_surat_default_model extends CI_Model
{
  public function get_skl()
  {
    return $this->db->get_where('format_surat_default', ['jenis_surat' => 'skl'])->row();
  }

  public function get_sps()
  {
    return $this->db->get_where('format_surat_default', ['jenis_surat' => 'sps'])->row();
  }

  public function get_sokp()
  {
    return $this->db->get_where('format_surat_default', ['jenis_surat' => 'sokp'])->row();
  }

  public function get_sak()
  {
    return $this->db->get_where('format_surat_default', ['jenis_surat' => 'sak'])->row();
  }

  public function get_spkl()
  {
    return $this->db->get_where('format_surat_default', ['jenis_surat' => 'spkl'])->row();
  }

  public function get_sc()
  {
    return $this->db->get_where('format_surat_default', ['jenis_surat' => 'sc'])->row();
  }

  public function get_spk()
  {
    return $this->db->get_where('format_surat_default', ['jenis_surat' => 'spk'])->row();
  }

  public function get_spp()
  {
    return $this->db->get_where('format_surat_default', ['jenis_surat' => 'spp'])->row();
  }
}

/* End of file Format_surat_default_model.php */
