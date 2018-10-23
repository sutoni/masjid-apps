<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : 
 * Email : 
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
         $this->load->library('session');
         
    }    
    function all_data() {
    	$user_uid = $this->session->userdata('uid');
    	$this->db->select('*');
		$this->db->from('view_hasilevaluasi_satu'); 
		
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function data_pengguna($limit,$offset,$ordercol = 'namatraining',$orderby = 'DESC'){
    	 $user_uid = $this->session->userdata('uid');
        $this->db->order_by($ordercol,$orderby);
        $this->db->limit($limit,$offset);
        $this->db->select('*');
		$this->db->from('view_hasilevaluasi_satu'); 
		
        $query = $this->db->get();
        return $query->result();
    } 
    
    function carilaporan(){
        
        $txtTahun=$this->input->post('txtTahun');
        $piltahun=$this->input->post('piltahun');
        $txtBulan=$this->input->post('txtBulan');
        $pilbulan=$this->input->post('pilbulan');
        $txtStatus=$this->input->post('txtStatus');
        echo $txtStatus; die;
        if($pilbulan =='' && $piltahun ==''){
            
            if($txtTahun !='' && $txtBulan =='all' && $txtStatus ='all'){
                //$tahun=  substr($txtTahun, 4,4);
                echo $this->db->last_query(); die;
                $query=$this->db->where('SUBSTRing(kdpesanan,4,4)',$txtTahun);
                $query=$this->db->get('t_pemesanan');
                return $query->result();
            }
            elseif($txtTahun !='' && $txtBulan !='all' && $txtStatus ='all'){
                $query=$this->db->JOIN('t_jadwal','t_jadwal.idjadwal=t_pemesanan.kdjadwal');
                $query=$this->db->where('SUBSTRing(tglberangkat,6,2)',$txtBulan);
                $query=$this->db->where('SUBSTRing(kdpesanan,4,4)',$txtTahun);
                $query=$this->db->get('t_pemesanan');
                return $query->result();
            }
            
        }
        elseif($pilbulan !='' && $piltahun =''){
            
        }
        elseif($pilbulan ='' && $piltahun !=''){
            
        }
        elseif($pilbulan !='' && $piltahun !=''){
            
        }
    }
}
