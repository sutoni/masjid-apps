<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_kegiatan extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
    }
    public function add($row, $dateCreated = FALSE) {
        $this->db->insert('tg_sholatwajib', $row);
        return $this->db->insert_id();
    }
    public function getAll() {
        if (isset($this->orderby) && $this->orderby != '') {
            $this->db->order_by($this->orderby);
        }
        $query = $this->db->get('tg_sholatwajib');
        return $query->result_array();
    }


    public function cari_jadwal($txttglsampai,$txttgldari){

            $this->db->select('*');
            $this->db->from('tg_sholatwajib');
            
             $this->db->where('tanggal >=',$txttgldari);
             $this->db->where('tanggal <=',$txttglsampai);
             $query = $this->db->get();
             $this->session->set_userdata('tgldari',$txttgldari);
             $this->session->set_userdata('tglsampai',$txttglsampai);
            return $query->result();
    }


    public function jadwal_satuminggu(){
       

        $tglhariini=date('d');
        $bulan=date('m');
        $tahun=date('Y');
        $d1 = strtotime("today");
        $start_week1 = strtotime("last sunday midnight",$d1);
        $end_week1 = strtotime("next saturday",$d1);
        $start1 = date("m-d-Y",$start_week1); 
        $end1 = date("m-d-Y",$end_week1);  

        $sekarang1=date('m-d-Y');
         $this->db->select('*');
         $this->db->from('tg_sholatwajib');
            
         //$this->db->like('tanggal ',$tglhariini);
         $this->db->where('substring(tanggal,6,2)', $bulan);
         $this->db->where('substring(tanggal,1,4)', $tahun);
         $this->db->where('substring(tanggal,9,2)', $tglhariini);
         //$this->db->where('tanggal <=',$end);
         $query = $this->db->get();
         //echo $this->db->last_query(); die;    
         return $query->result();
    }


    function info_berita(){

         $this->db->select('*');
         $this->db->limit('2');
         $this->db->order_by('tglposting','DESC');
         $query = $this->db->get('tg_berita');
         return $query->result();

    }


    function cari_berita(){

         $this->db->select('*');
         $this->db->limit('10');
         $this->db->order_by('tglposting','DESC');
         $query = $this->db->get('tg_berita');
         return $query->result();
    }

    function cari_databerita($id2){
        $this->db->select('*');
        $this->db->where('idberita', $id2);         
         
         $query = $this->db->get('tg_berita');
         return $query->result();

    }

    function updatepublishberita($id2){

           
            
                        $cekupdate=array(
                           
                            'statusberita'=>$id2,
                            
                        );
        $this->db->where('idberita', $id2);
        $this->db->update('tg_berita', $cekupdate);         
       // echo $this->db->last_query(); die;
        return true;  
    }    


    function deleteberita($id2){

        $this->db->where('idberita', $id2);
        $this->db->delete('tg_berita');
        //echo $this->db->last_query(); die;
        return true;  

    }

    function cari_kegiatan(){

         $this->db->select('tg_kegiatan.idkegiatan AS idrealisasikegiatan, tm_kodekegiatan.namakegiatan,tg_kegiatan.kodekegiatan, tg_kegiatan.tglkegiatan, tg_kegiatan.tempatkegiatan, tg_kegiatan.waktukegiatan, tg_kegiatan.agendakegiatan, tg_kegiatan.ketua, tg_kegiatan.pic, tg_kegiatan.loginput, tg_kegiatan.logupdate, tg_kegiatan.loguser');
         $this->db->join('tm_kodekegiatan', 'tm_kodekegiatan.idkegiatan=tg_kegiatan.kodekegiatan','LEFT');
         $this->db->from('tg_kegiatan');
         $this->db->limit('10');
         $this->db->order_by('tglkegiatan','DESC');
         $query = $this->db->get();
         return $query->result();
    }

    
    function cari_kegiatanAll(){

         $this->db->select('tg_kegiatan.idkegiatan AS idrealisasikegiatan, tm_kodekegiatan.namakegiatan,tg_kegiatan.kodekegiatan, tg_kegiatan.tglkegiatan, tg_kegiatan.tempatkegiatan, tg_kegiatan.waktukegiatan, tg_kegiatan.agendakegiatan, tg_kegiatan.ketua, tg_kegiatan.pic, tg_kegiatan.loginput, tg_kegiatan.logupdate, tg_kegiatan.loguser');
         $this->db->join('tm_kodekegiatan', 'tm_kodekegiatan.idkegiatan=tg_kegiatan.kodekegiatan','LEFT');
         $this->db->from('tg_kegiatan');
         $this->db->order_by('tglkegiatan','DESC');
         $query = $this->db->get();
         return $query->result();
    }

    function cari_kodekegiatan(){
         $this->db->select('*');         
         $this->db->order_by('namakegiatan','ASC');
         $query = $this->db->get('tm_kodekegiatan');
         return $query->result();
    }


    function simpanKkegiatan(){

            $tahun=date('Y');
            $bulan=date('m');
            $hari=date('d');

            $this->db->select('*');
            $this->db->from('tg_kegiatan');
            $query = $this->db->get();
            $rows=$query->result_array();
            $coba=count($rows);
            $tambah=$coba +1;
            $prefix='KG';
            $leadingzeros = '00';
            $noidkegiatan = $prefix . $tahun .$bulan .$hari .substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;  
            $hariini=date('Y-m-d');
            $namauser = $this->session->userdata('username'); 
            
            $inserdata=array(
                            'idkegiatan'=>$noidkegiatan,
                            'kodekegiatan'=>$this->input->post('txtkategori'),
                            'tglkegiatan'=>$this->input->post('txttglkegiatan'),
                            'tempatkegiatan'=>$this->input->post('txttempat'),
                            'waktukegiatan'=>$this->input->post('txtwaktu'),
                            'agendakegiatan'=>$this->input->post('txtagenda'),
                            'ketua'=>$this->input->post('txtketua'),
                            'pic'=>$this->input->post('txtpic'),
                            'loginput'=>$hariini,
                            'logupdate'=>$hariini,
                            'loguser'=>$namauser
                        );

                            $this->db->insert('tg_kegiatan', $inserdata);
                            //$this->session->set_userdata('idkegiatan',$idkegiatan);
                            return true; 


    }


    function updateKkegiatan(){

        $namauser = $this->session->userdata('username'); 
        $hariini=date('Y-m-d');
        $cekupdate=array(
                               
                                'kodekegiatan'=>$this->input->post('txtkategori'),
                                'tglkegiatan'=> $this->input->post('txttglkegiatan'),
                                'tempatkegiatan'=> $this->input->post('txttempat'),
                                'waktukegiatan'=> $this->input->post('txtwaktu'),
                                'agendakegiatan'=> $this->input->post('txtagenda'),
                                'ketua'=> $this->input->post('txtketua'),
                                'pic'=> $this->input->post('txtpic'),
                                'logupdate'=> $hariini
                                
                            );
                            $this->db->where('idkegiatan', $this->input->post('txtidkegiatan'));
                            $this->db->update('tg_kegiatan', $cekupdate);         
                           
                            return true;  
    }


    function simpanKberita($statusawal){

            $tahun=date('Y');
            $bulan=date('m');
            $hari=date('d');

            $this->db->select('*');
            $this->db->from('tg_berita');
            $query = $this->db->get();
            $rows=$query->result_array();
            $coba=count($rows);
            $tambah=$coba +1;
            $prefix='KB';
            $leadingzeros = '00';
            $noidkegiatan = $prefix . $tahun .$bulan .$hari .substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;  
            $hariini=date('Y-m-d');
            $namauser = $this->session->userdata('username'); 
            //$statusawal="draft";
            $inserdata=array(
                            'idberita'=>$noidkegiatan,
                            'kategori'=>$this->input->post('txtkategori'),
                            'tglposting'=>$hariini,
                            'topikberita'=>$this->input->post('txttopikberita'),
                            'detailberita'=>$this->input->post('txtdetailberita'),
                            'linkgambar'=>$this->input->post('filefoto'),
                            'logupdate'=>$hariini,                            
                            'loguser'=>$namauser,
                            'statusberita'=>$statusawal
                        );

                            $this->db->insert('tg_berita', $inserdata);
                            $this->session->set_userdata('idberita',$noidkegiatan);
                            return true; 


    }


    function updateKberita($updstatusberita){

            $namauser = $this->session->userdata('username'); 

            $hariini=date('Y-m-d');
            $cekupdate=array(
                               
                                'kategori'=>$this->input->post('txtkategori'),
                                'topikberita'=> $this->input->post('txttopikberita'),
                                'detailberita'=> $this->input->post('txtdetailberita'),
                                'linkgambar'=> $this->input->post('filefoto'),
                                'logupdate'=> $hariini,
                                'loguser'=> $namauser,
                                'statusberita'=>$updstatusberita
                                
                            );
                            $this->db->where('idberita', $this->input->post('txtidberita'));
                            $this->db->update('tg_berita', $cekupdate);         
                           
                            return true;  

    }

}

/* End of file  */
/* Location: ./application/models/ */