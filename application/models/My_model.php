<?php
class My_model extends CI_Model
{

	public function cek_data($tabel, $where)
	{
		return $this->db->get_where($tabel, $where);
	}

	public function tampil($tabel)
	{
		return $this->db->get($tabel);
	}

	public function total($tabel, $where = null)
	{
		if ($where != null) {
			$this->db->where($where);
		}
		return $this->db->get($tabel)->num_rows();
	}
	public function get_last()
	{
		$this->db->order_by('id_taruna', 'DESC');
		$this->db->limit(1);
		return $this->db->get("tb_taruna")->row();
	}
	public function tambahdata($table, $data)
	{
		return $this->db->insert($table, $data);
	}
	public function hapus($table, $where)
	{
		$this->db->where($where);
		return $this->db->delete($table, $where);
	}

	public function update($table, $where, $data)
	{
		if ($where != null) {
			$this->db->where($where);
		}
		return $this->db->update($table, $data);
	}
	public function tampil_page($number, $offset)
	{
		return $this->db->get('atur_bahan_ajar a', $number, $offset);
	}

	public function fetchUrl($url)
	{
		$allowUrlFopen = preg_match('/1|yes|on|true/i', ini_get('allow_url_fopen'));
		if ($allowUrlFopen) {
			return file_get_contents($url);
		} elseif (function_exists('curl_init')) {
			$c = curl_init($url);
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			$contents = curl_exec($c);
			curl_close($c);
			if (is_string($contents)) {
				return $contents;
			}
		}
		return false;
	}

	function cek_login_mhs($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function totalAnggara($table, $field)
	{
		$this->db->select('SUM(' . $field . ') as total');
		$this->db->from($table);
		$jml = $this->db->get()->row()->total;
		return $jml;
	}

	function subkomponentampil()
	{
		$query = "SELECT *FROM subkomponen left join komponen on subkomponen.id_komponen = komponen.id_komponen left join suboutput ON komponen.id_suboutput = suboutput.id_suboutput left join divisi on suboutput.nama_divisi = divisi.nama ORDER BY divisi.deskripsi,suboutput.nama_suboutput, komponen.nama_komponen, subkomponen.nama_subkomponen ASC";
		return $this->db->query($query);
	}

	function tampildetailsubkomponen()
	{
		$query = "SELECT *FROM subkomponen left join komponen on subkomponen.id_komponen = komponen.id_komponen left join suboutput ON komponen.id_suboutput = suboutput.id_suboutput left join divisi on suboutput.nama_divisi = divisi.nama ORDER BY divisi.deskripsi,suboutput.nama_suboutput, komponen.nama_komponen, subkomponen.nama_subkomponen ASC";
		return $this->db->query($query);
	}

	function tampilkan_detail()
	{
		$query = "SELECT *,detail_subkomponen.qty as detail_qty,detail_subkomponen.frq as detail_frq, detail_subkomponen.satuan as detail_satuan ,detail_subkomponen.anggaran as detail_anggaran from detail_subkomponen left join subkomponen on detail_subkomponen.id_subkomponen = subkomponen.id_subkomponen left join komponen on subkomponen.id_komponen = komponen.id_komponen ORDER BY komponen.nama_komponen ASC";
		return $this->db->query($query);
	}
}
