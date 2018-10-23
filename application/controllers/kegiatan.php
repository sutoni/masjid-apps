<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
         $this->load->helper('form');
          $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->model('master/model_kegiatan');
    }

    public function index()
    {
        $res['data'] = $this->model_kegiatan->getAll();
        
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('kegiatan/k_sholatwajib',$res);
        $this->load->view('design/footdepan');
    }



    public function import()
    {
        if(!$this->input->is_ajax_request()){
            show_404();
        }
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $this->form_validation->set_rules('file','File','callback_notEmpty');
        
        $response= false;
        if(!$this->form_validation->run()){
            $response['status']    = 'form-incomplete';
            $response['errors']    =    array(
                array(
                    'field'    => 'input[name="file"]',
                    'error'    => form_error('file')
                )
            );
        }
        else{
            try{
                
                $filename = $_FILES["file"]["tmp_name"];
                if($_FILES['file']['size'] > 0)
                {
                    $file = fopen($filename,"r");
                    $is_header_removed = FALSE;
                    while(($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
                    {
                        if(!$is_header_removed){
                            $is_header_removed = TRUE;
                            continue;
                        }
                        $row = array(
                            'idtgsholat'    =>  !empty($importdata[0])?$importdata[0]:'',
                            'namasholat'    =>  !empty($importdata[1])?$importdata[1]:'',
                            'kategori'      =>  !empty($importdata[2])?$importdata[2]:'',
                            'imam'          =>  !empty($importdata[3])?$importdata[3]:'',
                            'muadzhin'      =>  !empty($importdata[4])?$importdata[4]:'',
                            'penceramah'      =>  !empty($importdata[4])?$importdata[4]:'',
                            'tanggal'      =>  !empty($importdata[4])?$importdata[4]:'',
                            'status'      =>  !empty($importdata[4])?$importdata[4]:''
                        );
                        $this->db->trans_begin();
                        $this->students_tbl_model->add($row);
                        if(!$this->db->trans_status()){
                            $this->db->trans_rollback();
                            $response['status']='error';
                            $response['message']='Something went wrong while saving your data';
                            break;
                        }else{
                            $this->db->trans_commit();
                            $response['status']='success';
                            $response['message']='Successfully added new record.';
                        }
                    }
                    fclose($file);
                }
               
            }
            catch(Exception $e){
                $this->db->trans_rollback();
                $response['status']='error';
                $response['message']='Something went wrong while trying to communicate with the server.';
            }
        }
        echo json_encode($response);
    }
    public function notEmpty(){
        if(!empty($_FILES['file']['name'])){
            return TRUE;
        }
        else{
            $this->form_validation->set_message('notEmpty','The {field} field can not be empty.');
            return FALSE;
        }
    }


    //Controller cari jadwal sholat
        public function validasi_carijadwal(){
        $config = array(
            array(
                'field' => 'txttgldari',
                'label' => 'Tanggal Awal',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Tanggal Awal',),
            array(
                'field' => 'txttglsampai',
                'label' => 'Tanggal Sampai',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Sampai Tanggal Berapa Jadwal dibutuhkan',),
              
           
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            return false;
        }else {
            return TRUE;
        }
    }    


        function cari(){ 

             if($this->validasi_carijadwal() == TRUE){

                    /*if(isset($_POST['btnCari'])){*/
                        $logged_in = $this->session->userdata('logged_in');

                        $txttgldari=$this->input->post('txttgldari');
                        $txttglsampai=$this->input->post('txttglsampai');
                       
                    if($logged_in){

                            $cektgldari=$this->session->userdata($txttgldari);
                            $cektglsampai=$this->session->userdata($txttglsampai);

                        /*if($txttglsampai!='' && $txttgldari !=''){*/
                                                        
                            $res['data1'] = $this->model_kegiatan->cari_jadwal($txttglsampai,$txttgldari);

                            //echo $this->db->last_query(); die;
                            $this->load->view('design/headdepan');
                            $this->load->view('design/navbar_akses');
                            $this->load->view('kegiatan/hasiljadwal',$res);
                            $this->load->view('design/footdepan');

                       /* }
                        elseif($txttglsampai=='' && $txttgldari !=''){

                            $this->load->view('design/headdepan');
                            $this->load->view('design/navbar_akses');
                            $this->load->view('design/home');
                            $this->load->view('design/footdepan');

                        }elseif ($txttglsampai=='' && $txttgldari =='') {
                            
                        }



                        else{
                           
                            $res['data'] = $this->model_kegiatan->jadwal_satuminggu();
                            $res['data2'] = $this->model_kegiatan->info_berita();
                            //echo $this->db->last_query(); die;
                            $this->load->view('design/headdepan');
                            $this->load->view('design/navbar_akses');
                            $this->load->view('design/home',$res);
                        }    
                    }else{

                        if($txttglsampai!='' && $txttgldari !=''){
                                                        
                            $res['data1'] = $this->model_kegiatan->cari_jadwal($txttglsampai,$txttgldari);
                            //echo $this->db->last_query(); die;
                            $this->load->view('design/headdepan');
                            $this->load->view('design/navbar');
                            $this->load->view('kegiatan/hasiljadwal',$res);
                            $this->load->view('design/footdepan');

                        }
                        elseif($txttglsampai=='' && $txttgldari !=''){
                            $this->load->view('design/headdepan');
                            $this->load->view('design/navbar');
                            $this->load->view('design/home');
                            $this->load->view('design/footdepan');
                        }
                        else{
                            $this->load->view('design/headdepan');
                            $this->load->view('design/navbar');
                            $this->load->view('design/home');
                            $this->load->view('design/footdepan');
                        }
                    }    
                        
                        

                }*/
                }else{

                            $cektgldari=$this->session->userdata($txttgldari);
                            $cektglsampai=$this->session->userdata($txttglsampai);

                        /*if($txttglsampai!='' && $txttgldari !=''){*/
                                                        
                            $res['data1'] = $this->model_kegiatan->cari_jadwal($txttglsampai,$txttgldari);

                            //echo $this->db->last_query(); die;
                            $this->load->view('design/headdepan');
                            $this->load->view('design/navbar');
                            $this->load->view('kegiatan/hasiljadwal',$res);
                            $this->load->view('design/footdepan');

                }




             }else{

                       $res['data'] = $this->model_kegiatan->jadwal_satuminggu();
                         $res['data1'] = $this->model_kegiatan->jadwal_satuminggu();
                         $res['data2'] = $this->model_kegiatan->info_berita();
                         //echo $this->db->last_query(); die;
                        $this->load->view('design/headdepan');
                        $this->load->view('design/navbar');
                        $this->load->view('design/home',$res);
             }


                

        }



    //batas Controller cari jadwal sholat

    //Controller Berita    

     function k_berita(){


                    $res['data0'] = $this->model_kegiatan->cari_berita();
                    //$res['data1'] = $this->model_kegiatan->cekdobel();

                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('kegiatan/k_berita_input',$res);
                    $this->load->view('design/footdepan');

     }   

     function k_kegiatan(){

                    $res['data0'] = $this->model_kegiatan->cari_kegiatan();
                    $res['data1'] = $this->model_kegiatan->cari_kodekegiatan();
                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('kegiatan/k_kegiatan',$res);
                    $this->load->view('design/footdepan');
                    //echo $this->db->last_query(); die;
     }

     function k_kegiatan_edit(){

                    $res['data0'] = $this->model_kegiatan->cari_kegiatanAll();
                    $res['data1'] = $this->model_kegiatan->cari_kodekegiatan();
                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('kegiatan/k_kegiatan_edit',$res);
                    $this->load->view('design/footdepan');
                    //echo $this->db->last_query(); die;
     }

     function simpanKkegiatan(){

                if(isset($_POST['btnTambah'])){

                    $res['data2'] = $this->model_kegiatan->simpanKkegiatan();
                    $res['data0'] = $this->model_kegiatan->cari_kegiatan();
                    $res['data1'] = $this->model_kegiatan->cari_kodekegiatan();

                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('kegiatan/k_kegiatan',$res);
                    $this->load->view('design/footdepan');

                }elseif(isset($_POST['btnUpdate'])){

                    $res['data1'] = $this->model_kegiatan->updateKkegiatan();
                    $res['data0'] = $this->model_kegiatan->cari_kegiatan();
                    //echo $this->db->last_query(); die;
                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('kegiatan/k_kegiatan',$res);
                    $this->load->view('design/footdepan');


                }else{

                    $res['data0'] = $this->model_kegiatan->cari_kegiatan();
                    $res['data1'] = $this->model_kegiatan->cari_kodekegiatan();
                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('kegiatan/k_kegiatan',$res);
                    $this->load->view('design/footdepan');
                }    

                    

     }

     public function validasi_dataBerita(){
        $config = array(
            array(
                'field' => 'txttopikberita',
                'label' => 'Topik Berita',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Topik Berita',),
            array(
                'field' => 'txtdetailberita',
                'label' => 'Detail Berita',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Isi Berita',),
              
           
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            return false;
        }else {
            return TRUE;
        }
    }


     function simpanKberita(){

                if(isset($_POST['btnDraft'])){

                    if($this->validasi_dataBerita() == TRUE){

                                 //$file_name = $upload_data['file_name'];
                                $config['upload_path'] = FCPATH.'assets/img/berita';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                                $config['max_size'] = '100';
                                $config['max_width']  = '1024';
                                $config['max_height']  = '768';

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);

                                
                                $gambar=$this->input->post('filefoto');
                                        
                                $statusawal="draft";

                                $res['data2'] = $this->model_kegiatan->simpanKberita($statusawal);
                                $res['data0'] = $this->model_kegiatan->cari_berita();
                                $res['data1'] = $this->model_kegiatan->cari_kodekegiatan();
                                //echo $this->db->last_query(); die;
                                $this->load->view('design/headdepan');
                                $this->load->view('design/navbar_akses');
                                $this->load->view('kegiatan/k_berita_input',$res);
                                $this->load->view('design/footdepan');
                               
                     }else{

                                $res['data0'] = $this->model_kegiatan->cari_berita();
                                //$res['data1'] = $this->model_kegiatan->cekdobel();

                                $this->load->view('design/headdepan');
                                $this->load->view('design/navbar_akses');
                                $this->load->view('kegiatan/k_berita_input',$res);
                                $this->load->view('design/footdepan');

                     }   

                    


                }
                elseif (isset($_POST['btnPublish'])) {
                    # code...

                            if($this->validasi_dataBerita() == TRUE){

                                 //$file_name = $upload_data['file_name'];
                                $config['upload_path'] = FCPATH.'assets/img/berita';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                                $config['max_size'] = '100';
                                $config['max_width']  = '1024';
                                $config['max_height']  = '768';

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);

                                
                                $gambar=$this->input->post('filefoto');
                                        

                                $statusawal="publish";
                                $res['data2'] = $this->model_kegiatan->simpanKberita($statusawal);
                                $res['data0'] = $this->model_kegiatan->cari_berita();
                                $res['data1'] = $this->model_kegiatan->cari_kodekegiatan();
                                //echo $this->db->last_query(); die;
                                $this->load->view('design/headdepan');
                                $this->load->view('design/navbar_akses');
                                $this->load->view('kegiatan/k_berita_input',$res);
                                $this->load->view('design/footdepan');
                               
                     }else{

                                $res['data0'] = $this->model_kegiatan->cari_berita();
                                //$res['data1'] = $this->model_kegiatan->cekdobel();

                                $this->load->view('design/headdepan');
                                $this->load->view('design/navbar_akses');
                                $this->load->view('kegiatan/k_berita_input',$res);
                                $this->load->view('design/footdepan');
                     }   
                }

                elseif(isset($_POST['btnUpdate'])){

                                $config['upload_path'] = FCPATH.'assets/img/berita';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                                $config['max_size'] = '100';
                                $config['max_width']  = '1024';
                                $config['max_height']  = '768';

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);

                                
                                $gambar=$this->input->post('filefoto');
                                $updstatusberita="draft";
                                $res['data1'] = $this->model_kegiatan->updateKberita($updstatusberita);
                                $res['data0'] = $this->model_kegiatan->cari_berita();
                                //echo $this->db->last_query(); die;
                                $this->load->view('design/headdepan');
                                $this->load->view('design/navbar_akses');
                                $this->load->view('kegiatan/k_berita_input',$res);
                                $this->load->view('design/footdepan');


                }elseif (isset($_POST['btnUpdatePublish'])) {
                    # code...
                                 $config['upload_path'] = FCPATH.'assets/img/berita';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                                $config['max_size'] = '100';
                                $config['max_width']  = '1024';
                                $config['max_height']  = '768';

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);

                                
                                $gambar=$this->input->post('filefoto');
                                $updstatusberita="publish";
                                $res['data1'] = $this->model_kegiatan->updateKberita($updstatusberita);
                                $res['data0'] = $this->model_kegiatan->cari_berita();
                                //echo $this->db->last_query(); die;
                                $this->load->view('design/headdepan');
                                $this->load->view('design/navbar_akses');
                                $this->load->view('kegiatan/k_berita_input',$res);
                                $this->load->view('design/footdepan');
                }


                else{

                    $res['data0'] = $this->model_kegiatan->cari_kegiatan();
                    $res['data1'] = $this->model_kegiatan->cari_kodekegiatan();
                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar_akses');
                    $this->load->view('kegiatan/k_kegiatan',$res);
                    $this->load->view('design/footdepan');
                }    

                    

     }


     function editberita(){

            $id=$this->uri->segment(3);
            $id2=  urldecode($id);

            $res['data1'] = $this->model_kegiatan->cari_databerita($id2);
            $res['data0'] = $this->model_kegiatan->cari_berita();

            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('kegiatan/k_berita_edit',$res);
            $this->load->view('design/footdepan');


     }


     function publishberita(){

            $id=$this->uri->segment(3);
            $id2=  urldecode($id);

            $res['data1'] = $this->model_kegiatan->updatepublishberita($id2);
            $res['data0'] = $this->model_kegiatan->cari_berita();

            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('kegiatan/k_berita_input',$res);
            $this->load->view('design/footdepan');
        
     }

     function hapusberita(){

            $id=$this->uri->segment(3);
            $id2=  urldecode($id);


            
            $res['data1'] = $this->model_kegiatan->deleteberita($id2);
            $res['data0'] = $this->model_kegiatan->cari_berita();

            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('kegiatan/k_berita_input',$res);
            $this->load->view('design/footdepan');
        
        
     }
}

/* End of file  */
/* Location: ./application/controllers/ */