<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 <script type="text/javascript">
        function cetak()
        {
            window.print();
            window.close();
        }
    </script> 
    <body onLoad="window.print()">
        <style>
            body{
                font-family: calibri;
                font-size: 12px;
                background: #fff;
            }
            /*    h3{
                    font-family: tahoma;
                    font-size: 20px;
                }
            */        td{
                padding:5px 5px 5px 0px;
            }

            tr.border{
                border:1px solid #000;
            }
            .title{
                font-family: arial;
                font-size: 13px;
            }
            td{
                padding-left: 5px;
            }
            th{
                padding: 8px;
            }
            tr.data{
                border:1px solid #000;
            }
            tr.data th{
                padding:5px;
            }
            span.tab{
                padding: 0 80px; /* Or desired space*/
            }
            @page {
                size: 8.5in 11in;  
                margin: 0px 8%;
                margin-header: 0mm; 
                margin-footer: 0mm; 
                /*                marks: crop | cross | none*/
                header: html_myHTMLHeaderOdd;
                footer: html_myHTMLFooterOdd;
            }
        </style>
        





<!--  Tabel Header -->

    <div class="container">
    <div class="row">

     <div class="row col-lg-12">

                    <div class="card" style="width: 170rem;">
                      <div class="card-body">
                        <h2 class="card-title">Laporan Keuangan Masjid Al-Falah  </h2>
                        <h5 class="card-subtitle mb-2 text-muted">Tanggal Cetak: <?php $hariini=date('d-m-Y');echo $hariini; ?></h5>
                      
                        
                      </div>
                    </div>
                      
                     <div><hr></hr></div>
                <div class="form-group col-lg-6">
                    <h2>Laporan Pengeluaran</h2> <?php ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>



                                    <td rowspan="2">No </td><td colspan="3" align="center">Informasi Pengeluaran</td>

                                </tr>  
                                <tr>
                                    <td align="center" >Tgl Bon</td><td align="center">Uraian</td><td align="center">Jumlah Pengeluaran</td>

                                  
                                    
                                </tr>
                          </thead>
                          <tbody>
                             
                              <?php  
                              
                                    if(count($data)<0){
                                        echo"<tr>"
                                        . "<td colspan='5'>Maaf data tidak ditemukan</td></tr>";
                                    }else{
                                        $no=1;
                                    
                                    foreach($data as $key){
                                        $noa=$no++;
                                        echo"
                                            <tr><td align='center'>$noa</td>
                                                
                                                 <td align='center'>".$key->tglbon."</td>
                                                <td>".$key->keterangandetail."</td>
                                                
                                                <td align='right'>".number_format($key->totaldetailpengeluaran)."</td>
                                               
                                                 
                                                  "; 
                                                
                                                    echo"</tr>"; 
                                           
                                    }}
                              ?>
                          </tbody>    
                      </table>

                       <?php 

                          foreach($data0 as $key){
                                       
                                       $totaldetailpengeluaran = $key->total;
                                       
                                    }

                      ?> 
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td colspan="2">Total Pengeluaran</td><td align='right'><b><?php  echo number_format($totaldetailpengeluaran);  ?></b></td>
                                </tr>  
                               
                          </thead>

                        </table> 

                       <div class="col-lg-12" align="right">
                         <?php echo $this->pagination->create_links(); ?>
                     </div>
                  </div>


                  <div class="form-group col-lg-6">
                    <h2>Laporan Pemasukan </h2> <?php ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>



                                    <td rowspan="2">No </td><td colspan="3" align='center'  >Informasi Pemasukan</td>
                                </tr>  
                                <tr>
                                    <td align='center'>Tgl Catan</td><td align='center'>Uraian</td><td align='center'>Jumlah Pemasukan</td>

                                  
                                    
                                </tr>
                          </thead>
                          <tbody>
                             
                              <?php  
                              
                                    if(count($data)<0){
                                        echo"<tr>"
                                        . "<td colspan='5'>Maaf data tidak ditemukan</td></tr>";
                                    }else{
                                        $no=1;
                                    
                                    foreach($data1 as $key){
                                        $noa=$no++;
                                        echo"
                                            <tr><td align='center'>$noa</td>
                                                
                                                 <td align='center'>".$key->tglpemasukan."</td>
                                                <td>".$key->keteranganpemasukan."</td>
                                                
                                                <td align='right'>".number_format($key->nilaipemasukan)."</td>
                                               
                                                 
                                                  "; 
                                                
                                                    echo"</tr>"; 
                                           
                                    }}
                              ?>
                          </tbody>    
                      </table>

                      <?php 

                          foreach($data2 as $key){
                                       
                                       $jumlahpemasukan = $key->nilaipemasukan;
                                       
                                    }

                      ?>
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                    <td colspan="2">Total Pemasukan</td><td align="right"><b><?php  echo number_format($jumlahpemasukan);  ?></b></td>
                                </tr>  
                               
                          </thead>

                        </table>  
                       <div class="col-lg-12" align="right">
                         <?php echo $this->pagination->create_links(); ?>
                     </div>
                  </div>
        </div>
    </div>
    </div>    
                  

