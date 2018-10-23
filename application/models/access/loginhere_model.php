<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class loginhere_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          
     }

     //get the username & password from tbl_usrs
     function get_user($usr, $pwd)
     {
         
         $cekuser=array(
            'username'=>$usr,
            'password'=>$pwd,
        ); 
        $this->db->select('*');
        
        $this->db->where($cekuser);
        $this->db->order_by('username', 'ASC');
        $query = $this->db->get('t_user');
        return $query->result();
        
     }
     
     public function read_user_information($usr) {
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->where("t_user.username", $usr);
        $this->db->limit(1);
        return $this->db->get();
    }
    
    public function changepassword($userid){
        
        $query=$this->db->where('userid',$userid);
        $query = $this->db->get('t_user');
        return $query->result();
    }
    
    public function updatePassword(){
        
        $userid=$this->input->post('txtusername');
        $passwordnya=md5($this->input->post('txtPassword'));
        $updatepass=array(
            'password'=>$passwordnya,
        );
        $this->db->where('userid',$userid);
        $this->db->update('t_user', $updatepass);
        return true; 
        
    }
}?>