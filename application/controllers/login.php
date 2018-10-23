<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('access/Login_model', 'login');
		$this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Validasi.
        /*if (! $this->login->validate('form_rules')) {
            $data['validation_errors'] = $this->form_validation->error_array();
            $this->load->view('access/login', $data);
            return;
        }*/
		if(isset($_POST['btnsubmit'])){
			//$pesanError = ['required' => '<span style="color:red;">$s wajib diisi </span>'];
			
			//menentukan aturan-aturan validasi login
			$this->form_validation->
					set_rules('username', $this->login->labels['username'],'required',$pesanError);
			$this->form_validation->
					set_rules('password', $this->login->labels['password'],'required',$pesanError);		
					
			$this->login->username=$_POST['username'];
			$this->login->password=$_POST['password'];
			if($this->login->login()==TRUE){
				$this->session->set_userdata('username', $this->login->username);
				$this->load->view('home');
				
			}else{
				redirect('login');
			}
			
			
		}
       

        // Jika login benar, alihkan ke halaman dashboard.
        redirect('login/error');
    }
	
	 public function validate() {
       // $this->form_validation->set_rules('usermail', 'Email', 'required|valid_email');
	   $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('userpass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('access/login');
        }else{
            //$this->load->model('access/queries');
			$this->load->model('access/login_model');
            $res = $this->login_model->validate();
            if($res){
                redirect('dashboard');
            }else{
                header('location:' . base_url());
            }
        }
    }
	
    public function error()
    {
        $this->load->view('access/login');
    }

    public function logout()
    {
        $this->login->logout();
        redirect('home');
    }
}