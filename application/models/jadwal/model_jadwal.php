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
class model_jadwal extends CI_Model{
    //put your code here
    
    public function cari_jadwal($txtdari,$txtke,$txttglberangkat,$txttglpulang){
        $berangkat=$this->input->post('$txttglpulang');
        $berangkat2=$this->input->post('$txttglberangkat');
        $pergi=$this->input->post('txtdari');
        $pulang=$this->input->post('txtke');
        //echo $pulang ;die;
        
            $jadwalberangkat=array(
            'bdari'=>$this->input->post('txtdari'),
            'btujuan'=>$this->input->post('txtke'),
            
            );
            
            $this->db->select('*');
            $this->db->from('t_jadwal');
            $this->db->join('t_pool','t_pool.kdpool=t_jadwal.kdpool','left');
            $this->db->join('v_sisakursi','t_jadwal.idjadwal=v_sisakursi.idjadwal','LEFT');
             $this->db->where($jadwalberangkat);
             $this->db->where('tglberangkat >',$txttglberangkat);
             $query = $this->db->get();
             $this->session->set_userdata('bdari',$txtdari);
             $this->session->set_userdata('btujuan',$txtke);
             
            return $query->result();
           
    }
    public function cari_jadwal_pulang($txtdari,$txtke,$txttglberangkat,$txttglpulang){
        $berangkat=$this->input->post('$txttglpulang');
        $berangkat=$this->input->post('$txttglberangkat');
        $pergi=$this->input->post('txtdari');
        $pulang=$this->input->post('txtke');
        //echo $txttglpulang ;die;
       
            //echo $txttglberangkat;die;
            $jadwalpulang=array(
            'btujuan'=>$this->input->post('txtdari'),
            'bdari'=>$this->input->post('txtke'),
            'tglberangkat'=>$txttglpulang,
            );
            
            $this->db->select('*');
            $this->db->from('t_jadwal');
            $this->db->join('t_pool','t_pool.kdpool=t_jadwal.kdpool','left');
             $this->db->join('v_sisakursi','t_jadwal.idjadwal=v_sisakursi.idjadwal','LEFT');
             $this->db->where($jadwalpulang);
             $query = $this->db->get();
             $this->session->set_userdata('pulangbdari',$txtke);
             $this->session->set_userdata('pulangbtujuan',$txtdari);
            //echo $this->db->last_query(); die;
            return $query->result();
            
        
    }
    public function cari_jadwalkosong($txtdari,$txtke,$txttglberangkat,$txttglpulang){
        $pulang1=$this->input->post('$txttglpulang');
        $berangkat=$this->input->post('$txttglberangkat');
        $pergi=$this->input->post('txtdari');
        $pulang=$this->input->post('txtke');
        //echo $txttglberangkat ;die;
       
            //echo $txttglberangkat;die;
            $jadwalberangkat=array(
            'bdari'=>$this->input->post('txtdari'),
            'btujuan'=>$this->input->post('txtke'),
            
            );
            
            $this->db->select('*');
            $this->db->from('t_jadwal');
            $this->db->join('t_pool','t_pool.kdpool=t_jadwal.kdpool','left');
             $this->db->join('v_sisakursi','t_jadwal.idjadwal=v_sisakursi.idjadwal','LEFT');
             $this->db->where($jadwalberangkat);
             $query = $this->db->get();
             $this->session->set_userdata('bdari',$txtdari);
             $this->session->set_userdata('btujuan',$txtke);
            
            return $query->result();
            
        
    }
    
    function simpanpesanan(){
        $kotapergi=$this->input->post('txtkotaberangkat'); 
        
        $this->db->select('*');
        $this->db->from('t_pemesanan');
        $query = $this->db->get();
        $rows=$query->result_array();
        $coba=count($rows);
        $tambah=$coba +1;
        $prefix=DATE('Y');
        $leadingzeros = '0000';
        $no_peserta = $prefix . substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;
        //echo $kotapergi;die;
        if($kotapergi=='JAKARTA'){
            $jkt='JKT';
            $kodebooking=$jkt.$no_peserta;
            $cekdata=array(
                'kdpesanan'=>$kodebooking,
                'kdjadwal'=>$this->input->post('txtidjadwal'),
                'kdmember'=>$this->input->post('txtnamapemesan'),
                'jmlpenumpang'=>$this->input->post('txtjmlpng'),
                
                'kotajemput'=>$this->input->post('txtkecamatan'),
                'kelurahanjemput'=>$this->input->post('txtkelurahan'),
                'alamatjemput'=>$this->input->post('txtalamatberangkat'),
                'nohp'=>$this->input->post('txttelpon'),
                'kotatujuan'=>$this->input->post('txtkecamatantujuan'),
                'kelurahantujuan'=>$this->input->post('txtkelurahantujuan'),
                'alamattujuan'=>$this->input->post('txtalamattujuan'),
                'tiketsatuan'=>$this->input->post('txtharga'),
                'totaltiket'=>$this->input->post('txtbtiket'),
                'statuspesanan'=>'submit',
                
            );
         $this->session->set_userdata('kodebooking',$kodebooking);
         $this->db->insert('t_pemesanan', $cekdata);
         
        return true;  
        }else{
            $mjl='MJL';
            $kodebooking=$mjl.$no_peserta;
            $cekdata=array(
                'kdpesanan'=>$kodebooking,
                'kdjadwal'=>$this->input->post('txtidjadwal'),
                'kdmember'=>$this->input->post('txtnamapemesan'),
                'jmlpenumpang'=>$this->input->post('txtjmlpng'),
                
                'kotajemput'=>$this->input->post('txtkecamatan'),
                'kelurahanjemput'=>$this->input->post('txtkelurahan'),
                'alamatjemput'=>$this->input->post('txtalamatberangkat'),
                'nohp'=>$this->input->post('txttelpon'),
                'kotatujuan'=>$this->input->post('txtkecamatantujuan'),
                'kelurahantujuan'=>$this->input->post('txtkelurahantujuan'),
                'alamattujuan'=>$this->input->post('txtalamattujuan'),
                'tiketsatuan'=>$this->input->post('txtharga'),
                'totaltiket'=>$this->input->post('txtbtiket'),
                'statuspesanan'=>'submit',
                
            );
         
         $this->session->set_userdata('kodebooking',$kodebooking);   
         $this->db->insert('t_pemesanan', $cekdata);
         
        return true;  
        }
         
    }
    
    function jemput_saja($id=NULL){
        
        if(!empty($id)){
            $this->db->where('idjadwal', $id);
        }        
        $query = $this->db->get('t_jadwal');
        
//        return $query->result(); 
        
        foreach ($query->result() as $row)
                    {
                        $idjadwal=$row->idjadwal;
                
                        $data = array(  
                                'idjadwal' => $row->idjadwal,
                                'tglberangkat'=>$row->tglberangkat,
                                'waktuberangkat' =>$row->waktuberangkat,
                                'kdpool' =>$row->kdpool,
                                'bdari' =>$row->bdari,
                                'btujuan' =>$row->btujuan,
                                'harga' =>$row->harga,
                                'nopolisi' =>$row->nopolisi,
                                'keterangan' => $row->keterangan,
                            );
                        //$this->db->insert('tb_noregistrasi', $data); 
                        // echo $this->db->last_query(); die;
                         $this->session->set_userdata('kotaberangkat', $row->bdari);   
                         $this->session->set_userdata('kotatujuan', $row->btujuan);   
                         $this->session->set_userdata('idjadwal', $row->idjadwal);   
                        return true;       
                    }
        
    }
    function jemput_sajalagi($id=NULL){
        
        if(!empty($id)){
             $this->db->select('*');
            
            $this->db->join('t_pool','t_pool.kdpool=t_jadwal.kdpool','left');
            $this->db->join('v_sisakursi','t_jadwal.idjadwal=v_sisakursi.idjadwal','LEFT');
            $this->db->where('t_jadwal.idjadwal', $id);
        }        
        $query = $this->db->get('t_jadwal');
        
        return $query->result(); 
        
       
        
    }
    function get_kecamatan($kota){
                //echo "<script>alert($txtkota);</script>" ;die;
                $this->db->where('kota',$kota);
		$result = $this->db->get('t_kecamatan');
                //echo $this->db->last_query(); die;
                //echo "<script>alert($this->db->last_query());</script>" ;die;
		if($result->num_rows()>0){
			return $result->result_array();
		}
		else {
			return array();
		}
		
	}
        function get_kecamatantujuan($kotatujuan){
                //echo "<script>alert($txtkota);</script>" ;die;
                $this->db->where('kota',$kotatujuan);
		$result = $this->db->get('t_kecamatan');
                //echo $this->db->last_query(); die;
                //echo "<script>alert($this->db->last_query());</script>" ;die;
		if($result->num_rows()>0){
			return $result->result_array();
		}
		else {
			return array();
		}
		
	}
     function getKelurahan($txtkecamatan){
                //echo "<script>alert($txtkota);</script>" ;die;
                $this->db->where('kdkecamatan',$txtkecamatan);
		$result = $this->db->get('t_kelurahan');
                //echo $this->db->last_query(); die;
                //echo "<script>alert($this->db->last_query());</script>" ;die;
		if($result->num_rows()>0){
			return $result->result_array();
		}
		else {
			return array();
		}
		
	} 
        
    function getinfo_booking($kodebooking){
                
                $query= $this->db->where('kdpesanan',$kodebooking);
		$query= $this->db->get('v_peminjaman');
                return $query->result();
                
    }
    function getinfo_booking3($kodebooking){
               
                
                $this->db->where('kdpesanan',$kodebooking);
		$result = $this->db->get('v_peminjaman');
                return $query->result();
                $this->session->set_userdata('');
                
    }
    function getinfo_konfirmasi($kodebooking){
        $query=$this->db->where('kdpesanan',$kodebooking);
        $query = $this->db->get('t_konfirmasibayar');
        return $query->result();
    }
    
    
    function list_konfirmasi(){
        $status='konfirm';
        $query = $this->db->join('t_pemesanan','t_pemesanan.kdpesanan=t_konfirmasibayar.kdpesanan','left');
        $query = $this->db->join('t_jadwal','t_pemesanan.kdjadwal=t_jadwal.idjadwal','left');
        $query = $this->db->where('statuskonfirmasi',$status);
        $query = $this->db->get('t_konfirmasibayar');
        
        return $query->result();
    }
    function list_retur(){
        $status='submited';
        $query = $this->db->join('t_pemesanan','t_pemesanan.kdpesanan=t_retur.kdtiket','left');
        $query = $this->db->join('t_jadwal','t_pemesanan.kdjadwal=t_jadwal.idjadwal','left');
        $query = $this->db->where('statusretur',$status);
        $query = $this->db->get('t_retur');
        
        return $query->result();
    }
    function simpan_konfirmasi($kdbooking,$norek,$atasnama,$txtnamabank,$statuspembayaran){
        $tglsekarang=DATE('Y-m-d');
        $tgllog=DATE('Y-m-d h:m:s');
        
        $this->db->select('*');
        $this->db->from('t_konfirmasibayar');
        $this->db->where('kdpesanan',$kdbooking);
        $query = $this->db->get();
        $rows=$query->result_array();
        $coba=count($rows);
        
        if($coba>0){
            $data=array(
               
                'namabank'=>$txtnamabank,
                'nomerrekening'=>$norek,
                'atasnama'=>$atasnama,
                'tglkonfirmasi'=>$tglsekarang,
                'statuskonfirmasi'=>$statuspembayaran,
                'logupdate'=>$tgllog,
            );
            $this->db->WHERE('kdpesanan', $kdbooking);
             $this->db->update('t_konfirmasibayar', $data);
             $this->session->set_userdata('kdbooking',$kdbooking);
            return true;  
        }else{
             
             $data=array(
                'id'=>'',
                'kdpesanan'=>$kdbooking,
                'namabank'=>$txtnamabank,
                'nomerrekening'=>$norek,
                'atasnama'=>$atasnama,
                'tglkonfirmasi'=>$tglsekarang,
                'statuskonfirmasi'=>$statuspembayaran,
                'logupdate'=>$tgllog,
            );
             $this->db->insert('t_konfirmasibayar', $data);
             $this->session->set_userdata('kdbooking',$kdbooking);
            return true;  
        }
        
    }
    
    function update_pemesanan($kodebooking,$statuspembayaran){
        $data=array(
               
                'statuspesanan'=>$statuspembayaran,
                
            );
             $this->db->WHERE('kdpesanan', $kodebooking);
             $this->db->update('t_pemesanan', $data);
             $this->session->set_userdata('kdbooking',$kodebooking); 
            return true;  
    }
    
    function update_batal($kodebooking){
            $data=array(
                'statuspesanan'=>'retur',
            );
            $this->db->WHERE('kdpesanan', $kodebooking);
            $this->db->update('t_pemesanan', $data);
            $this->session->set_userdata('kdbooking',$kodebooking); 
            return true;  
            
          
            
    }
    
    function getinfo_pemesanan(){
        $query=$this->db->get('v_peminjaman');
        return $query->result();
    }
    
    function listpool(){
        $query=$this->db->get('t_pool');
        return $query->result();
    }
    function listpool2($kdpool){
        $query=$this->db->where('kdpool !=',$kdpool);
        $query=$this->db->get('t_pool');
        return $query->result();
    } 
    
    function listkendaraan(){
        $query=$this->db->get('t_kendaraan');
        return $query->result();
    }
    function listkendaraan2($nopolis){
        $query=$this->db->where('nopolisi !=',$nopolis);
        $query=$this->db->get('t_kendaraan');
        return $query->result();
    }
    function list_user(){
        $this->db->select('*');
        $this->db->from('t_user');
        $query = $this->db->get();
        $rows=$query->result_array();
        $coba=count($rows);
        $tambah=$coba +1;
        $prefix=DATE('y');
        $leadingzeros = '000';
        $no_user = $prefix . substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;
        $this->session->set_userdata('userid',$no_user);  
        $query=$this->db->get('t_user');
        return $query->result();
        
    }  
    
    function simpanUser(){
        $usernya=$this->input->post('txtuserid');
        $passnya=md5($this->input->post('txtuserid'));
        $inserdata=array(
            'userid'=>$this->input->post('txtuserid'),
            'username'=>$this->input->post('txtusername'),
            'password'=>$passnya,
            'level'=>$this->input->post('txtlevel'),
        );
        
            $this->db->insert('t_user', $inserdata);
            $this->session->set_userdata('userid',$usernya);
            return true; 
        
    }
    
    function list_jadwal(){
        $this->db->select('*');
        $this->db->from('t_jadwal');
        $query = $this->db->get();
        $rows=$query->result_array();
        $coba=count($rows);
        $tambah=$coba +1;
        $tahun=DATE('Y');
        $bulan=DATE('m');
        $tanggal=DATE('d');
        $prefix=$tahun.$bulan.$tanggal;
        $leadingzeros = '00';
        $kdjadwal = $prefix . substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;
        $this->session->set_userdata('idjadwal',$kdjadwal);  
        $query=$this->db->JOIN('t_pool','t_pool.kdpool=t_jadwal.kdpool');
        $query=$this->db->order_by('tglberangkat','DESC');
        $query=$this->db->get('t_jadwal');
        return $query->result();
        
    } 
    function inputretur($nilaitiket,$kodebooking){
        $this->db->select('*');
        $this->db->from('t_retur');
        $query = $this->db->get();
        $rows=$query->result_array();
        $coba=count($rows);
        $tambah=$coba +1;
        $prefix="R";
        $leadingzeros = '000';
        $no_retur = $prefix . substr($leadingzeros, 0, (-strlen($tambah))) . $tambah;
        $logupdate=date('Y-m-d h:m:s');
        $tglsekarang=date('Y-m-d h:m:s');
        $inserdata=array(
            'kdretur'=>$no_retur,
            'kdtiket'=>$kodebooking,
            'nilairetur'=>$nilaitiket,
            'tglretur'=>$tglsekarang,
            'alasanretur'=>'-',
            'statusretur'=>'submited',
            'logupdate'=>$logupdate,
        );
         $this->db->insert('t_retur', $inserdata);
         $this->session->set_userdata('kdretur',$no_retur);
         return true; 
    }
    function simpanJadwal(){
                        $usernya=$this->input->post('txtidjadwal');
			$logupdate=('Y-m-d h:m:s');
                        $inserdata=array(
                            'idjadwal'=>$this->input->post('txtidjadwal'),
                            'tglberangkat'=>$this->input->post('txttglberangkat'),
                            'waktuberangkat'=>$this->input->post('txtwaktu'),
                            'kdpool'=>$this->input->post('txtpool'),

                            'bdari'=>$this->input->post('txtberangkat'),
                            'btujuan'=>$this->input->post('txttujuan'),
                            'harga'=>$this->input->post('txtharga'),
                            'nopolisi'=>$this->input->post('txtnopolisi'),

                            'keterangan'=>$this->input->post('txtketerangan'),
                            'logupdate'=>$logupdate
                        );

                            $this->db->insert('t_jadwal', $inserdata);
                            $this->session->set_userdata('idjadwal',$usernya);
                            return true; 
    }
    
    function update_konfirmasi($statusnya){
           $logupdate=DATE('Y-m-d h:m:s');
           $data=array(
               'statuspesanan'=>$statusnya
           );
           $id=$this->input->post('item[]');
           for($i=0; $i < count($id);$i++){
                $this->db->WHERE('kdpesanan', $id[$i]);
                $this->db->update('t_pemesanan', $data);
                //$this->session->set_userdata('kdpesanan',$id); 
           }
           $data1=array(
               'statuskonfirmasi'=>$statusnya,
               'logupdate'=>$logupdate
           );
           for($i=0; $i < count($id);$i++){
                $this->db->WHERE('kdpesanan', $id[$i]);
                $this->db->update('t_konfirmasibayar', $data1);
                //$this->session->set_userdata('kdpesanan',$id); 
           }
            
    }
    
    function update_retur($statusnya){
           $logupdate=DATE('Y-m-d h:m:s');
           $data=array(
               'statusretur'=>$statusnya,
               'logupdate'=>$logupdate
           );
           $id=$this->input->post('item[]');
           for($i=0; $i < count($id);$i++){
                $this->db->WHERE('kdtiket', $id[$i]);
                $this->db->update('t_retur', $data);
                //$this->session->set_userdata('kdpesanan',$id); 
           }
           $statuskon='retur';
           $data1=array(
               'statuskonfirmasi'=>$statuskon,
               'logupdate'=>$logupdate
           );
           for($i=0; $i < count($id);$i++){
                $this->db->WHERE('kdpesanan', $id[$i]);
                $this->db->update('t_konfirmasibayar', $data1);
                //$this->session->set_userdata('kdpesanan',$id); 
           }            
    }
    
    function carilaporan($txtTahun,$txtBulan,$txtStatus){
        //echo $txtStatus;die();
        if($txtTahun!='' && $txtBulan =='all' && $txtStatus =='all'){
                    
                    $query=$this->db->where('SUBSTRing(kdpesanan,4,4)',$txtTahun);
                    $query = $this->db->get('v_peminjaman');
                    return $query->result();
                }
                elseif($txtTahun =='' && $txtBulan !='all' && $txtStatus =='all'){
                    $query=$this->db->where('SUBSTRing(tglberangkat,6,2)',$txtBulan);
                    $query = $this->db->get('v_peminjaman');
                    return $query->result();
                }
                elseif($txtTahun =='' && $txtBulan =='all' && $txtStatus !='all'){
                    $query=$this->db->where('statuspesanan',$txtStatus); 
                    
                    $query = $this->db->get('v_peminjaman');
                    return $query->result();
                }
                elseif($txtTahun !='' && $txtBulan !='all' && $txtStatus =='all'){
                    $query=$this->db->where('SUBSTRing(tglberangkat,6,2)',$txtBulan);
                    $query=$this->db->where('SUBSTRing(kdpesanan,4,4)',$txtTahun);
                    $query = $this->db->get('v_peminjaman');
                    return $query->result();
                }
                elseif($txtTahun !='' && $txtBulan =='all' && $txtStatus !='all'){
                    $query=$this->db->where('SUBSTRing(kdpesanan,4,4)',$txtTahun); 
                    $query=$this->db->where('statuspesanan',$txtStatus);  
                    $query = $this->db->get('v_peminjaman');
                    return $query->result();
                }
                elseif( $txtTahun =='' && $txtBulan !='all' && $txtStatus !='all'){
                    $query=$this->db->where('SUBSTRing(tglberangkat,6,2)',$txtBulan);
                    $query=$this->db->where('jperbaikan',$txtjperbaikan); 
                    $query=$this->db->where('statuspesanan',$txtStatus);    
                    
                    $query = $this->db->get('v_peminjaman');
                    return $query->result();
                }
                else{

                    
                    $query = $this->db->get('v_peminjaman');
                    return $query->result();
                }
    }
    
    function getUser($id){
        $query = $this->db->where('userid',$id);
        $query = $this->db->get('t_user');
        return $query->result();
    }
    
    function updateUser(){
        $txtuserid=$this->input->post('txtuserid');
        $txtusername = $this->input->post('txtusername');
        $txtpassword = md5($this->input->post('txtpassword'));
        $txtlevel = $this->input->post('txtlevel');
        $cekupdate=array(
            'username'=>$txtusername,
            'password'=>$txtpassword,
            'level'=>$txtlevel,
        );
        $this->db->where('userid', $txtuserid);
        $this->db->update('t_user', $cekupdate);         
        return true;  
    }
    
    function getJadwal($id){
        $query =$this->db->JOIN('t_pool','t_pool.kdpool=t_jadwal.kdpool');
        $query =$this->db->JOIN('t_kendaraan','t_kendaraan.nopolisi=t_jadwal.nopolisi');
        $query = $this->db->where('idjadwal',$id);
        $query = $this->db->get('t_jadwal');
        return $query->result();
        
    }
    function getJadwal2($id){
        $query =$this->db->JOIN('t_pool','t_pool.kdpool=t_jadwal.kdpool');
        $query = $this->db->where('idjadwal',$id);
        $query = $this->db->get('t_jadwal');
        $row=$query->row();
        
        $notpool=$row->kdpool;$this->session->set_userdata('kdpool',$notpool);
        $nopol=$row->nopolisi;$this->session->set_userdata('nopolisi',$nopol);
    }
    function updateJadwal(){
         $txtidjadwal=$this->input->post('txtidjadwal');
			$logupdate=('Y-m-d h:m:s');
        $cekupdate=array(
            'tglberangkat'=>$this->input->post('txttglberangkat'),
            'waktuberangkat'=>$this->input->post('txtwaktu'),
            'kdpool'=>$this->input->post('txtpool'),

            'bdari'=>$this->input->post('txtberangkat'),
            'btujuan'=>$this->input->post('txttujuan'),
            'harga'=>$this->input->post('txtharga'),
            'nopolisi'=>$this->input->post('txtnopolisi'),

            'keterangan'=>$this->input->post('txtketerangan'),
            'logupdate'=>$logupdate
        );
        $this->db->where('idjadwal', $txtidjadwal);
        $this->db->update('t_jadwal', $cekupdate);         
        return true;  
    }
    function updateJadwal2(){
         $txtidjadwal=$this->input->post('txtidjadwal');
			$logupdate=('Y-m-d h:m:s');
        $cekupdate=array(
           
            'waktuberangkat'=>$this->input->post('txtwaktu'),
            
            'harga'=>$this->input->post('txtharga'),
            

            'keterangan'=>$this->input->post('txtketerangan'),
            'logupdate'=>$logupdate
        );
        $this->db->where('idjadwal', $txtidjadwal);
        $this->db->update('t_jadwal', $cekupdate);         
        return true;  
    }
    
    function simpanKendaraan(){
                        $txtnopolisi=$this->input->post('txtnopolisi');
			$logupdate=('Y-m-d h:m:s');
                        $inserdata=array(
                            'nopolisi'=>$this->input->post('txtnopolisi'),
                            'namakendaraan'=>$this->input->post('txtnamakendaraan'),
                            'kapasitas'=>$this->input->post('txtkapasitas'),
                            'keterangan'=>$this->input->post('txtketerangan')

                        );

                            $this->db->insert('t_kendaraan', $inserdata);
                            $this->session->set_userdata('nopolisi',$txtnopolisi);
                            return true; 
    }
    
    function listkecamatan(){
        $query = $this->db->get('t_kecamatan');
        return $query->result();
    }
    function listkecamatan2($id){
        $query = $this->db->WHERE('kdkecamatan',$id);
        $query = $this->db->get('t_kecamatan');
        return $query->result();
    }
    function simpanKecamatan(){
                
		$logupdate=('Y-m-d h:m:s');
                $kdkecamatan=$this->input->post('txtkdkecamatan');
                $inserdata=array(
                    'kdkecamatan'=>$this->input->post('txtkdkecamatan'),
                    'namakecamatan'=>$this->input->post('txtnamakecamatan'),
                    'kota'=>$this->input->post('txtkota')
                );

                    $this->db->insert('t_kecamatan', $inserdata);
                    $this->session->set_userdata('kdkecamatan',$kdkecamatan);
                    return true; 
    }
    
    function updateKecamatan(){
        $kdkecamatan=$this->input->post('txtkdkecamatan');
                $cekupdate=array(
                    'kdkecamatan'=>$this->input->post('txtkdkecamatan'),
                    'namakecamatan'=>$this->input->post('txtnamakecamatan'),
                    'kota'=>$this->input->post('txtkota')
                );
        $this->db->where('kdkecamatan', $kdkecamatan);
        $this->db->update('t_kecamatan', $cekupdate);         
        return true;  
    }
    
    function updateKendaraan(){
                    $txtnopolisi=$this->input->post('txtnopolisi');
			$logupdate=('Y-m-d h:m:s');
                        $cekupdate=array(
                           
                            'namakendaraan'=>$this->input->post('txtnamakendaraan'),
                            'kapasitas'=>$this->input->post('txtkapasitas'),
                            'keterangan'=>$this->input->post('txtketerangan')

                        );
        $this->db->where('nopolisi', $txtnopolisi);
        $this->db->update('t_kendaraan', $cekupdate);         
        return true;  
    }
    
    function getinfo_penjualan(){
        $tahunsekarang=DATE('Y');
        $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahunsekarang);
        $query=$this->db->get('v_penjualan');
        return $query->result();
    }
    
    function getinfo_jumlahpenjualan(){
        $tahunsekarang=DATE('Y');
        $query=$this->db->SELECT('SUM(jumlahpenjualan)as jumlahpenjualan');
        $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahunsekarang);
        $query=$this->db->get('v_penjualan');
        $row=$query->row('jumlahpenjualan');
        $this->session->set_userdata('jumlahpenjualan',$row);        
    }
    
    function cari_penjualan($jurusan,$bulan,$tahun){
        if($jurusan=='all' && $bulan=='all' && $tahun=='' ){
            
            $tahunsekarang=DATE('Y');
            $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahunsekarang);
            $query=$this->db->get('v_penjualan');
            return $query->result();
        }
        elseif($jurusan=='all' && $bulan!='all' && $tahun=='' ){
            
            $tahunsekarang=DATE('Y');
            $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahunsekarang);
            $query=$this->db->WHERE(('MONTH(tglberangkat)'),$bulan);
            $query=$this->db->get('v_penjualan');
            return $query->result();
        }
        elseif($jurusan=='all' && $bulan!='all' && $tahun!='' ){
                        
            $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahun);
            $query=$this->db->WHERE(('MONTH(tglberangkat)'),$bulan);
            $query=$this->db->get('v_penjualan');
            return $query->result();
        }
        
        elseif($jurusan!='all' && $bulan!='all' && $tahun!='' ){
            $query=$this->db->WHERE(('bdari'),$jurusan);            
            $query=$this->db->WHERE(('bdari'),$jurusan);            
            $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahun);
            $query=$this->db->WHERE(('MONTH(tglberangkat)'),$bulan);
            $query=$this->db->get('v_penjualan');
            return $query->result();
        }
        elseif($jurusan!='all' && $bulan!='all' && $tahun=='' ){
            $query=$this->db->WHERE(('bdari'),$jurusan);            
            $tahunsekarang=DATE('Y');
            $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahunsekarang);
            $query=$this->db->WHERE(('MONTH(tglberangkat)'),$bulan);
            $query=$this->db->get('v_penjualan');
            return $query->result();
        }
        else{
            $tahunsekarang=DATE('Y');
            $query=$this->db->WHERE(('bdari'),$jurusan);            
            
            $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahunsekarang);
            
            $query=$this->db->get('v_penjualan');
            return $query->result();
        }
    }
    
    function cari_jumlahpenjualan($jurusan,$bulan,$tahun){
        if($jurusan=='all' && $bulan=='all' && $tahun=='' ){
            
            $tahunsekarang=DATE('Y');
            $query=$this->db->SELECT('SUM(jumlahpenjualan)as jumlahpenjualan');
            $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahunsekarang);
            $query=$this->db->get('v_penjualan');
            $row=$query->row('jumlahpenjualan');
            $this->session->set_userdata('jumlahpenjualan',$row);     
        }
        elseif($jurusan=='all' && $bulan!='all' && $tahun=='' ){
            
            $tahunsekarang=DATE('Y');
            
            $query=$this->db->SELECT('SUM(jumlahpenjualan)as jumlahpenjualan');
            $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahunsekarang);
            $query=$this->db->WHERE(('MONTH(tglberangkat)'),$bulan);
            $query=$this->db->get('v_penjualan');
            $row=$query->row('jumlahpenjualan');
            $this->session->set_userdata('jumlahpenjualan',$row);     
        }
        elseif($jurusan=='all' && $bulan!='all' && $tahun!='' ){
                        
            
            $query=$this->db->SELECT('SUM(jumlahpenjualan)as jumlahpenjualan');
            $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahun);
            $query=$this->db->WHERE(('MONTH(tglberangkat)'),$bulan);
            $query=$this->db->get('v_penjualan');
            $row=$query->row('jumlahpenjualan');
            $this->session->set_userdata('jumlahpenjualan',$row);     
        }
        elseif($jurusan!='all' && $bulan!='all' && $tahun!='' ){
           
            
            $query=$this->db->SELECT('SUM(jumlahpenjualan)as jumlahpenjualan');
            $query=$this->db->WHERE(('bdari'),$jurusan);
            $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahun);
            $query=$this->db->WHERE(('MONTH(tglberangkat)'),$bulan);
            $query=$this->db->get('v_penjualan');
            $row=$query->row('jumlahpenjualan');
            $this->session->set_userdata('jumlahpenjualan',$row);     
        }
        
        elseif($jurusan!='all' && $bulan!='all' && $tahun=='' ){
            
            $tahunsekarang=DATE('Y');
            $query=$this->db->SELECT('SUM(jumlahpenjualan)as jumlahpenjualan');
            $query=$this->db->WHERE(('bdari'),$jurusan);
            $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahunsekarang);
            $query=$this->db->WHERE(('MONTH(tglberangkat)'),$bulan);
            $query=$this->db->get('v_penjualan');
            $row=$query->row('jumlahpenjualan');
            $this->session->set_userdata('jumlahpenjualan',$row);     
        }
        else{
            
            $tahunsekarang=DATE('Y');
            $query=$this->db->SELECT('SUM(jumlahpenjualan)as jumlahpenjualan');
            $query=$this->db->WHERE(('bdari'),$jurusan);
            $query=$this->db->WHERE(('YEAR(tglberangkat)'),$tahunsekarang);
            
            $query=$this->db->get('v_penjualan');
            $row=$query->row('jumlahpenjualan');
            $this->session->set_userdata('jumlahpenjualan',$row);  
        }
    }
}
