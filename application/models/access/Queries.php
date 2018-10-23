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
 * Description of queries
 *
 * @author Sutoni
 */
class Queries extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
    }
    
		
	
	
	
	
    function validate() {
		
		$sql=sprintf("SELECT COUNT(*) AS cnt FROM tb_user WHERE username ='%s' AND password= PASSWORD('%s')", $this->username, $this->password);
		$query = $this->db->query($sql);
		$row=$query->row_array();
		return $row['cnt']==1;
		
		
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        if ($this->agent->is_browser())
        {
            $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
            $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
            $agent = $this->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }
        
        $data = array(
                'idpengguna' => '',
                'idgrup' => '',
                'namapengguna' => $usermail,
                'platform' => $this->agent->platform(),
                'browser' => $agent,
                'logged_in' => true,
            );
        $this->session->set_userdata($data);
        return true;        
    }
}
