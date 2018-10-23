<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : 
 * ***************************************************************
 */

/**
 * Description of access
 *
 * @author Pudyasto
 */
class Master extends CI_Controller {
    //put your code here
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
	$this->load->model(array('master/model_master'));	 
    }  

     function m_kodepemasukan(){
        
        $res['data']=$this->model_master->list_kodepemasukan();
        $res['username']=$this->session->userdata('username');
        //echo $this->db->last_query();die();
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('master/m_kodepemasukan',$res);
        $this->load->view('design/footdepan');
    } 

    public function validasi_kodepemasukan(){
        $config = array(
            array(
                'field' => 'txtnamapemasukan',
                'label' => 'Nama Pemasukan',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Nama Pemasukan',),
            array(
                'field' => 'txtketerangan',
                'label' => 'Keterangan',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Keterangan',),
            array(
                'field' => 'txttglberlaku',
                'label' => 'Tanggal Berlaku',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Tanggal Berlaku',),
            array(
                'field' => 'txttglberakhir',
                'label' => 'Tanggal Berakhir',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Tanggal Berakhir',),    
           
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            return false;
        }else {
            return TRUE;
        }
    }

    function simpanKodepemasukan(){


         if($this->validasi_kodepemasukan() == TRUE){
             $cekdata=array(
           
            'namapemasukan'=>$this->input->post('txtnamapemasukan'),
            
            );

                $this->db->where($cekdata);
                $result=$this->db->get('tm_kodepemasukan');
                //echo $this->db->last_query(); die;
                if($result->num_rows()>0){


                    echo "<script>alert('Maaf Nama Kode Pemasukan sudah pernah terdaftar');history.go(-1);</script>";
                }
                else{
            $res['data'] = $this->model_master->simpanKodepemasukan();
            //echo $this->db->last_query(); die;
            //$res['data2']=$this->model_jadwal->listpool();
            $res['data']=$this->model_master->list_kodepemasukan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('master/m_kodepemasukan',$res);
            $this->load->view('design/footdepan');
                }
         }else{
            //$res['data2']=$this->model_jadwal->listpool();
            $res['data']=$this->model_master->list_kodepemasukan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('master/m_kodepemasukan',$res);
            $this->load->view('design/footdepan');
         }


    }

    function m_Editkodepemasukan(){
        $id=$this->uri->segment(3);
        $id2=  urldecode($id);
        
        if(!empty($id2)){
            $res['data2']=$this->model_master->list_kodepemasukan();
            $res['data']=$this->model_master->list_kodepemasukan();
            $res['data3']=$this->model_master->list_kodepemasukan2($id2);
            
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('master/m_Editkodepemasukan',$res);
            $this->load->view('design/footdepan');
        }else{
            
        	$this->db->select('*');
                $this->db->from('tm_kodepemasukan');
                $query = $this->db->get();
                $rows=$query->result_array();
                $coba=count($rows);
                $tambah=$coba +1;
            $this->session->set_userdata('idpemasukan',$tambah);
            $res['idpemasukan']=$this->session->userdata('idpemasukan');
            $res['data3']=$this->model_master->list_kodepemasukan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('master/m_Editkodepemasukan',$res);
            $this->load->view('design/footdepan');


        }
    }

    function updateKodepemasukan(){

    	if(isset($_POST['btnUpdate'])){
            
            $res['data'] = $this->model_master->updateKodepemasukan();
            $res['data3']=$this->model_master->list_kodepemasukan();
            $res['data2']=$this->model_master->list_kodepemasukan();
            $res['data']=$this->model_master->list_kodepemasukan();

            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('master/m_Editkodepemasukan',$res);
            $this->load->view('design/footdepan');
        }else{
           // $res['data2']=$this->model_jadwal->listpool();
            $res['data']=$this->model_master->list_kodepemasukan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('master/m_kodepemasukan',$res);
            $this->load->view('design/footdepan');
        }

    }	



    //controller kode pengeluaran

         function m_kodepengeluaran(){
        
        $res['data']=$this->model_master->list_kodepengeluaran();
        $res['idpengeluaran']=$this->session->userdata('idpengeluaran');
        //echo $this->db->last_query();die();
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('master/m_kodepengeluaran',$res);
        $this->load->view('design/footdepan');
        } 

        public function validasi_kodepengeluaran(){
            $config = array(
                array(
                    'field' => 'txtnamapengeluaran',
                    'label' => 'Nama pengeluaran',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Nama pengeluaran',),
                array(
                    'field' => 'txtketerangan',
                    'label' => 'Keterangan',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Keterangan',),
                array(
                    'field' => 'txttglberlaku',
                    'label' => 'Tanggal Berlaku',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Berlaku',),
                array(
                    'field' => 'txttglberakhir',
                    'label' => 'Tanggal Berakhir',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Berakhir',),    
               
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                return false;
            }else {
                return TRUE;
            }
        }

        function simpanKodepengeluaran(){


             if($this->validasi_kodepengeluaran() == TRUE){
                 $cekdata=array(
               
                'namapengeluaran'=>$this->input->post('txtnamapengeluaran'),
                
                );

                    $this->db->where($cekdata);
                    $result=$this->db->get('tm_kodepengeluaran');
                    //echo $this->db->last_query(); die;
                    if($result->num_rows()>0){


                        echo "<script>alert('Maaf Nama Kode pengeluaran sudah pernah terdaftar');history.go(-1);</script>";
                    }
                    else{
                $res['data'] = $this->model_master->simpanKodepengeluaran();
                //echo $this->db->last_query(); die;
                //$res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_kodepengeluaran();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_kodepengeluaran',$res);
                $this->load->view('design/footdepan');
                    }
             }else{
                //$res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_kodepengeluaran();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_kodepengeluaran',$res);
                $this->load->view('design/footdepan');
             }


        }

        function m_Editkodepengeluaran(){
            $id=$this->uri->segment(3);
            $id2=  urldecode($id);
            
            if(!empty($id2)){
                $res['data2']=$this->model_master->list_kodepengeluaran();
                $res['data']=$this->model_master->list_kodepengeluaran();
                $res['data3']=$this->model_master->list_kodepengeluaran2($id2);
                
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editkodepengeluaran',$res);
                $this->load->view('design/footdepan');
            }else{
                
                $this->db->select('*');
                    $this->db->from('tm_kodepengeluaran');
                    $query = $this->db->get();
                    $rows=$query->result_array();
                    $coba=count($rows);
                    $tambah=$coba +1;
                $this->session->set_userdata('idpengeluaran',$tambah);
                $res['idpengeluaran']=$this->session->userdata('idpengeluaran');
                $res['data3']=$this->model_master->list_kodepengeluaran();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editkodepengeluaran',$res);
                $this->load->view('design/footdepan');


            }
        }

        function updateKodepengeluaran(){

            if(isset($_POST['btnUpdate'])){
                
                $res['data'] = $this->model_master->updateKodepengeluaran();
                $res['data3']=$this->model_master->list_kodepengeluaran();
                $res['data2']=$this->model_master->list_kodepengeluaran();
                $res['data']=$this->model_master->list_kodepengeluaran();

                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editkodepengeluaran',$res);
                $this->load->view('design/footdepan');
            }else{
               // $res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_kodepengeluaran();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_kodepengeluaran',$res);
                $this->load->view('design/footdepan');
            }

        }   


    //batas controller kode pengeluaran


    //Controller kode bidang
    
         function m_kodebidang(){
        
        $res['data']=$this->model_master->list_kodebidang();
        $res['idbidang']=$this->session->userdata('idbidang');
        //echo $this->db->last_query();die();
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('master/m_kodebidang',$res);
        $this->load->view('design/footdepan');
        } 

        public function validasi_kodebidang(){
            $config = array(
                array(
                    'field' => 'txtnamabidang',
                    'label' => 'Nama bidang',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Nama bidang',),
                array(
                    'field' => 'txtketerangan',
                    'label' => 'Keterangan',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Keterangan',),
                array(
                    'field' => 'txttglberlaku',
                    'label' => 'Tanggal Berlaku',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Berlaku',),
                array(
                    'field' => 'txttglberakhir',
                    'label' => 'Tanggal Berakhir',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Berakhir',),    
               
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                return false;
            }else {
                return TRUE;
            }
        }

        function simpanKodebidang(){


             if($this->validasi_kodebidang() == TRUE){
                 $cekdata=array(
               
                'namabidang'=>$this->input->post('txtnamabidang'),
                
                );

                    $this->db->where($cekdata);
                    $result=$this->db->get('tm_kodebidang');
                    //echo $this->db->last_query(); die;
                    if($result->num_rows()>0){


                        echo "<script>alert('Maaf Nama Kode bidang sudah pernah terdaftar');history.go(-1);</script>";
                    }
                    else{
                $res['data'] = $this->model_master->simpanKodebidang();
                //echo $this->db->last_query(); die;
                //$res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_kodebidang();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_kodebidang',$res);
                $this->load->view('design/footdepan');
                    }
             }else{
                //$res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_kodebidang();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_kodebidang',$res);
                $this->load->view('design/footdepan');
             }


        }

        function m_Editkodebidang(){
            $id=$this->uri->segment(3);
            $id2=  urldecode($id);
            
            if(!empty($id2)){
                $res['data2']=$this->model_master->list_kodebidang();
                $res['data']=$this->model_master->list_kodebidang();
                $res['data3']=$this->model_master->list_kodebidang2($id2);
                
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editkodebidang',$res);
                $this->load->view('design/footdepan');
            }else{
                
                $this->db->select('*');
                    $this->db->from('tm_kodebidang');
                    $query = $this->db->get();
                    $rows=$query->result_array();
                    $coba=count($rows);
                    $tambah=$coba +1;
                $this->session->set_userdata('idbidang',$tambah);
                $res['idbidang']=$this->session->userdata('idbidang');
                $res['data3']=$this->model_master->list_kodebidang();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editkodebidang',$res);
                $this->load->view('design/footdepan');


            }
        }

        function updateKodebidang(){

            if(isset($_POST['btnUpdate'])){
                
                $res['data'] = $this->model_master->updateKodebidang();
                $res['data3']=$this->model_master->list_kodebidang();
                $res['data2']=$this->model_master->list_kodebidang();
                $res['data']=$this->model_master->list_kodebidang();

                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editkodebidang',$res);
                $this->load->view('design/footdepan');
            }else{
               // $res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_kodebidang();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_kodebidang',$res);
                $this->load->view('design/footdepan');
            }

        }   

    //batas controller bidang    


    //Controller Kegiatan    

        function m_kodekegiatan(){
        
        $res['data']=$this->model_master->list_kodekegiatan();
        $res['idkegiatan']=$this->session->userdata('idkegiatan');
        //echo $this->db->last_query();die();
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('master/m_kodekegiatan',$res);
        $this->load->view('design/footdepan');
        } 

        public function validasi_kodekegiatan(){
            $config = array(
                array(
                    'field' => 'txtnamakegiatan',
                    'label' => 'Nama kegiatan',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Nama kegiatan',),
                array(
                    'field' => 'txtketerangan',
                    'label' => 'Keterangan',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Keterangan',),
                array(
                    'field' => 'txttglberlaku',
                    'label' => 'Tanggal Berlaku',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Berlaku',),
                array(
                    'field' => 'txttglberakhir',
                    'label' => 'Tanggal Berakhir',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Berakhir',),    
               
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                return false;
            }else {
                return TRUE;
            }
        }

        function simpanKodekegiatan(){


             if($this->validasi_kodekegiatan() == TRUE){
                 $cekdata=array(
               
                'namakegiatan'=>$this->input->post('txtnamakegiatan'),
                
                );

                    $this->db->where($cekdata);
                    $result=$this->db->get('tm_kodekegiatan');
                    //echo $this->db->last_query(); die;
                    if($result->num_rows()>0){


                        echo "<script>alert('Maaf Nama Kode kegiatan sudah pernah terdaftar');history.go(-1);</script>";
                    }
                    else{
                $res['data'] = $this->model_master->simpanKodekegiatan();
                //echo $this->db->last_query(); die;
                //$res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_kodekegiatan();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_kodekegiatan',$res);
                $this->load->view('design/footdepan');
                    }
             }else{
                //$res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_kodekegiatan();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_kodekegiatan',$res);
                $this->load->view('design/footdepan');
             }


        }

        function m_Editkodekegiatan(){
            $id=$this->uri->segment(3);
            $id2=  urldecode($id);
            
            if(!empty($id2)){
                $res['data2']=$this->model_master->list_kodekegiatan();
                $res['data']=$this->model_master->list_kodekegiatan();
                $res['data3']=$this->model_master->list_kodekegiatan2($id2);
                
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editkodekegiatan',$res);
                $this->load->view('design/footdepan');
            }else{
                
                $this->db->select('*');
                    $this->db->from('tm_kodekegiatan');
                    $query = $this->db->get();
                    $rows=$query->result_array();
                    $coba=count($rows);
                    $tambah=$coba +1;
                $this->session->set_userdata('idkegiatan',$tambah);
                $res['idkegiatan']=$this->session->userdata('idkegiatan');
                $res['data3']=$this->model_master->list_kodekegiatan();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editkodekegiatan',$res);
                $this->load->view('design/footdepan');


            }
        }

        function updateKodekegiatan(){

            if(isset($_POST['btnUpdate'])){
                
                $res['data'] = $this->model_master->updateKodekegiatan();
                $res['data3']=$this->model_master->list_kodekegiatan();
                $res['data2']=$this->model_master->list_kodekegiatan();
                $res['data']=$this->model_master->list_kodekegiatan();

                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editkodekegiatan',$res);
                $this->load->view('design/footdepan');
            }else{
               // $res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_kodekegiatan();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_kodekegiatan',$res);
                $this->load->view('design/footdepan');
            }

        }

    //batas Controller Kegiatan    

    //Controller data Jamaah
    
        function m_jamaah(){
        
        $res['data']=$this->model_master->list_kodepengeluaran();
        //$res['idkegiatan']=$this->session->userdata('idkegiatan');
        //echo $this->db->last_query();die();
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('master/m_jamaah',$res);
        $this->load->view('design/footdepan');
        }


        public function validasi_jamaah(){
            $config = array(
                array(
                    'field' => 'txtnamajamaah',
                    'label' => 'Nama Jamaah',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Nama Lengkap',),
                array(
                    'field' => 'txtgender',
                    'label' => 'Gender',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Gender',),
                array(
                    'field' => 'txtkelurahan',
                    'label' => 'Kelurahan',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Nama Kelurahan',),
                array(
                    'field' => 'txttglberakhir',
                    'label' => 'Tanggal Berakhir',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Berakhir',),    
               
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                return false;
            }else {
                return TRUE;
            }
        }


        function simpanJamaah(){


             if($this->validasi_jamaah() == TRUE){
                 $cekdata=array(
               
                'namajamaah'=>$this->input->post('txtnamajamaah'),
                'tgllahir'=>$this->input->post('txttgllahir'),
                
                );

                    $this->db->where($cekdata);
                    $result=$this->db->get('tm_jamaah');
                    //echo $this->db->last_query(); die;
                    if($result->num_rows()>0){


                        echo "<script>alert('Maaf Nama jamaah sudah pernah terdaftar');history.go(-1);</script>";
                    }
                    else{
                $res['data'] = $this->model_master->simpanJamaah();
                //echo $this->db->last_query(); die;
                //$res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_jamaah();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_jamaah',$res);
                $this->load->view('design/footdepan');
                    }
             }else{
                //$res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_kodekegiatan();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_jamaah',$res);
                $this->load->view('design/footdepan');
             }


        }

    //batas Controller data Jamaah    

    //Controller Jabatan

        function m_jabatan(){
        
        $res['data']=$this->model_master->list_jabatan();
        //$res['idkegiatan']=$this->session->userdata('idkegiatan');
        //echo $this->db->last_query();die();
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('master/m_jabatan',$res);
        $this->load->view('design/footdepan');
        }

        public function validasi_jabatan(){
            $config = array(
                array(
                    'field' => 'txtnamajabatan',
                    'label' => 'Nama bidang',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Nama jabatan',),
                array(
                    'field' => 'txtketerangan',
                    'label' => 'Keterangan',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Keterangan',),
                array(
                    'field' => 'txttglberlaku',
                    'label' => 'Tanggal Berlaku',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Berlaku',),
                array(
                    'field' => 'txttglberakhir',
                    'label' => 'Tanggal Berakhir',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Berakhir',),    
               
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                return false;
            }else {
                return TRUE;
            }
        }


        function simpanJabatan(){


             if($this->validasi_jabatan() == TRUE){
                 $cekdata=array(
               
                'namajabatan'=>$this->input->post('txtnamajabatan'),
                
                );

                    $this->db->where($cekdata);
                    $result=$this->db->get('tm_jabatan');
                    //echo $this->db->last_query(); die;
                    if($result->num_rows()>0){


                        echo "<script>alert('Maaf Nama Kode bidang sudah pernah terdaftar');history.go(-1);</script>";
                    }
                    else{
                $res['data'] = $this->model_master->simpanJabatan();
                //echo $this->db->last_query(); die;
                //$res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_jabatan();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_jabatan',$res);
                $this->load->view('design/footdepan');
                    }
             }else{
                //$res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_jabatan();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_jabatan',$res);
                $this->load->view('design/footdepan');
             }

            

        }

        function m_Editjabatan(){
            $id=$this->uri->segment(3);
            $id2=  urldecode($id);
            
            if(!empty($id2)){
                $res['data2']=$this->model_master->list_jabatan();
                $res['data']=$this->model_master->list_jabatan();
                $res['data3']=$this->model_master->list_jabatan($id2);
                
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editjabatan',$res);
                $this->load->view('design/footdepan');
            }else{
                
                $this->db->select('*');
                    $this->db->from('tm_jabatan');
                    $query = $this->db->get();
                    $rows=$query->result_array();
                    $coba=count($rows);
                    $tambah=$coba +1;
                $this->session->set_userdata('idjabatan',$tambah);
                $res['idbidang']=$this->session->userdata('idjabatan');
                $res['data3']=$this->model_master->list_jabatan();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editjabatan',$res);
                $this->load->view('design/footdepan');


            }
        }

        function updateJabatan(){

            if(isset($_POST['btnUpdate'])){
                
                $res['data'] = $this->model_master->updateJabatan();
                $res['data3']=$this->model_master->list_jabatan();
                $res['data2']=$this->model_master->list_jabatan();
                $res['data']=$this->model_master->list_jabatan();
                //echo $this->db->last_query(); die;
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editjabatan',$res);
                $this->load->view('design/footdepan');
            }else{
               // $res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_jabatan();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_jabatan',$res);
                $this->load->view('design/footdepan');
            }

        }

    //batas Controller Jabatan    

    //Controller Pengurus
    
        function m_pengurus(){
        
        $res['data']=$this->model_master->list_pengurus();

        $res['data1']=$this->model_master->list_kodebidang();
        $res['data2']=$this->model_master->list_jabatan();
        $res['data3']=$this->model_master->list_jamaah();
        //$res['idkegiatan']=$this->session->userdata('idkegiatan');
        //echo $this->db->last_query();die();
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('master/m_pengurus',$res);
        $this->load->view('design/footdepan');
        }


        public function validasi_pengurus(){
            $config = array(
                array(
                    'field' => 'txtnamapengurus',
                    'label' => 'Nama Pengurus',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Nama Pengurus',),
                array(
                    'field' => 'txtbidang',
                    'label' => 'Bidang Pekerjaan',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Bidang Pekerjaan',),
                array(
                    'field' => 'txtjabatan',
                    'label' => 'Nama Jabatan',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Nama Jabatan',),
                 array(
                    'field' => 'txttglberlaku',
                    'label' => 'Tanggal Berlaku',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Berlaku',),
                array(
                    'field' => 'txttglberakhir',
                    'label' => 'Tanggal Berakhir',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Berakhir',),    
               
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                return false;
            }else {
                return TRUE;
            }
        }


        function simpanPengurus(){

            

            if($this->validasi_pengurus() == TRUE){
                 $cekdata=array(
               
                'idjamaah'=>$this->input->post('txtnamapengurus'),
                'idbidang'=>$this->input->post('txtbidang'),
                'idjabatan'=>$this->input->post('txtjabatan'),
                
                );

                 $this->db->where($cekdata);
                    $result=$this->db->get('tm_pengurus');
                    //echo $this->db->last_query(); die;
                    if($result->num_rows()>0){


                        echo "<script>alert('Maaf Nama Kode bidang sudah pernah terdaftar');history.go(-1);</script>";
                    }
                    else{
                            $res['data'] = $this->model_master->simpanPengurus();
                            //echo $this->db->last_query(); die;
                            //$res['data2']=$this->model_jadwal->listpool();
                            $res['data']=$this->model_master->list_Pengurus();
                            $this->load->view('design/headdepan');
                            $this->load->view('design/navbar_akses');
                            $this->load->view('master/m_pengurus',$res);
                            $this->load->view('design/footdepan');
                    }   

            }
            else{

                          $res['data'] = $this->model_master->simpanPengurus();
                            //echo $this->db->last_query(); die;
                            //$res['data2']=$this->model_jadwal->listpool();
                            $res['data']=$this->model_master->list_Pengurus();
                            $this->load->view('design/headdepan');
                            $this->load->view('design/navbar_akses');
                            $this->load->view('master/m_pengurus',$res);
                            $this->load->view('design/footdepan');
            }     

        }



        function m_Editpengurus(){
            $id=$this->uri->segment(3);
            $id2=  urldecode($id);
            
            if(!empty($id2)){
                $res['data']=$this->model_master->list_pengurus();

                $res['data1']=$this->model_master->list_kodebidang();
                $res['data2']=$this->model_master->list_jabatan();
                $res['data3']=$this->model_master->list_jamaah();


                
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editpengurus',$res);
                $this->load->view('design/footdepan');
            }else{


            }

        }


        function UpdatePengurus(){


                if(isset($_POST['btnUpdate'])){
                
                $res['data']=$this->model_master->list_pengurus();

                $res['data1']=$this->model_master->list_kodebidang();
                $res['data2']=$this->model_master->list_jabatan();
                $res['data3']=$this->model_master->list_jamaah();
                //echo $this->db->last_query(); die;
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editpengurus',$res);
                $this->load->view('design/footdepan');
            }else{
               // $res['data2']=$this->model_jadwal->listpool();
                $res['data']=$this->model_master->list_jabatan();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('master/m_Editpengurus',$res);
                $this->load->view('design/footdepan');
            }

        }    
    //batas Controller Pengurus    

        //Controller Pengajuan Uang Muka

        function ku_uangmuka(){
            $res['data']=$this->model_master->list_uangmuka();
            $res['data1']=$this->model_master->list_kodebidang();
            //$res['idbidang']=$this->session->userdata('idbidang');
            //echo $this->db->last_query();die();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('keuangan/ku_uangmuka',$res);
            $this->load->view('design/footdepan');
         }

        //batas Controller Pengajuan Uang Muka



          //Controller Pencatatan Keuangan

            function ku_catatpengeluaran(){
            $res['data']=$this->model_master->list_pencatatanuang();
            $res['data1']=$this->model_master->list_kodebidang();
            //$res['idbidang']=$this->session->userdata('idbidang');
            //echo $this->db->last_query();die();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('keuangan/ku_catatpengeluaran',$res);
            $this->load->view('design/footdepan');
         }


            public function validasi_catatpengeluaran(){
            $config = array(
                array(
                    'field' => 'txtbidang',
                    'label' => 'Nama bidang',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Nama Bidang',),
                array(
                    'field' => 'txtketerangan',
                    'label' => 'Keterangan',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Keterangan Keperluan Pengeluaran',),
              
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                return false;
            }else {
                return TRUE;
            }
        }


            function simpanHeaderpengeluarantutup(){


                    $res['data'] = $this->model_master->simpanHeaderpengeluarantutup();
                   
                    
                    $cekidpengeluaran=$res['data2']=$this->session->userdata('idpengeluaran');
                    $res['data0'] = $this->model_master->getdetailpengeluaran($cekidpengeluaran);
                    
                    $res['data1']=$this->model_master->headerpencatatanuangtutup($cekidpengeluaran);
                    $res['data3']=$this->model_master->getpospengeluaran();
                    $res['data4']=$this->model_master->updatetutupuangmuka($cekidpengeluaran);
                     $cekidrefrensi=$res['data8']=$this->session->userdata('idrefrensi');
                    $res['data5']=$this->model_master->jumlahtotal($cekidrefrensi);
                    //echo $this->db->last_query();die(); 
                    $res['data6']=$this->model_master->jumlahtotalpengeluaran($cekidpengeluaran);

                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('keuangan/ku_catatdetailpengeluarantutup',$res);
                    $this->load->view('design/footdepan');

            }

            function simpanHeaderpengeluaran(){


                if($this->validasi_catatpengeluaran() == TRUE){

                    

                    $res['data'] = $this->model_master->simpanHeaderpengeluaran();
                   
                    
                    $cekidpengeluaran=$res['data2']=$this->session->userdata('idpengeluaran');
                    $res['data0'] = $this->model_master->getdetailpengeluaran($cekidpengeluaran);
                    //echo $this->db->last_query();die();
                    $res['data1']=$this->model_master->headerpencatatanuang($cekidpengeluaran);
                    $res['data2']=$this->model_master->getpospengeluaran();

                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('keuangan/ku_catatdetailpengeluaran',$res);
                    $this->load->view('design/footdepan');

                }else{


                    $res['data']=$this->model_master->list_pencatatanuang();
                    $res['data1']=$this->model_master->list_kodebidang();
                    //echo $this->db->last_query();die();
                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('keuangan/ku_catatpengeluaran',$res);
                    $this->load->view('design/footdepan');


                }


            }



            function validasi_detailpengeluaran(){
            $config = array(
                array(
                    'field' => 'txttglbon',
                    'label' => 'Tanggal Bon / Kwitansi',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Kwitansi atau Bon',),
                array(
                    'field' => 'txtketerangandetail',
                    'label' => 'Keterangan',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Keterangan Keperluan Pengeluaran',),
              
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                return false;
            }else {
                return TRUE;
            }
        }


        function simpanDetailpengeluaran(){

            if(isset($_POST['btnTambah'])){

                        if($this->validasi_detailpengeluaran() == TRUE){
                            $txtidpengeluaran=$this->input->post('txtidpengeluaran');
                            $txtketeranganpengeluaran=$this->input->post('txtketerangandetail');

                            $res['data'] = $this->model_master->cekdobel($txtidpengeluaran, $txtketeranganpengeluaran);
                            $cekdobelnya=$this->session->userdata('countketerangan');
                            
                            if($cekdobelnya>1){

                                //$res['data'] = $this->model_master->simpanDetailpengeluaran($txtidpengeluaran);
                                //echo $this->db->last_query();die();

                                $cekidpengeluaran=$res['data2']=$this->session->userdata('idpengeluaran');
                                $res['data0'] = $this->model_master->getdetailpengeluaran($cekidpengeluaran);
                                //echo $this->db->last_query();die();
                                $res['data1']=$this->model_master->headerpencatatanuang($cekidpengeluaran);
                                $res['data2']=$this->model_master->getpospengeluaran();

                                $this->load->view('design/headdepan');
                                $this->load->view('design/navbar_akses');
                                $this->load->view('keuangan/ku_catatdetailpengeluaran',$res);
                                $this->load->view('design/footdepan');

                            }else{

                                
                                //$data['hasilTransaksi'] = $this->model_master->updateTotalpengeluaran(); //membuat data dari hasil transaksi masuk ke $datac
                               
                                //echo $this->db->last_query();die();
                                
                                $res['data'] = $this->model_master->simpanDetailpengeluaran($txtidpengeluaran);
                                
                                $res['datadetail'] = $this->model_master->updateTotalpengeluaran();

                                $cekidpengeluaran=$res['data2']=$this->session->userdata('idpengeluaran');
                                $res['data0'] = $this->model_master->getdetailpengeluaran($cekidpengeluaran);
                                //echo $this->db->last_query();die();
                                $res['data1']=$this->model_master->headerpencatatanuang($cekidpengeluaran);
                                $res['data2']=$this->model_master->getpospengeluaran();

                                $this->load->view('design/headdepan');
                                $this->load->view('design/navbar_akses');
                                $this->load->view('keuangan/ku_catatdetailpengeluaran',$res);
                                $this->load->view('design/footdepan');

                            }

                            

                     }else{

                           echo "Kosong";
                     }


            }else{

                        $res['data']=$this->model_master->list_pencatatanuang();
                        $res['data1']=$this->model_master->list_kodebidang();
                        //$res['idbidang']=$this->session->userdata('idbidang');
                        //echo $this->db->last_query();die();
                        $this->load->view('design/headdepan');
                        $this->load->view('design/navbar_akses');
                        $this->load->view('keuangan/ku_catatpengeluaran',$res);
                        $this->load->view('design/footdepan');
            }

            
             
        }

        //batas Controller Pencatatan Keuangan


        //Controller Pengajuan Uang Muka


        function validasi_pengajuanuangmuka(){
            $config = array(
                array(
                    'field' => 'txttgldibutuhkan',
                    'label' => 'Tanggal Dibutuhkan',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Tanggal Dibutuhkan',),
                array(
                    'field' => 'txtbidang',
                    'label' => 'Bidang Pengaju',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Bidang Pengaju',),
                array(
                    'field' => 'txtkeperluan',
                    'label' => 'Uraian Keperluan',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Uraian Keperluan',),
                    array(
                    'field' => 'txtnilaiuangmuka',
                    'label' => 'Nilai',
                    'rules' => 'required'),
                    'errors' => array('required' =>'Mohon diisi Nilai Uang',),
              
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                return false;
            }else {
                return TRUE;
            }
        }


        function simpanUangmuka(){

                 if(isset($_POST['btnDraft'])){

                        if($this->validasi_pengajuanuangmuka() == TRUE){

                            $res['data'] = $this->model_master->simpanUangmuka();

                            $res['data']=$this->model_master->list_uangmuka();
                            $res['data1']=$this->model_master->list_kodebidang();
                            //$res['idbidang']=$this->session->userdata('idbidang');
                            //echo $this->db->last_query();die();
                            $this->load->view('design/headdepan');
                            $this->load->view('design/navbar_akses');
                            $this->load->view('keuangan/ku_uangmuka',$res);
                            $this->load->view('design/footdepan');
                        }

                 }else{

                         if($this->validasi_pengajuanuangmuka() == TRUE){

                            $res['data'] = $this->model_master->submitUangmuka();

                            $res['data']=$this->model_master->list_uangmuka();
                            $res['data1']=$this->model_master->list_kodebidang();
                            //$res['idbidang']=$this->session->userdata('idbidang');
                            //echo $this->db->last_query();die();
                            $this->load->view('design/headdepan');
                            $this->load->view('design/navbar_akses');
                            $this->load->view('keuangan/ku_uangmuka',$res);
                            $this->load->view('design/footdepan');

                 }       
        }


        }



        function m_Edituangmuka(){
            $id=$this->uri->segment(3);
            $id2=  urldecode($id);


            if(!empty($id2)){
                

                $res['data']=$this->model_master->getUangmuka($id2);
               // echo $this->db->last_query();die();
                $res['data1']=$this->model_master->list_kodebidang();

                //$res['idbidang']=$this->session->userdata('idbidang');
                
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_Edituangmuka',$res);
                $this->load->view('design/footdepan');

            }else{
                
                $res['data']=$this->model_master->getUangmuka($id2);
                $res['data1']=$this->model_master->list_kodebidang();

                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');


            }
        }



        function updateUangmuka(){

            if(isset($_POST['btnUpdateDraft'])){

                $res['data0']=$this->model_master->updateDraftUangmuka();
                $res['data']=$this->model_master->list_uangmuka();
                $res['data1']=$this->model_master->list_kodebidang();
                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');

            }
            elseif(isset($_POST['btnSubmit'])){

                $res['data0']=$this->model_master->updateSubmitUangmuka();
                $res['data']=$this->model_master->list_uangmuka();
                $res['data1']=$this->model_master->list_kodebidang();
                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');

            }
            elseif(isset($_POST['btnApprove'])){

                $res['data0']=$this->model_master->updateApproveUangmuka2();
                $res['data']=$this->model_master->list_uangmuka();
                $res['data1']=$this->model_master->list_kodebidang();
                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');

            }
            elseif(isset($_POST['btnBayar'])){

                $res['data0']=$this->model_master->updateBayarUangmuka2();
                $res['data']=$this->model_master->list_uangmuka();
                $res['data1']=$this->model_master->list_kodebidang();
                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');

            }
            else{

                $res['data0']=$this->model_master->updateDraftUangmuka();
                $res['data']=$this->model_master->list_uangmuka();
                $res['data1']=$this->model_master->list_kodebidang();
                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');

            }
        }    


        function m_Approveuangmuka(){


            $id=$this->uri->segment(3);
            $id2=  urldecode($id);


            if(!empty($id2)){
                
                $res['data']=$this->model_master->updateApproveUangmuka($id2);

                $res['data']=$this->model_master->getUangmuka($id2);
                $res['data1']=$this->model_master->list_kodebidang();

                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');

            }else{
                
                

                $res['data']=$this->model_master->getUangmuka($id2);
                $res['data1']=$this->model_master->list_kodebidang();

                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');



            }

        }


        function m_Rejectuangmuka(){


            $id=$this->uri->segment(3);
            $id2=  urldecode($id);


            if(!empty($id2)){
                
                $res['data']=$this->model_master->updateRejectUangmuka($id2);

                $res['data']=$this->model_master->getUangmuka($id2);
                $res['data1']=$this->model_master->list_kodebidang();

                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');

            }else{
                
                

                $res['data']=$this->model_master->getUangmuka($id2);
                $res['data1']=$this->model_master->list_kodebidang();

                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');

            }

        }


        function m_Bayaruangmuka(){


            $id=$this->uri->segment(3);
            $id2=  urldecode($id);


            if(!empty($id2)){
                
                $res['data']=$this->model_master->updateBayarUangmuka($id2);

                $res['data']=$this->model_master->getUangmuka($id2);
                $res['data1']=$this->model_master->list_kodebidang();

                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');

            }else{
                
                

                $res['data']=$this->model_master->getUangmuka($id2);
                $res['data1']=$this->model_master->list_kodebidang();

                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');

            }

        }


        function ku_tutupuangmuka(){
            $id=$this->uri->segment(3);
            $id2=  urldecode($id);


            if(!empty($id2)){
                

                $res['data']=$this->model_master->getUangmuka2($id2);
               //echo $this->db->last_query();die();
                $res['data1']=$this->model_master->list_kodebidang();

                //$res['idbidang']=$this->session->userdata('idbidang');
                
                $res['data2']=$this->model_master->list_pencatatanuang();
                
                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_tutupuangmuka',$res);
                $this->load->view('design/footdepan');



            }else{
                
                $res['data']=$this->model_master->getUangmuka($id2);
                $res['data1']=$this->model_master->list_kodebidang();

                //$res['idbidang']=$this->session->userdata('idbidang');
                //echo $this->db->last_query();die();
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('keuangan/ku_uangmuka',$res);
                $this->load->view('design/footdepan');


            }
        }


        function simpanDetailpengeluarantutup(){

            {

            if(isset($_POST['btnTambah'])){

                        if($this->validasi_detailpengeluaran() == TRUE){
                            $txtidpengeluaran=$this->input->post('txtidpengeluaran');
                            $txtketeranganpengeluaran=$this->input->post('txtketerangandetail');

                            $res['data'] = $this->model_master->cekdobel($txtidpengeluaran, $txtketeranganpengeluaran);
                            $cekdobelnya=$this->session->userdata('countketerangan');
                            
                            if($cekdobelnya>1){

                                //$res['data'] = $this->model_master->simpanDetailpengeluaran($txtidpengeluaran);
                                //echo $this->db->last_query();die();

                                $cekidpengeluaran=$res['data2']=$this->session->userdata('idpengeluaran');
                                $res['data0'] = $this->model_master->getdetailpengeluaran($cekidpengeluaran);
                                $res['data5']=$this->model_master->jumlahtotal($cekidpengeluaran);
                                $res['data1']=$this->model_master->headerpencatatanuangtutup($cekidpengeluaran);
                                //echo $this->db->last_query();die();
                                $res['data3']=$this->model_master->getpospengeluaran();
                                $res['data6']=$this->model_master->jumlahtotalpengeluaran($cekidpengeluaran);
                                

                                $this->load->view('design/headdepan');
                                $this->load->view('design/navbar_akses');
                                $this->load->view('keuangan/ku_catatdetailpengeluarantutup',$res);
                                
                                $this->load->view('design/footdepan');

                            }else{

                                
                                //$data['hasilTransaksi'] = $this->model_master->updateTotalpengeluaran(); //membuat data dari hasil transaksi masuk ke $datac
                               
                                //echo $this->db->last_query();die();
                                
                                $res['data'] = $this->model_master->simpanDetailpengeluaran($txtidpengeluaran);
                                
                                $res['datadetail'] = $this->model_master->updateTotalpengeluaran();

                                $cekidpengeluaran=$res['data2']=$this->session->userdata('idpengeluaran');
                                $res['data0'] = $this->model_master->getdetailpengeluaran($cekidpengeluaran);
                                $res['data5']=$this->model_master->jumlahtotal($cekidpengeluaran);
                                $res['data1']=$this->model_master->headerpencatatanuangtutup($cekidpengeluaran);
                                $res['data3']=$this->model_master->getpospengeluaran();
                                $res['data6']=$this->model_master->jumlahtotalpengeluaran($cekidpengeluaran);
                                //echo $this->db->last_query();die();

                                $this->load->view('design/headdepan');
                                $this->load->view('design/navbar_akses');
                                $this->load->view('keuangan/ku_catatdetailpengeluarantutup',$res);
                                $this->load->view('design/footdepan');

                            }

                            

                     }else{

                           echo "Kosong";
                     }


            }else{

                        $res['data']=$this->model_master->list_pencatatanuang();
                        $res['data1']=$this->model_master->list_kodebidang();
                        //$res['idbidang']=$this->session->userdata('idbidang');
                        //echo $this->db->last_query();die();
                        $this->load->view('design/headdepan');
                        $this->load->view('design/navbar_akses');
                        $this->load->view('keuangan/ku_catatpengeluaran',$res);
                        $this->load->view('design/footdepan');
            }

            
             
        }
        }

     //Catat Pemasukan
        function ku_catatpemasukan(){

                        $res['data']=$this->model_master->list_kodepemasukan();
                        
                        
                        
                        $this->load->view('design/headdepan');
                        $this->load->view('design/navbar_akses');
                        $this->load->view('keuangan/ku_catatpemasukan',$res);
                        $this->load->view('design/footdepan');
        }


        public function validasi_catatpemasukan(){
        $config = array(
            array(
                'field' => 'txtkdpemasukan',
                'label' => 'Kode Pemasukan',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Kode Pemasukan',),
            array(
                'field' => 'txtketerangan',
                'label' => 'Keterangan',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Uraian Pemasukan ',),
            array(
                'field' => 'txtnilaipemasukan',
                'label' => 'Nilai Pemasukan',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Nilai Pemasukan',),
           
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            return false;
        }else {
            return TRUE;
        }
    }

        function simpanPemasukan(){

            if($this->validasi_catatpemasukan() == TRUE){

                        $txttglcatat=$this->input->post('txttglcatat');
                        $txtrefrensi=$this->input->post('txtrefrensi');
                        $txtnilaipemasukan=$this->input->post('txtnilaipemasukan');
                        $txtkdpemasukan=$this->input->post('txtkdpemasukan');
                        $res['data1'] = $this->model_master->cekdobelpemasukan($txttglcatat, $txtrefrensi,$txtnilaipemasukan,$txtkdpemasukan);

                        $cekdobelnya=$this->session->userdata('countdobel');

                        //echo $this->db->last_query();die();   
                        echo $cekdobelnya;
                            if($cekdobelnya>=1){

                                $res['data']=$this->model_master->list_kodepemasukan();
                                
                                 
                                
                                $this->load->view('design/headdepan');
                                $this->load->view('design/navbar_akses');
                                $this->load->view('keuangan/ku_catatpemasukan',$res);
                                $this->load->view('design/footdepan');

                            }
                            else{

                                $res['data0']=$this->model_master->simpanPemasukan();
                                $res['data']=$this->model_master->list_kodepemasukan();
                                
                                
                                $this->load->view('design/headdepan');
                                $this->load->view('design/navbar_akses');
                                $this->load->view('keuangan/ku_catatpemasukan',$res);
                                $this->load->view('design/footdepan');

                            }


                        
            }else{


            }


        }


}