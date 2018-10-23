<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : Controller  Evaluasi Tahap I
 * ***************************************************************
 */


/**
 * Description of Crud
 *
 * @author Sutoni
 */

class laporan extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(array('form_validation','pagination')) ;
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model(array('master/model_laporan'));    
}

public function index(){
    $logged_in = $this->session->userdata('logged_in');
    if(!$logged_in){
        header("location : ".base_url());
    }
    
    $this->load->model('laporan/queries');
    $hal = number_format($this->uri->segment(3) );
    $per_page=10;
    
    $pcfg= array(
        'base_url' =>$this->links->get_link() .'/index/',
        'per_page' => $per_page,
        'total_rows' => $this->queries->all_data(),
        'attributes' => array('class'=>'btn btn-default'),
        'full_tag_open' => '<div class="btn-group">',
        'full_tag_close' => '</div>',
        'cur_tag_open' => '<button type="button" class="btn btn-danger">',
        'cur_tag_close' =>'</button>',
        'first_link' => 'Awal',
        'last_link' => 'Akhir',
    );
    
    $this->pagination->initialize($pcfg); 
    
    $res = array(
        'data' => $this->queries->data_pengguna($per_page,$hal),
        'jmldata' => $pcfg['total_rows'],
    );
    
    
    $this->load->view('design/header');
    $this->load->view('laporan/evaluasi_by_event',$res);
    $this->load->view('design/footer');
}
    public function add(){
    	 $id=$this->uri->segment(3);
        if(!empty($id)){
            redirect('laporan/add');
        }
        
        $this->load->model('laporan/queries');
       // $res['data'] = $this->queries->select_data($id);
        $res['data2'] = $this->queries->getNamatraining();
        
        if(empty($res['data2'])){
            redirect('evaluasi_dua/add');
        }
        
         $this->load->view('design/header');
        $this->load->view('laporan/add');
        $this->load->view('design/footer');
    }
    
    public function lap_evaluasi(){
    	$this->load->model('laporan/queries');
    	 $res['data'] = $this->queries->getNamatraining();
    	 
    	 $this->load->view('design/header');
        $this->load->view('laporan/add',$res);
        $this->load->view('design/footer');
    }
	
    public function edit(){
        $id=$this->uri->segment(3);
        if(empty($id)){
            redirect('evaluasi_dua/add');
        }
        
        $this->load->model('evaluasi_dua/queries');
        $res['data'] = $this->queries->select_data($id);
        
        if(empty($res['data'])){
            redirect('evaluasi_dua/add');
        }
        
        $this->load->view('design/header');
        $this->load->view('evaluasi_dua/edit',$res);
        $this->load->view('design/footer');
        
    }
    
    public function validate(){
        $config = array(
            array(
                'field' => 'txtsaran1',
                'label' => 'Topik Training',
                'rules' => 'required',
                'errors' => array('required' =>'Mohon dapat mengisi Topik Training yang menarik untuk anda ',),
            )
           
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            return false;
        }else {
            return TRUE;
        }
    }

    public function save(){
        if($this->validate() == TRUE){
            $this->load->model('evaluasi_dua/queries') ;
            $res = $this->queries->save_data();
           
            if($res){
                redirect('evaluasi_dua');
            }
            }
            else{
                $this->load->view('design/header');
                $this->load->view('evaluasi_dua/edit');
                $this->load->view('design/footer');
            }
        
    }
    
    public function update(){
        $id = $this->uri->segment(3);
        if($this->validate() == TRUE){
            $this->load->model('evaluasi_satu/queries');
            $res = $this->queries->update_data();
            if($res){
                redirect('evaluasi_satu');
            }
        }else{
            redirect('evaluasi_satu/edit');
        }
            
    }
    
		function getNamatraining(){
		//$this->load->model(materi_training/queries);
		
		$jawabammateri_training= $this->queries->getNamatraining();
		
		foreach($data as $key){
			$data .= "<tr><td>.'$key[desk_jawaban]'.</td><td>.'$key[desk_manfaat]'.</td> </tr>";
			
		}
		echo $data;
	}
	
		function evaluasi(){
			$this->load->model('laporan/queries');
			$txtNamatraining=$this->input->post('txtNamatraining');
			$txtEvaluasi=$this->input->post('txtEvaluasi');
			
			if($txtEvaluasi=="1"){
				$res['data1']= $this->queries->getEvaluasi1($txtNamatraining);
				//echo $this->db->last_query(); die;
				//echo $txtNamatraining;die;	
				if(empty($res['data1'])){
	            redirect('laporan/evaluasi');
	        		}
				
				$this->load->view('design/header');
				$this->load->view('laporan/lapEvaluasi1',$res);
				$this->load->view('design/footer');
			}
			elseif($txtEvaluasi=="2"){
			
				$res['data2']= $this->queries->getEvaluasi2($txtNamatraining);
				//echo $this->db->last_query(); die;
				//echo $txtNamatraining;die;	
				if(empty($res['data2'])){
	            redirect('laporan/evaluasi');
	        		}
				
				$this->load->view('design/header');
				$this->load->view('laporan/lapEvaluasi2',$res);
				$this->load->view('design/footer');
				
			}
			else{
			
				$res['data3']= $this->queries->getEvaluasi3($txtNamatraining);
				//echo $this->db->last_query(); die;
				//echo $txtNamatraining;die;	
				if(empty($res['data3'])){
	            redirect('laporan/evaluasi');
	        		}
				
				$this->load->view('design/header');
				$this->load->view('laporan/lapEvaluasi3',$res);
				$this->load->view('design/footer');
				
			}
			
			 
	        		
			
		}


        function laporanKeluarmasuk(){

            $res['data']=$this->model_laporan->cari_detailpengeluarancurr();
            $res['data0']=$this->model_laporan->jumlah_detailpengeluarancurr();
            $res['data1']=$this->model_laporan->cari_detailpemasukancurr();
            $res['data2']=$this->model_laporan->jumlah_detailpemasukancurr();
            //echo $this->db->last_query(); die;

            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('laporan/laporan-inout',$res);
            $this->load->view('design/footdepan');

        }


        function carilaporanInout(){

            if(isset($_POST['btnCari'])){
            
                    $res['data']=$this->model_laporan->cari_detailpengeluaranbtn();
                    $res['data0']=$this->model_laporan->jumlah_detailpengeluaranbtn();
                    $res['data1']=$this->model_laporan->cari_detailpemasukanbtn();
                    $res['data2']=$this->model_laporan->jumlah_detailpemasukanbtn();
                    //echo $this->db->last_query(); die;

                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('laporan/laporan-inout',$res);
                    $this->load->view('design/footdepan');


            }else{

                    $res['data']=$this->model_laporan->cari_detailpengeluaranbtn();
                    $res['data0']=$this->model_laporan->jumlah_detailpengeluaranbtn();
                    $res['data1']=$this->model_laporan->cari_detailpemasukanbtn();
                    $res['data2']=$this->model_laporan->jumlah_detailpemasukanbtn();
                    //echo $this->db->last_query(); die;

                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('laporan/print_inout_pdf',$res);
                    $this->load->view('design/footdepan');


            }

        }


        function cek_uangmuka(){

                    $res['data']=$this->model_laporan->cari_uangmukacurr();
                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('laporan/laporan-uangmuka',$res);
                    $this->load->view('design/footdepan');
        }



        public function validasi_cariUangmuka(){
        $config = array(
            array(
                'field' => 'txtBulan',
                'label' => 'Nama Bulan',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Nama Bulan',),
            array(
                'field' => 'txtStatus',
                'label' => 'Status Pengajuan Uang Muka',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Status Pengajuan Uang Muka',),
            
           
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                return false;
            }else {
                return TRUE;
            }
        }

        function carilaporanUangmuka(){

            if($this->validasi_cariUangmuka() == TRUE){

                if(isset($_POST['btnCari'])){

                    $res['data']=$this->model_laporan->cari_uangmukabtn();
                    //echo $this->db->last_query(); die;
                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('laporan/laporan-uangmuka',$res);
                    $this->load->view('design/footdepan');
                }else{

                }
            }else{

                    $res['data']=$this->model_laporan->cari_uangmukacurr();
                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('laporan/laporan-uangmuka',$res);
                    $this->load->view('design/footdepan');
            }

                
                    
        }
                
	
	
}
