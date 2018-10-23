<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jadwal
 *
 * @author Travel
 * 
 */
class Jadwal extends CI_Controller {
    //put your code here
    public function __construct() {
                parent::__construct();
                $this->load->helper('form');
                $this->load->library(array('form_validation','pagination','session')) ;
                $this->load->model(array('Jadwal/model_jadwal','laporan/Queries'));
        }
    function cari(){
        
        if(isset($_POST['btnKonfirmasi'])){
            
            $kodebooking=$this->input->post('txtkdbooking');
            if($kodebooking==''){
                 echo '<script>alert("Mohon maaf, Kode Booking Belum diisi");window.history.back();';
                echo '</script>';
            }else{
                $res['data3'] = $this->model_jadwal->getinfo_booking($kodebooking);
            
                if(empty($res)){
                    echo '<script>alert("Mohon maaf, Kode Booking Tidak Ditemukan");window.history.back();';
                    echo '</script>';

                    $res['data3'] = $this->model_jadwal->getinfo_booking($kodebooking);     
                }else{

                    $res['data3'] = $this->model_jadwal->getinfo_booking($kodebooking);
                    if(empty($res)){
                         echo '<script>alert("Mohon maaf, Kode Booking Tidak Ditemukan");window.history.back();';
                        echo '</script>';
                    }else{
                    //echo $this->db->last_query(); die;
                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar');
                    $this->load->view('jadwal/konfirmasibayar',$res);
                    $this->load->view('design/footdepan'); }
                }
            }
            
        }
//        pilihan utk cari jadwal
        else {
      
        $txttgldari=$this->input->post('txttgldari');
        $txttglsampai=$this->input->post('txttglsampai');
       
        
        if($txttglsampai=='' && $txttgldari !=''){
            
            $res['data2'] = $this->model_jadwal->cari_jadwal_pulang($txtdari,$txtke,$txttglberangkat,$txttglpulang);
            $res['data1'] = $this->model_jadwal->cari_jadwal($txtdari,$txtke,$txttglberangkat,$txttglpulang);
            $res['berangkatdari']=$this->session->userdata('bdari');
            $res['pulangke']=$this->session->userdata('btujuan');
            $res['pulangbdari']=$this->session->userdata('btujuan');
            $res['pulangke']=$this->session->userdata('btujuan');
            $res['jmlpenumpang']=$txtjmlpenumpang;
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar');
            $this->load->view('jadwal/hasiljadwal_pp',$res);
            $this->load->view('design/footdepan');
        }
        else{
            
            $res['data1'] = $this->model_jadwal->cari_jadwalkosong($txtdari,$txtke,$txttglberangkat,$txttglpulang);
            //echo $this->db->last_query(); die;
            $res['berangkatdari']=$this->session->userdata('bdari');
            $res['pulangke']=$this->session->userdata('btujuan');
            $res['jmlpenumpang']=$txtjmlpenumpang;
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar');
            $this->load->view('jadwal/hasiljadwal',$res);
            $this->load->view('design/footdepan');
        }
        }
    }
    
    function jemputberangkat(){
        $txtjmlpenumpang=$this->session->userdata('jmlpenumpang');
        //echo $txtjmlpenumpang;die;
        $id=$this->uri->segment(3);
        //echo $id;die;
        if(!empty($id)){
             //$txtjmlpenumpang=$this->input->post('txtjmlpenumpang');
            $res['pulangke']=$id;
            $res['data1'] = $this->model_jadwal->jemput_saja($id);
            $kota=$this->session->userdata('kotaberangkat');
            $kotatujuan=$this->session->userdata('kotatujuan');
            $res['kotaberangkat']=$this->session->userdata('kotaberangkat');
            $res['kotatujuan']=$this->session->userdata('kotatujuan');
            $res['idjadwal']=$this->session->userdata('idjadwal');
            $res['data3'] = $this->model_jadwal->jemput_sajalagi($id);
            $res['data2'] = $this->model_jadwal->get_kecamatan($kota);
            $res['data4'] = $this->model_jadwal->get_kecamatantujuan($kotatujuan);
            $res['jmlpenumpang'] = $txtjmlpenumpang;
            //echo $this->db->last_query(); die;
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar');
            $this->load->view('jadwal/jemput1',$res);
            $this->load->view('design/footdepan');
        }
        else{
            $res['pulangke']=$id;
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar');
            $this->load->view('jadwal/jemput1',$res);
            $this->load->view('design/footdepan');
        }
    }
    
    function simpanpesanan(){
        
            $this->model_jadwal->simpanpesanan();
            $kodebooking=$this->session->userdata('kodebooking');
            $res['data3']=$this->model_jadwal->getinfo_booking($kodebooking);
            //$this->load->model('model_jadwal/simpanpesanan') ;
            //echo $this->db->last_query(); die;
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar');
            $this->load->view('jadwal/booking',$res);
            $this->load->view('design/footdepan');
           
            
             
    }
    
    function getKelurahan(){
		
                $txtkecamatan = $this->input->post('txtkecamatan');
                
		$kdkelurahan = $this->model_jadwal->getKelurahan($txtkecamatan);
		
                
                //echo $this->db->last_query(); die;
		$data = "<option value=''>------ Pilih1------</option>";
		foreach($kdkelurahan as $key){
                   $data .= "<option value='$key->kdkelurahan'>$key->namakelurahan</option>";
                   
		}
		echo $data;
	}
        
    function simpan_konfirmasi(){
            if(isset($_POST['btnKonfirmasi'])){
                
                    $kdbooking=$this->input->post('txtkdbooking1');
                    $norek=$this->input->post('txtnomerekening'); 
                    $atasnama=$this->input->post('txtatasnama');
                    $txtnamabank=$this->input->post('txtnamabank');
                    $statuspembayaran='konfirm';
                    $res['simpankonfirmas']=$this->model_jadwal->simpan_konfirmasi($kdbooking,$norek,$atasnama,$txtnamabank,$statuspembayaran);
                    echo '<script>alert("Terima kasih telah melakukan pembayaran, kami akan melakukan cek pembayaran anda");';
                        echo '</script>';
                    $kodebooking=$this->session->userdata('kdbooking');
                    $this->model_jadwal->update_pemesanan($kodebooking,$statuspembayaran);
                    //echo $this->db->last_query(); die;
                    $res['data4'] = $this->model_jadwal->getinfo_konfirmasi($kodebooking);       
                    $res['data3'] = $this->model_jadwal->getinfo_booking($kodebooking);
                     $this->load->view('design/headdepan');
                    $this->load->view('design/navbar');
                    $this->load->view('jadwal/konfirmasibayar',$res);
                    $this->load->view('design/footdepan');
            }
            elseif(isset($_POST['btnLunas'])){
                $kdbooking=$this->input->post('txtkdbooking1');
                    $norek=$this->input->post('txtnomerekening'); 
                    $atasnama=$this->input->post('txtatasnama');
                    $txtnamabank=$this->input->post('txtnamabank');
                    $statuspembayaran='Lunas';
                    $res['simpankonfirmas']=$this->model_jadwal->simpan_konfirmasi($kdbooking,$norek,$atasnama,$txtnamabank,$statuspembayaran);
                    $kodebooking=$this->session->userdata('kdbooking');
                    $this->model_jadwal->update_pemesanan($kodebooking,$statuspembayaran);
                    //echo $txtkdbooking;die;
                    $res['data3'] = $this->model_jadwal->getinfo_booking($kodebooking);
                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar');
                    $this->load->view('jadwal/konfirmasibayar',$res);
                    $this->load->view('design/footdepan');
            }
            elseif(isset($_POST['btnPrint'])){
                redirect('home');
            }
            elseif(isset($_POST['btnBatal'])){
                    $kodebooking=$this->input->post('txtkdbook');
                    
                    $res['data'] = $this->model_jadwal->update_batal($kodebooking);
                    //echo $this->db->last_query(); die;
                    $res['data3'] = $this->model_jadwal->getinfo_booking($kodebooking);
                    $data4 = $this->model_jadwal->getinfo_booking3($kodebooking);
                    foreach($data4 as $key){
                        $nilaitiket=$key->totaltiket;
                        
                    }
                    $res['data5'] = $this->model_jadwal->inputretur($nilaitiket,$kodebooking);
                    //echo $this->db->last_query(); die;
                    $this->load->view('design/headdepan');
                    $this->load->view('design/navbar');
                    $this->load->view('jadwal/inforetur',$res);
                    $this->load->view('design/footdepan');
//                     echo '<script>alert("Dear Pelanggan, Permohonan pembatalan tiket akan kami proses. Kami akan menghubungi Anda dalam 1 x24 ");window.history.back()';
//                echo '</script>';
            }
    }
    
    function cek_laporan(){
        $res['data2'] = $this->model_jadwal->getinfo_pemesanan();
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('jadwal/pencarian_laporan',$res);
        $this->load->view('design/footdepan');
    }
    function cek_penjualan(){
        $res['data'] = $this->model_jadwal->getinfo_penjualan();
        $res['data2'] = $this->model_jadwal->getinfo_jumlahpenjualan();
        //echo $this->db->last_query(); die;
        $res['jumlahpenjualan']=$this->session->userdata('jumlahpenjualan');
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('jadwal/pencarian_penjualan',$res);
        $this->load->view('design/footdepan');
    }
    
    function caripenjualan(){
        if(isset($_POST['btnCari'])){
            $jurusan=$this->input->post('txtJurusan');
            $bulan=$this->input->post('txtBulan');
            $tahun=$this->input->post('txtTahun');

            $res['data'] = $this->model_jadwal->cari_penjualan($jurusan,$bulan,$tahun);
            $res['data2'] = $this->model_jadwal->cari_jumlahpenjualan($jurusan,$bulan,$tahun);
            //echo $this->db->last_query(); die;
            $res['jumlahpenjualan']=$this->session->userdata('jumlahpenjualan');

            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('jadwal/pencarian_penjualan2',$res);
            $this->load->view('design/footdepan');
        }
        else{
            $jurusan=$this->input->post('txtJurusan');
            $bulan=$this->input->post('txtBulan');
            $tahun=$this->input->post('txtTahun');

            $res['data'] = $this->model_jadwal->cari_penjualan($jurusan,$bulan,$tahun);
            $res['data2'] = $this->model_jadwal->cari_jumlahpenjualan($jurusan,$bulan,$tahun);
            //echo $this->db->last_query(); die;
            $res['jmlpenjualan']=$this->session->userdata('jumlahpenjualan');

            $output = $this->load->view('jadwal/cetakpenjualan', $res, true);
            return $this->_gen_pdf1($output);
        }
        
        
    }
    private function _gen_pdf1($html, $paper = 'A4-L') {
        if (ob_get_contents())
            ob_end_clean();
        $CI = & get_instance();
        $CI->load->library('MPDF56/mpdf');
        $mpdf = new mPDF('utf-8', $paper);
        $mpdf->debug = true;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    function list_konfirmasi(){
        $res['data'] = $this->model_jadwal->list_konfirmasi();
        //$res['data3'] = $this->model_jadwal->getinfo_booking();
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('jadwal/list_konfirmasi',$res);
        $this->load->view('design/footdepan');
    }
    function list_retur(){
        $res['data'] = $this->model_jadwal->list_retur();
        //echo $this->db->last_query(); die;
        $this->load->view('design/headdepan');
        $this->load->view('design/navbar_akses');
        $this->load->view('jadwal/list_retur',$res);
        $this->load->view('design/footdepan');
    }
    function update_konfirmasi(){
        
        if(isset($_POST['btnLunas'])){
            $statusnya='Lunas';
            $this->model_jadwal->update_konfirmasi($statusnya);
            //echo $this->db->last_query(); die;
            $res['data'] = $this->model_jadwal->list_konfirmasi();
            //$res['data3'] = $this->model_jadwal->getinfo_booking();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('jadwal/list_konfirmasi',$res);
            $this->load->view('design/footdepan');
        }
        if(isset($_POST['btnReject'])){
            $statusnya='cancel';
            $this->model_jadwal->update_konfirmasi($statusnya);
            //echo $this->db->last_query(); die;
            $res['data'] = $this->model_jadwal->list_konfirmasi();
            //$res['data3'] = $this->model_jadwal->getinfo_booking();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('jadwal/list_konfirmasi',$res);
            $this->load->view('design/footdepan');
        }
    }
    
    function update_retur(){
        if(isset($_POST['btnLunas'])){
            $statusnya='approve';
            $this->model_jadwal->update_retur($statusnya);
            //echo $this->db->last_query(); die;
            $res['data'] = $this->model_jadwal->list_retur();
            //$res['data3'] = $this->model_jadwal->getinfo_booking();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('jadwal/list_retur',$res);
            $this->load->view('design/footdepan');
        }
        if(isset($_POST['btnReject'])){
            $statusnya='cancel';
            $this->model_jadwal->update_retur($statusnya);
            //echo $this->db->last_query(); die;
            $res['data'] = $this->model_jadwal->list_retur();
            //$res['data3'] = $this->model_jadwal->getinfo_booking();
            $this->load->view('design/headdepan');
            $this->load->view('design/navbar_akses');
            $this->load->view('jadwal/list_retur',$res);
            $this->load->view('design/footdepan');
        }
    }
    
    function carilaporan(){
        
        if(isset($_POST['btnCari'])){
            $txtTahun=$this->input->post('txtTahun');
            $txtBulan=$this->input->post('txtBulan');
//            $txttgldari=$this->input->post('txttgldari');
//            $txttglsampai=$this->input->post('txttglsampai');
            $txtStatus=$this->input->post('txtStatus');
            $res['data2'] = $this->model_jadwal->carilaporan($txtTahun,$txtBulan,$txtStatus);
            //echo $this->db->last_query(); die;
            if(!empty($res)){
                $res['data2'] = $this->model_jadwal->carilaporan($txtTahun,$txtBulan,$txtStatus);
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('jadwal/pencarian_laporan',$res);
                $this->load->view('design/footdepan');
            }else{
                $res['data2'] = $this->model_jadwal->carilaporan($txtTahun,$txtBulan,$txtStatus);
                $this->load->view('design/headdepan');
                $this->load->view('design/navbar_akses');
                $this->load->view('jadwal/pencarian_laporan',$res);
                $this->load->view('design/footdepan');
            }
            
           
        }           
    }
    
    
}
