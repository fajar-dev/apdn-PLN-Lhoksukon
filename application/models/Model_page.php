<?php
class Model_page extends CI_Model
{

	function cek_login($table, $where){		
		return $this->db->get_where($table, $where);
	}	


	function stat0($table)
	{
		return $this->db->get_where($table)->num_rows();
	}

	function stat1($table)
	{
    return $this->db->query("SELECT SUM(berat) AS hasil FROM $table WHERE jenis = 'kertas';");
  }

  function stat2($table)
	{
		return $this->db->query("SELECT SUM(berat) AS hasil FROM $table WHERE jenis = 'plastik';");
  }
	
  function stat3($table)
	{
		return $this->db->query("SELECT SUM(berat) AS hasil FROM $table;");
	}

	function stat4($table)
	{
		return $this->db->query("SELECT SUM(berat) AS hasil FROM $table WHERE jenis = 'kaleng';");
  }
  function sum()
	{
		return $this->db->query("SELECT *, SUM(berat) AS berat, MAX(waktu) AS terakhir  FROM sampah LEFT JOIN afdeling ON sampah.id_afdeling = afdeling.id GROUP BY id_afdeling");
	}

	function harian($table, $dari, $sampai){
		return $this->db->query("SELECT * FROM $table LEFT JOIN afdeling ON sampah.id_afdeling = afdeling.id WHERE waktu >= '$dari' AND waktu  <= '$sampai'");
	}

	function tampil($table){
		return $this->db->get_where($table);
	}

	function tambah($table,$data){
		$this->db->insert($table,$data);
	}

	function get($table, $where){		
		return $this->db->get_where($table, array('id' => $where));
	}	

  function data($table, $where){
		$this->db->order_by('waktu', 'DESC');		
		return $this->db->get_where($table, array('id_afdeling' => $where));
	}	

	function hapus($table,$where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}