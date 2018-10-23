<?php

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
 * Description of Data
 *
 * @author Pudyasto
 */
class Data extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
    }
    
    function all_data() {
        $query = $this->db->get('spage');
        return $query->num_rows();
    }
    
    function data_pengguna($limit,$offset,$ordercol = 'id',$orderby = 'ASC'){
        //$this->db->cache_on();
        $this->db->order_by($ordercol,$orderby);
        $this->db->limit($limit,$offset);
        $query = $this->db->get('spage');
        return $query->result();
    }
}
