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
class Access extends CI_Controller {
    //put your code here
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
		 
    }    
    
    public function index() {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            redirect("dashboard");
        }else{            
            $this->load->view('access/login');
        }  
    }
    
    public function validate() {
       // $this->form_validation->set_rules('usermail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('access/login');
        }else{
			
            $this->load->model('access/queries');
			//$this->load->model('access/login_model');
            $res = $this->queries->validate();
            
			
			if($res == TRUE ){
				$data = array(
                'id' => '',
                'username' => '',
                'password' => '',
                'nama' => '',
                'level' => '',
                'logged_in' => true,
            );
        $this->session->set_userdata($data);
        return true;        
                redirect('dashboard');
            }else{
                header('location:' . base_url());
            }
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('access/login');
    }
}
