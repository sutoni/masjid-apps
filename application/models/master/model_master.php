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
class model_master extends CI_Model{
    //put your code here
	function list_kodepemasukan(){
        
        $query=$this->db->get('tm_kodepemasukan');
        //echo $this->db->last_query(); die;
        return $query->result();
        
    }  
    function list_kodepemasukan2($id2){
        $query = $this->db->WHERE('idpemasukan',$id2);
        $query = $this->db->get('tm_kodepemasukan');
        return $query->result();
    }


    function simpanKodepemasukan(){

    		$this->db->select('*');
	        $this->db->from('tm_kodepemasukan');
	        $query = $this->db->get();
	        $rows=$query->result_array();
	        $coba=count($rows);
	        $tambah=$coba +1;
	        $prefix='PM';
	        $leadingzeros = '00';
	        $no_pemasukan = $prefix . substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;

    	 	$txtnopemasukan=$no_pemasukan;

			
                        $inserdata=array(
                            'idpemasukan'=>$no_pemasukan,
                            'namapemasukan'=>$this->input->post('txtnamapemasukan'),
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'validfrom'=>$this->input->post('txttglberlaku'),
                            'validto'=>$this->input->post('txttglberakhir')

                        );

                            $this->db->insert('tm_kodepemasukan', $inserdata);
                            $this->session->set_userdata('idpemasukan',$no_pemasukan);
                            return true; 
    }


    function updateKodepemasukan(){

            $txtnopemasukan=$this->input->post('txtnopemasukan');
			
                        $cekupdate=array(
                           
                            'namapemasukan'=>$this->input->post('txtnamapemasukan'),
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'validfrom'=>$this->input->post('txttglberlaku'),
                            'validto'=>$this->input->post('txttglberakhir')
                        );
        $this->db->where('idpemasukan', $txtnopemasukan);
        $this->db->update('tm_kodepemasukan', $cekupdate);         
       // echo $this->db->last_query(); die;
        return true;  
    }



    //model kode pengeluaran

        function list_kodepengeluaran(){
        
        $query=$this->db->get('tm_kodepengeluaran');
        //echo $this->db->last_query(); die;
        return $query->result();
        
    }  
    function list_kodepengeluaran2($id2){
        $query = $this->db->WHERE('kodepengeluaran',$id2);
        $query = $this->db->get('tm_kodepengeluaran');
        return $query->result();
    }


    function simpanKodepengeluaran(){

            $this->db->select('*');
            $this->db->from('tm_kodepengeluaran');
            $query = $this->db->get();
            $rows=$query->result_array();
            $coba=count($rows);
            $tambah=$coba +1;
            $prefix='PL';
            $leadingzeros = '000';
            $no_pengeluaran = $prefix . substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;

            $txtnopengeluaran=$no_pengeluaran;

            
                        $inserdata=array(
                            'kodepengeluaran'=>$no_pengeluaran,
                            'namapengeluaran'=>$this->input->post('txtnamapengeluaran'),
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'validfrom'=>$this->input->post('txttglberlaku'),
                            'validto'=>$this->input->post('txttglberakhir')

                        );

                            $this->db->insert('tm_kodepengeluaran', $inserdata);
                            $this->session->set_userdata('kodepengeluaran',$no_pengeluaran);
                            return true; 
    }


    function updateKodepengeluaran(){

            $txtnopengeluaran=$this->input->post('txtnopengeluaran');
            
                        $cekupdate=array(
                           
                            'namapengeluaran'=>$this->input->post('txtnamapengeluaran'),
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'validfrom'=>$this->input->post('txttglberlaku'),
                            'validto'=>$this->input->post('txttglberakhir')
                        );
        $this->db->where('kodepengeluaran', $txtnopengeluaran);
        $this->db->update('tm_kodepengeluaran', $cekupdate);         
       // echo $this->db->last_query(); die;
        return true;  
    }

    //batas model kode pengeluaran

    //Model Kode bidang

        function list_kodebidang(){
        
        $query=$this->db->get('tm_kodebidang');
        //echo $this->db->last_query(); die;
        return $query->result();
        
    }  
    function list_kodebidang2($id2){
        $query = $this->db->WHERE('idbidang',$id2);
        $query = $this->db->get('tm_kodebidang');
        return $query->result();
    }


    function simpanKodebidang(){

            $this->db->select('*');
            $this->db->from('tm_kodebidang');
            $query = $this->db->get();
            $rows=$query->result_array();
            $coba=count($rows);
            $tambah=$coba +1;
            $prefix='KB';
            $leadingzeros = '000';
            $no_bidang = $prefix . substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;

            $txtnobidang=$no_bidang;

            
                        $inserdata=array(
                            'idbidang'=>$no_bidang,
                            'namabidang'=>$this->input->post('txtnamabidang'),
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'validfrom'=>$this->input->post('txttglberlaku'),
                            'validto'=>$this->input->post('txttglberakhir')

                        );

                            $this->db->insert('tm_kodebidang', $inserdata);
                            $this->session->set_userdata('idbidang',$no_bidang);
                            return true; 
    }


    function updateKodebidang(){

            $txtnobidang=$this->input->post('txtnobidang');
            
                        $cekupdate=array(
                           
                            'namabidang'=>$this->input->post('txtnamabidang'),
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'validfrom'=>$this->input->post('txttglberlaku'),
                            'validto'=>$this->input->post('txttglberakhir')
                        );
        $this->db->where('idbidang', $txtnobidang);
        $this->db->update('tm_kodebidang', $cekupdate);         
       // echo $this->db->last_query(); die;
        return true;  
    }        

    //batas Model kode bidang


    //Model kode Kegiatan


    function simpanKodekegiatan(){

            $this->db->select('*');
            $this->db->from('tm_kodekegiatan');
            $query = $this->db->get();
            $rows=$query->result_array();
            $coba=count($rows);
            $tambah=$coba +1;
            $prefix='KB';
            $leadingzeros = '000';
            $no_kegiatan = $prefix . substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;

            $txtnokegiatan=$no_kegiatan;

            
                        $inserdata=array(
                            'idkegiatan'=>$no_kegiatan,
                            'namakegiatan'=>$this->input->post('txtnamakegiatan'),
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'validfrom'=>$this->input->post('txttglberlaku'),
                            'validto'=>$this->input->post('txttglberakhir')

                        );

                            $this->db->insert('tm_kodekegiatan', $inserdata);
                            $this->session->set_userdata('idkegiatan',$no_kegiatan);
                            return true; 
    }


    function updateKodekegiatan(){

            $txtnokegiatan=$this->input->post('txtnokegiatan');
            
                        $cekupdate=array(
                           
                            'namakegiatan'=>$this->input->post('txtnamakegiatan'),
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'validfrom'=>$this->input->post('txttglberlaku'),
                            'validto'=>$this->input->post('txttglberakhir')
                        );
        $this->db->where('idkegiatan', $txtnokegiatan);
        $this->db->update('tm_kodekegiatan', $cekupdate);         
       // echo $this->db->last_query(); die;
        return true;  
    }       

     function list_kodekegiatan(){
        
        $query=$this->db->get('tm_kodekegiatan');
        //echo $this->db->last_query(); die; CEK 1
        return $query->result();
        
    }  

    function list_kodekegiatan2($id2){
        $query = $this->db->WHERE('idkegiatan',$id2);
        $query = $this->db->get('tm_kodekegiatan');
        return $query->result();
    }


    

    //batas Model kode Kegiatan
        

     function simpanJamaah(){
            $this->db->select('*');
            $this->db->from('tm_jamaah');
            $query = $this->db->get();
            $rows=$query->result_array();
            $coba=count($rows);
            $tambah=$coba +1;
            $prefix='JM';

            $leadingzeros = '00000';
            $idjamaah = $prefix . substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;

            
                        $inserdata=array(
                            'idjamaah'=>$idjamaah,
                            'namajamaah'=>$this->input->post('txtnamajamaah'),
                            'gender'=>$this->input->post('txtgender'),
                            'tgllahir'=>$this->input->post('txttgllahir'),
                            'rt'=>$this->input->post('txtrt'),
                            'rw'=>$this->input->post('txtrw'),
                            'blok'=>$this->input->post('txtblok'),
                            'kelurahan'=>$this->input->post('txtkelurahan'),
                            'kecamatan'=>$this->input->post('txtkecamatan'),
                            'provinsi'=>$this->input->post('txtprovinsi'),
                            'telpon'=>$this->input->post('txttelp'),
                            'email'=>$this->input->post('txtemail'),
                            'catatan'=>$this->input->post('txtcatatan'),
                            'tglberakhir'=>$this->input->post('txttglberakhir'),
                            'status'=>$this->input->post('txtstatus')

                        );

                            $this->db->insert('tm_jamaah', $inserdata);
                            $this->session->set_userdata('idjamaah',$idjamaah);
                            return true; 
     }


     function list_jamaah(){
        $query=$this->db->get('tm_jamaah');
        //echo $this->db->last_query(); die;
        return $query->result();
     }   


     //Model Jabatan

        function list_jabatan(){
        
        $query=$this->db->get('tm_jabatan');
        //echo $this->db->last_query(); die;
        return $query->result();
        
    }  
    function list_jabatan2($id2){
        $query = $this->db->WHERE('idjabatan',$id2);
        $query = $this->db->get('tm_jabatan');
        return $query->result();
    }


    function simpanJabatan(){

            $this->db->select('*');
            $this->db->from('tm_jabatan');
            $query = $this->db->get();
            $rows=$query->result_array();
            $coba=count($rows);
            $tambah=$coba +1;
            $prefix='JB';
            $leadingzeros = '000';
            $idjabatan = $prefix . substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;

            //$txtnobidang=$no_bidang;

            
                        $inserdata=array(
                            'idjabatan'=>$idjabatan,
                            'namajabatan'=>$this->input->post('txtnamajabatan'),
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'validfrom'=>$this->input->post('txttglberlaku'),
                            'validto'=>$this->input->post('txttglberakhir')

                        );

                            $this->db->insert('tm_jabatan', $inserdata);
                            $this->session->set_userdata('idjabatan',$idjabatan);
                            return true; 
    }


    function updateJabatan(){

            $txtidjabatan=$this->input->post('txtidjabatan');
            
                        $cekupdate=array(
                           
                            'namajabatan'=>$this->input->post('txtnamajabatan'),
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'validfrom'=>$this->input->post('txttglberlaku'),
                            'validto'=>$this->input->post('txttglberakhir')
                        );
        $this->db->where('idjabatan', $txtidjabatan);
        $this->db->update('tm_jabatan', $cekupdate);         
       //echo $this->db->last_query(); die;
        return true;  
    }        

    //batas Model Jabatan

    //Model Pengurus

        function list_pengurus(){
            $query=$this->db->select('tm_pengurus.idpengurus,tm_pengurus.idjabatan, tm_pengurus.idjamaah as idpengurus2,tm_jamaah.namajamaah as namapengurus, tm_pengurus.idbidang, tm_kodebidang.namabidang, tm_pengurus.idjabatan, tm_jabatan.namajabatan,tm_pengurus.idatasan,  tm_pengurus.keterangan, tm_pengurus.validfrom, tm_pengurus.validto');
            $query=$this->db->join('tm_kodebidang','tm_kodebidang.idbidang=tm_pengurus.idbidang','left');
            $query=$this->db->join('tm_jamaah','tm_jamaah.idjamaah=tm_pengurus.idjamaah','left');
            //$query=$this->db->join('tm_jamaah','tm_jamaah.idjamaah=tm_pengurus.idatasan','left');
            $query=$this->db->join('tm_jabatan','tm_jabatan.idjabatan=tm_pengurus.idjabatan','left');
            $query=$this->db->get('tm_pengurus');
            
            //echo $this->db->last_query(); die;
            return $query->result();
        
        }  

        function simpanPengurus(){

            $this->db->select('*');
            $this->db->from('tm_pengurus');
            $query = $this->db->get();
            $rows=$query->result_array();
            $coba=count($rows);
            $tambah=$coba +1;
            $prefix='M';
            $leadingzeros = '000';
            $idpengurus = $prefix . substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;

            //$txtnobidang=$no_bidang;

            
                        $inserdata=array(
                            'idpengurus'=>$idpengurus,
                            'idjamaah'=>$this->input->post('txtnamapengurus'),
                            'idbidang'=>$this->input->post('txtbidang'),
                            'idjabatan'=>$this->input->post('txtjabatan'),
                            'idatasan'=>$this->input->post('txtatasan'),
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'validfrom'=>$this->input->post('txttglberlaku'),
                            'validto'=>$this->input->post('txttglberakhir')

                        );

                            $this->db->insert('tm_pengurus', $inserdata);
                            $this->session->set_userdata('idpengurus',$idpengurus);
                            return true; 

        }    
          
        


    //batas Model Pengurus

    //Model Keuangan

        function list_uangmuka(){


                $lookstatus="submit";
                $lookstatus2="draft";
                $lookstatus3="approved";
                $lookstatus4="bayar";
                $level = $this->session->userdata('level'); 
                if($level=='dkm'){

                    $query = $this->db->join('tm_kodebidang','tm_kodebidang.idbidang=tu_uangmuka.kodebidang','left');
                    
                    $query = $this->db->WHERE('status',$lookstatus);
                    $query = $this->db->get('tu_uangmuka');
                    return $query->result();    
                }elseif($level=='keuangan'){

                    $query = $this->db->join('tm_kodebidang','tm_kodebidang.idbidang=tu_uangmuka.kodebidang','left');
                    $query = $this->db->WHERE('status',$lookstatus3);
                    $query = $this->db->or_WHERE('status',$lookstatus4);
                    $query = $this->db->get('tu_uangmuka');
                    return $query->result();    
                }
                else{

                    $query = $this->db->join('tm_kodebidang','tm_kodebidang.idbidang=tu_uangmuka.kodebidang','left');
                    
                    $query = $this->db->WHERE('status',$lookstatus2);
                    $query = $this->db->get('tu_uangmuka');
                    return $query->result();    
                }

           
        }
    //batas Model Keuangan


        //Model Keuangan

        function list_pencatatanuang(){

            $this->db->select('*');
            $this->db->from('tu_catatpengeluaran');
            $query = $this->db->get();
            return $query->result();
        }
    //batas Model Keuangan


    //Model Pencatatan Pengeluaran 

        function simpanHeaderpengeluarantutup(){

            $tahun=date('Y');
            $bulan=date('m');
            $hari=date('d');


            $this->db->select('*');
            $this->db->from('tu_catatpengeluaran');
            $query = $this->db->get();
            $rows=$query->result_array();
            $coba=count($rows);
            $tambah=$coba +1;
            $prefix='PU';
            $leadingzeros = '0000';
            $idpengeluaran = $prefix.$tahun.$bulan. substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;
            $statusawal="submit";
            $harini=date('Y-m-d');
            $namauser = $this->session->userdata('username'); 

             $inserdata=array(
                            'idpengeluaran'=>$idpengeluaran,
                            'idrefrensi'=>$this->input->post('txtiduangmuka'),
                            'tglcatat'=>$harini,
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'kodebidang'=>$this->input->post('txtbidang'),
                            'status'=>$statusawal,
                            'loguser'=>$namauser,
                            'loginput'=>$harini,
                            'logupdate'=>$harini
                        );

                            $this->db->insert('tu_catatpengeluaran', $inserdata);
                            $this->session->set_userdata('idpengeluaran',$idpengeluaran);
                            $this->session->set_userdata('idrefrensi',$this->input->post('txtiduangmuka'));
                            return true; 
         }   


    
        function simpanHeaderpengeluaran(){

            $tahun=date('Y');
            $bulan=date('m');
            $hari=date('d');


            $this->db->select('*');
            $this->db->from('tu_catatpengeluaran');
            $query = $this->db->get();
            $rows=$query->result_array();
            $coba=count($rows);
            $tambah=$coba +1;
            $prefix='PU';
            $leadingzeros = '0000';
            $idpengeluaran = $prefix.$tahun.$bulan. substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;
            $statusawal="submit";
            $harini=date('Y-m-d');
            $namauser = $this->session->userdata('username'); 

             $inserdata=array(
                            'idpengeluaran'=>$idpengeluaran,
                            'tglcatat'=>$harini,
                            'keterangan'=>$this->input->post('txtketerangan'),
                            'kodebidang'=>$this->input->post('txtbidang'),
                            'status'=>$statusawal,
                            'loguser'=>$namauser,
                            'loginput'=>$harini,
                            'logupdate'=>$harini
                        );

                            $this->db->insert('tu_catatpengeluaran', $inserdata);
                            $this->session->set_userdata('idpengeluaran',$idpengeluaran);
                            return true; 
         }   



            function getdetailpengeluaran($cekidpengeluaran){


                $query = $this->db->WHERE('idpengeluaran',$cekidpengeluaran);
                $query = $this->db->get('tu_detailpengeluaran');
                return $query->result();

            }


            function headerpencatatanuang($cekidpengeluaran){

              
                 $this->db->select('tm_kodebidang.namabidang,tu_catatpengeluaran.idpengeluaran,tu_catatpengeluaran.keterangan as ketpengeluaran, tu_catatpengeluaran.tglcatat');
                 $this->db->from('tu_catatpengeluaran');
                 $this->db->join('tm_kodebidang','tm_kodebidang.idbidang=tu_catatpengeluaran.kodebidang','left');
                
                // $this->db->WHERE('idpengeluaran',$cekidpengeluaran);
                 $this->db->WHERE('idpengeluaran',$cekidpengeluaran);
                 $query = $this->db->get();
                 return $query->result();

            }


             function headerpencatatanuangtutup($cekidpengeluaran){

                 
                 $this->db->select('tm_kodebidang.namabidang,tu_catatpengeluaran.idpengeluaran,tu_catatpengeluaran.keterangan as ketpengeluaran, tu_catatpengeluaran.tglcatat, tu_uangmuka.nilai');
                 $this->db->from('tu_catatpengeluaran');
                 $this->db->join('tm_kodebidang','tm_kodebidang.idbidang=tu_catatpengeluaran.kodebidang','left');
                 $this->db->join('tu_uangmuka','tu_uangmuka.iduangmuka=tu_catatpengeluaran.idrefrensi','left');
                // $this->db->WHERE('idpengeluaran',$cekidpengeluaran);
                 $this->db->WHERE('tu_catatpengeluaran.idpengeluaran',$cekidpengeluaran);
                 $query = $this->db->get();
                 return $query->result();
                  

            }

            function getpospengeluaran(){

                $query = $this->db->get('tm_kodepengeluaran');
                return $query->result();
            }

            function cekdobel($txtidpengeluaran,$txtketeranganpengeluaran){

                    $this->db->select('*');
                    $this->db->from('tu_detailpengeluaran');
                    $this->db->where('idpengeluaran',$txtidpengeluaran);
                    $this->db->where('keterangan',$txtketeranganpengeluaran);
                    $query = $this->db->get();

                    $rows=$query->result_array();
                    $coba=count($rows);
                    //echo "$coba";
                    $this->session->set_userdata('countketerangan',$coba);
                    //echo $this->db->last_query();die();
            }

            function updateTotalpengeluaran(){

                        $txtidpengeluaran=$this->input->post('txtidpengeluaran');
                        $this->db->select_sum('total');   
                        $this->db->from('tu_detailpengeluaran'); 
                        $this->db->where('idpengeluaran', $txtidpengeluaran);   
                        //$this->db->count_all();
                        $query=$this->db->get();

                        if ($query->num_rows() >0){ //membuat data masuk ke $data kemudian masuk lagi ke array $hasiltransaksi
                            foreach ($query->result() as $data) {
                                # code...
                               $totaldetailpengeluaran=$data->total;
                            }

                            echo $totaldetailpengeluaran;                           
                            $hariini=date('Y-m-d');

                            $cekupdate=array(
                               
                                'totalpengeluaran'=> $totaldetailpengeluaran,
                                'logupdate'=> $hariini
                            );
                            $this->db->where('idpengeluaran', $txtidpengeluaran);
                            $this->db->update('tu_catatpengeluaran', $cekupdate);         
                           
                            return true;  
         
                        //$this->session->set_userdata('jumlahtotal',$hasilTransaksi);
                        }

                        //echo $this->db->last_query(); die;
                        //$query->num_rows();
                        //$query->result_array();
                        //$rows=$query->result_array();
                        //$coba=sum($rows);
                       // $this->session->set_userdata('jumlahtotal',$coba);
                        //$hasil=$this->totalpengeluaran2; 
                        //

                        

                        





            }

            function simpanDetailpengeluaran($txtidpengeluaran){
                   // echo "kodenya adalah : $txtidpengeluaran";
                    $this->db->select('*');
                    $this->db->from('tu_detailpengeluaran');
                    $this->db->where('idpengeluaran',$txtidpengeluaran);
                    $query = $this->db->get();

                    $rows=$query->result_array();
                    $coba=count($rows);
                    $tambah=$coba +1;
                    $prefix=$txtidpengeluaran;
                    $leadingzeros = '000';
                    $iddetailpengeluaran = $prefix. substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;
                    $statusawal="submit";
                    $harini=date('Y-m-d');
                    //echo $iddetailpengeluaran;
                    $kuantiti=$this->input->post('txtqty');
                    $hargasatuan=$this->input->post('txthargasatuan');
                    $totaldetail=$kuantiti * $hargasatuan;
                    //$idpengeluaran=$this->input->post('txtidpengeluaran');

                    $inserdata=array(
                            'iddetailpengeluaran'=>$iddetailpengeluaran,
                            'idpengeluaran'=>$txtidpengeluaran,
                            'tglbon'=>$this->input->post('txttglbon'),
                            'nomerbon'=>$this->input->post('txtnobon'),
                            'keterangan'=>$this->input->post('txtketerangandetail'),
                            'kuantiti'=>$this->input->post('txtqty'),
                            'hargasatuan'=>$this->input->post('txthargasatuan'),
                            'total'=>$totaldetail,
                            'kodedetail'=>$this->input->post('txtkodepengeluaran'),
                            'status'=>$statusawal
                        );

                            $this->db->insert('tu_detailpengeluaran', $inserdata);
                            
                            return true; 
                            $this->session->set_userdata('idpengeluaran',$idpengeluaran);
                    }   
            

    //batas Model Pencatatan Pengeluaran    

     //Model Pengajuan Uang Muka
     

        function simpanUangmuka(){

            $tahun=date('Y');
            $bulan=date('m');
            $hari=date('d');


            $this->db->select('*');
            $this->db->from('tu_uangmuka');
            $query = $this->db->get();
            $rows=$query->result_array();
            $coba=count($rows);
            $tambah=$coba +1;
            $prefix='UM';
            $leadingzeros = '000';
            $iduangmuka = $prefix.$tahun.$bulan. substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;
            $statusawal="draft";
            $harini=date('Y-m-d');
            $namauser = $this->session->userdata('username'); 

            //cek tanggal dibutuhkan

            $date = $harini;
            $newdate = strtotime ( '+7 day' , strtotime ( $date ) ) ; //mengurangi 3 hari hasilnya 2012-02-13
            
            $newdate = date ( 'Y-m-j' , $newdate ); //untuk menyimpan ke dalam variabel baru
            
            $tgldibutuhkannya=$this->input->post('txttgldibutuhkan');
            if($tgldibutuhkannya <= $harini ){

                $inserdata=array(
                            'iduangmuka'=>$iduangmuka,
                            'idpengeluaran'=>"-",
                            'tglpengajuan'=>$harini,
                            'tgldibutuhkan'=>$newdate,
                            'kodebidang'=>$this->input->post('txtbidang'),
                            'ketkeperluan'=>$this->input->post('txtkeperluan'),
                            'nilai'=>$this->input->post('txtnilaiuangmuka'),
                            'tipebill'=>$this->input->post('txttipebayar'),
                            'penerima'=>$this->input->post('txtpenerima'),
                            'tglterima'=>"",
                            'status'=>$statusawal,
                            'loguser'=>$namauser
                        );

                            $this->db->insert('tu_uangmuka', $inserdata);
                            $this->session->set_userdata('iduangmuka',$iduangmuka);
                            return true; 

            }else{

                $inserdata=array(
                            'iduangmuka'=>$iduangmuka,
                            'idpengeluaran'=>"-",
                            'tglpengajuan'=>$harini,
                            'tgldibutuhkan'=>$this->input->post('txttgldibutuhkan'),
                            'kodebidang'=>$this->input->post('txtbidang'),
                            'ketkeperluan'=>$this->input->post('txtkeperluan'),
                            'nilai'=>$this->input->post('txtnilaiuangmuka'),
                            'tipebill'=>$this->input->post('txttipebayar'),
                            'penerima'=>$this->input->post('txtpenerima'),
                            'tglterima'=>"",
                            'status'=>$statusawal,
                            'loguser'=>$namauser
                        );

                            $this->db->insert('tu_uangmuka', $inserdata);
                            $this->session->set_userdata('iduangmuka',$iduangmuka);
                            return true; 

            }



            

        }    

        function submitUangmuka(){

            $tahun=date('Y');
            $bulan=date('m');
            $hari=date('d');


            $this->db->select('*');
            $this->db->from('tu_uangmuka');
            $query = $this->db->get();
            $rows=$query->result_array();
            $coba=count($rows);
            $tambah=$coba +1;
            $prefix='UM';
            $leadingzeros = '000';
            $iduangmuka = $prefix.$tahun.$bulan. substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;
            $statusawal="submit";
            $harini=date('Y-m-d');
            $namauser = $this->session->userdata('username'); 

            //cek tanggal dibutuhkan

            $date = $harini;
            $newdate = strtotime ( '+7 day' , strtotime ( $date ) ) ; //mengurangi 3 hari hasilnya 2012-02-13
            
            $newdate = date ( 'Y-m-j' , $newdate ); //untuk menyimpan ke dalam variabel baru
            
            $tgldibutuhkannya=$this->input->post('txttgldibutuhkan');
            if($tgldibutuhkannya <= $harini ){

                $inserdata=array(
                            'iduangmuka'=>$iduangmuka,
                            'idpengeluaran'=>"-",
                            'tglpengajuan'=>$harini,
                            'tgldibutuhkan'=>$newdate,
                            'kodebidang'=>$this->input->post('txtbidang'),
                            'ketkeperluan'=>$this->input->post('txtkeperluan'),
                            'nilai'=>$this->input->post('txtnilaiuangmuka'),
                            'tipebill'=>$this->input->post('txttipebayar'),
                            'penerima'=>$this->input->post('txtpenerima'),
                            'tglterima'=>"",
                            'status'=>$statusawal,
                            'loguser'=>$namauser
                        );

                            $this->db->insert('tu_uangmuka', $inserdata);
                            $this->session->set_userdata('iduangmuka',$iduangmuka);
                            return true; 

            }else{

                $inserdata=array(
                            'iduangmuka'=>$iduangmuka,
                            'idpengeluaran'=>"-",
                            'tglpengajuan'=>$harini,
                            'tgldibutuhkan'=>$this->input->post('txttgldibutuhkan'),
                            'kodebidang'=>$this->input->post('txtbidang'),
                            'ketkeperluan'=>$this->input->post('txtkeperluan'),
                            'nilai'=>$this->input->post('txtnilaiuangmuka'),
                            'tipebill'=>$this->input->post('txttipebayar'),
                            'penerima'=>$this->input->post('txtpenerima'),
                            'tglterima'=>"",
                            'status'=>$statusawal,
                            'loguser'=>$namauser
                        );

                            $this->db->insert('tu_uangmuka', $inserdata);
                            $this->session->set_userdata('iduangmuka',$iduangmuka);
                            return true; 

            }

            


        }    


        function getUangmuka2($id2){

                    $lookstatus3="bayar";
                    $query = $this->db->join('tm_kodebidang','tm_kodebidang.idbidang=tu_uangmuka.kodebidang','left');
                    $query = $this->db->WHERE('iduangmuka',$id2);
                    $query = $this->db->WHERE('status',$lookstatus3);
                    $query = $this->db->get('tu_uangmuka');
                    return $query->result();   
        }

        function getUangmuka($id2){
                
                $lookstatus="submit";
                $lookstatus2="draft";
                $lookstatus3="approved";
                $level = $this->session->userdata('level'); 
                if($level=='dkm'){

                    $query = $this->db->join('tm_kodebidang','tm_kodebidang.idbidang=tu_uangmuka.kodebidang','left');
                    $query = $this->db->WHERE('iduangmuka',$id2);
                    $query = $this->db->WHERE('status',$lookstatus);
                    $query = $this->db->get('tu_uangmuka');
                    return $query->result();    
                }
                if($level=='keuangan'){

                    $query = $this->db->join('tm_kodebidang','tm_kodebidang.idbidang=tu_uangmuka.kodebidang','left');
                    $query = $this->db->WHERE('iduangmuka',$id2);
                    $query = $this->db->WHERE('status',$lookstatus3);
                    $query = $this->db->get('tu_uangmuka');
                    return $query->result();    
                }
                else{

                    $query = $this->db->join('tm_kodebidang','tm_kodebidang.idbidang=tu_uangmuka.kodebidang','left');
                    $query = $this->db->WHERE('iduangmuka',$id2);
                    $query = $this->db->WHERE('status',$lookstatus2);
                    $query = $this->db->get('tu_uangmuka');
                    return $query->result();    
                }

                



            }

        function updateDraftUangmuka(){
                            $namauser = $this->session->userdata('username'); 
                            $hariini=date('Y-m-d');
                            $statusawal="draft";
                            $txtiduangmuka=$this->input->post('txtiduangmuka');
                            $cekupdate=array(
                               
                                'tgldibutuhkan'=>$this->input->post('txttgldibutuhkan'),
                                'kodebidang'=> $this->input->post('txtbidang'),
                                'ketkeperluan'=> $this->input->post('txtkeperluan'),
                                'nilai'=> $this->input->post('txtnilaiuangmuka'),
                                'tipebill'=> $this->input->post('txttipebayar'),
                                'penerima'=> $this->input->post('txtpenerima'),
                                'status'=> $statusawal,
                                'loguser'=>$namauser
                            );
                            $this->db->where('iduangmuka', $txtiduangmuka);
                            $this->db->update('tu_uangmuka', $cekupdate);         
                           
                            return true;  

        }


        function updateApproveUangmuka($id2){
                            $namauser = $this->session->userdata('username'); 
                            $hariini=date('Y-m-d');
                            $statusawal="approved";
                            $txtiduangmuka=$this->input->post('txtiduangmuka');
                            $cekupdate=array(
                               
                               
                                'status'=> $statusawal,
                                'loguser'=>$namauser
                            );
                            $this->db->where('iduangmuka', $id2);
                            $this->db->update('tu_uangmuka', $cekupdate);         
                           
                            return true;  

        }


        function updateSubmitUangmuka(){
                            $namauser = $this->session->userdata('username'); 
                            $hariini=date('Y-m-d');
                            $statusawal="submit";
                            $txtiduangmuka=$this->input->post('txtiduangmuka');
                            $cekupdate=array(
                               
                                'tgldibutuhkan'=>$this->input->post('txttgldibutuhkan'),
                                'kodebidang'=> $this->input->post('txtbidang'),
                                'ketkeperluan'=> $this->input->post('txtkeperluan'),
                                'nilai'=> $this->input->post('txtnilaiuangmuka'),
                                'tipebill'=> $this->input->post('txttipebayar'),
                                'penerima'=> $this->input->post('txtpenerima'),
                                'status'=> $statusawal,
                                'loguser'=>$namauser
                            );
                            $this->db->where('iduangmuka', $txtiduangmuka);
                            $this->db->update('tu_uangmuka', $cekupdate);         
                           
                            return true;  

        }

        function updateApproveUangmuka2(){
                            $namauser = $this->session->userdata('username'); 
                            $hariini=date('Y-m-d');
                            $statusawal="approved";
                            $txtiduangmuka=$this->input->post('txtiduangmuka');
                            $cekupdate=array(
                               
                                'tgldibutuhkan'=>$this->input->post('txttgldibutuhkan'),
                                'kodebidang'=> $this->input->post('txtbidang'),
                                'ketkeperluan'=> $this->input->post('txtkeperluan'),
                                'nilai'=> $this->input->post('txtnilaiuangmuka'),
                                'tipebill'=> $this->input->post('txttipebayar'),
                                'penerima'=> $this->input->post('txtpenerima'),
                                'status'=> $statusawal,
                                'loguser'=>$namauser
                            );
                            $this->db->where('iduangmuka', $txtiduangmuka);
                            $this->db->update('tu_uangmuka', $cekupdate);         
                           
                            return true;  

        }

        function updateRejectUangmuka($id2){
                            $namauser = $this->session->userdata('username'); 
                            $hariini=date('Y-m-d');
                            $statusawal="rejected";
                            $txtiduangmuka=$this->input->post('txtiduangmuka');
                            $cekupdate=array(
                               
                               
                                'status'=> $statusawal,
                                'loguser'=>$namauser
                            );
                            $this->db->where('iduangmuka', $id2);
                            $this->db->update('tu_uangmuka', $cekupdate);         
                           
                            return true;  

        }


        function updateBayarUangmuka($id2){
                            $namauser = $this->session->userdata('username'); 
                            $hariini=date('Y-m-d');
                            $statusawal="bayar";
                            $txtiduangmuka=$this->input->post('txtiduangmuka');
                            $cekupdate=array(
                               
                               
                                'status'=> $statusawal,
                                'loguser'=>$namauser
                            );
                            $this->db->where('iduangmuka', $id2);
                            $this->db->update('tu_uangmuka', $cekupdate);         
                           
                            return true;  

        }


        function updateBayarUangmuka2(){
                            $namauser = $this->session->userdata('username'); 
                            $hariini=date('Y-m-d');
                            $statusawal="bayar";
                            $txtiduangmuka=$this->input->post('txtiduangmuka');
                            $cekupdate=array(
                               
                                'tgldibutuhkan'=>$this->input->post('txttgldibutuhkan'),
                                'kodebidang'=> $this->input->post('txtbidang'),
                                'ketkeperluan'=> $this->input->post('txtkeperluan'),
                                'nilai'=> $this->input->post('txtnilaiuangmuka'),
                                'tipebill'=> $this->input->post('txttipebayar'),
                                'penerima'=> $this->input->post('txtpenerima'),
                                'tglterima'=> $this->input->post('txttglterima'),
                                'status'=> $statusawal,
                                'loguser'=>$namauser
                            );
                            $this->db->where('iduangmuka', $txtiduangmuka);
                            $this->db->update('tu_uangmuka', $cekupdate);         
                           
                            return true;  

        }


        function updatetutupuangmuka($cekidpengeluaran){
            $txtiduangmuka=$this->input->post('txtiduangmuka');
            $namauser = $this->session->userdata('username'); 
            $statusclose="closed";
            $cekupdate=array(
                               
                                'idpengeluaran'=>$cekidpengeluaran,
                                'status'=> $statusclose,
                                'loguser'=>$namauser
                            );
                            $this->db->where('iduangmuka', $txtiduangmuka);
                            $this->db->update('tu_uangmuka', $cekupdate);         
                           
                           //echo $this->db->last_query();die();
                            return true;  
        }


        function jumlahtotal($cekidrefrensi){

                $query = $this->db->select_sum('nilai');                
                $query = $this->db->where('iduangmuka',$cekidrefrensi);
                $query = $this->db->get('tu_uangmuka');
                return $query->result();   

        }


        function jumlahtotalpengeluaran($cekidpengeluaran){

                $query = $this->db->select_sum('total');
                $query = $this->db->where('idpengeluaran',$cekidpengeluaran);
                $query = $this->db->get('tu_detailpengeluaran');
                return $query->result();   

        }


        function cekdobelpemasukan($txttglcatat, $txtrefrensi,$txtnilaipemasukan,$txtkdpemasukan){

                    


                    $this->db->select('idcatatpemasukan');
                    $this->db->from('tu_catatpemasukan');

                    $this->db->where('tglpemasukan',$txttglcatat);
                    $this->db->where('idrefrensi',$txtrefrensi);
                    $this->db->where('nilaipemasukan',$txtnilaipemasukan);
                    $this->db->where('kodepemasukan',$txtkdpemasukan);
                   // $this->db->like('idcatatpemasukan',$cekid);
                    $query = $this->db->get();

                    $rows=$query->result_array();
                    $coba=count($rows);
                    
                    $this->session->set_userdata('countdobel',$coba);

        }

        function simpanPemasukan(){
                $tahun=date('Y');
                $bulan=date('m');
                $hari=date('d');


                $this->db->select('*');
                $this->db->from('tu_catatpemasukan');
                $query = $this->db->get();
                $rows=$query->result_array();
                $coba=count($rows);
                $tambah=$coba +1;
                $prefix='PN';
                $leadingzeros = '000';
                $idcatatpemasukan = $prefix.$tahun.$bulan.$hari. substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;
                
                $harini=date('Y-m-d');
                $namauser = $this->session->userdata('username'); 


                 $inserdata=array(
                            'idcatatpemasukan'=>$idcatatpemasukan,
                            'idrefrensi'=>$this->input->post('txtrefrensi'),
                            'tglpemasukan'=>$this->input->post('txttglcatat'),
                            'kodepemasukan'=>$this->input->post('txtkdpemasukan'),
                            'nilaipemasukan'=>$this->input->post('txtnilaipemasukan'),
                            'keteranganpemasukan'=>$this->input->post('txtketerangan'),
                            'loginput'=>$harini,
                            'loguser'=>$namauser,
                            'logupdate'=>$harini
                            
                        );

                            $this->db->insert('tu_catatpemasukan', $inserdata);
                            $this->session->set_userdata('idcatatpemasukan',$idcatatpemasukan);
                            return true; 
        }
}

