<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_keuangan extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
    }


    public function list_uangmuka(){

            $this->db->select('*');
            $this->db->from('tu_uangmuka');
            
             $query = $this->db->get();
             
            return $query->result();
    }
}