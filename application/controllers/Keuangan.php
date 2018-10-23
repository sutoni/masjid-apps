<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keuangan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/model_kegiatan');
        $this->load->model('master/model_keuangan');
    }

    public function index()
    {
        $res['data'] = $this->model_keuangan->list_uangmuka();
        
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('keuangan/ku_uangmuka',$res);
        $this->load->view('design/footdepan');
    }


     public function simpanUangmuka(){

     }


     function ku_uangmuka(){
        $res['data']=$this->model_master->list_uangmuka();
        //$res['idbidang']=$this->session->userdata('idbidang');
        //echo $this->db->last_query();die();
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('master/ku_uangmuka',$res);
        $this->load->view('design/footdepan');
     }

}