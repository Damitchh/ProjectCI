<?php

class Cari_model extends CI_Model {

    public function getAllBuku(){

        return $this->db->get('buku')->result_array();
    }

    public function getDataLogin(){
        return $this->db->get('user')->result_array();
    }

    public function getBukuAda(){
        return $this->db->query("SELECT * FROM buku where buku.stock>0")->result_array();
    }
    public function getKategori(){
        return $this->db->query("SELECT DISTINCT kategori FROM buku ORDER BY kategori")->result_array();
    }

    public function tambahDataBuku(){
        $data = [
            "judul" => $this->input->post('judul', true),
            "penulis" => $this->input->post('penulis', true),
            "kategori" => $this->input->post('kategori',true),
            "stock" => $this->input->post('stock',true)
        ];

        $this->db->insert('buku',$data);
    }

    public function hapusDataBuku($id_buku){
        // atau gini juga bisa $this->db->delete('buku',['id_buku'=>$id_buku]);

        $this->db->where('id_buku',$id_buku);
        $this->db->delete('buku');
    }
    
    public function editJudulBuku($judullama,$judulbaru){
        
        $this->db->where('judul',$judullama);
        $this->db->update('buku', $judulbaru);
    }
    public function editStockBuku($judulBuku,$stock){
        
        $this->db->where('judul',$judulBuku);
        $this->db->update('stock', $stock);
    }

    public function getBukuByid($id_buku){
        return $this->db->get_where('buku',['id_buku'=>$id_buku])->row_array();
    }

    public function pinjamBuku($peminjam,$judul_buku,$idbuku){
        
        
        $jdl_buku = "'$judul_buku'";
        $peminjam_ = "'$peminjam'";
        $idbuku_ = "'$idbuku'";
        $idpeminjaman = "'$idbuku'";
        
        $this->db->query('CALL SP_INSERT_TABLE ("peminjaman","' .$idpeminjaman. ',' .$jdl_buku. ',' .$peminjam_. ' ,' .$idbuku_. '")');
    }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        // $data = [
        //     "peminjaman_judul" => $judul_buku,
        //     "nama_peminjam" => $peminjam,
        //     "idbuku" => $idbuku
        // ];
        //$this->db->insert('peminjaman',$data);
        //$this->db->query("UPDATE buku SET stock = $stockbaru WHERE judul='$judul_buku'");

    public function getBukuPinjam($peminjam){
        return $this->db->get_where('peminjaman',['nama_peminjam'=>$peminjam])->result_array();

    }
    public function getBukubyJudul($judul){
        return $this->db->get_where('buku',['judul'=>$judul])->row_array();
    }
    public function bukuKembali($stockSekarang,$idbuku){
        $this->db->query("UPDATE buku SET stock = $stockSekarang+1 WHERE id_buku='$idbuku'");

        $this->db->where('idbuku', $idbuku);
        $this->db->delete('peminjaman');

    }
    public function getAllBukuPinjam(){
        return $this->db->get('peminjaman')->result_array();
    }

    public function cariDataBuku($keywordmasuk){
        $this->db->like('kategori',$keywordmasuk);
        return $this->db->get('buku')->result_array();
    }

}