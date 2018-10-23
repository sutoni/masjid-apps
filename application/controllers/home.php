<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends CI_Controller {
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('master/model_kegiatan'); 
    }    
    
    public function index() {
        $logged_in = $this->session->userdata('logged_in');
       
        if($logged_in){
            $res['data'] = $this->model_kegiatan->jadwal_satuminggu();
            $res['data2'] = $this->model_kegiatan->info_berita();
            $res['data3'] = $this->model_kegiatan->cari_kegiatan();
            $this->load->view('design/headdepan');
            //$this->load->view('design/navbar_akses');
            $this->load->view('design/navbar_akses_test');
            $this->load->view('design/home',$res);
            $this->load->view('design/foothome');
        }else{            

             $res['data'] = $this->model_kegiatan->jadwal_satuminggu();
             $res['data1'] = $this->model_kegiatan->jadwal_satuminggu();
             $res['data2'] = $this->model_kegiatan->info_berita();
             $res['data3'] = $this->model_kegiatan->cari_kegiatan();
             //echo $this->db->last_query(); die;
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar');
            $this->load->view('design/home',$res);
            //$this->load->view('design/footdepan');
        }  
    }


    

}