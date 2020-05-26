<?php 

class My_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
    }

    public function getdata($table){
        return $this->db->get($table);
    }

    public function insertdata($table, $data){
        return $this->db->insert($table, $data);
    }
    
    public function deletedata($table, $where){
        return $this->db->delete($table, $where);
    }

    public function get_all_books(){
        $this->datatables->select('id, kode_buku, judul, penulis, penerbit, jumlah_buku, ISBN, nama_kategori, kategori_id');
        $this->datatables->from('buku');
        $this->datatables->join('kategori', 'kategori = kategori_id');
        $this->datatables->add_column('modal_judul', '<a href="javascript:void(0);" class="view_record" data-kode="$1" data-judul="$2" data-penulis="$3" data-isbn="$4"  data-kategori="$5"></a>', 'kode_buku, judul, penulis, ISBN, kategori_id');
        $this->datatables->add_column('view' , '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-kode="$1" data-judul="$2" data-penulis="$3" data-isbn="$4"  data-kategori="$5"><i class="far fa-edit" style="color:white"></i></a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1"><i class="fas fa-trash"></i></a>' , 'kode_buku, judul, penulis, ISBN, kategori_id');
        return $this->datatables->generate();
    }
}
