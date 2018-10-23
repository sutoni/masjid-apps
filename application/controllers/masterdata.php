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
class Masterdata extends CI_Controller {
    //put your code here
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
	$this->load->model(array('Jadwal/model_jadwal'));	 
    }    
    
    public function index() {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            redirect("dashboard");
        }else{            
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar');
            $this->load->view('masterdata/masterdata');
            $this->load->view('design/footdepan');
            
           
        }  
    }
    
    function m_user(){
        
        $res['data']=$this->model_jadwal->list_user();
        $res['userid']=$this->session->userdata('userid');
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('masterdata/m_user',$res);
        $this->load->view('design/footdepan');
    }    
    function m_useredit(){
        $id=$this->uri->segment(3);
        if(!empty($id)){
            $res['data']=$this->model_jadwal->list_user();
            $res['data2']=$this->model_jadwal->getUser($id);
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_Edituser',$res);
            $this->load->view('design/footdepan');
        }else{
            
        }
        
    } 
    function simpanUser(){
        if($this->validasi_user() == TRUE){
            $res['data'] = $this->model_jadwal->simpanUser();
            $res['data']=$this->model_jadwal->list_user();
            $res['userid']=$this->session->userdata('userid');
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_user',$res);
            $this->load->view('design/footdepan');
        }else{
            $res['data']=$this->model_jadwal->list_user();
            $res['userid']=$this->session->userdata('userid');
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_user',$res);
            $this->load->view('design/footdepan');
        }
        
    }
    
    function updateUser(){
        if(isset($_POST['btnUpdate'])){
            
            $res['data'] = $this->model_jadwal->updateUser();
            $res['data']=$this->model_jadwal->list_user();
            $res['userid']=$this->session->userdata('userid');
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_user',$res);
            $this->load->view('design/footdepan');
        }else{
            $res['data']=$this->model_jadwal->list_user();
            $res['userid']=$this->session->userdata('userid');
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_user',$res);
            $this->load->view('design/footdepan');
        }
    }
    
    function m_jadwal(){
        
        $res['data']=$this->model_jadwal->list_jadwal();
        $res['data2']=$this->model_jadwal->listpool();
        $res['data3']=$this->model_jadwal->listkendaraan();
        $res['idjadwal']=$this->session->userdata('idjadwal');
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('masterdata/m_jadwal',$res);
        $this->load->view('design/footdepan');
    }
    function m_jadwaledit(){
        $id=$this->uri->segment(3);
        if(!empty($id)){
            $res['data']=$this->model_jadwal->list_jadwal();
            $res['data4']=$this->model_jadwal->getJadwal($id);
            //echo $this->db->last_query(); die;
            $this->model_jadwal->getJadwal2($id);
            //echo $this->db->last_query(); die;
            $kdpool=$this->session->userdata('kdpool');
            $nopolis=$this->session->userdata('nopolisi');
            $res['data2']=$this->model_jadwal->listpool2($kdpool);
            $res['data5']=$this->model_jadwal->listpool();
            //echo $this->db->last_query(); die;
            $res['data3']=$this->model_jadwal->listkendaraan2($nopolis);
            $res['idjadwal']=$this->session->userdata('idjadwal');
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_editjadwal',$res);
            $this->load->view('design/footdepan');
        }
    }    
    function simpanJadwal(){
        if($this->validasi_jadwal() == TRUE){
            $cekdata=array(
            //'id8jadwal'=>$this->input->post('txtidjadwal'),
            'nopolisi'=>$this->input->post('txtnopolisi'),
            'tglberangkat'=> $this->input->post('txttglberangkat'),
            'kdpool'=>$this->input->post('txtpool')
            );

                $this->db->where($cekdata);
                $result=$this->db->get('t_jadwal');
                //echo $this->db->last_query(); die;
                if($result->num_rows()>0){


                    echo "<script>alert('Maaf Jadwal sudah pernah dibuat');history.go(-1);</script>";
                }
                else{
            $res['data'] = $this->model_jadwal->simpanJadwal();
            $res['data']=$this->model_jadwal->list_jadwal();
            $res['idjadwal']=$this->session->userdata('idjadwal');
            $res['data2']=$this->model_jadwal->listpool();
            $res['data3']=$this->model_jadwal->listkendaraan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_jadwal',$res);
            $this->load->view('design/footdepan');
                }
        }else{
            $res['data']=$this->model_jadwal->list_jadwal();
            $res['data2']=$this->model_jadwal->listpool();
            $res['data3']=$this->model_jadwal->listkendaraan();
            $res['idjadwal']=$this->session->userdata('idjadwal');
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_jadwal',$res);
            $this->load->view('design/footdepan');
        }
        
    }
    function updateJadwal(){
        if(isset($_POST['btnUpdate'])){
            $tglberangkat=$this->input->post('txttglberangkat');
            $tglsekarang=DATE('Y-m-d');
            if($tglberangkat < $tglsekarang){
                 echo "<script>alert('Maaf Jadwal tidak dapat backdate');history.go(-1);</script>";
            }else{
                    $cekdata=array(
                   //'idjadwal'=>$this->input->post('txtidjadwal'),
                   'nopolisi'=>$this->input->post('txtnopolisi'),
                   'tglberangkat'=> $this->input->post('txttglberangkat'),
                   //'kdpool'=>$this->input->post('txtpool')
                   );

                   $this->db->where($cekdata);
                   $result=$this->db->get('t_jadwal');
                   //echo $this->db->last_query(); die;
                   if($result->num_rows()>0){
//                       echo "<script>alert('Maaf Jadwal sudah pernah dibuat');history.go(-1);</script>";
                       $res['data'] = $this->model_jadwal->updateJadwal2();
                        $res['data']=$this->model_jadwal->list_jadwal();
                        $res['data2']=$this->model_jadwal->listpool();
                        $res['data3']=$this->model_jadwal->listkendaraan();
                        $res['idjadwal']=$this->session->userdata('idjadwal');
                        $this->load->view('design/headdepan');
                        $this->load->view('design/navbar_akses');
                        $this->load->view('masterdata/m_jadwal',$res);
                        $this->load->view('design/footdepan');
                   }
                   else{
                        $res['data'] = $this->model_jadwal->updateJadwal();
                        $res['data']=$this->model_jadwal->list_jadwal();
                        $res['data2']=$this->model_jadwal->listpool();
                        $res['data3']=$this->model_jadwal->listkendaraan();
                        $res['idjadwal']=$this->session->userdata('idjadwal');
                        $this->load->view('design/headdepan');
                        $this->load->view('design/navbar_akses');
                        $this->load->view('masterdata/m_jadwal',$res);
                        $this->load->view('design/footdepan');
                   }
            }
        }else{
            $res['data']=$this->model_jadwal->list_jadwal();
            $res['data2']=$this->model_jadwal->listpool();
            $res['data3']=$this->model_jadwal->listkendaraan();
            $res['idjadwal']=$this->session->userdata('idjadwal');
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_jadwal',$res);
            $this->load->view('design/footdepan');
        }
    }
    
    function m_kendaraan(){
        
        
        $res['data2']=$this->model_jadwal->listpool();
        $res['data']=$this->model_jadwal->listkendaraan();
        
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('masterdata/m_kendaraan',$res);
        $this->load->view('design/footdepan');
    }
    function m_kendaraanedit(){
        $id=$this->uri->segment(3);
        $id2=  urldecode($id);
        if(!empty($id2)){
            $res['data2']=$this->model_jadwal->listpool();
            $res['data']=$this->model_jadwal->listkendaraan();
            $res['data3']=$this->model_jadwal->listkendaraan2($id2);

            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_Editkendaraan',$res);
            $this->load->view('design/footdepan');
        }else{
            
        }
    }
    public function validasi_user(){
        $config = array(
            array(
                'field' => 'txtusername',
                'label' => 'Username',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Usernamenya',),
            array(
                'field' => 'txtpassword',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array('required' =>'Mohon diisi Passwordnya',),
            )
          
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            return false;
        }else {
            return TRUE;
        }
    }
    
    function simpanKendaraan(){
         if($this->validasi_kendaraan() == TRUE){
             $cekdata=array(
            //'idjadwal'=>$this->input->post('txtidjadwal'),
            'nopolisi'=>$this->input->post('txtnopolisi'),
            
            );

                $this->db->where($cekdata);
                $result=$this->db->get('t_kendaraan');
                //echo $this->db->last_query(); die;
                if($result->num_rows()>0){


                    echo "<script>alert('Maaf Kendaraan sudah pernah terdaftar');history.go(-1);</script>";
                }
                else{
            $res['data'] = $this->model_jadwal->simpanKendaraan();
            //echo $this->db->last_query(); die;
            $res['data2']=$this->model_jadwal->listpool();
            $res['data']=$this->model_jadwal->listkendaraan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_kendaraan',$res);
            $this->load->view('design/footdepan');
                }
         }else{
            $res['data2']=$this->model_jadwal->listpool();
            $res['data']=$this->model_jadwal->listkendaraan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_kendaraan',$res);
            $this->load->view('design/footdepan');
         }
        
    }
    function updateKendaraan(){
        if(isset($_POST['btnUpdate'])){
            
            $res['data'] = $this->model_jadwal->updateKendaraan();
            $res['data2']=$this->model_jadwal->listpool();
            $res['data']=$this->model_jadwal->listkendaraan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_kendaraan',$res);
            $this->load->view('design/footdepan');
        }else{
            $res['data2']=$this->model_jadwal->listpool();
            $res['data']=$this->model_jadwal->listkendaraan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_kendaraan',$res);
            $this->load->view('design/footdepan');
        }
    }
    function kecamatan(){
        $this->db->select('*');
                $this->db->from('t_kecamatan');
                $query = $this->db->get();
                $rows=$query->result_array();
                $coba=count($rows);
                $tambah=$coba +1;
        $this->session->set_userdata('kdkecamatan',$tambah);
        $res['kdkecamatan']=$this->session->userdata('kdkecamatan');
        $res['data']=$this->model_jadwal->listkecamatan();
        
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('masterdata/m_kecamatan',$res);
        $this->load->view('design/footdepan');
    }
    
    function simpanKecamatan(){
        if($this->validasi_kecamatan() == TRUE){
            $cekdata=array(
                //'idjadwal'=>$this->input->post('txtidjadwal'),
                'kdkecamatan'=>$this->input->post('txtkdkecamatan'),
                'namakecamatan'=>$this->input->post('txtnamakecamatan'),
            );

                $this->db->where($cekdata);
                $result=$this->db->get('t_kecamatan');
                //echo $this->db->last_query(); die;
                if($result->num_rows()>0){


                    echo "<script>alert('Maaf Kecamatan sudah pernah terdaftar');history.go(-1);</script>";
                }
                else{
            $res['data'] = $this->model_jadwal->simpanKecamatan();
            //echo $this->db->last_query(); die;
            $this->db->select('*');
                $this->db->from('t_kecamatan');
                $query = $this->db->get();
                $rows=$query->result_array();
                $coba=count($rows);
                $tambah=$coba +1;
            $this->session->set_userdata('kdkecamatan',$tambah);
            $res['kdkecamatan']=$this->session->userdata('kdkecamatan');
            $res['data']=$this->model_jadwal->listkecamatan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_kecamatan',$res);
            $this->load->view('design/footdepan');
            }
        }else{
            $this->db->select('*');
                $this->db->from('t_kecamatan');
                $query = $this->db->get();
                $rows=$query->result_array();
                $coba=count($rows);
                $tambah=$coba +1;
        $this->session->set_userdata('kdkecamatan',$tambah);
        $res['kdkecamatan']=$this->session->userdata('kdkecamatan');
            $res['data']=$this->model_jadwal->listkecamatan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_kecamatan',$res);
            $this->load->view('design/footdepan');
        }
        
    }
    
    function m_kecamatanedit(){
        $id=$this->uri->segment(3);
        if(!empty($id)){
            $res['data']=$this->model_jadwal->listkecamatan2($id);
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_Editkecamatan',$res);
            $this->load->view('design/footdepan');
        }else{
            $this->db->select('*');
                $this->db->from('t_kecamatan');
                $query = $this->db->get();
                $rows=$query->result_array();
                $coba=count($rows);
                $tambah=$coba +1;
            $this->session->set_userdata('kdkecamatan',$tambah);
            $res['kdkecamatan']=$this->session->userdata('kdkecamatan');
            $res['data']=$this->model_jadwal->listkecamatan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_kecamatan',$res);
            $this->load->view('design/footdepan');
        }
    }
    public function validasi_kecamatan(){
        $config = array(
            array(
                'field' => 'txtnamakecamatan',
                'label' => 'nama kecamatan',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Nama kecamatan',),
            array(
                'field' => 'txtkota',
                'label' => 'Kota',
                'rules' => 'required',
                'errors' => array('required' =>'Mohon diisi Nama Kota',),
            )
          
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            return false;
        }else {
            return TRUE;
        }
    }
    
    public function validasi_kendaraan(){
        $config = array(
            array(
                'field' => 'txtnopolisi',
                'label' => 'No Polisi',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Nomor Polisi Kendaraan',),
            array(
                'field' => 'txtnamakendaraan',
                'label' => 'nama kecamatan',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Nama Kendaraan',),
            array(
                'field' => 'txtkapasitas',
                'label' => 'Kota',
                'rules' => 'required',
                'errors' => array('required' =>'Mohon diisi Kapasitas tempat duduk',),
            )
          
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            return false;
        }else {
            return TRUE;
        }
    }
    
    public function validasi_jadwal(){
        $config = array(
            array(
                'field' => 'txttglberangkat',
                'label' => 'Tanggal Berangkat',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Tanggal Berangkat',),
            array(
                'field' => 'txtwaktu',
                'label' => 'Waktu Keberangkatan',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Waktu Keberangkatan',),
            array(
                'field' => 'txtpool',
                'label' => 'Pool Kendaraan',
                'rules' => 'required',
                'errors' => array('required' =>'Mohon diisi Pool Kendaraan Keberangkatan',),
            ),
             array(
                'field' => 'txtharga',
                'label' => 'Harga Tiket',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Harga Tiket',),
             array(
                'field' => 'txtnopolisi',
                'label' => 'Nomor Polisi',
                'rules' => 'required'),
                'errors' => array('required' =>'Mohon diisi Nomor Polisi Kendaraan',),
          
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            return false;
        }else {
            return TRUE;
        }
    }
    
    function updateKecamatan(){
        if(isset($_POST['btnUpdate'])){
            
            $res['data'] = $this->model_jadwal->updateKecamatan();
            $this->db->select('*');
                $this->db->from('t_kecamatan');
                $query = $this->db->get();
                $rows=$query->result_array();
                $coba=count($rows);
                $tambah=$coba +1;
            $this->session->set_userdata('kdkecamatan',$tambah);
            $res['kdkecamatan']=$this->session->userdata('kdkecamatan');
            $res['data']=$this->model_jadwal->listkecamatan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_kecamatan',$res);
            $this->load->view('design/footdepan');
        }else{
            $this->db->select('*');
                $this->db->from('t_kecamatan');
                $query = $this->db->get();
                $rows=$query->result_array();
                $coba=count($rows);
                $tambah=$coba +1;
            $this->session->set_userdata('kdkecamatan',$tambah);
            $res['kdkecamatan']=$this->session->userdata('kdkecamatan');
            $res['data']=$this->model_jadwal->listkecamatan();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('masterdata/m_kecamatan',$res);
            $this->load->view('design/footdepan');
        }
    }
    
    
}