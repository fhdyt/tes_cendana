<?php
class JsonModel extends CI_Model
{
  public function json_list_model()
  {
		$hasil=$this->db->query('SELECT * FROM JSON AS J LEFT JOIN ADDRESS AS D ON J.ID=D.ID');
		return $hasil->result();
	}

  public function json_delete_model($id)
  {
    $hasil=$this->db->query('DELETE FROM JSON WHERE ID='.$id.'');
		return $hasil;
	}

  public function json_simpan_model(){
    $filename = $this->input->post('input_json');
    $data_json = file_get_contents($filename);
    $array = json_decode($data_json, true);
    foreach ($array as $row){
    $data = array(
        'ID' 			=> $row['id'],
        'NAME' 			=> $row['name'],
        'USERNAME' 			=> $row['username'],
        'EMAIL' 			=> $row['email'],
        'PHONE' 			=> $row['phone'],
        'WEBSITE' 			=> $row['website'],
      );
      $result=$this->db->insert('JSON',$data);

    $data_address = array(
        'ID' 			=> $row['address']['id'],
        'STREET' 			=> $row['address']['street'],
        'CITY' 			=> $row['address']['city'],
        'ZIPCODE' 			=> $row['address']['zipcode'],
        'SUITE' 			=> $row['address']['suite'],
      );
      $result=$this->db->insert('ADDRESS',$data_address);
    }

    return $result;
  }
}
