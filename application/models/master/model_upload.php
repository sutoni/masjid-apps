<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class model_upload extends CI_Model {

    public $table = 'tg_sholatwajib';
    public $id = 'idtgsholat';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    //ini untuk memasukkan kedalam tabel pegawai
    function loaddata() {
        //echo "testing"; die();
        $statusnya="done";


        
        //stop sementara
        //for ($i = 0; $i < count($dataarray); $i++) {

          //  $inserdata = array(
            //    'idtgsholat'=>$dataarray[$i]['idtgsholat'],
                //'namasholat' => $dataarray[$i]['namasholat'],
              //  'kategori' => $dataarray[$i]['kategori'],
               // 'imam' => $dataarray[$i]['imam'],
               // 'muadzin' => $dataarray[$i]['muadzin'],
               // 'penceramah' => $dataarray[$i]['penceramah'],
               // 'tanggal' => $dataarray[$i]['tanggal'],
               // 'status'=>$statusnya
           // );
            //ini untuk menambahkan apakah dalam tabel sudah ada data yang sama
            //apabila data sudah ada maka data di-skip
            // saya contohkan kalau ada data nama yang sama maka data tidak dimasukkan
            //$this->db->where('namasholat', );
            //$this->db->where('tanggal', $this->input->post('tanggal'));              
            //if ($cek) {
                //$this->db->insert($this->table, $data);
                
                
            //}
        //}
   } 
 }      