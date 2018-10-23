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
        <table style="margin-bottom: 10px;">
            <thead>
                <tr>
                    <th>
            <h1 style="font-size:29px; padding-left: 0px; color: #000;">Laporan Permohonan Kartu Kredit</h1>
        </th>
        <th style="width:95px;"></th>
        <th>
            <img src="<?php echo base_url(); ?>assets/img/header.png">
        </th>
    </tr>
</thead>
</table>
<?php
//kalo data tidak ada didatabase
if (empty($data2)) {
    
} else {
    $no = 1;
    
        ?>
        <table style="border: 1px solid #000; color:#000;">
            <tbody>
                <tr>
                    <td style="width:263px; border:1px solid #000;">
                        Tahun Laporan
                    </td>
                    <td style="width:38px; text-align: center; border:1px solid #000;">:</td>
                    <td style="border: 1px solid #000; color:#000; width: 200px">
                         <?php 
                            if($thnreport ==''){
                                echo "All";
                            }
                            else {   echo $thnreport; }
                            
                        ?></td>
                       
                </tr>
                <tr>
                    <td style="width:250px;border:1px solid #000;">
                        Bulan Laporan
                    </td>
                    <td style="width:38px; text-align: center; border:1px solid #000;">:</td>
                    <td style="border: 1px solid #000; color:#000;">
                        <?php 
                            if($blnreport ==''){
                                echo "All";
                            }
                            else {   echo $blnreport; }
                            
                        ?></td>
                </tr>
                <tr>
                    <td style="width:250px; border:1px solid #000;">
                        Status
                    </td>
                    <td style="width:38px; text-align: center; border:1px solid #000;">:</td>
                    <td style="border: 1px solid #000; color:#000;">
                        <?php 
                             if($sttsreport ==''){
                                echo "All";
                            }
                            else {   echo $sttsreport; }
                            
                           
                        ?></td>
                </tr>
                
            </tbody>
        </table>
        <?php
    
}
?>

<table style="border: 2px solid #000; color:#000;">
    <thead>
        <tr>
                                    <td style="text-align:center; border:1px solid #000;" rowspan="2">No </td>
                                    <td style="text-align:center; border:1px solid #000;" rowspan="2"> Nama Lengkap</td>
                                    <td style="text-align:center; border:1px solid #000;" rowspan="2">Tanggal Pengajuan</td>
                                    <td style="text-align:center; border:1px solid #000;" rowspan="2">Pekerjaan</td>
                                    <td style="text-align:center; border:1px solid #000;" rowspan="2">Penghasilan</td>
                                    <td style="text-align:center; border:1px solid #000;" colspan="4"> Status Verifikasi</td>
                                    <td style="text-align:center; border:1px solid #000;" colspan="4"> Status Penilaian</td>
                                    <td style="text-align:center; border:1px solid #000;" colspan="2"> Status Approval</td>
                                    <td style="text-align:center; border:1px solid #000;" rowspan="2">Status Proses</td>
                                </tr>  
                                <tr>
                                    <td style="text-align:center; border:1px solid #000;">Telpon Rumah</td>
                                    <td style="text-align:center; border:1px solid #000;">Telpon Kantor</td>
                                    <td style="text-align:center; border:1px solid #000;">Telpon Keluarga</td>
                                    <td style="text-align:center; border:1px solid #000;">Tgl Verifikasi</td>
                                    <td style="text-align:center; border:1px solid #000;">Survey</td>
                                    <td style="text-align:center; border:1px solid #000;">Catatan Survey</td>
                                    <td style="text-align:center; border:1px solid #000;">Cek BI</td>
                                    <td style="text-align:center; border:1px solid #000;">Tgl Penilaian</td>
                                    <td style="text-align:center; border:1px solid #000;">Nilai Approval</td>
                                    <td style="text-align:center; border:1px solid #000;">Tgl Approval</td>
                                </tr>
    </thead>
    <tbody>

        <?php
//kalo data tidak ada didatabase
        if (empty($data2)) {
            echo "<tr><td colspan=\"16\">Maaf tidak ada Data, kembali ke pilihan <a href='pencarian/laporan'>Laporan </a></td></tr>";
        } else {
            $no = 1;
           
            foreach($data2 as $key){
                                        $noa=$no++;
                                        ?>
                                            <tr>
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $noa; ?></td>
                                                <td style="text-align:center; border:1px solid #000;"><?php echo anchor_popup(base_url()."Rptpdf/index/".$key->idnasabah,$key->namadepan." ".$key->namabelakang);?>
                                                
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->dateapplyed;?></td>  
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->jabatan; ?></td>
                                                <td style="text-align:right; border:1px solid #000;"><?php echo number_format($key->penghasilan); ?></td>    
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->ver_telpon; ?></td>    
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->ver_kantor; ?></td>    
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->ver_keluarga; ?></td>
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->log_verified; ?></td>   
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->pen_survey; ?></td>        
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->cat_survey; ?></td>        
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->cek_bi; ?></td>
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->log_penilaian; ?></td>
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->final_limit; ?></td>
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->log_approval; ?></td>    
                                                <td style="text-align:center; border:1px solid #000;"><?php echo $key->statusreg; ?></td> 
                                                
                                                </tr> 
                                           <?php
                                    }
                              ?>
            

            <?php
        }
        ?>
    </tbody>
</table>

