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
        $query = $this->db->get('user');
        return $query->num_rows();
    }
	function data_pengguna($limit,$offset,$ordercol = 'idu',$orderby = 'DESC'){
        $this->db->order_by($ordercol,$orderby);
        $this->db->limit($limit,$offset);
        $query = $this->db->get('user');
        return $query->result();
    } 
    
    function select_data($id = NULL) {
        if(!empty($id)){
            $this->db->where('idu', $id);
        }        
        $query = $this->db->get('user');
        return $query->result();   
    }
    function nokode(){
        $this->db->where('idu',$id);
        
    }
            function save_data() {
        $data = array(  
            'idu' => $this->input->post('idu'),
            'username' => $this->input->post('username'),
            'passuser' => $this->input->post('passuser'),
            'level' => $this->input->post('level'),
			'id' => $this->input->post('id'),
			'blokir' => $this->input->post('blokir'),
			'empno' => $this->input->post('empno'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
			'email' => $this->input->post('email'),
			'id_session' => $this->input->post('id_session'),
        );
        
        $this->db->insert('user', $data);
        return true;        
    }
    
    function update_data() {
        $data = array(
            'username' => $this->input->post('username'),
            'passuser' => $this->input->post('passuser'),
            'level' => $this->input->post('level'),
			'id' => $this->input->post('id'),
			'blokir' => $this->input->post('blokir'),
			'empno' => $this->input->post('empno'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
			'email' => $this->input->post('email'),
			'id_session' => $this->input->post('id_session'),
        );
        $this->db->where('idu', $this->input->post('idu'));
        $this->db->update('user', $data);
        return true;        
    }
    
    function delete_data() {
        $this->db->delete('user', array('idu' => $this->input->post('idu')));
        return true;        
    }
	
	
	
 }
 ?>