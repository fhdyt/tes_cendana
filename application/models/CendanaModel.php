<?php
class CendanaModel extends CI_Model
{
  // public function simpan_siswa_model(){
  //   $data = array(
  //       'SISWA_ID'        => $this->buat_id(),
  //       'GURU_USER_ID'        => $this->id_user(),
  //       'SISWA_NAMA' 			=> $this->input->post('nama'),
  //       'RECORD_STATUS' 			=> 'A',
  //     );
  //   $result=$this->db->insert('SISWA',$data);
  //   return $result;
  // }
  public function input_list_model()
  {
		$hasil=$this->db->query('SELECT * FROM CENDANA');
		return $hasil->result();
	}
  public function user_detail_model($id)
  {
		$hasil=$this->db->get_where('USER',array('RECORD_STATUS' => 'A','USER_ID' => $id));
		return $hasil->result();
	}

  public function input_delete_model($id)
  {
    $hasil=$this->db->query('DELETE FROM CENDANA WHERE ID='.$id.'');
		return $hasil;
	}

  public function input_simpan_model(){
    $kalimat = $this->input->post('input_kalimat');
    $umur = (int) filter_var($kalimat, FILTER_SANITIZE_NUMBER_INT);
    $ganti =  str_replace($umur,":",$kalimat);
    $explode_kalimat = explode(":", $ganti);
    $nama = $explode_kalimat[0];
    $kota = $explode_kalimat[1];

    $data = array(
        'NAMA' 			=> strtoupper($nama),
        'UMUR' 			=> strtoupper($umur),
        'KOTA' 			=> strtoupper($kota),
      //  'USER_JK' 			=> $this->input->post('jk'),

      );
    $result=$this->db->insert('CENDANA',$data);
    return $result;
  }
}
