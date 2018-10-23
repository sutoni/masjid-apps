<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : Controller  Evaluasi Tahap I
 * ***************************************************************
 */


/**
 * Description of Crud
 *
 * @author Sutoni
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load helper dan library
        $this->load->helper(array('form','date','url'));
        $this->load->library('form_validation');
        //$this->load->library('session');
        //$this->load->library('upload');
        $this->load->model(array('master/model_upload'));    
        //$this->load->Helper('url');


    }

    public function index($error = NULL)
    {
        
        $data = array(
            //'action' => site_url('upload/proses'),
            //'judul' => set_value('judul'),
            'error' => $error['error'] // ambil parameter error
        );

        //$this->load->view('upload_form', array('error' => ' ' ));
         $data['num_rows'] = $this->db->get('tg_sholatwajib')->num_rows(); 
         $this->load->view('design/headdepan');
         $this->load->view('design/navbar_akses');
         $this->load->view('jadwal/jadwal_sholat',$data);
         $this->load->view('design/footdepan');
    }




    function do_upload()
    {

           

               //require_once("spreadsheet_excel_reader.php"); 

                //cek banyaknya data
              
                    $result=$this->db->get('tg_sholatwajib');
                    //echo $this->db->last_query(); die;
                    //NUMROWS
                    if($result->num_rows()>0){
                          

                             //$file_name = $upload_data['file_name'];
                          $config['upload_path'] = FCPATH.'assets/uploadfiles/';
                          $config['allowed_types'] = 'xls|csv';
                          $config['max_size'] = '100';
                          $config['max_width']  = '1024';
                          $config['max_height']  = '768';

                          $this->load->library('upload', $config);
                          $this->upload->initialize($config);

                         //a
                          //print_r($config);die();
                          if ( ! $this->upload->do_upload('file'))
                          {
                            $error = array('error' => $this->upload->display_errors());

                            $this->load->view('jadwal/jadwal_sholat', $error);
                          }
                          else
                          {
                                  $data = $this->upload->data();


                                // $data=$this->upload->data();
                                  @chmod($data['full_path'],0777);

                                  $this->load->library('Spreadsheet_Excel_Reader');
                                  $this-> spreadsheet_excel_reader->setOutputEncoding('CP1251');
                                  $this-> spreadsheet_excel_reader->read($data['full_path']);

                                   $sheets = $this->spreadsheet_excel_reader->sheets[0];
                                   error_reporting(0);

                                   $dataarray = array();
                                   //echo $dataarray;die();
                                   //for($i = 1; $i <=$sheets['numRows']; $i++){
                                     //   if($sheets['cells'][$i][1]== '') break;

                                     //echo $i;die();   

                                     //$inserdata = array(
                                       // 'idtgsholat'=>$sheets['cells'][$i][1],
                                       // 'namasholat' => $sheets['cells'][$i][2],
                                       // 'kategori' => $sheets['cells'][$i][3],
                                       // 'imam' => $sheets['cells'][$i][4],
                                       // 'muadzin' => $sheets['cells'][$i][5],
                                       // 'penceramah' => $sheets['cells'][$i][6],
                                       // 'tanggal' => $sheets['cells'][$i][7],
                                       // 'status'=>$sheets['cells'][$i][8]
                                    // );




                                   //'birthday'=>date('Y-m-d', strtotime(str_replace('/', '.', $row['birthday'])));

                                    $this->db->select('*');
                                    $this->db->from('tg_sholatwajib');
                                    $query = $this->db->get();
                                    $rows=$query->result_array();
                                    $coba=count($rows);
                                   

                                   for($i = 1; $i <=$sheets['numRows']; $i++){
                                        
                                        if($sheets['cells'][$i][1]== '') break;
                                       
                                        $dataarray[$i-1]['idtgsholat'] = $coba+$i;
                                        //$dataarray[$i-1]['idtgsholat'] = $sheets['cells'][$i][1];
                                        $dataarray[$i-1]['namasholat'] = $sheets['cells'][$i][2];
                                        $dataarray[$i-1]['kategori'] = $sheets['cells'][$i][3];
                                        $dataarray[$i-1]['imam'] = $sheets['cells'][$i][4];
                                        $dataarray[$i-1]['muadzin'] = $sheets['cells'][$i][5];
                                        $dataarray[$i-1]['penceramah'] = $sheets['cells'][$i][6];                     
                                        $dataarray[$i-1]['tanggal'] = date_format(date_create_from_format('d/m/Y',$sheets['cells'][$i][7]),'Y-m-d'); 
                                        $dataarray[$i-1]['status'] = $sheets['cells'][$i][8];
                                        //echo $i; die;
                                   }
                                   

                                   $this->db->insert_batch('tg_sholatwajib', $dataarray);
                                   /*echo "<pre>";
                                   echo "testing cegat";
                                   print_r($dataarray);
                                   echo "</pre>";
                                   $i++;
                                   die();    
                                   */
                                   //$res['data1']= $this->queries->getEvaluasi1($txtNamatraining);
                                   //$this->model_upload->loaddata();
                                   
                                   //echo $this->db->last_query(); die;
                                   @unlink($data['full_path']);
                                   redirect('upload');
                               // $this->load->view('upload_success', $data);
                            }//tutup A
                    } // TUTUP NUMROWS
                    else{  //B

                          // $data=$this->upload->data();
                            @chmod($data['full_path'],0777);

                            $this->load->library('Spreadsheet_Excel_Reader');
                            $this-> spreadsheet_excel_reader->setOutputEncoding('CP1251');
                            $this-> spreadsheet_excel_reader->read($data['full_path']);

                             $sheets = $this->spreadsheet_excel_reader->sheets[0];
                             error_reporting(0);

                             $dataarray = array();
                             //for($i = 1; $i <=$sheets['numRows']; $i++){
                               //   if($sheets['cells'][$i][1]== '') break;

                               //echo $i;die();   

                               //$inserdata = array(
                                 // 'idtgsholat'=>$sheets['cells'][$i][1],
                                 // 'namasholat' => $sheets['cells'][$i][2],
                                 // 'kategori' => $sheets['cells'][$i][3],
                                 // 'imam' => $sheets['cells'][$i][4],
                                 // 'muadzin' => $sheets['cells'][$i][5],
                                 // 'penceramah' => $sheets['cells'][$i][6],
                                 // 'tanggal' => $sheets['cells'][$i][7],
                                 // 'status'=>$sheets['cells'][$i][8]
                              // );




                             //'birthday'=>date('Y-m-d', strtotime(str_replace('/', '.', $row['birthday'])));



                             for($i = 1; $i <=$sheets['numRows']; $i++){
                                  if($sheets['cells'][$i][1]== '') break;
                                 // echo $i;die();
                                  $dataarray[$i-1]['idtgsholat'] = $i;
                                  //$dataarray[$i-1]['idtgsholat'] = $sheets['cells'][$i][1];
                                  $dataarray[$i-1]['namasholat'] = $sheets['cells'][$i][2];
                                  $dataarray[$i-1]['kategori'] = $sheets['cells'][$i][3];
                                  $dataarray[$i-1]['imam'] = $sheets['cells'][$i][4];
                                  $dataarray[$i-1]['muadzin'] = $sheets['cells'][$i][5];
                                  $dataarray[$i-1]['penceramah'] = $sheets['cells'][$i][6];                     
                                  $dataarray[$i-1]['tanggal'] = date_format(date_create_from_format('d/m/Y',$sheets['cells'][$i][7]),'Y-m-d'); 
                                  $dataarray[$i-1]['status'] = $sheets['cells'][$i][8];
                             }
                             

                             $this->db->insert_batch('tg_sholatwajib', $dataarray);
                             //echo "<pre>";
                             //echo "testing cegat";
                             //print_r($dataarray);
                             //echo "</pre>";
                             //$i++;
                             //die();    
                             
                             //$res['data1']= $this->queries->getEvaluasi1($txtNamatraining);
                             //$this->model_upload->loaddata();
                             
                             //echo $this->db->last_query(); die;
                             @unlink($data['full_path']);
                             redirect('upload');
                         // $this->load->view('upload_success', $data);

                    }//TUTUP B

              
            

            
    }


    public function proses()
    {
        // validasi judul
       // $this->form_validation->set_rules('judul', 'judul', 'trim|required');

        
       // if ($this->form_validation->run() == FALSE) {
            // jika validasi judul gagal
         //   $this->index();
        //} else {

          // $this->load->library(helper('url'));
           //$this->load->view('design/header');
            // config upload
            $tmpfile = base_url('assets/uploadfiles');
            $config=array(
                'upload_path'=> $tmpfile,
                'allowed_types'=>'xls',
            );
            //echo "berhenti disini";die();
            
            $this->load->library('upload', $config);
           // print_r($cobaupload);die();
           // echo $cobaupload;  
            //echo $this->db->last_query(); die;
           
            $this->upload->do_upload('file');
            //print_r( $this->upload->do_upload('file'));die();


            if(! $this->upload->do_upload('file')){


              //print_r( $this->upload->do_upload('file'));die();             

                $data=$this->upload->data();
                @cmod($data['full_path'],0777);

                $this->load->library('spreadsheet_excel_reader');
                $this-> spreadsheet_excel_reader->setOutputEncoding('CP1251');
                 $this-> spreadsheet_excel_reader->read($data['full_path']);

                 $sheets = $this->spreadsheet_excel_reader->sheets[0];
                 error_reporting(0);

                 $data_excel = array();

                 for($i = 1; $i <=$sheets['numsRows']; $i++){
                      if($sheets['cells'][$i][1]== '') break;

                      $data_excel[$i-1]['namasholat'] = $sheets['cells'][$i][1];
                      $data_excel[$i-1]['kategori'] = $sheets['cells'][$i][2];
                      $data_excel[$i-1]['imam'] = $sheets['cells'][$i][3];
                      $data_excel[$i-1]['muadzin'] = $sheets['cells'][$i][4];
                      $data_excel[$i-1]['penceramah'] = $sheets['cells'][$i][5];
                      $data_excel[$i-1]['tanggal'] = $sheets['cells'][$i][6];
                      $data_excel[$i-1]['status'] = $sheets['cells'][$i][7];

                 }

                 print_r($data_excel);die();

            }
            else{

                 print_r($tmpfile);die();

            }

              //print_r($config);die();
            //skipp sementara
            
       // }
    }

}