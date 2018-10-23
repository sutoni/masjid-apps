
<section class="content">
    <div class="form-group col-lg-12">
        <div class="row col-lg-7">
            <div class="panel panel-default">
              <div class="panel-body">
                <div id="mySlide1" class="carousel slide  ">
                  <ol class="carousel-indicators">
                       <li data-target="#mySlide1" data-slide-to="0" class="active"></li>
                       <li data-target="#mySlide1" data-slide-to="1"></li>
                       <li data-target="#mySlide1" data-slide-to="2"></li>
                  </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="item active">
                                        <img src="assets/img/promo2.jpg" alt="" width="100%" class="hidden-phone">

                                       
                                </div>
                                <div class="item">
                                        <img src="assets/img/masjid-2.jpg" alt="" width="100%" class="hidden-phone">
                                        <div class="carousel-caption">
                                         
                                        </div>
                                </div>
                                <div class="item img-responsive">
                                        <img src="assets/img/masjid-3.jpg" alt="" width="100%" class="hidden-phone">
                                        <div class="carousel-caption">

                                        </div>
                                </div>
                        </div>
                        <!-- Carousel nav -->
                        <a class="carousel-control left hidden-phone" href="#mySlide1" data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right hidden-phone" href="#mySlide1" data-slide="next">&rsaquo;</a>
                </div>
            </div> 

            </div>


            <!-- Panel Berita -->
            

                          
                   <?php
                                  
                                    foreach($data2 as $key){
                                        $idberita = $key->idberita;
                                        $kategori = $key->kategori;
                                        $tglposting = $key->tglposting;
                                        $topikberita = $key->topikberita;
                                        $detailberita = $key->detailberita;
                                        $linkgambar = $key->linkgambar;
                                        $logupdate = $key->logupdate;
                                        $loguser = $key->loguser;
                                        $statusberita = $key->statusberita;
                                        

                                        ?>
                                                  <div class="panel panel-default">
                                                  <div class="panel-body">

                                                   <div class="news_box_latest row-fluid">
                                                        <div class="news_box_post_thumbnail thumbnail_effect">

                                                        </div>  
                                                        <div class="news_box_post_info">
                                                          <h3><?php echo $topikberita; ?></h3>
                                                          <div class="news_box_post_meta">
                                                            <span class="glyphicon glyphicon-calendar"> Posting : <?php  echo $tglposting; ?></span>
                                                            <span class="icon-book"></span>

                                                          </div>

                                                          <div class="news_box_post_desc">
                                                            <p><?php echo $detailberita; ?></p>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                        
                  
                                                  </div>      
                                        <?php
                                    }
                                    


                      ?>
                      <!-- Content berita -->
                                        

                   
        </div>            
    <div class="form-group col-lg-5  ">
        
                <div class="panel panel-default">
                <div class="panel-body">
                    <!-- form start -->
                            <?php
                                    $attributes = array('role' => 'form', 'kdjadwal' => 'formadd');
                                    echo form_open('Kegiatan/cari',$attributes); 
                            ?>
                            <?php echo validation_errors('<div class="alert alert-danger col-md-12"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
                        
                 
                  <div class="form-group col-lg-4">
                    <label for="txttgldari">Dari Tanggal</label>
                          <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                   <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                  <input class="form-control" type="text" name="txttgldari" id="txttgldari">                         
                          </div>
                  </div>
          
                  <div class="form-group col-lg-4">
                    <label for="txttglsampai">Sampai Tanggal</label>
                          <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                                   <span class="input-group-addon" id=".input-group.date"><i class="glyphicon glyphicon-calendar"></i></span>  
                                  <input class="form-control" type="text" name="txttglsampai" id="txttglsampai">                         
                          </div>
                  </div>
                 
                    <div class="form-group col-lg-4">
                        <label for="elemen">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                      <button type="submit" class="btn btn-primary" id="btnCari" name="btnCari">Cari Jadwal Sholat</button>
                    </div><?php form_close(); ?>
                </div> 
              </div>
                
                 <!-- Tampil Jadwal Sholat Hari Ini -->
              <div class="panel panel-default">
                <div class="panel-body">
                   <form class="form-inline">
                       <h4>Jadwal Sholat Hari Ini </h4><hr>     
                       <div class="table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                          <thead>
                               <tr>
                              <td>No </td><td> Tanggal</td><td>Waktu Sholat</td><td> Imam</td><td>Penceramah</td>
                          </tr>     
                          </thead>
                          <tbody>
                              <?php  
                                    if (count($data)<1) {
                                        echo "<tr><td colspan=7>DATA KOSONG1!!</td></tr>";
                                    }else{
                                        $no=1;
                                        foreach($data as $key){
                                            $noi =$no++;
                                            echo"
                                                <tr>
                                                    <td>$noi</td>

                                                    <td>$key->tanggal</td>
                                                    <td>$key->namasholat </td>
                                                    <td>$key->imam </td>
                                                    
                                                    <td>$key->penceramah</td>
                                                    
                                                   ";
                                                     }   
                                             echo "</tr>";


                                        }
                                    
                                    
                                        ?>
                              </tbody>    
                      </table>
                    </div>
        </div>
      </div>
                     
                    <!-- Tampil Jadwal Kegiatan -->
                    
                      <div class="panel panel-default">
                            <div class="panel-body ">
                               

                                  
                                  <h4>Jadwal Kegiatan </h4>
                                  <div class="table-responsive">
                                  <table id="example1" class="table table-bordered table-striped table-responsive">
                                      <thead>
                                            <tr>
                                                <td rowspan="2" align="center">No </td><td rowspan="2" align="center">Kategori Kegiatan</td><td colspan="6" align="center">Kegiatan</td>
                                            </tr>
                                            <tr>
                                                <td align="center">Tanggal Kegiatan</td><td align="center">Tempat</td><td align="center">Uraian</td><td align="center">PIC</td>
                                            </tr>     
                                      </thead>
                                      <tbody>
                                         <?php     
                                                $no=1;
                                                foreach($data3 as $baris){
                                                    $noa=$no++;
                                                    echo"
                                                        <tr><td>$noa</td>
                                                           
                                                            <td>$baris->namakegiatan</td>
                                                            <td>$baris->tglkegiatan  $baris->waktukegiatan</td>
                                                            <td>$baris->tempatkegiatan</td>
                                                            
                                                            <td>$baris->agendakegiatan</td>
                                                            <td>$baris->ketua - $baris->pic</td>
                                                            
                                                              
                                                            
                                                           ";
                                                    echo"                                            </tr>     
                                                        ";    
                                                }
                                          ?>
                                      </tbody>    
                                  </table>
                                   <div class="col-lg-12" align="right">
                                    
                                 </div>
                              </div> 
                            </div> 
                          </div>





              </div>  
                <!-- this java script must be appear when you use twitter bootstrop -->
			                    
     
 </section>                                                               
  
                          
      
      
   <!--  <script type="text/javascript" src="assets/js/jquery-2.0.2.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/clock.js" type="text/javascript"></script>
		<script src="assets/js/newsticker.js" type="text/javascript"></script>
		<script src="assets/js/jquery.lightbox-0.5.min.js" type="text/javascript"></script> -->
    <script type="text/javascript" charset="utf-8"> 
			$(document).ready(function(){
				//startclock();
				$('#mySlide1').carousel();
				$('#mySlide2').carousel();
				$(".tip").tooltip();
				$('a#galeri').lightBox();
			});
		</script>
    <script>
         //options method for call datepicker
         $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
      </script>   
      
  </div>