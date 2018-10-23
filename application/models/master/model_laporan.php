<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_jadwal
 *
 * @author usahadong_toni
 */
class model_laporan extends CI_Model{
    //put your code here


	function cari_detailpengeluarancurr(){

				$bulan=date('m');
				$this->db->select('tu_catatpengeluaran.tglcatat, tu_catatpengeluaran.kodebidang, tm_kodebidang.namabidang, tu_detailpengeluaran.tglbon, tu_detailpengeluaran.keterangan as keterangandetail, tu_detailpengeluaran.kuantiti, tu_detailpengeluaran.hargasatuan, tu_detailpengeluaran.total as totaldetailpengeluaran');
				$this->db->from('tu_detailpengeluaran');
				$this->db->join('tu_catatpengeluaran','tu_detailpengeluaran.idpengeluaran=tu_catatpengeluaran.idpengeluaran','left');
				$this->db->join('tm_kodebidang','tm_kodebidang.idbidang=tu_catatpengeluaran.kodebidang','left');
				$this->db->where('substring(tu_catatpengeluaran.tglcatat,6,2)', $bulan);
                $query = $this->db->get();
                 return $query->result();

	}



	function jumlah_detailpengeluarancurr(){

				$bulan=date('m');

				

				$this->db->select_sum('tu_detailpengeluaran.total');
				$this->db->from('tu_detailpengeluaran');
				$this->db->join('tu_catatpengeluaran','tu_detailpengeluaran.idpengeluaran=tu_catatpengeluaran.idpengeluaran','left');
				
				$this->db->where('substring(tu_catatpengeluaran.tglcatat,6,2)', $bulan);
                $query = $this->db->get();
                 return $query->result();

	}

	function cari_detailpemasukancurr(){

				$bulan=date('m');

				

				$this->db->select('*');
				$this->db->from('tu_catatpemasukan');
				
				$this->db->where('substring(tglpemasukan,6,2)', $bulan);

                 $query = $this->db->get();
                 //$this->session->set_userdata('cektanggal',$no_pemasukan);
                 return $query->result();

	}


	function jumlah_detailpemasukancurr(){
				$bulan=date('m');

				$this->db->select_sum('nilaipemasukan');
				$this->db->from('tu_catatpemasukan');
				
				$this->db->where('substring(tglpemasukan,6,2)', $bulan);

                 $query = $this->db->get();
                 //$this->session->set_userdata('cektanggal',$no_pemasukan);
                 return $query->result();
	}


	//cari laporan

	function cari_detailpengeluaranbtn(){

				$bulan=$this->input->post('txtBulan');
				$this->db->select('tu_catatpengeluaran.tglcatat, tu_catatpengeluaran.kodebidang, tm_kodebidang.namabidang, tu_detailpengeluaran.tglbon, tu_detailpengeluaran.keterangan as keterangandetail, tu_detailpengeluaran.kuantiti, tu_detailpengeluaran.hargasatuan, tu_detailpengeluaran.total as totaldetailpengeluaran');
				$this->db->from('tu_detailpengeluaran');
				$this->db->join('tu_catatpengeluaran','tu_detailpengeluaran.idpengeluaran=tu_catatpengeluaran.idpengeluaran','left');
				$this->db->join('tm_kodebidang','tm_kodebidang.idbidang=tu_catatpengeluaran.kodebidang','left');
				$this->db->where('substring(tu_catatpengeluaran.tglcatat,6,2)', $bulan);
                $query = $this->db->get();
                 return $query->result();

	}

	function jumlah_detailpengeluaranbtn(){

				$bulan=$this->input->post('txtBulan');

				

				$this->db->select_sum('tu_detailpengeluaran.total');
				$this->db->from('tu_detailpengeluaran');
				$this->db->join('tu_catatpengeluaran','tu_detailpengeluaran.idpengeluaran=tu_catatpengeluaran.idpengeluaran','left');
				
				$this->db->where('substring(tu_catatpengeluaran.tglcatat,6,2)', $bulan);
                $query = $this->db->get();
                 return $query->result();

	}

	function cari_detailpemasukanbtn(){

				$bulan=$this->input->post('txtBulan');

				

				$this->db->select('*');
				$this->db->from('tu_catatpemasukan');
				
				$this->db->where('substring(tglpemasukan,6,2)', $bulan);

                 $query = $this->db->get();
                 //$this->session->set_userdata('cektanggal',$no_pemasukan);
                 return $query->result();

	}

	function jumlah_detailpemasukanbtn(){
				$bulan=$this->input->post('txtBulan');

				$this->db->select_sum('nilaipemasukan');
				$this->db->from('tu_catatpemasukan');
				
				$this->db->where('substring(tglpemasukan,6,2)', $bulan);

                 $query = $this->db->get();
                 //$this->session->set_userdata('cektanggal',$no_pemasukan);
                 return $query->result();
	}


	function cari_uangmukacurr(){

				$bulan=date('m');

				$this->db->select('*');
				$this->db->from('tu_uangmuka');
				
				$this->db->where('substring(tglpengajuan,6,2)', $bulan);

                 $query = $this->db->get();
                 //$this->session->set_userdata('cektanggal',$no_pemasukan);
                 return $query->result();
	}


	function cari_uangmukabtn(){

				$bulan=$this->input->post('txtBulan');
				$statusnya=$this->input->post('txtStatus');

				if($bulan=="all" && $statusnya=="all"){

					$this->db->select('*');
					$this->db->from('tu_uangmuka');
					$query = $this->db->get();
	                 //$this->session->set_userdata('cektanggal',$no_pemasukan);
	                return $query->result();

				}elseif($bulan=="all" && $statusnya==$statusnya){

					$this->db->select('*');
					$this->db->from('tu_uangmuka');
					
					
					$this->db->where('status', $statusnya);
	                 $query = $this->db->get();
	                 //$this->session->set_userdata('cektanggal',$no_pemasukan);
	                 return $query->result();

				}elseif($bulan==$bulan && $statusnya=="all"){

					$this->db->select('*');
					$this->db->from('tu_uangmuka');
					$this->db->where('substring(tglpengajuan,6,2)', $bulan);
					
	                 $query = $this->db->get();
	                 //$this->session->set_userdata('cektanggal',$no_pemasukan);
	                 return $query->result();

				}else{
					$this->db->select('*');
					$this->db->from('tu_uangmuka');
					
					$this->db->where('substring(tglpengajuan,6,2)', $bulan);
					$this->db->where('status', $statusnya);
	                 $query = $this->db->get();
	                 //$this->session->set_userdata('cektanggal',$no_pemasukan);
	                 return $query->result();
				}

				
	}

}    