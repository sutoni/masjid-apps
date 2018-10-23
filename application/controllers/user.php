<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : Controller User
 * ***************************************************************
 */


/**
 * Description of Crud
 *
 * @author Sutoni
 */

class user extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(array('form_validation','pagination')) ;
        $this->load->library('form_validation');
}

public function index(){
    $logged_in = $this->session->userdata('logged_in');
    if(!$logged_in){
       header("location : ".base_url());
    }
    
    $this->load->model('user/queries');
    $hal = number_format($this->uri->segment(3));
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
    $this->load->view('user/view',$res);
    $this->load->view('design/footer');
	
	
}
public function view_karyawan(){
    $logged_in = $this->session->userdata('logged_in');
    if(!$logged_in){
       header("location : ".base_url());
    }
    
    $this->load->model('user/queries');
    $hal = number_format($this->uri->segment(3));
    $per_page=10;
    
    $pcfg= array(
        'base_url' =>$this->links->get_link() .'/view_karyawan',
        'per_page' => $per_page,
        'total_rows' => $this->queries->all_karyawan(),
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
        'data' => $this->queries->data_karyawan($per_page,$hal),
        'jmldata' => $pcfg['total_rows'],
    );
    
    $this->load->view('design/header');
    $this->load->view('user/view_karyawan',$res);
    $this->load->view('design/footer');
	
	
}

    public function add(){           
         
         $this->load->view('design/header');
         $this->load->view('user/add');
         $this->load->view('design/footer');
    }
    
    public function edit(){
        $id=$this->uri->segment(3);
        if(empty($id)){
            redirect('user/add');
        }
        
        $this->load->model('user/queries');
        $res['data'] = $this->queries->select_karyawan($id);
        
        if(empty($res['data'])){
            redirect('user/add');
        }
        
        $this->load->view('design/header');
        $this->load->view('user/edit',$res);
        $this->load->view('design/footer');
        
    }
    
    public function validate(){
        $config = array(
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'),
            	'errors' => array('required' =>'Mohon diisi Nama Password user',)
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            return false;
        }else {
            return TRUE;
        }
    }
	
    public function save(){
    	$this->load->model('user/queries') ;
        if($this->validate() == TRUE){
            
            
            $res = $this->queries->save_data();
        	   
            if($res){
                redirect('user');
            }
            }
            else{
                $this->load->view('design/header');
                $this->load->view('users');
                $this->load->view('design/footer');
            }
        
    }
    
    public function update(){
        $id = $this->uri->segment(3);
        if($this->validate() == TRUE){
            $this->load->model('user/queries');
            $res = $this->queries->update_data();
            if($res){
                redirect('user');
            }
        }else{
            redirect('user/edit');
        }
            
    }
    
    public function delete(){
        $id = $this->uri->segment(3);
        if(empty($id)){
            redirect('user');
        }
        
        if($this->input->post('idgroup_komp')){
            $this->load->model('m_user/queries');
            $res = $this->queries->delete_data();
            if($res){
                redirect('user');
            }
        }
        $this->load->model('m_user/queries');
        
        $res['data'] = $this->queries->select_data($id);
        
        if(empty($res['data'])){
            redirect('user');
        }
        
                $this->load->view('design/header');
                $this->load->view('user/delete',$res);
                $this->load->view('design/footer');
    }
}
