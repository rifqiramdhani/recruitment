<?php defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('My_model', 'crud_model');
		$this->load->model('Lowongan_model');
		$this->load->model('Main_model');
		$this->load->helper('form');
		$this->load->helper('fungsi');
		//
		cek_user('Admin');
	}

	public function dashboard()
	{
		$data['level'] = strtolower($this->session->userdata('level'));
		$this->template->load('template', 'admin/dashboard', $data);
	}

	public function penerimaan()
	{
		$data['lowongan'] = $this->Lowongan_model->getAllData();

		$data['level'] = strtolower($this->session->userdata('level'));
		$this->template->load('template', 'admin/penerimaan/penerimaan', $data);
	}

	public function kriteria($id_lowongan)
	{

		$data['lowongan'] = $this->Main_model->getWhereData('lowongan', ['id_lowongan' => $id_lowongan])->row_array();

		$data['kriteria'] = $this->Main_model->getWhereData('kriteria', ['id_lowongan' => $id_lowongan])->result();

		$data['level'] = strtolower($this->session->userdata('level'));
		$this->template->load('template', 'admin/penerimaan/kriteria', $data);
	}





	public function forms()
	{
		$data['level'] = strtolower($this->session->userdata('level'));
		$this->template->load('template', 'admin/forms', $data);
	}

	public function tables()
	{
		$data['level'] = strtolower($this->session->userdata('level'));
		$this->template->load('template', 'admin/tables', $data);
	}

	public function charts()
	{
		$data['level'] = strtolower($this->session->userdata('level'));
		$this->template->load('template', 'admin/charts', $data);
	}

	public function get_books_json()
	{
		header('Content-Type: application/json');
		echo $this->crud_model->get_all_books();
	}

	public function get_buku_json()
	{
		header('Content-Type: application/json');

		$like = $this->input->get('term');
		$buku =$this->db->select('*')->from('buku')->or_like(['ISBN' => $like, 'judul' => $like])->get()->result();

		$bukuset = [];
		foreach ($buku as $getBuku) {
			$jsonbuku['value'] = $getBuku->judul.'['.$getBuku->ISBN.']';
			$jsonbuku['ISBN'] = $getBuku->ISBN;
			$jsonbuku['judul'] = $getBuku->judul;
			$jsonbuku['kode_buku'] = $getBuku->kode_buku;
			$bukuset[] = $jsonbuku;
		}
		echo json_encode($bukuset);
	}

	public function get_member_json()
	{
		header('Content-Type: application/json');
		
		$like = $this->input->get('term');
		$member =$this->db->select('*')->from('keanggotaan')->or_like(['nama' => $like, 'id' => $like])->get()->result();

		$jsonresult = [];
		foreach ($member as $getMember) {
			$result['value'] = $getMember->nama . ' [' . $getMember->nim .']'; 
			$result['nim'] = $getMember->nim;
			$result['nama'] = $getMember->nama;
			$result['kelas'] = $getMember->kelas;
			$result['tahun_angkatan'] = $getMember->tahun_angkatan;
			$result['phone'] = $getMember->phone;
			$jsonresult[] = $result;
		}
		echo json_encode($jsonresult);
	}

	public function books()
	{
		$data['kategories'] = $this->crud_model->getdata('kategori')->result_array();
		$data['level'] = strtolower($this->session->userdata('level'));
		$data['books'] = $this->crud_model->getdata('buku')->result_array();
		$this->template->load('template', 'admin/buku', $data);
	}

	function update()
	{ //function update data
		$kode_buku = $this->input->post('kode_buku');

		$data = array(
			'penulis'     => $this->input->post('penulis'),
			'judul'    => $this->input->post('judul'),
			'kategori'    => $this->input->post('kategori'),
			'ISBN' => $this->input->post('isbn')
		);

		$this->db->where('kode_buku', $kode_buku);
		$this->db->update('buku', $data);
		$this->session->set_flashdata('message', 'Data Berhasil Diperbaharui');
		redirect('admin/page/books');
	}

	public function delete()
	{ 
		$kode_buku = $this->input->post('kode_buku');
		$this->crud_model->deletedata('buku', ['kode_buku' => $kode_buku]);
		$this->session->set_flashdata('message', 'Data Berhasil Hapus');
		redirect('admin/page/books');
	}

	public function wizard(){
		$data['level'] = strtolower($this->session->userdata('level'));
		$data['dokter'] = $this->db->get('admin')->result();
		$this->template->load('template', 'admin/wizard', $data);
	}

	public function get_level(){
		header('Content-Type: application/json');

		$where = $this->input->get('term');
		$admin = $this->db->get_where('admin', ['level_admin' => $where])->result();

		$adminset = [];
		foreach ($admin as $getadmin) {
			$jsonadmin['value'] = $getadmin->nama_admin.'['.$getadmin->email_admin.']';
			$jsonadmin['nama'] = $getadmin->nama_admin;
			$jsonadmin['email'] = $getadmin->email_admin;
			$jsonadmin['alamat'] = $getadmin->alamat_admin;
			$adminset[] = $jsonadmin;
		}
		echo json_encode($adminset); 
	}
}
