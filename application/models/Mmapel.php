<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : Model Kompetensi Group
 * ***************************************************************
 */

/**
 * Description of queries
 *
 * @author Sutoni
 */
 class Mmapel extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
    }   
	
	function getKompetensigroup(){
		$result = $this->db->get('kompetensi_group');	
		if($result->num_rows()>0){
			return $result->result_array();
		}
		else {
			return array();
		}
	}
	
	function getKompetensi_desc($idgroup_komp){
		$this->db->where(idgroup_komp,$idgroup_komp);
		$result = $this->db->get('kompetensi_desc');
		if($result->num_rows()>0){
			return $result->result_array();
		}
		else {
			return array();
		}
		
	}
	
	
 }