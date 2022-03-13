            <?php 
            $attributes = array('id' => 'formku','role'=>'form');
            echo form_open('berita',$attributes); 
          ?>
              <div style='width:100%' class="input-group">
                <input type="text" name='cari' class="form-control" placeholder="Cari Informasi Disini...">
                <span class="input-group-btn">
                  <button type='submit' class="btn btn-danger" name='submit' type="button">Go!</button>
                </span>
              </div>
          <?php echo form_close(); ?>

            <div id='sidebar-box'>
              <ul class="nav nav-tabs" id="myTabs" role="tablist" style='background: #fff;'> 
                <li role="presentation" class="active"><a href="#terpopuler" id="terpopuler-tab" role="tab" data-toggle="tab" aria-controls="terpopuler" aria-expanded="true">Terpopuler</a></li> 
                <li role="presentation" class=""><a href="#terkini" role="tab" id="terkini-tab" data-toggle="tab" aria-controls="terkini" aria-expanded="false">Terkini</a></li> 
                <li role="presentation" class=""><a href="#terkomentar" role="tab" id="terkomentar-tab" data-toggle="tab" aria-controls="terkomentar" aria-expanded="false">Terkomentar</a></li> 
              </ul> 

              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" role="tabpanel" id="terpopuler" aria-labelledby="terpopuler-tab"> 
                  <?php 
                    $terbaru = $this->db->query("SELECT * FROM berita a JOIN kategori b ON a.id_kategori=b.id_kategori ORDER BY a.dibaca DESC LIMIT 5");
                    echo "<table class='table table-hovered table-condensed'>";
                    foreach ($terbaru->result_array() as $row){
                      $tanggaldetail = tgl_indo($row['tanggal']);
                      if ($row['gambar'] == ''){ $fotodetail = 'small_no-image.jpg'; }else{ $fotodetail = $row['gambar']; }
                        echo "<tr>
                                <td><img class='img-thumbnail pull-left' width='80px' style='margin-right:6px; height:60px' src='".base_url()."asset/foto_berita/".$fotodetail."'>
                                    <a href='".base_url()."berita/detail/$row[judul_seo]'><b>$row[nama_kategori]</b> - ".$row['judul']."</a><br>
                                    <small class='date text-danger'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggaldetail, $row[jam] WIB</small></td>
                              </tr>";
                      }
                  echo "</table>";
                  ?>
                </div> 

                <div class="tab-pane fade" role="tabpanel" id="terkini" aria-labelledby="terkini-tab"> 
                  <?php 
                    $terkini = $this->db->query("SELECT * FROM berita a JOIN kategori b ON a.id_kategori=b.id_kategori ORDER BY a.id_berita DESC LIMIT 5");
                    echo "<table class='table table-hovered table-condensed'>";
                    foreach ($terkini->result_array() as $row){
                      $tanggaldetail = tgl_indo($row['tanggal']);
                      if ($row['gambar'] == ''){ $fotodetail = 'small_no-image.jpg'; }else{ $fotodetail = $row['gambar']; }
                        echo "<tr>
                                <td><img class='img-thumbnail pull-left' width='80px' style='margin-right:6px; height:60px' src='".base_url()."asset/foto_berita/".$fotodetail."'>
                                    <a href='".base_url()."berita/detail/$row[judul_seo]'><b>$row[nama_kategori]</b> - ".$row['judul']."</a><br>
                                    <small class='date text-danger'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggaldetail, $row[jam] WIB</small></td>
                              </tr>";
                      }
                  echo "</table>";
                  ?>
                </div>

                <div class="tab-pane fade" role="tabpanel" id="terkomentar" aria-labelledby="terkomentar-tab"> 
                  <?php 
                    $terkomentar = $this->db->query("SELECT * FROM berita,komentar 
                                         WHERE komentar.id_berita=berita.id_berita  
                                         ORDER BY id_komentar DESC LIMIT 5");
                    echo "<table class='table table-hovered table-condensed'>";
                    foreach ($terkomentar->result_array() as $row){
                      $tanggaldetail = tgl_indo($row['tanggal']);
                      if ($row['gambar'] == ''){ $fotodetail = 'small_no-image.jpg'; }else{ $fotodetail = $row['gambar']; }
                        echo "<tr>
                                <td><img class='img-thumbnail pull-left' width='80px' style='margin-right:6px; height:60px' src='".base_url()."asset/foto_berita/".$fotodetail."'>
                                    <a href='".base_url()."berita/detail/$row[judul_seo]'><b>$row[nama_komentar]</b></a>  pada 
                                    <a href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']."</a><br>
                                    <small class='date text-danger'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggaldetail, $row[jam] WIB</small></td>
                              </tr>";
                      }
                  echo "</table>";
                  ?>
                </div>
              </div> 
            </div>

            <div id='sidebar-box'>
            <p class='sidebar-title'> &nbsp; Sekilas Info</p>
            <marquee style="height:170px;" scrollamount="2" scrolldelay="90" direction="down" onmouseover="this.stop()" onmouseout="this.start()">
              <?php
                $pengumuman = $this->model_utama->pengumuman(0, 5); 
                foreach ($pengumuman->result_array() as $rows){
                  if ($rows['gambar'] == ''){ $fotoinfo = 'small_no-image.jpg'; }else{ $fotoinfo = $rows['gambar']; }
                  echo "<img class='img-thumbnail pull-left' width='80px' style='margin-right:6px; height:70px' src='".base_url()."asset/foto_info/".$fotoinfo."'>
                        $rows[info]<hr><div style='clear:both'></div>";
                }
              ?>
            </marquee>
            </div>
            
            <div id='sidebar-box'>
            <p class='sidebar-title'> &nbsp; Statistik User</p>
            <ul class="list-group">
              <?php 
                  $pengunjung       = $this->model_utama->pengunjung()->num_rows();
                  $totalpengunjung  = $this->model_utama->totalpengunjung()->row_array();
                  $hits             = $this->model_utama->hits()->row_array();
                  $totalhits        = $this->model_utama->totalhits()->row_array();
                  $pengunjungonline = $this->model_utama->pengunjungonline()->num_rows();
                  echo "<li class='list-group-item'>User Online <span class='badge'>$pengunjungonline</span></li>
                        <li class='list-group-item'>Today Visitor <span class='badge'>$pengunjung</span></li>
                        <li class='list-group-item'>Hits hari ini  <span class='badge'>$hits[total]</span></li>
                        <li class='list-group-item'>Total Hits <span class='badge'>$totalhits[total]</span></li>
                        <li style='background-color:#9d0000; color:#fff' class='list-group-item alert'>Total pengunjung <span class='badge'>$totalpengunjung[total]</span></li>";
              ?>
            </ul>
            </div>

            <div id='sidebar-box'>
            <?php
              $qpoling = $this->model_utama->cek_poling()->num_rows();
              if ($qpoling > 0){
                echo "<p class='sidebar-title'> &nbsp; Polling</p>";
                $row = $this->model_utama->pertanyaan()->row_array();
                echo form_open('polling/index'); 
                echo "<div class='panel panel-default'>
                        <div class='panel-body'>
                          <h4>$row[pilihan]</h4>
                        </div>";

                  echo "<table class='table table-condensed'>";
                          $jawaban = $this->model_utama->jawaban();
                          foreach ($jawaban->result_array() as $rows){
                            echo "<tr><td><input type=radio name=pilihan value='$rows[id_poling]'/> $rows[pilihan]</td></tr>";
                          }
                  echo "</table>
                      </div>
                        <input class='btn btn-warning btn-sm btn-block' type=submit value='Kirimkan Pilihan'>";
                      echo form_close();
                      echo "<a style='margin-top:17px; diplay:block' href='".base_url()."polling/hasil'><center>Lihat Hasil Poling</center></a></p>";
              }
            ?>
            </div>
            <br>
            <div id='sidebar-box'>
            <?php
                echo "<p class='sidebar-title'> &nbsp; Banner</p>";
                $banner = $this->model_utama->banner(0, 5); 
                foreach ($banner->result_array() as $rows){
                  if ($rows['gambar']==''){
                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $rows['url'], $match)) {
                      echo "<iframe id='ytplayer' type='text/html'
                          src='https://www.youtube.com/embed/".$match[1]."?rel=0&showinfo=1&color=white&iv_load_policy=3'
                          frameborder='0' allowfullscreen></iframe>";
                    }
                  }else{
                    echo "<center><img  src='".base_url()."asset/foto_banner/$rows[gambar]'></center>";
                  }
                }
            ?>
            </div>
