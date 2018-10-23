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
class Loginhere extends CI_Controller {
    //put your code here
    
    public function __construct()
    {
        parent::__construct();
        
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('access/loginhere_model');	 
    }    
    
    public function index() {
                  
            $this->load->view('access/loginhere');
          
    }
    
    
     public function login_process($id = NULL){
         //get the posted values
         
         
          //set validations
          $this->form_validation->set_rules("username", "Username", "trim|required",TRUE);
          $this->form_validation->set_rules("password", "Password", "trim|required", TRUE);
          
          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               echo "<script>alert('Mohon maaf data salah')</script>";
               //$this->load->view('access/loginhere');
               
          }
          else
          {
              
                $usr = $this->input->post("username");
                $pwd = md5($this->input->post("password"));
               //check if username and password is correct
                    $usr_result = $this->loginhere_model->get_user($usr, $pwd);
                    //echo $this->db->last_query();die();
                    if (!empty($usr_result)) //active user record is present
                    {
                        
                        $query = $this->loginhere_model->read_user_information($usr);
                         if ($query->num_rows() > 0) {
                         //set the session variables
                                    $row = $query->row();
                                    $sess_array = array(
                                    'userid'=>trim($row->userid),
                                    'username' => trim($usr),
                                    'password' => trim($pwd),
                                    'level' => trim($row->level),
                                    'akses_status' => trim($row->akses_status),
                                    'logged_in' => true);
                                $this->session->set_userdata($sess_array);
                                $_SESSION['username'] = $this->input->post('username');
                                $this->session->set_flashdata('login', 'Selamat Datang &nbsp' .$row->username . ' !');
                                redirect('Home');
                            }
                    } else {
                            $data['error'] = 'Login gagal';
                                    $this->session->set_flashdata('message', 'Username dan Password anda salah !');
                                    $this->session->flashdata('message', 'Username dan Password anda salah !');
                                    echo "<script>alert('Username dan Password anda salah !')</script>";
                                    redirect('Home', 'refresh');
            }
               
          }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }
    
    function changepass(){
        $userid=$this->session->userdata('userid');
        //echo $userid;die();
            $res['data']=$this->loginhere_model->changepassword($userid);
            //echo $this->db->last_query(); die;
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('access/changepass',$res);
            $this->load->view('design/footdepan');
    }
    
    public function changePassword(){
        
        $this->loginhere_model->updatePassword();
         echo "<script>alert('Password telah diupdate');history.go(-2);</script>";
    }

}