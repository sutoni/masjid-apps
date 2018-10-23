<?php
class Login_model extends CI_Model
{
	public $labels = [];
	
	
	 public function __construct()
    {
        parent::__construct();
        $this->labels=$this->_attributLabels();
		$this->load->database();
    }
   

    public function login($login)
    {
        $login = (object)$login;
        $login->password = md5($login->password);
		
		$sql=sprintf("SELECT COUNT(*) AS cnt FROM tb_user WHERE username ='%s' AND password= PASSWORD('%s')", $this->username, $this->password);
		$query = $this->db->query($sql);
		$row=$query->row_array();
		return $row['cnt']==1;
		
		
        $where = array(
            'username' => $login->username,
            'password' => $login->password,
            // Yang diblokir tidak boleh login.
            'is_blokir' => '0',
        );
			
       
        // Return false jika gagal.
        return false;
    }
	
	private function _attributLabels(){
		return['username'=> 'username :', 'password'=>'password:'];
	}

    public function logout()
    {
        $this->session->unset_userdata(
            array('username' => '', 'login_status' => false, 'user_level' => '')
        );
        $this->session->sess_destroy();
    }
}