<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : Management User
 * ***************************************************************
 */


/**
 * Description of Crud
 *
 * @author Sutoni
 */
 
 class Queries extends CI_Model{
	public function __construct()
	{
		parent::__construct();  
		$this->load->library('session');
		$this->load->helper('form');
        $this->load->library(array('form_validation','pagination')) ;
        $this->load->library('form_validation');
	}
	
	function all_data() {
        $query = $this->db->get('ma_user');
        return $query->num_rows();
    }
 function all_karyawan() {
        $query = $this->db->get('exist_employee');
        return $query->num_rows();
    }
	function data_pengguna($limit,$offset,$ordercol = 'uid',$orderby = 'DESC'){
        $this->db->order_by($ordercol,$orderby);
        $this->db->limit($limit,$offset);
        $query = $this->db->get('ma_user');
        return $query->result();
    } 
    
    function data_karyawan($limit,$offset,$ordercol = 'empno',$orderby = 'DESC'){
        $this->db->order_by($ordercol,$orderby);
        $this->db->limit($limit,$offset);
        $query = $this->db->get('exist_employee');
        return $query->result();
        
        //echo $this->db->last_query(); die;
    } 
    
    function select_data($id = NULL) {
        if(!empty($id)){
            $this->db->where('uid', $id);
        }        
        $query = $this->db->get('ma_user');
        return $query->result();   
    }
  	function select_karyawan($id = NULL) {
        if(!empty($id)){
            $this->db->where('empno', $id);
        }        
        $query = $this->db->get('exist_employee');
        return $query->result();   
    }
    function nokode(){
        $this->db->where('uid',$id);
        
    }
            function save_data() {
        	$data = array(  
            'uid' => $this->input->post('empno'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('passuser'),
            'level' => $this->input->post('idlevel'),
			
			//'id_session' => $this->input->post('id_session'),
        );
        
        $this->db->insert('ma_user', $data);  
        return true;       
    }
    
    function update_data() {
        $data = array(
            'username' => $this->input->post('empno'),
            'passuser' => $this->input->post('passuser'),
            'level' => $this->input->post('level'),
			
			'id_session' => $this->input->post('id_session'),
        );
        $this->db->where('uid', $this->input->post('uid'));
        $this->db->update('ma_user', $data);
        return true;        
    }
    
    
	
	
	
 }
 ?>